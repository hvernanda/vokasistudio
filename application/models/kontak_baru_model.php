<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kontak_baru_model extends CI_Model {
	public function insertContact($insert_contact){
		$this->db->set($insert_contact);
		$this->db->insert('contact');
	}

	public function getIdContact($nama,$phone,$email){
		$this->db->where('name',$nama);
		$this->db->where('phone',$phone);
		$this->db->where('email',$email);
		$get = $this->db->get('contact');
		return $get->result();
	}
}