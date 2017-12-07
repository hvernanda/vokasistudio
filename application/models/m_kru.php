<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Kru extends CI_Model
 {
    public function cek_login($data) 
 	{
		$query = $this->db->get_where('staff', $data);
		return $query;
 	}

	public function cek_email($kode)
    {
        $this->db->where('email',$kode);
        $query=$this->db->get('staff');
        return $query;
    }
    
    public function ambil_semua_user_staff()
    {
    	// $id = $this->input->post('id');
		$query = $this->db->query("SELECT stf.name, nama_status, email, foto, status_account, stf.id_staff, id_toolskill FROM staff stf
				JOIN status sts on stf.id_status = sts.id_status
                JOIN detail_toolskill dt on dt.id_staff = stf.id_staff 
				WHERE stf.id_status != '4'
			");
		$result = $query->result();
        return $result;
    }

    public function ambil_semua_user_status()
    {
    	// $id = $this->input->post('id');
		$query = $this->db->query("SELECT stf.name, nama_status, email, foto, status_account, stf.id_staff FROM staff stf
                JOIN status sts on stf.id_status = sts.id_status
                WHERE stf.id_status != '4'
			");
		$result = $query->result();
		return $result;
    }

    public function block($id, $data)
	{
		$this->db->where('id_staff', $id);
		$this->db->update('staff', $data);
	}
	
	public function aktif($id, $data)
	{
		$this->db->where('id_staff', $id);
		$this->db->update('staff', $data);
	}

	public function ambil_done($email){
        $this->db->select('name, nama_status, project_name, status, status_permintaan');
        $this->db->from('crew');
        $this->db->join('project', 'crew.id_project=project.id_project');        
        $this->db->join('status', 'crew.id_status=status.id_status');
        $this->db->join('staff', 'crew.id_staff=staff.id_staff');
        $this->db->where('staff.email', $email);
        $this->db->where('status_permintaan', 'Terima');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function ambil_tok($id)
 	{
 		$query = $this->db->query("select * from crew 
                                   join status using(id_status)
                                   join project using(id_project)
                                   join staff using(id_staff)
                                   where crew.id_staff = '$id' ");
 		return $query->result();
 		
 	}

    public function ambil_staff()
 	{
 		$query = $this->db->query('select * from crew');
 		if ($query->num_rows() > 0){
 			return $query->result_array();
 		}else{
		return false;
 		}
 	}

 	public function get_crew_by_id($id){
 		$this->db->select('*');
        $this->db->from('crew');
        $this->db->where('id_staff', $id);
        $query = $this->db->get();
        return $query->row();
 	}

    public function tampilSkill(){
        $this->db->select('skill_name, tool_name, id_toolskill');
        $this->db->from('toolskill');
        $this->db->join('skill', 'toolskill.id_skill=skill.id_skill');        
        $this->db->join('tool', 'toolskill.id_tool=tool.id_tool');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function cari(){
        $cari = $this->input->GET('skilltool', TRUE);
        $data = $this->db->query("SELECT * from detail_toolskill 
                                  JOIN staff using(id_staff)
                                  JOIN status using(id_status)
                                  JOIN crew using(id_staff)
                                  JOIN project using(id_project)
                                  WHERE id_toolskill like '%$cari%'");
        return $data->result(); 
    }

 // 	public function ambil_skill($)

 // 	public function update_user($id, $data)
	// {
	// 	$this->db->where('id', $id);
	// 	$this->db->update('staff',$data);
	// }
}

?>