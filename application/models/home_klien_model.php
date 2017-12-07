<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_klien_model extends CI_Model {
	public function viewProjectClient($q){
		$this->db->select('project.name as project_name, project.price as project_price, project.status as project_status, id_project'); 
		$this->db->where('company.id_company', $q);
		$this->db->join('contact','contact.id_contact=project.id_contact');
		$this->db->join('company','contact.id_company=company.id_company');
		$get = $this->db->get('project');
		return $get->result();
	}
}