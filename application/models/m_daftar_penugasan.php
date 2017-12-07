<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_daftar_penugasan extends CI_Model {
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
									where c.id_project = $id_project
									group by a.name
									
									")->result();
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

	function update($table, $data, $id){
		$this->db->where('id_staff', $id);
		$this->db->set($data);
		$query = $this->db->update('staff');
		return $query;

	}
	function namaJob(){
		return $query = $this->db->query("select * from job");	
	}
	function namaKru($id_project){
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
	
	function getdelete($key){
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

	// function viewJob(){
	// 	$q = $this->db->get('job');
	// 	return $q;
	// }
	// SELECT job.name, staff.name, jobassignment.acceptanceDate, jobassignment.deadline from job join jobassignment on job.id_job = jobassignment.id_job join 
	// crew on jobassignment.id_crew = crew.id_crew join staff on crew.id_staff = staff.id_staff where crew.id_project = 1

	// SELECT jobassignment.name, staff.name, jobassignment.acceptanceDate, jobassignment.deadline from staff join crew on 
	//staff.id_staff=crew.id_staff join jobassignment on crew.id_crew=jobassignment.id_crew where crew.id_project = 1

}
