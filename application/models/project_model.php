<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class project_model extends CI_Model
 {

    public function ambil_project()
    {
		$this->db->select('project.*,company.name as name_company,contact.name as name_contact');
		$this->db->from('company');
        $this->db->join('contact','company.id_company = contact.id_company');
        $this->db->join('project','contact.id_contact = project.id_contact') ;
		// $this->db->where('id_staff');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }

    public function insert_project($nama, $dealtime, $price, $deadline, $revisiondate, $status, $downpayment, $id_contact){
        $data = array(
            'name' => $nama,
            'dealtime' => $dealtime,
            'price' => $price,
            'deadline' => $deadline,
            'revisionDeadline' => $revisiondate,
            'status' => $status,
            'DP' => $downpayment,
            'id_contact' => $id_contact);
           
        $input = $this->db-> insert('project', $data);
    }
}

?>