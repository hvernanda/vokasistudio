<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_klien_model extends CI_Model {
	public function viewCompany($id){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, company.id_company'); 
		$this->db->limit(1);
		$this->db->join('company','contact.id_company=company.id_company');
		if($id!=""){
			$this->db->where('company.id_company', $id);
		}
		$get = $this->db->get('contact');
		return $get->result();
	}
	public function viewContact($id){
		$this->db->select('contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email, id_contact'); 
		//$this->db->limit(1);
		$this->db->join('company','contact.id_company=company.id_company');
		if($id!=""){
			$this->db->where('contact.id_company', $id);
		}
		$get = $this->db->get('contact');
		return $get->result();
	}
	
	public function viewCompanyId($id){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, company.id_company'); 
		$this->db->limit(1);
		if($id!=""){
			$this->db->where('company.id_company', $id);
		}
		$get = $this->db->get('company');
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

	public function viewCompanySearch($q){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, company.id_company'); 
		$this->db->distinct();
		$this->db->like('company.name', $q); 
		$get = $this->db->get('company');
		return $get->result();
	}
	public function viewContactSearch($q){
		$this->db->select('contact.name as contact_name, contact.phone as contact_phone, contact.email as contact_email, id_contact, '); 
		$this->db->like('company.name', $q);
		$this->db->join('company','contact.id_company=company.id_company'); 
		$get = $this->db->get('contact');
		return $get->result();
	}

	public function viewProjectSearch($q){
		$this->db->select('project.name as project_name, project.price as project_price, project.status as project_status, id_project'); 
		$this->db->like('company.name', $q);
		$this->db->join('contact','contact.id_contact=project.id_contact');
		$this->db->join('company','contact.id_company=company.id_company');
		$get = $this->db->get('project');
		return $get->result();
	}
}