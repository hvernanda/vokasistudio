<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class keuangan_proyek_model extends CI_Model {
  	public function viewEditPengeluaran($id)
	{
		$this->db->select('*');
	    $this->db->where('id_saving', $id);
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewPengeluaran($id)
	{
		$this->db->select('*, saving.name as keperluan');
		$this->db->from('saving');
		$this->db->from('activity');
		// $this->db->from('jobasigment');
		// $this->db->from('crew');
		// $this->db->from('project');
		$this->db->where('saving.id_activity', $id);
		$this->db->where('activity.id_activity', $id);
		// $this->db->join('saving', 'saving.id_activity = activity.id_activity');
		// $this->db->join('activity', 'activity.id_jobAsigment = jobAsigment.id_jobAsigment', 'left');
		// $this->db->join('jobAsigment', 'jobAsigment.id_crew = crew.id_crew');
		// $this->db->join('crew', 'crew.id_project = project.id_project', 'left');
	    $get_index = $this->db->get();
	    return $get_index->result();
	}
	public function inputDataTransaksiProyek($insert)
  	{
    	$this->db->set($insert);
    	return $this->db->insert('saving');
  	}
  	public function UpdateDataTransaksiProyek($update, $id)
  	{
	    $this->db->set($update);    
	    $this->db->where('id_saving',$id);   
	    $this->db->update('saving');
  	}
  	public function delete($id)
  	{
	    $this->db->where('id_saving',$id);
	    return $this->db->delete('saving');
  	}
  	public function viewHargaproject($id)
	{
		// $this->db->select('project.name as name, sum(saving.amount * saving.total) as pemasukan');
		// $this->db->distinct();
	 //    $this->db->where('saving.information', 'pemasukan project');
	 //    $this->db->join('activity', 'saving.id_activity=activity.id_activity', 'left');
	 //    $this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment', 'left');
	 //    $this->db->join('crew', 'jobasigment.id_crew=crew.id_crew', 'left');
	 //    $this->db->join('project', 'project.id_project=crew.id_project', 'left');
	 //    $this->db->group_by('project.name');
	 //    $get_index = $this->db->get('saving');
	 //    return $get_index->result();

		$this->db->select('project.price as harga');
	    $this->db->where('project.id_project', $id);
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function viewPengeluaranproject($id)
	{

		$this->db->select('sum((saving.amount * (-1)) * saving.total) as pengeluaran');
		$this->db->distinct();
	    $this->db->where('project.id_project', $id);
	    $this->db->where("saving.amount like '-%'");
		$this->db->join('activity', 'saving.id_activity=activity.id_activity');
		$this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment');
		$this->db->join('crew', 'jobasigment.id_crew=crew.id_crew');
		$this->db->join('project', 'crew.id_project=project.id_project');
	    $get_index = $this->db->get('saving');
	    return $get_index->result();
	}
	public function viewGajiCrewproject($id)
	{

		$this->db->select('sum(crew.fee) as gaji');
		$this->db->distinct();
	    $this->db->where('project.id_project', $id);
		$this->db->join('project', 'crew.id_project=project.id_project');
	    $get_index = $this->db->get('crew');
	    return $get_index->result();
	}
	public function getActivity($id)
	{
		$this->db->select('activity.id_activity as id, activity.name as name');
		$this->db->distinct();
	    $this->db->where('project.id_project', $id);
		$this->db->join('jobasigment', 'activity.id_jobAsigment=jobasigment.id_jobAsigment');
		$this->db->join('crew', 'jobasigment.id_crew=crew.id_crew');
		$this->db->join('project', 'crew.id_project=project.id_project');
	    $get_index = $this->db->get('activity');
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

//SELECT saving.name, saving.date, saving.amount, project.name FROM (`saving`, activity, jobasigment, crew, project) WHERE `saving`.`id_activity` = 1 AND `activity`.`id_activity` = 1 AND activity.id_jobAsigment = 1 AND jobasigment.id_jobAsigment = 1 AND jobasigment.id_crew = 1 and crew.id_crew=1 AND crew.id_project = 1 AND project.id_project=1


// SELECT activity.name FROM activity JOIN jobasigment on jobasigment.id_jobAsigment=activity.id_jobAsigment join crew on jobasigment.id_crew=crew.id_crew JOIN project on crew.id_project=project.id_project WHERE project.id_project=1