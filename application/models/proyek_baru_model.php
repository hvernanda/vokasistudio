<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proyek_baru_model extends CI_Model {
	public function insertProject($insert_project){
		$this->db->set($insert_project);
		$this->db->insert('project');
	}

	public function getIdProject($nama,$harga,$dp,$dealtime,$deadline,$revisideadline,$status){
		$this->db->where('name',$nama);
		$this->db->where('price',$harga);
		$this->db->where('DP',$dp);
		$this->db->where('dealTime',$dealtime);
		$this->db->where('deadline',$deadline);
		$this->db->where('revisionDeadline',$revisideadline);
		$this->db->where('status',$status);
		$get = $this->db->get('project');
		return $get;
	}
	
	public function insertProjectType($insert_project_type){
		$this->db->set($insert_project_type);
		$this->db->insert('projecttype');
	}

	public function getTipeProyek()
	{
		$this->db->order_by('name','asc');
		$get = $this->db->get('type');
		$result = $get->result();
		return $result;
	}
}