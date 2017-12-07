<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class honor_kru_model extends CI_Model {
 	public function viewKru()
	{
		$this->db->select('crew.id_crew as id, staff.name as nama, project.name as proyek, jobasigment.name as tugas, crew.fee as jumlah, crew.paymentDate');
		$this->db->from('crew');
		$this->db->join('staff', 'crew.id_staf = staff.id_staf', 'right');
		$this->db->join('jobasigment', 'crew.id_crew = jobasigment.id_crew', 'left');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$get_index = $this->db->get();
	    return $get_index->result();
	}
	public function viewKruProyek($id)
	{
		$this->db->select('crew.id_crew as id, staff.name as nama, project.name as proyek, jobasigment.name as tugas, crew.fee as jumlah, crew.paymentDate');
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
	public function updatePembayaranKru($update, $id)
  	{
	    $this->db->set($update);    
	    $this->db->where('id_crew',$id);   
	    $this->db->update('crew');
  	}
}
//SELECT staff.name as name, project.name as proyek, jobasigment.name as tugas, crew.fee as fee, crew.paymentDate FROM staff, project, jobasigment, crew where crew.id_project = 1 AND staff.id_staf = crew.id_staf AND jobasigment.id_crew = crew.id_crew

// SELECT `staff`.`name` as nama, `project`.`name` as proyek, `jobasigment`.`name` as tugas, `crew`.`fee` as jumlah, `crew`.`paymentDate` FROM `project`, crew LEFT JOIN `staff` ON `crew`.`id_staf` = `staff`.`id_staf` LEFT JOIN `jobasigment` ON `crew`.`id_crew` = `jobasigment`.`id_crew` WHERE `crew`.`id_project` = 1