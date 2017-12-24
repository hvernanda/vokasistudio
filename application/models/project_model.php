<?php
if(!defined('BASEPATH')) exit('No direct script allowed') ;

class project_model extends CI_Model {

    public function __construct(){
      parent::__construct() ;
    }

    public function getAllProjects($id_user){
        $condition = "id";
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
}