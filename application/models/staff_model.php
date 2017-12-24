<?php
if(!defined('BASEPATH')) exit('No direct script allowed') ;

class staff_model extends CI_Model {

    public function __construct(){
      parent::__construct() ;
    }

    public function getStaffBio($id_user){
        $sql = "SELECT st.*,sk.* FROM ((staff st INNER JOIN skillmapping sm ON st.id_staff = sm.id_staff) INNER JOIN skill sk ON sm.id_skill = sk.id_skill) where s.id_user=" . $id_user;
        $query = $this->db->query($sql);
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function editBio($id_user,$name,$address,$phone,$photo,$skill){
        $data = array(
            'name' => $name,
            'address' => $addess,
            'phone' => $phone,
            'photo' => $photo
        );

        $this->db->where('id_user',$id_user);
        $this->db->update('staff',$data);
        
        $this->db->select('id_staff');
        $this->db->from('staff');
        $this->db->where('id_user = ' . $id_user);
        $query = $this->db->get();
        $result = $query->result();
        $id_staff = $result[0];

        foreach($skill as $id_skill) {
            $this->db->where('id_staff',$id_staff);
            $this->db->update('skillmapping',array('id_skill' => $skill));
        }
    }

    public function getSkill(){
        $this->db->select('*');
        $this->db->from('skill');
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getProjectList($id_user){
        $query = "SELECT p.* FROM project p INNER JOIN crew c on p.id_project=c.id_project INNER JOIN staff s on c.id_staff=s.id_staff INNER JOIN user u on s.id_user=u.id_user where u.id_user=" . $id_user;
        
        $query = $this->db->query($sql);
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getStaffId($id_user){
        $this->db->select('id_staff');
        $this->db->from('staff');
        $this->db->where('id_user = ' . $id_user);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function ambil_user()
    {
      $this->db->select('user.name, user.email, user_role.user_role, staff.address, staff.phone, staff.status_account, staff.photo');
      $this->db->from('user');
      $this->db->join('user_role ', 'user.id_user_role = user_role.id_user_role');
      $this->db->join('staff', 'user.id_user = staff.id_user') ;
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