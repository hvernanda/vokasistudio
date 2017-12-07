<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class progresproject_model extends CI_Model {
	function tampilAktivitas(){
		$this->db->select('activity.name as aktivitas, staff.name as nama, activity.date as tanggal');
		$this->db->from('activity');
		$this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment');
		$this->db->join('crew', 'jobassignment.id_crew=crew.id_crew');
		$this->db->join('staff', 'crew.id_staff=staff.id_staff');
		$q = $this->db->get();
		return $q->result();
	}
	function tambahKru($data){
		$q = $this->db->insert('jobassignment',$data);
	}

	function inputKru($data, $table){
		$this->db->insert($table, $data);

	}
	function namaKru(){
		$q = $this->db->get('jobassignment');
		return $q;
	}
	function inputDataPenugasan($insert){
		$this->db->set($insert);
		return $this->db->insert('jobassignment');
	}
	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }return $this->db->insert('activity');
	function tambahKomen(){
		$q = $this->db->get('jobassignment');
		return $q;
	}
	// SELECT activity.name as aktivitas, staff.name as name, activity.date as tanggal from activity join jobassignment on activity.idjobassignment=jobassignment.id_jobassignment join crew on jobassignment.idcrew=crew.id_crew join staff on crew.id_staff=staff.id_staff

}
