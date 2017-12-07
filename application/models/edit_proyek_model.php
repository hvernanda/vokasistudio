<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class edit_proyek_model extends CI_Model
 {
    public function editProyek($insert_project, $id){
        $this->db->where('id_project', $id);
        $this->db->set($insert_project);
        $get = $this->db->update('project');
        return $get;    
    }

    public function editType($insert_project, $id){
        $this->db->where('id_project', $id);
        $this->db->set($insert_project);
        $get = $this->db->update('projecttype');
        return $get;    
    }

    function deleteCurrentType($id)
    {
        $this->db->where('id_project', $id);
        return $this->db->delete('projecttype');
    }

     public function ambil_proyek($id)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('id_project', $id);
        // $this->db->join('detail_toolskill', 'staff.id_staff=detail_toolskill.id_staff');
        // $this->db->join('toolskill', 'toolskill.id_toolskill=detail_toolskill.id_toolskill');
        // $this->db->join('skill', 'skill.id_skill=toolskill.id_skill');
        // $this->db->join('tool', 'tool.id_tool=toolskill.id_tool');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
