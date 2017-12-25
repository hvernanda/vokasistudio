<?php
if(!defined('BASEPATH')) exit('No direct script allowed') ;

class keuangan_proyek_model extends CI_Model {

    public function __construct(){
      parent::__construct() ;
    }

    public function auth($id_user,$id_project) {
        $cond = "staff.id_user = " . $id_user . " and crew.id_project = ". $id_project ." and crew.id_crew_role = 2";
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->join('crew','staff.id_staff=crew.id_staff','inner');
        $this->db->where($cond);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}