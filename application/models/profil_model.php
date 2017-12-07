<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class profil_model extends CI_Model
 {
 	public function add_gambar($id_company, $data){
        $this->db->where('id_staff', $id_staff);
        $this->db->update('staff', $data); 
    }

    public function ambil_user($id_company)
    {
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('id_company', $id_company);
        // $this->db->join('detail_toolskill', 'staff.id_staff=detail_toolskill.id_staff');
        // $this->db->join('toolskill', 'toolskill.id_toolskill=detail_toolskill.id_toolskill');
        // $this->db->join('skill', 'skill.id_skill=toolskill.id_skill');
        // $this->db->join('tool', 'tool.id_tool=toolskill.id_tool');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function editProfil($data, $id){
        $this->db->where('id_company', $id);
        $this->db->set($data);
        $get = $this->db->update('company');
        return $get;    
    }
}
