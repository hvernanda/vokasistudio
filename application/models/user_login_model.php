<?php

class user_login_model extends CI_Model {
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
        $sql = "SELECT u.email,u.id_user,ur.user_role FROM user u inner join user_role ur ON u.id_user_role=ur.id_user_role WHERE u.email=" . $this->db->escape($email);
        $query = $this->db->query($sql);
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>

