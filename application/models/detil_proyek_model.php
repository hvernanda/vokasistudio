<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detil_proyek_model extends CI_Model {
	public function viewProject($id){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, contact.name as contact_name, project.name as project_name, project.price as project_price, project.status as project_status, project.dealTime as project_dealTime, project.deadline as project_deadLine, project.revisionDeadline as project_reivisideadLine, project.DP as project_DP, project.id_project'); 
		//$this->db->limit(1);
		$this->db->join('contact', 'project.id_contact = contact.id_contact');
		$this->db->join('company', 'company.id_company = contact.id_company');
		if($id!=""){
			$this->db->where('project.id_project', $id);
		}
		$get = $this->db->get('project');
		return $get->result();
	}

	public function viewType($id){
		$this->db->select('type.name as project_tipe'); 
		//$this->db->limit(1);
		$this->db->join('contact', 'project.id_contact = contact.id_contact');
		$this->db->join('company', 'company.id_company = contact.id_company');
		$this->db->join('projecttype','projecttype.id_project = project.id_project','left');
		$this->db->join('type','projecttype.id_type = type.id_type');
		if($id!=""){
			$this->db->where('project.id_project', $id);
		}
		$get = $this->db->get('project');
		return $get->result();
	}

	public function getStatusProject($id)
	{
		$this->db->select('status');
	    $this->db->where('id_project', $id);
	    return $this->db->get('project');
	}

	public function updateProject($data, $id){
		$this->db->where('project.id_project', $id);
		$this->db->set($data);
		$get = $this->db->update('project');
		return $get;	
	}
}