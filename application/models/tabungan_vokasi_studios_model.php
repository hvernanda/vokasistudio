<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tabungan_vokasi_studios_model extends CI_Model {
  public function viewTabungan()
  {
    $this->db->select('(SELECT amount from type WHERE id_type = 1) + (SELECT amount from type WHERE id_type = 2) as jumlah, (SELECT amount from type WHERE id_type = 1) as tabungan, (SELECT amount from type WHERE id_type = 2) as cash ');
    $this->db->limit(1);
    $get_index = $this->db->get('type');
    return $get_index->result();
  }
  public function viewSemuaTabungan()
  {
    $this->db->select('*');
    $get_index = $this->db->get('type');
    return $get_index->result();
  } 
}