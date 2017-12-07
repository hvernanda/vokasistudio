<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proyek_baru_table_model extends CI_Model {
	public function viewCompany(){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, company.address as company_address, id_company as id'); 
		//$this->db->limit(1);
		//$this->db->join('company','contact.id_company=company.id_company');
		$get = $this->db->get('company');
		return $get->result();
	}
	public function viewCompanySearch($q){
		$this->db->select('company.name as company_name, company.phone as company_phone, company.email as company_email, company.address as company_address'); 
		$this->db->distinct();
		$this->db->like('company.name', $q); 
		$get = $this->db->get('company');
		return $get->result();
	}
}