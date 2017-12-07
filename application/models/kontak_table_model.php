<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kontak_table_model extends CI_Model {
	public function viewContact($id){
		$this->db->select('contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email, id_contact as id'); 
		//$this->db->limit(1);
		$this->db->join('company','contact.id_company=company.id_company', 'left');
		$this->db->where('contact.id_company', $id);
		$get = $this->db->get('contact');
		return $get->result();
	}
	public function viewContactSearch($q){
		$this->db->select('contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email'); 
		$this->db->like('company.name', $q);
		$this->db->join('company','contact.id_company=company.id_company'); 
		$get = $this->db->get('contact');
		return $get->result();
	}
}