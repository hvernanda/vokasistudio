<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_History extends CI_Model
 {
    public function ambil_user($id_staff)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('id_staff', $id_staff);
        // $this->db->join('detail_toolskill', 'staff.id_staff=detail_toolskill.id_staff');
        // $this->db->join('toolskill', 'toolskill.id_toolskill=detail_toolskill.id_toolskill');
        // $this->db->join('skill', 'skill.id_skill=toolskill.id_skill');
        // $this->db->join('tool', 'tool.id_tool=toolskill.id_tool');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function ambil_done($email){
        $this->db->select('name, nama_status, project_name');
        $this->db->from('crew');
        $this->db->join('project', 'crew.id_project=project.id_project');        
        $this->db->join('status', 'crew.id_status=status.id_status');
        $this->db->join('staff', 'crew.id_staff=staff.id_staff');
        $this->db->where('staff.email', $email);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function done_history($email){
        $query = $this->db->query("SELECT name, nama_status, project_name FROM `crew`cr
                        join project pr on pr.id_project = cr.id_project
                        join status sts on sts.id_status = cr.id_status
                        join staff stf on stf.id_staff = cr.id_staff
                        where stf.email = '$email' AND pr.status = 'done'
                        ");
        $result = $query->result();
        return $result;
    }    
}

?>


