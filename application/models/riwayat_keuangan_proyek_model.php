<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_keuangan_proyek_model extends CI_Model {
  	public function viewProject()
	{
		$this->db->select('*');
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function viewRiwayatProject($id)
	{
		$this->db->select('*');
	    $this->db->where('id_project', $id);
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function viewPemasukanp($id)
	{

		$this->db->select("saving.name as name, saving.date as date, saving.total as total");
		$this->db->where("saving.amount like '+%'");
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('saving.name');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	} 
	public function viewTransaksi($id)
	{

		$this->db->select("saving.name as name, saving.date as date, saving.total as total"); 
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('saving.name');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	} 
	public function viewPengeluaranPerproject($id)
	{
		$this->db->select('sum((amount*(-1)) * saving.total) as pengeluaran');
		$this->db->where("saving.amount like '-%'");
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('saving.name');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewHonor($id)
	{
		$this->db->select('sum(crew.fee) as honor'); 
		$this->db->where('project.id_project', $id); 
	    $this->db->join('crew', 'project.id_project=crew.id_project');  
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function viewAmount($id)
	{
		$this->db->select("saving.amount as amount"); 
		$this->db->where('project.id_project', $id);
	    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $this->db->group_by('saving.name');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	} 
	public function viewKeuanganProject($id)
	{
		$this->db->select("project.DP - sum((SELECT sum((saving.amount * (-1)) * saving.total) FROM saving JOIN activity on activity.id_activity=saving.id_activity join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment JOIN crew ON jobasigment.id_crew=crew.id_crew join project on crew.id_project=project.id_project WHERE project.id_project=".$id." AND saving.amount like '-%') + (SELECT sum(crew.fee) from crew join project on crew.id_project=project.id_project WHERE project.id_project=".$id.")) as sisa_uang");
		$this->db->where('id_project', $id);
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function viewPemasukan($id)
	{
		$this->db->select("sum(saving.amount * saving.total) as pemasukan");
		$this->db->where('project.id_project', $id);
		$this->db->where("saving.amount like '+%'");
		$this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
}


// SELECT distinct saving.* , sum(saving.amount * saving.total) as pengeluaran from saving RIGHT join activity on saving.id_activity=activity.id_activity RIGHT join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment RIGHT join crew on jobasigment.id_crew=crew.id_crew RIGHT join project on project.id_project=crew.id_project   where saving.information="pengeluaran project" AND project.id_project=1 GROUP by saving.name

// SELECT sum((saving.amount * (-1)) * saving.total) FROM saving JOIN activity on activity.id_activity=saving.id_activity join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment JOIN crew ON jobasigment.id_crew=crew.id_crew join project on crew.id_project=project.id_project WHERE project.id_project=1 AND saving.`amount` like '+%'