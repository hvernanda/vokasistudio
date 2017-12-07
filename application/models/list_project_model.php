<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class list_project_model extends CI_Model {
	public function viewProject(){
		$this->db->select('project.name as project_name, project.price as project_price, project.status as project_status, project.id_project as id_project, crew.id_status as crew_status, staff.name as crew_name'); 
		$this->db->join('crew', 'crew.id_project = project.id_project AND crew.id_status = 3','left');
		$this->db->join('staff', 'staff.id_staff = crew.id_staff','left');
		$get = $this->db->get('project');
		return $get->result();
	}
}