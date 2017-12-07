<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelola_honor_kru_model extends CI_Model {
  	public function viewKru($id)
	{
	    // $this->db->select('*');
	    // $get_index = $this->db->get('staff');
	    // return $get_index->result();
	    $this->db->select('crew.id_crew as id, staff.name as nama, project.name as proyek, jobasigment.name as tugas, crew.fee as gaji, crew.paymentDate');
		$this->db->from('crew');
		$this->db->where('status.name', 'crew');
		$this->db->where('project.id_project', $id);
		$this->db->join('staff', 'crew.id_staf = staff.id_staf', 'right');
		$this->db->join('status', 'crew.id_status = status.id_status', 'right');
		$this->db->join('jobasigment', 'crew.id_crew = jobasigment.id_crew', 'left');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$get_index = $this->db->get();
	    return $get_index->result();
	}
	public function viewJumlahKru($id)
	{
	    $this->db->select('count(crew.id_crew) as jml');
	    $this->db->where('project.id_project', $id);
	    $this->db->where('status.name', 'crew');
	    $this->db->join('project', 'crew.id_project = project.id_project', 'left');
	    $this->db->join('status', 'crew.id_status = status.id_status', 'left');
	    $get_index = $this->db->get('crew');
	    return $get_index->result();
	}
	public function viewtotalKeuangan($id)
	{
	    $this->db->select('project.id_project as id, project.price - (SELECT sum((saving.amount * (-1)) * saving.total) FROM saving JOIN activity on activity.id_activity=saving.id_activity join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment JOIN crew ON jobasigment.id_crew=crew.id_crew join project on crew.id_project=project.id_project WHERE project.id_project='.$id.') as sisa_uang');
	    $this->db->where('project.id_project', $id);
	    $get_index = $this->db->get('project');
	    return $get_index->result();
	}
	public function updateHonor($name)
	{
	  	foreach($name as $key => $value){
    		$pieces = explode("-", $key);
		    $this->db->where('id_crew', $pieces[1])->update('crew', array('fee' => str_replace('.', '', $value)));
		    $this->db->where('id_crew', $pieces[1])->update('jobasigment', array('fee' => str_replace('.', '', $value)));
		}
  	}
  	public function updateKeuanganProyek($total, $id)
  	{
      $this->db->set('price', $total);
      $this->db->where('id_project', $id);
      $this->db->update('project');
   	}
}

// SELECT project.price - (SELECT sum(saving.amount * saving.total) FROM saving JOIN activity on activity.id_activity=saving.id_activity join jobasigment on activity.id_jobAsigment=jobasigment.id_jobAsigment JOIN crew ON jobasigment.id_crew=crew.id_crew join project on crew.id_project=project.id_project WHERE project.id_project=1) as sisa_uang FROM project WHERE project.id_project=1