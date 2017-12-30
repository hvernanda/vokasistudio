<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class honor_kru_model extends CI_Model {
	public function viewKru()
	{
		$this->db->select('crew.id_crew as id, user.name as nama, project.name as proyek, jobassignment.name as tugas, crew.fee as jumlah, crew.paymentDate');
		$this->db->from('crew');
		$this->db->join('staff', 'crew.id_staff = staff.id_staff', 'right');
		$this->db->join('user', 'user.id_user = staff.id_user') ;
		$this->db->join('jobassignment', 'crew.id_crew = jobassignment.id_crew', 'left');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$query = $this->db->get();
	    $result = $query->result();
	    return $result;
	}
	public function viewKruProyek($id)
	{
		$this->db->select('crew.id_crew as id, user.name as nama, project.name as proyek, jobassignment.name as tugas, crew.fee as jumlah, crew.paymentDate');
		$this->db->from('crew');
		$this->db->where('status.name', 'crew');
		$this->db->where('project.id_project', $id);
		$this->db->join('staff', 'crew.id_staff = staff.id_staff', 'right');
		$this->db->join('user', 'user.id_user = staff.id_user') ;
		$this->db->join('status', 'crew.id_status = status.id_status', 'right');
		$this->db->join('jobassignment', 'crew.id_crew = jobassignment.id_crew', 'left');
		$this->db->join('project', 'project.id_project = crew.id_project', 'right');
		$this->db->group_by('crew.id_crew');
		$query = $this->db->get();
	    $result = $query->result();
	    return $result;
	}
	public function updatePembayaranKru($update, $id)
  	{
	    $this->db->set($update);    
	    $this->db->where('id_crew',$id);   
	    $this->db->update('crew');
  	}
}
//SELECT staff.name as name, project.name as proyek, jobassignment.name as tugas, crew.fee as fee, crew.paymentDate FROM staff, project, jobassignment, crew where crew.id_project = 1 AND staff.id_staff = crew.id_staff AND jobassignment.id_crew = crew.id_crew

// SELECT `staff`.`name` as nama, `project`.`name` as proyek, `jobassignment`.`name` as tugas, `crew`.`fee` as jumlah, `crew`.`paymentDate` FROM `project`, crew LEFT JOIN `staff` ON `crew`.`id_staff` = `staff`.`id_staff` LEFT JOIN `jobassignment` ON `crew`.`id_crew` = `jobassignment`.`id_crew` WHERE `crew`.`id_project` = 1