<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class keuangan_vokasi_model extends CI_Model {
  public function viewKeuanganVokasi()
  {
      $this->db->select('*');
      $this->db->where('id_activity', 0);
      $get_index = $this->db->get('saving');
      return $get_index->result();
  }
  public function viewUser()
  {
      $this->db->select('*'); 
      $get_index = $this->db->get('staff');
      return $get_index->result();
  }
  public function inputDataVokasi($insert)
	{
  	$this->db->set($insert);
  	return $this->db->insert('saving');
	}
  public function inputDataDefisitVokasi($insert)
  {
    $this->db->set($insert);
    return $this->db->insert('debt');
  }
	public function updateTabunganVokasi($amount, $id, $operation)
	{	
    print_r($operation);
		$this->db->where('id_type', $id);
	  $q = $this->db->get('type')->row('amount');  

		if ($operation == 'pemasukan vokasi' OR $operation == 'pemasukan proyek') {
			$total = $q +  $amount; 
			$this->db->set('amount', $total);    
	    $this->db->where('id_type',$id);   
	    $this->db->update('type');
		}elseif ($operation == 'pengeluaran vokasi' OR $operation == 'pengeluaran proyek') {
      $total = $q - $amount; 
      $this->db->set('amount', $total);    
      $this->db->where('id_type',$id);   
      $this->db->update('type');
    }elseif ($operation == 'update pengeluaran vokasi' OR $operation == 'update pengeluaran proyek') {
      if ($id == 1) {
        $this->db->where('id_type', 2);
        $q2 = $this->db->get('type')->row('amount'); 
        $total2 = $q2 + $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_type',2);   
        $this->db->update('type');

        $total1 = $q - $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_type',$id);   
        $this->db->update('type');
      }elseif ($id == 2) {
        $this->db->where('id_type', 1);
        $q2 = $this->db->get('type')->row('amount'); 
        $total2 = $q2 + $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_type',1);   
        $this->db->update('type');

        $total1 = $q - $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_type',$id);   
        $this->db->update('type');
      }
    }elseif ($operation == 'update pemasukan vokasi' OR $operation == 'update pemasukan proyek') {
      if ($id == 2) {
        $total1 = $q + $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_type',$id);   
        $this->db->update('type');

        $this->db->where('id_type', 1);
        $q2 = $this->db->get('type')->row('amount');
        $total2 = $q2 - $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_type',1);   
        $this->db->update('type');
      }elseif ($id == 1) {
        $total1 = $q - $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_type',$id);   
        $this->db->update('type');

        $total2 = $q + $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_type',2);   
        $this->db->update('type');
      }
    }
	}
  public function viewEdit($id)
  {
      $this->db->select('*');
      $this->db->where('id_saving', $id);
      $get_index = $this->db->get('saving');
      return $get_index->result();
  }
  public function viewEditDefisit($id)
  {
      $this->db->select('staff.name as name, saving.amount as amount, saving.date as date, debt.status as status, debt.id_debt as id_debt'); 
      $this->db->from('debt');
      $this->db->join('saving', 'debt.id_saving=saving.id_saving');
      $this->db->join('staff', 'debt.id_staf=staff.id_staf');
      $this->db->where('saving.id_saving', $id);
      $this->db->order_by('saving.date', 'desc'); 
      $get_index = $this->db->get();
      return $get_index->result();
  }
  public function updatePengeluaranVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_saving',$id);   
    $this->db->update('saving');
  }
  public function updateDefisitVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_saving',$id);   
    $this->db->update('debt');
  }
  public function updatePemasukanVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_saving',$id);   
    $this->db->update('saving');
  }
  public function delete($id)
  {
    $this->db->where('id_saving',$id);
    return $this->db->delete('saving');
  }
}