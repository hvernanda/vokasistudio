<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Profil extends CI_Model
 {
 	public function cek_email($kode)
    {
        $this->db->where('email',$kode);
        $query=$this->db->get('staff');
        return $query;
    }
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

    public function ambil_detail_skill(){
        $this->db->select('skill_name, tool_name, id_toolskill, skill.id_skill, tool.id_tool');
        $this->db->from('toolskill');
        $this->db->join('skill', 'toolskill.id_skill=skill.id_skill');        
        $this->db->join('tool', 'toolskill.id_tool=tool.id_tool');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function detail_toolskill($id_staff){
        $query = $this->db->query("SELECT dt.id_toolskill FROM detail_toolskill dt
                    join toolskill ts using(id_toolskill)
                    join staff stf using(id_staff)
                    join skill sk using(id_skill)
                    join tool using(id_tool)
                    where dt.id_staff = '$id_staff'
            ");
        $result = $query->result_array();
        return $result;
    }

    public function nama_skill(){
        // $this->db->select('skill_name');
        // $this->db->from('skill');
        // $query = $this->db->get();
        // $result = $query->result();
        return $query = $this->db->query("select skill_name from skill");

    }

    public function toolSkill(){
        $this->db->select('skill_name, tool_name, id_toolskill, skill.id_skill, tool.id_tool');
        $this->db->from('toolskill');
        $this->db->join('skill', 'toolskill.id_skill=skill.id_skill');        
        $this->db->join('tool', 'toolskill.id_tool=tool.id_tool');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    // public function update_crew($id_staff){
        
    // }

	public function update_user($id_staff, $data)
	{
		$this->db->where('id_staff', $id_staff);
		$this->db->update('staff', $data);
	}

    public function delete_skill($id_staff)
    {
        $this->db->query("delete from detail_toolskill where id_staff = '$id_staff'");
    }

    public function insert_skill($data){
        $this->db->insert('detail_toolskill', $data);
    }

    public function add_gambar($id_staff, $data){
        $this->db->where('id_staff', $id_staff);
        $this->db->update('staff', $data); 
    }

    public function ambil_skill($id_staff)
    {
        $query = $this->db->query("SELECT dt.id_staff, dt.id_toolskill, sk.skill_name, tl.tool_name FROM detail_toolskill dt 
            join staff s on s.id_staff = dt.id_staff 
            join toolskill ts on ts.id_toolskill = dt.id_toolskill 
            join skill sk on sk.id_skill = ts.id_skill 
            join tool tl on tl.id_tool = ts.id_tool 
            where s.id_staff = '$id_staff'");
        $result = $query->result();
        return $result;
    }

    public function ambil_id_skill(){
        $query = $this->db->query("SELECT ts.id_toolskill FROM toolskill ts
            join skill sk on sk.id_skill = ts.id_skill 
            join tool tl on tl.id_tool = ts.id_tool 
            ");
        $result = $query->result();
        return $result;
    }

    public function ambil_tool($id_staff)
    {
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('id_staff', $id_staff);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }    
}

?>


	