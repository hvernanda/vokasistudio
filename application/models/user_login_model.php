<?php
if(!defined('BASEPATH')) exit('No direct script allowed') ;

class user_login_model extends CI_Model {

    public function __construct(){
      parent::__construct() ;
    }
    // Read data using username and password
    public function login($data) {
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function read_user_information($email) {
        $sql = "SELECT u.email,u.id_user,u.id_user_role,r.user_role, u.name FROM user u INNER JOIN user_role r ON u.id_user_role = r.id_user_role WHERE u.email=" . $this->db->escape($email);
        $query = $this->db->query($sql);

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function isUser($id){
        $sql = "SELECT * from user WHERE id_user = ".$id ;
        $query = $this->db->query($sql) ;

        if($query->num_rows() == 1) 
            return $query->result() ;
        else 
            return false ;
    }

    // check if user logged in
    public function checkLogged(){
      return ($this->session->userdata('logged_in'))?true:false ;
    }

    // check if user is manajervokasi
    public function checkManajer(){
        return ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['id_user_role'] == '1') ? true : false ;
    }

    // check if user is keuangan studio
    public function checkKeuangan(){
        return ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['id_user_role'] == '2') ? true : false ;
    }

    // check if user is staff
    public function checkStaff(){
        return ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['id_user_role'] == '3') ? true : false ;
    }

    // check if user is client
    public function checkClient(){
        return ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['id_user_role'] == '4') ? true : false ;
    }
}

?>
