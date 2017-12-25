<?php
if(!defined('BASEPATH')) exit('No direct script allowed') ;

class keuangan_proyek_model extends CI_Model {
    public function __construct(){
      parent::__construct() ;
    }

    public function auth($id_user,$id_project) {
        $cond = "staff.id_user = " . $id_user . " and crew.id_project = ". $id_project ." and crew.id_crew_role = 1";
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->join('crew','staff.id_staff=crew.id_staff','inner');
        $this->db->where($cond);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
	}

	public function viewAllStaff(){
		$this->db->select('*');
		$this->db->from('staff');
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
            return $query->result;
        } else {
            return "No data";
        }
	}
	
	public function tambahCrewProject($id_staff,$id_project,$id_role){
		$data = array(
			'id_staff' => $id_staff,
			'id_project' => $id_project,
			'id_crew_role' => $id_role,
			'status_permintaan' => 0,
		);

		$this->db->insert('crew',$data);
	}

    /* ACTIVITY MODEL - START */

    function tampilDetailAkt($id){
		$this->db->select('staff.name as nama, jobassignment.name as name_ja, activity.name as aktivitas, activity.date as tanggal, 
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

    /* ACTIVITY MODEL - END */

    /* DAFTAR PENUGASAN - START */

    function tampilPenugasan($id_project){
		// $this->db->select('job.id_job, jobassignment.name, job.name as job, staff.name as nama, jobassignment.acceptanceDate as diterima, jobassignment.deadline as deadline');
		// $this->db->from('job');
		// $this->db->where('crew.id_project', 1);
		// $this->db->join('jobassignment', 'job.id_job = jobassignment.id_job');
		// $this->db->join('crew', 'jobassignment.id_crew = crew.id_crew');
		// $this->db->join('staff', 'crew.id_staff = staff.id_staff');
		// $this->db->order_by('job.id_job');
		// $q = $this->db->get();

		$job 	= $this->db->query("select j.name as jobname,
									a.name, 
									a.id_jobassignment,
									a.id_job,
									a.id_crew,
									a.acceptanceDate,
									a.deadline,
									a.fee, 
									a.rating,
									c.id_status,
									c.id_project 
									from jobassignment as a
									join job as j on a.id_job = j.id_job
									join crew as c on a.id_crew = c.id_crew
									where c.id_project =" .$id_project.
									"group by a.name")->result();
		$crew 	= $this->db->query(	
								'select crew.id_crew, jobassignment.id_job, staff.name, jobassignment.name as assignmentName 
								from crew 
								join jobassignment on crew.id_crew = jobassignment.id_crew 
								join staff on crew.id_staff = staff.id_staff where id_project = '.$id_project
							)->result();
		// return $q->result();
		// return $job;
		return $job;
		// return $crew;
	}

	function getCrew($id_project){
		$crew 	= $this->db->query(	
								'select crew.id_crew, 
								jobassignment.id_job, 
								staff.name, 
								jobassignment.name as assignmentName,
								jobassignment.id_jobassignment,
								jobassignment.fee,
								jobassignment.rating
								from crew 
								join jobassignment on crew.id_crew = jobassignment.id_crew 
								join staff on crew.id_staff = staff.id_staff where id_project = '.$id_project
							)->result();
		return $crew;

	}

	function updateStaff($table, $data, $id){
		$this->db->where('id_staff', $id);
		$this->db->set($data);
		$query = $this->db->update('staff');
		return $query;

	}
	function namaJob(){
		return $query = $this->db->query("select * from job");	
	}
	function namaKruDaftarPenugasan($id_project){
		// return $query = $this->db->query("select staff.name from crew join staff using(id_staff) where id_project=2");
		return $query = $this->db->query("select * from crew  join staff using(id_staff) where id_project= $id_project and crew.id_status=1");	
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
	
	function getDeleteJobAssign($key){
		$this->db->where('id_jobassignment',$key); 
		return $this->db->delete('jobassignment');

	}
	
	function setScore($key,$data){
		$this->db->where('id_jobassignment',$key);
		$this->db->set($data);
		return $this->db->update('jobassignment');
	}

	function setFee($key, $data){
		$this->db->where('id_jobassignment',$key);
		$this->db->set($data);
		return $this->db->update('jobassignment');
	}

	function getFee($name){
		$this->db->select('
			jobassignment.name,
			jobassignment.fee,
			staff.name as nama,
			id_jobassignment,

			');
		$this->db->where('jobassignment.name',$name);
		$this->db->join('crew','jobassignment.id_crew = crew.id_crew');
		$this->db->join('staff','crew.id_staff = staff.id_staff');
		$q = $this->db->get('jobassignment');
		return $q;
	}
	function getScore($name){
		$this->db->select('
			jobassignment.name,
			jobassignment.rating,
			staff.name as nama,
			id_jobassignment,

			');
		$this->db->where('jobassignment.name', $name);
		$this->db->join('crew', 'jobassignment.id_crew = crew.id_crew');
		$this->db->join('staff', 'crew.id_staff = staff.id_staff');
		$q = $this->db->get('jobassignment');
		return $q;
	}
    
    /* DAFTAR PENUGASAN - END */
    
    /* MASTER PENUGASAN - START */
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

	function updateJob($table, $data, $id){
		$this->db->where('id_job', $id);
		$this->db->set($data);
		$query = $this->db->update('job');
		return $query;

	}
	function tambahJob($data){
		$q = $this->db->insert('job',$data);
		return $q;
	}
	
	function getDeleteJob($key){
		$this->db->where('id_job',$key); 
		return $this->db->delete('job');

    }

    /* MASTER PENUGASAN - END */

    /* PENUGASAN - START */
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
	/* PENUGASAN - END */
	
	/* PROGRESS PROYEK - START */

	function tampilAktivitas(){
		$this->db->select('activity.name as aktivitas, staff.name as nama, activity.date as tanggal');
		$this->db->from('activity');
		$this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment');
		$this->db->join('crew', 'jobassignment.id_crew=crew.id_crew');
		$this->db->join('staff', 'crew.id_staff=staff.id_staff');
		$q = $this->db->get();
		return $q->result();
	}
	
	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }return $this->db->insert('activity');
	function tambahKomenProgress(){
		$q = $this->db->get('jobassignment');
		return $q;
	}
	
	/* PROGRESS PROYEK - END */
}