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

    public function ambil_project()
    {
		$this->db->select('project.*,company.name as name_company,contact.name as name_contact, user.name as pm_name');
		$this->db->from('company');
        $this->db->join('contact','company.id_company = contact.id_company');
        $this->db->join('project','contact.id_contact = project.id_contact') ;
        $this->db->join('crew', 'crew.id_project = project.id_project', 'left') ;
        $this->db->join('staff', 'staff.id_staff = crew.id_staff', 'left') ;
        $this->db->join('user', 'user.id_user = staff.id_user', 'left') ;
		// $this->db->where('id_staff');
		$query = $this->db->get();
		$result = $query->result();
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
    public function insert_project($nama, $dealtime, $price, $deadline, $revisiondate, $status, $downpayment, $id_contact)
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
        
    }
    public function ambil_project_penawaran()
    {
		$this->db->select('project.*,company.name as name_company,contact.name as name_contact');
		$this->db->from('company');
        $this->db->join('contact','company.id_company = contact.id_company');
        $this->db->join('project','contact.id_contact = project.id_contact') ;
        $this->db->where('status', 'on_process');
		// $this->db->where('id_staff');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
}

?>
