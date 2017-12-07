<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_master_penugasan extends CI_Model {
	function tampilJob($id_project){
		$que = $this->db->query("SELECT * FROM `job` order by id_job desc
			");
		$result = $que->result();
		return $result;
	}

	function tampilEditJob($id){
		$que = $this->db->query("SELECT name as nama FROM `job` 
			");
		$result = $que->result();
		return $result;
	}

	function update($table, $data, $id){
		$this->db->where('id_job', $id);
		$this->db->set($data);
		$query = $this->db->update('job');
		return $query;

	}
	function tambahJob($data){
		$q = $this->db->insert('job',$data);
		return $q;
	}

	function inputKru($data, $table){
		$this->db->insert($table, $data);

	}
	function namaPngsn(){
		$q = $this->db->get('jobassignment');
		return $q;
	}
	function inputDataPenugasan($insert){
		$this->db->set($insert);
		return $this->db->insert('jobassignment');
	}
	
	function getdelete($key){
		$this->db->where('id_job',$key); 
		return $this->db->delete('job');

	}
	
	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }

	// SELECT jobassignment.name, staff.name, jobassignment.acceptanceDate, jobassignment.deadline from staff join crew on 
	//staff.id_staff=crew.id_staff join jobassignment on crew.id_crew=jobassignment.id_crew where crew.id_project = 1

}
