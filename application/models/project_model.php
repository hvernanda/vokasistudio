<?php
if(!defined('BASEPATH')) exit('No direct script allowed') ;

class project_model extends CI_Model {

    public function __construct(){
      parent::__construct() ;
    }
    public function getAllProjects($id_user){
        $condition = "id";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function isProject($id_project){
        $this->db->select('*') ;
        $this->db->from('project') ;
        $this->db->where('id_project', $id_project) ;
        $query = $this->db->get() ;

        if($query->num_rows() == 1) return true ;

        return false ;
    }

    public function ambil_project()
    {
		$this->db->select('project.*,company.name as name_company,contact.name as name_contact, user.name as pm_name');
		$this->db->from('company');
        $this->db->join('contact','company.id_company = contact.id_company');
        $this->db->join('project','contact.id_contact = project.id_contact') ;
        $this->db->join('crew', 'crew.id_project = project.id_project', 'left') ;
        $this->db->join('staff', 'staff.id_staff = crew.id_staff', 'left') ;
        $this->db->join('user', 'user.id_user = staff.id_user', 'left') ;
        $this->db->order_by('project.id_project', 'desc') ;
		// $this->db->where('id_staff');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
    public function ambil_project_manajer($id_project)
    {
		$this->db->select('project.*,company.name as name_company,contact.name as name_contact, contact.id_contact, user.name as pm_name, crew.id_staff, project.status');
		$this->db->from('company');
        $this->db->join('contact','company.id_company = contact.id_company');
        $this->db->join('project','contact.id_contact = project.id_contact') ;
        $this->db->join('crew', 'crew.id_project = project.id_project', 'left') ;
        $this->db->join('staff', 'staff.id_staff = crew.id_staff', 'left') ;
        $this->db->join('user', 'user.id_user = staff.id_user', 'left') ;
        $this->db->where('project.id_project', $id_project);
        $this->db->where('crew.id_status', '1') ;
        $this->db->order_by('crew.id_crew', 'desc') ;
        $this->db->limit(1) ;

		$query = $this->db->get();
		$result = $query->result()[0];
		return $result;
    }
    public function ambil_project_company($id_company){
        $this->db->select('project.*,contact.name as name_contact, user.name as pm_name');
		$this->db->from('company');
        $this->db->join('contact','company.id_company = contact.id_company');
        $this->db->join('project','contact.id_contact = project.id_contact') ;
        $this->db->join('crew', 'crew.id_project = project.id_project', 'left') ;
        $this->db->join('staff', 'staff.id_staff = crew.id_staff', 'left') ;
        $this->db->join('user', 'user.id_user = staff.id_user', 'left') ;
		$this->db->where('company.id_company = '.$id_company) ;
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }

    public function get_all_type(){
        $this->db->select('*') ;
        $this->db->from('type') ;
        $query = $this->db->get() ;

        $result = $query->result() ;
        return $result ;
    }

    public function get_project_type($id_proyek){
        $this->db->select('*') ;
        $this->db->from('projecttype') ;
        $this->db->where('id_project', $id_proyek) ;
        $query = $this->db->get() ;
        $result = array() ;
        foreach($query->result() as $q){
            array_push($result, $q->id_type) ;
        }

        return $result ;
    }

    public function insert_project($nama, $dealtime, $price, $deadline, $revisiondate, $status, $downpayment, $id_contact, $manpro, $array_type)
    {
        $data = array(
            'name' => $nama,
            'dealtime' => $dealtime,
            'price' => $price,
            'deadline' => $deadline,
            'revisionDeadline' => $revisiondate,
            'status' => $status,
            'DP' => $downpayment,
            'id_contact' => $id_contact);
        $input = $this->db->insert('project', $data);
        if($input){
            $insertId = $this->db->insert_id() ;
            $types = explode(',', $array_type) ;
            foreach($types as $type){
                $data = array(
                    'id_type' => $type,
                    'id_project' => $insertId
                ) ;

                $this->db->insert('projecttype', $data) ;
            }

            $offer_data = array(
                'id_project' => $insertId,
                'id_staff' => $manpro,
                'status_offer' => '0'
            ) ;

            $this->db->insert('projectoffer', $offer_data) ;
            return true ;
        }else{
            return false ;
        }    
    }

    public function ambil_project_penawaran()
    {
        $this->db->select('project.id_project, project.name as project, user.name as manpro_name, projectoffer.status_offer as status') ;
        $this->db->from('projectoffer') ;
        $this->db->join('project', 'projectoffer.id_project = project.id_project') ;
        $this->db->join('staff', 'projectoffer.id_staff = staff.id_staff') ;
        $this->db->join('user', 'staff.id_user = user.id_user') ;
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }

    public function insert_project_type($name){
        $data = array(
            'name'=> $name
        ) ;
        $input = $this->db->insert('type', $data) ;
        return $input ? true : false ;
    }

    public function update_project_type($id_type, $name){
        $data = array(
            'name' => $name
        ) ;
        $this->db->where('id_type', $id_type) ;
        $input = $this->db->update('type', $data) ;

        return $input ? true : false ;
    }

    public function update_project($id, $data, $manajer, $types){
        $this->db->where('id_project', $id) ;
        $query = $this->db->update('project', $data) ;

        if($query){
            $types = explode(',', $types) ;
            $manpro_data = array(
                'id_staff' => $manajer
            ) ;

            $this->db->where('id_project', $id) ;
            $this->db->delete('projecttype') ;

            foreach($types as $type){
                $data_type = array(
                    'id_project' => $id,
                    'id_type' => $type
                ) ;
                $this->db->insert('projecttype', $data_type) ;
            }

            $this->db->where('id_project', $id) ;
            $this->db->where('id_status', '1') ;
            $this->db->update('crew', $manpro_data) ;
            
            return true ;
        }
        return false ;
    }

    public function delete_project($id){
        $this->db->where('id_project', $id) ;

        if($this->db->delete('project')) return true ;

        return false ;
    }

    public function getIdProject($id)
    {
        $this->db->select('crew.id_project as id_project');
        $this->db->from('staff') ;
        $this->db->join('crew', 'staff.id_staff=crew.id_staff', 'left');
        $this->
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}

?>
