<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_keuangan_proyek_model extends CI_Model {
	public function viewProject()
	{
		$this->db->select('*');
	    $query = $this->db->get('project');
 		$result = $query->result();
 		return $result;
	}
	public function viewRiwayatProject($id)
	{
		$this->db->select('*');
	    $this->db->where('id_project', $id);
	    $query = $this->db->get('project');
 		$result = $query->result();
 		return $result;
	}
	public function viewPemasukanp($id)
	{

		$this->db->select("finance.name as name, finance.date as date, finance.total as total");
		$this->db->where("finance.amount like '+%'");
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'finance.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment', 'left');
	    $this->db->join('crew', 'jobassignment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('finance.name');
	    $query = $this->db->get('finance');
 		$result = $query->result();
 		return $result;
	} 
	public function viewTransaksi($id)
	{

		$this->db->select("finance.name as name, finance.date as date, finance.total as total"); 
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'finance.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment', 'left');
	    $this->db->join('crew', 'jobassignment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('finance.name');
	    $query = $this->db->get('finance');
 		$result = $query->result();
 		return $result;
	} 
	public function viewPengeluaranPerproject($id)
	{
		$this->db->select('sum((amount*(-1)) * finance.total) as pengeluaran');
		$this->db->where("finance.amount like '-%'");
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'finance.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment', 'left');
	    $this->db->join('crew', 'jobassignment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('finance.name');
	    $query = $this->db->get('finance');
 		$result = $query->result();
 		return $result;
	}
	public function viewHonor($id)
	{
		$this->db->select('sum(crew.fee) as honor'); 
		$this->db->where('project.id_project', $id); 
	    $this->db->join('crew', 'project.id_project=crew.id_project');  
	    $query = $this->db->get('project');
 		$result = $query->result();
 		return $result;
	}
	public function viewAmount($id)
	{
		$this->db->select("finance.amount as amount"); 
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'finance.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment', 'left');
	    $this->db->join('crew', 'jobassignment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('finance.name');
	    $query = $this->db->get('finance');
 		$result = $query->result();
 		return $result;
	} 
	public function viewKeuanganProject($id)
	{
		$this->db->select("project.DP - sum((SELECT sum((finance.amount * (-1)) * finance.total) FROM finance JOIN activity on activity.id_activity=finance.id_activity join jobassignment on activity.id_jobassignment=jobassignment.id_jobassignment JOIN crew ON jobassignment.id_crew=crew.id_crew join project on crew.id_project=project.id_project WHERE project.id_project=".$id." AND finance.amount like '-%') + (SELECT sum(crew.fee) from crew join project on crew.id_project=project.id_project WHERE project.id_project=".$id.")) as sisa_uang");
		$this->db->where('id_project', $id);
	    $query = $this->db->get('project');
 		$result = $query->result();
 		return $result;
	}
	public function viewPemasukan($id)
	{
		$this->db->select("sum(finance.amount * finance.total) as pemasukan");
		$this->db->where('project.id_project', $id);
		$this->db->where("finance.amount like '+%'");
		$this->db->join('activity', 'finance.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobassignment', 'activity.id_jobassignment=jobassignment.id_jobassignment', 'left');
	    $this->db->join('crew', 'jobassignment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $query = $this->db->get('finance');
 		$result = $query->result();
 		return $result;
	}
}