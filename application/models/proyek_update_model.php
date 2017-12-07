<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proyek_update_model extends CI_Model {
	public function viewUpdate($id){
		$this->db->select('staff.name as crew_name, activity.name as crew_task, activity.uploadFile as crew_file, crew.id_project, activity.id_activity'); 
		//$this->db->limit(1);
		$this->db->join('crew','staff.id_staff=crew.id_staff');
		$this->db->join('jobassignment','jobassignment.id_crew=crew.id_crew');
		$this->db->join('activity','activity.id_jobAssignment=jobassignment.id_jobAssignment');
		$this->db->join('project','project.id_project=crew.id_project');
		$this->db->where('crew.id_project', $id);
		$get = $this->db->get('staff');
		return $get->result();
	}
	public function insertManager($insert_manager){
		$this->db->set($insert_manager);
		$this->db->insert('crew');
	}
}