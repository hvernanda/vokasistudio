<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class client_model extends CI_Model
 {
    public function ambil_company()
    {
        $this->db->select('*');
        $this->db->from('company');
        // $this->db->where('id_staff');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function ambil_company_id($id)
    {
        $this->db->select('*');
        $this->db->from('company');
        // $this->db->where('id_staff');
        $this->db->where('id_company', $id) ;
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function isCompany($id){
        $sql = "SELECT * FROM company WHERE `id_company` = ".$id ;
        $query = $this->db->query($sql) ;

        if($query->num_rows() == 1){
            return $query->result() ;
        }else{
            return false ;
        }
    }

    public function ambil_user()
    {
        $this->db->select('user.id_user, user.email AS email, user.name AS nama, contact.phone, company.name AS company, ');
        $this->db->from('company');
        $this->db->join('contact','contact.id_company = company.id_company');
        $this->db->join('user','contact.id_user= user.id_user');
         //$this->db->where('id_user_role', '4');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    // public function ambil_user_id($id) // ambil data user client berdasarkan id
    // {
    //     $this->db->select('user.id_user, user.email AS email, user.name AS nama, contact.phone, company.name AS company, contact.id_contact');
    //     $this->db->from('company');
    //     $this->db->join('contact','contact.id_company = company.id_company');
    //     $this->db->join('user','contact.id_user = user.id_user');
    //     $this->db->join('project','project.id_contact = contact.id_contact');
    //     $this->db->where('user.id_user', $id) ;
    //     $query = $this->db->get();
    //     $result = $query->result();
    //     return $result;
    // }

    public function ambil_user_id($id){
        $this->db->select('user.name as nama, user.email, contact.*, company.name as company') ;
        $this->db->from('contact') ;
        $this->db->join('company', 'contact.id_company = company.id_company') ;
        $this->db->join('user', 'user.id_user = contact.id_user') ;
        $this->db->where('user.id_user', $id) ;
        $query = $this->db->get() ;
        $result = $query->result() ;

        return $result ;
    }

    public function ambil_user_company($id_company){
        $this->db->select('user.id_user, user.email as email, user.name as name, contact.phone') ;
        $this->db->from('contact') ;
        $this->db->join('user', 'contact.id_user = user.id_user') ;
        $this->db->where('contact.id_company', $id_company) ;

        $query = $this->db->get() ;
        return $query->result() ;
    }

    public function insert_client($nama, $email, $phone, $password, $id_company)
    {
        $data = array(
            'name' => $nama,
            'email' => $email,
            'password' => $password,
            'id_user_role' => '4' );
        if($this->db-> insert('user', $data)){
            $insertId = $this->db->insert_id() ;
            $contact_data = array(
                'phone' => $phone,
                'id_user' => $insertId,
                'id_company' => $id_company,
            ) ;

            if($this->db->insert('contact', $contact_data)){
                return true ;
            }else{
                return false ;
            }
        }else{
            return false ;
        }
    }

    public function insert_client_company($nama,$phone, $email, $address)
    {
        $data = array(
            'name' => $nama,
            'phone' => $phone,
            'email' => $email,
            'address' => $address
             );
        $input = $this->db-> insert('company', $data);

        return $input ;
    }

    public function update_company($data){
        $this->db->where('id_company = '.$data['id_company']) ;
        $query = $this->db->update('company', $data) ;
        return $query ;
    }

    public function get_project($id_kontak)
    {
        $this->db->select('project.id_project, project.name, project.dealtime, project.deadline');
        $this->db->from('project');
        $this->db->join('contact','contact.id_contact = project.id_contact');
        $this->db->join('user','user.id_user=contact.id_user');
        $this->db->where('contact.id_contact', $id_kontak);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_project_update($id_kontak)
    {
        $this->db->select('user.name as crew_name, project.name as project, activity.name as crew_task, activity.upload_file as crew_file, activity.id_activity');
        $this->db->from('staff');
        $this->db->join('user','user.id_user=staff.id_user');
        $this->db->join('crew','crew.id_staff=staff.id_staff');
        $this->db->join('jobassignment','jobassignment.id_crew=crew.id_crew');
        $this->db->join('activity','activity.id_job_assignment=jobassignment.id_job_assignment');
        $this->db->join('project','project.id_project=crew.id_project');
        $this->db->join('contact', 'contact.id_contact=project.id_contact');
        $this->db->where('contact.id_contact', $id_kontak);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_projects_user($id){
        $this->db->select('project.id_project, project.name, project.status, user.name as manpro') ;
        $this->db->from('project') ;
        $this->db->join('contact', 'contact.id_contact = project.id_contact') ;
        $this->db->join('user', 'user.id_user = contact.id_user') ;
        $this->db->where('user.id_user', $id) ;
        $query = $this->db->get() ;
        $result = $query->result() ;

        return $result ;
    }
}

?>
