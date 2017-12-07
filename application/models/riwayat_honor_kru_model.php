<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_honor_kru_model extends CI_Model {
  	public function viewKru(){
		$this->db->select('staff.id_staf as id, staff.name as name, staff.email as email, staff.phone as phone');
		$this->db->DISTINCT();
		$this->db->from('staff');
		$this->db->where('status.name', 'crew');
		$this->db->join('crew','staff.id_staf = crew.id_staf', 'right');
		$this->db->join('status', 'crew.id_status = status.id_status', 'right');
		$this->db->group_by('crew.id_crew');
		$get_index = $this->db->get();
	    return $get_index->result();
	}
	public function viewKruProyek($id){
		$this->db->select('staff.id_staf as id, staff.name as name, staff.email as email, staff.phone as phone'); 
		$this->db->from('staff');
		$this->db->where('status.name', 'crew');
		$this->db->where('crew.id_project', $id);
		$this->db->join('crew','staff.id_staf = crew.id_staf', 'right');
		$this->db->join('status', 'crew.id_status = status.id_status', 'right');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$get_index = $this->db->get();
	    return $get_index->result();
	}
	public function viewNamaKru($id)
	{
		$this->db->select('staff.name as nama');
		$this->db->from('crew');
		$this->db->where('crew.id_staf', $id);
		$this->db->join('staff', 'crew.id_staf = staff.id_staf', 'right');
		$this->db->join('jobasigment', 'crew.id_crew = jobasigment.id_crew', 'left');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$this->db->limit(1);
		$get_index = $this->db->get();
	    return $get_index->result();
	}
	public function viewRiwayatHonor($id)
	{
		$this->db->select('crew.id_crew as id, staff.id_staf as id_staf, staff.name as nama, project.name as proyek, jobasigment.name as tugas, crew.fee as gaji, crew.paymentDate');
		$this->db->from('crew');
		$this->db->where('crew.id_staf', $id);
		$this->db->join('staff', 'crew.id_staf = staff.id_staf', 'right');
		$this->db->join('jobasigment', 'crew.id_crew = jobasigment.id_crew', 'left');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$get_index = $this->db->get();
	    return $get_index->result();
	}
	public function updatePembayaranKru($update, $id)
  	{
	    $this->db->set($update);    
	    $this->db->where('id_crew',$id);   
	    $this->db->update('crew');
  	}
  	function checkKru($id, $id_project)
	{
	    $this->db->where('id_staf',$id);
	    $this->db->where('id_project',$id_project);
		$this->db->from('crew');
		$get = $this->db->count_all_results();
		return $get;
	}
}

//SELECT DISTINCT `staff`.`name` as nama, `project`.`name` as proyek, `jobasigment`.`name` as tugas, `crew`.`fee` as jumlah, `crew`.`paymentDate` FROM crew right JOIN `staff` ON `crew`.`id_staf` = `staff`.`id_staf` left JOIN `jobasigment` ON `crew`.`id_crew` = `jobasigment`.`id_crew`  right JOIN project on project.id_project = crew.id_project WHERE `crew`.`id_staf` = 1  GROUP by crew.id_crew