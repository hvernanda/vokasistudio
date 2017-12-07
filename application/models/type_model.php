<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class type_model extends CI_Model {
	
	public function insertType($insert_type){
		$this->db->set($insert_type);
		$this->db->insert('type');
	}

	public function viewType(){
		$this->db->select('type.name,type.id_type, type.visibility'); 
		$get = $this->db->get('type');
		return $get->result();
	}

	public function deleteType($data, $id){
  		$this -> db -> where('id_type', $id);
  		$this->db->set($data);
		$get = $this->db->update('type');
		return $get;	
	}
}