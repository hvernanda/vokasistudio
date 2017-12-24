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
}
