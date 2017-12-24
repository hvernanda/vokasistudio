<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class staff_model extends CI_Model
 {

    public function ambil_user()
    {
      $this->db->select('user.id_user, user.name, user.email, user_role.user_role, staff.address, staff.phone, staff.status_account, staff.photo');
      $this->db->from('user');
      $this->db->join('user_role ', 'user.id_user_role = user_role.id_user_role');
      $this->db->join('staff', 'user.id_user = staff.id_user') ;
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function ambil_user_id($id){
      $this->db->select('user.id_user, user.name, user.email, user_role.user_role, staff.address, staff.phone, staff.status_account, staff.photo');
      $this->db->from('user');
      $this->db->join('user_role ', 'user.id_user_role = user_role.id_user_role');
      $this->db->join('staff', 'user.id_user = staff.id_user') ;
      $this->db->where('user.id_user', $id) ;
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function insert_staff($nama,$email,$password, $id_user_role)
    {
        $data = array(
            'name' => $nama,
            'email' => $email,
            'password' => $password,
            'id_user_role' => $id_user_role
             );
        $input = $this->db-> insert('user', $data);

    }

    public function ambil_tool_skill()
    {
      $this->db->select('*');
      $this->db->from('toolskill');
      $this->db->join('tool','tool.id_tool = toolskill.id_tool');
      $this->db->join('skill','skill.id_skill = toolskill.id_skill');
		// $this->db->where('id_staff');
      $query = $this->db->get();
      $result = $query->result();
      return $result;

    }


}

?>