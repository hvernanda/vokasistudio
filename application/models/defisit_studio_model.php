<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class defisit_studio_model extends CI_Model {
	public function viewDefisitVokasi()
  {
      $this->db->select('staff.name as name, finance.amount as amount, finance.date as date, debt.status as status, debt.id_debt as id_debt'); 
      $this->db->from('debt');
      $this->db->join('finance', 'debt.id_finance=finance.id_finance');
      $this->db->join('staff', 'debt.id_staff=staff.id_staff');
      $this->db->order_by('finance.date', 'desc'); 
      $get_index = $this->db->get();
      return $get_index->result();
  }
  public function inputDataVokasi($insert)
	{
  	$this->db->set($insert);
  	return $this->db->insert('debit');
	} 
  public function viewEdit($id)
  {
      $this->db->select('*');
      $this->db->where('id_debit', $id);
      $get_index = $this->db->get('debit');
      return $get_index->result();
  }
  public function updatePembayaran($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_debit',$id);   
    $this->db->update('debit');
  }
  public function updateDefisitVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_debit',$id);   
    $this->db->update('debit');
  } 
}