<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manajer_proyek_model extends CI_Model {
	public function viewProjectManajer($q){
		$this->db->select('project.name as project_name,crew.id_project as id_project'); 
		$this->db->distinct();
		$this->db->where('crew.id_staff', $q);
		$this->db->join('project','project.id_project=crew.id_project');
		$get = $this->db->get('crew');
		return $get->result();
	}

	public function viewProjectManajerId($q){
		$this->db->select('project.name as project_name,crew.id_project as id_project'); 
		$this->db->distinct();
		$this->db->where('crew.id_project', $q);
		$this->db->join('project','project.id_project=crew.id_project');
		$get = $this->db->get('crew');
		return $get->result();
	}
}