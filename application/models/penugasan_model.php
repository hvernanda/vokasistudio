<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penugasan_model extends CI_Model {
	function tampilKru($id_project){
		$this->db->select('jobassignment.id_jobassignment as id_jobassignment, staff.name as nama, jobassignment.name as penugasan, jobassignment.acceptanceDate as diterima, jobassignment.deadline as deadline');
		$this->db->from('staff');
		$this->db->where('crew.id_project', 1);
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');
		$this->db->join('jobassignment', 'crew.id_crew=jobassignment.id_crew');
		$q = $this->db->get();
		return $q->result();
		// return $query = $this->db->query("select * from staff join crew using(id_staff) join jobassignment using(id_crew) where id_project = '$id_project' ");
	}

	function tampilEditPenugasan($id){
		$this->db->select('jobassignment.id_jobassignment as id_jobassingment, staff.name as name, jobassignment.name as penugasan, jobassignment.acceptanceDate as diterima, jobassignment.deadline as deadline');
		$this->db->from('staff');
		$this->db->where('jobassignment.id_jobassignment', $id);
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');
		$this->db->join('jobassignment', 'crew.id_crew=jobassignment.id_crew');
		$q = $this->db->get();
		return $q->result();
	}

	function update($table, $data, $id){
		$this->db->where('id_staff', $id);
		$this->db->set($data);
		$query = $this->db->update('staff');
		return $query;

	}
	function tambahKru($data){
		$q = $this->db->insert('jobassignment',$data);
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
	// function namaKru(){
	// 	$this->db->select('staff.name');
	// 	$this->db->from('crew');
	// 	$this->db->join('staff', 'crew.id_staff = staff.id_staff');
	// 	$q = $this->db->get();
	// 	return $q->result();
	// }
	function namaKru(){
		// return $query = $this->db->query("select staff.name from crew join staff using(id_staff) where id_project=2");
		return $query = $this->db->query("select * from crew  join staff using(id_staff)");	
	}
	
	function getdelete($key){
		$this->db->where('id_jobassignment',$key); 
		return $this->db->delete('jobassignment');

	}
	
	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }

	// SELECT jobassignment.name, staff.name, jobassignment.acceptanceDate, jobassignment.deadline from staff join crew on 
	//staff.id_staff=crew.id_staff join jobassignment on crew.id_crew=jobassignment.id_crew where crew.id_project = 1

}
