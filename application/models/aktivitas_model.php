<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class aktivitas_model extends CI_Model {
	
	
	function tampilDetailAkt($id){
		$this->db->select('staff.name as nama, jobassignment.name as name, activity.name as aktivitas, activity.date as tanggal, 
			activity.startTime as mulai, activity.finishTime as selesai, activity.komputer as komputer, 
			activity.fileLocation as lokasi, activity.fileBackupLocation as lokasi_backup, activity.uploadFile as upload, 
			activity.commentByManager as komentar');
		// $this->db->distinct();
		$this->db->from('staff');
		$this->db->where('crew.id_project', 1);
		// $this->db->where('activity.id_jobassignment', $id);
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');// 'left')
		$this->db->join('jobassignment', 'crew.id_crew=jobassignment.id_crew');// 'left')
		$this->db->join('activity', 'jobassignment.id_jobassignment=activity.id_jobassignment');// 'left')
		// $this->db->group_by();
		// $this->db->order_by();
		$q = $this->db->get();
		return $q->result();
	}
	function tampilAkt($id_project){
		$this->db->select('activity.commentByManager as komentar, job.name as tugas, activity.id_activity,staff.name as nama, jobassignment.name as name, activity.name as aktivitas, activity.date as tanggal, 
			activity.startTime as mulai, activity.finishTime as selesai, activity.komputer as komputer, 
			activity.fileLocation as lokasi, activity.fileBackupLocation as lokasi_backup, activity.uploadFile as upload');
		// $this->db->distinct();
		$this->db->from('staff');
		$this->db->where('crew.id_project', $id_project);
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');// 'left')
		$this->db->join('jobassignment', 'crew.id_crew=jobassignment.id_crew');// 'left')
		$this->db->join('job', 'job.id_job=jobassignment.id_job');
		$this->db->join('activity', 'jobassignment.id_jobassignment=activity.id_jobassignment');// 'left')
		
		// $this->db->group_by();
		// $this->db->order_by();
		$q = $this->db->get();
		return $q->result();
	}
	function tampilAktPersonal($id_staff,$id_project){
		$this->db->select('activity.commentByManager as komentar, job.name as tugas, activity.id_activity,staff.name as nama, jobassignment.name as name, activity.name as aktivitas, activity.date as tanggal, 
			activity.startTime as mulai, activity.finishTime as selesai, activity.komputer as komputer, 
			activity.fileLocation as lokasi, activity.fileBackupLocation as lokasi_backup, activity.uploadFile as upload');
		// $this->db->distinct();
		$this->db->from('staff');
		$this->db->where('crew.id_project', $id_project);
		$this->db->where('crew.id_staff', $id_staff);
		$this->db->join('crew', 'staff.id_staff=crew.id_staff');// 'left')
		$this->db->join('jobassignment', 'crew.id_crew=jobassignment.id_crew');// 'left')
		$this->db->join('job', 'job.id_job=jobassignment.id_job');
		$this->db->join('activity', 'jobassignment.id_jobassignment=activity.id_jobassignment');// 'left')
		
		// $this->db->group_by();
		// $this->db->order_by();
		$q = $this->db->get();
		return $q->result();
	}
	function tampilLokasi($id_activity){
		$this->db->select('komputer, fileLocation, fileBackupLocation');
		$this->db->from('activity');
		$this->db->where('id_activity', $id);
		$q = $this->db->get();
		return $q->result();
	}
	function tambahAkt($data){
		$q = $this->db->insert('activity',$data);
	}

	function inputAkt($data, $table){
		$this->db->insert($table, $data);

	}
	public function insert($data, $table){
		$this->db->insert($table, $data);
	}
	public function tambahKomen($id_activity, $data){
		$this->db->where('id_activity', $id_activity);
		$this->db->set($data);
		$query = $this->db->update('activity');
		return $query;
	}

	public function getupdate($key, $data){
		$this->db->where('id_activity', $key);
		$this->db->update('activity', $data);
	}
	function namaAkt($id_staff, $id_project){
		$this->db->join('crew', 'jobassignment.id_crew=crew.id_crew');
		$this->db->where('crew.id_project', $id_project);
		$this->db->where('crew.id_staff', $id_staff);
		$q = $this->db->get('jobassignment');
		return $q->result();
	}
	function inputDataPenugasan($insert){
		$this->db->set($insert);
		return $this->db->insert('activity');
	}
	function download($id){
		$this->db->select('activity.uploadFile as download');
		$this->db->from('activity');
		$this->db->where('id_activity', $id);
		$q = $this->db->get();
		return $q->result();
	}

	function setEndTime($id,$data){
		$this->db->where('id_activity',$id);
		return $this->db->update('activity',$data);
	}
	function setLokasi($id,$data){
		$this->db->where('id_activity',$id);
		return $this->db->update('activity',$data);

	}
	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }
	// SELECT staff.name, activity.name, activity.date, activity.startTime, activity.finishTime, activity.komputer, 
	//activity.fileLocation, activity.fileBackupLocation, activity.commentByManager from staff join crew on 
	//staff.id_staff=crew.id_staff join jobassignment on crew.id_crew=jobassignment.id_crew join activity on 
	//jobassignment.id_jobassignment=activity.id_jobassignment where crew.id_project = 1

	// select name from jobassignment where id_crew=12

}
