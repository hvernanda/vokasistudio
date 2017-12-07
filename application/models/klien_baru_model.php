<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class klien_baru_model extends CI_Model {
	public function insertClient($insert_client){
		$this->db->set($insert_client);
		$this->db->insert('company');
	}

	public function getIdClient($nama,$phone,$email,$alamat,$password){
		$this->db->where('name',$nama);
		$this->db->where('phone',$phone);
		$this->db->where('email',$email);
		$this->db->where('address',$alamat);
		$this->db->where('password',$password);
		$get = $this->db->get('company');
		return $get->result();
	}
}