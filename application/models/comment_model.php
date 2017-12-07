<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comment_model extends CI_Model {
	public function insertComment($insert_comment){
		$this->db->set($insert_comment);
		$this->db->insert('activity');
	}

	public function updateComment($insert_comment, $idProject){
		$this->db->where('id_activity', $idProject);
		$this->db->set($insert_comment);
		$get = $this->db->update('activity');
		return $get;	
	}
}