<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proyek_model extends CI_Model {
	function tampilProyek($id){
		$que = $this->db->query("SELECT crew.id_status, project.name as nama_proyek, status.name as nama_status, crew.id_project as id_project FROM `crew` 
				join staff on crew.id_staff = staff.id_staff
				join project on crew.id_project = project.id_project
				join status on crew.id_status = status.id_status
				where crew.id_staff = '$id'
			");
		$result = $que->result();
		return $result;
	}

	function ambil_status_id($id_staff, $id_status){
		$que = $this->db->query("SELECT crew.id_status, crew.id_staff as id_staff FROM `crew` 
				join staff on crew.id_staff = staff.id_staff
				join project on crew.id_project = project.id_project
				join status on crew.id_status = status.id_status
				where crew.id_staff = '$id_staff' AND crew.id_status = '$id_status'
			");
		$result = $que->result();
		return $result;	
	}

	function tampilKru($idp){
		$this->db->select('jobassignment.id_jobassignment as id_jobassignment, staff.name as nama, jobassignment.name as penugasan, jobassignment.acceptanceDate as diterima, jobassignment.deadline as deadline');
		$this->db->from('staff');
		$this->db->where('crew.id_project', $idp);
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');
		$this->db->join('jobassignment', 'crew.id_crew=jobassignment.id_crew');
		$q = $this->db->get();
		return $q->result();
	}
	// function getdelete($key){
	// 	$this->db->where('')
	// }
	
	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }

	// SELECT jobassignment.name, staff.name, jobassignment.acceptanceDate, jobassignment.deadline from staff join crew on 
	//staff.id_staff=crew.id_staff join jobassignment on crew.id_crew=jobassignment.id_crew where crew.id_project = 1

}
