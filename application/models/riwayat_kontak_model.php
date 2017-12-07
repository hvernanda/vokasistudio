<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_kontak_model extends CI_Model {
	public function viewContact($id){
		$this->db->select('contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email, company.name as company_name, company.phone as company_phone, company.email as company_email'); 
		$this->db->limit(1);
		$this->db->join('company','contact.id_company=company.id_company');
		if($id!=""){
			$this->db->where('contact.id_company', $id);
		}
		$get = $this->db->get('contact');
		return $get->result();
	}
	public function viewContactId($id){
		$this->db->select('contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email, company.name as company_name, company.phone as company_phone, company.email as company_email,'); 
		$this->db->limit(1);
		$this->db->join('company','contact.id_company=company.id_company');
		if($id!=""){
			$this->db->where('contact.id_contact', $id);
		}
		$get = $this->db->get('contact');
		return $get->result();
	}
	public function viewContactSearch($q){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email'); 
		$this->db->distinct();
		$this->db->like('contact.name', $q); 
		$this->db->join('company','contact.id_company=company.id_company');
		$get = $this->db->get('contact');
		return $get->result();
	}
	public function viewProject($id){
		$this->db->select('project.name as project_name, project.price as project_price, project.status as project_status, id_project'); 
		//$this->db->limit(1);
		if($id!=""){
			$this->db->where('id_contact', $id);
		}
		$get = $this->db->get('project');
		return $get->result();
	}
	public function viewProjectId($id){
		$this->db->select('project.name as project_name, project.price as project_price, project.status as project_status, id_project'); 
		//$this->db->limit(1);
		if($id!=""){
			$this->db->where('id_contact', $id);
		}
		$get = $this->db->get('project');
		return $get->result();
	}
	public function viewProjectSearch($q){
		$this->db->select('project.name as project_name, project.price as project_price, project.status as project_status, id_project'); 
		$this->db->like('contact.name', $q);
		$this->db->join('contact','contact.id_contact=project.id_contact');
		$this->db->join('company','contact.id_company=company.id_company');
		$get = $this->db->get('project');
		return $get->result();
	}

}