<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class keuangan_studio_model extends CI_Model
 {

 	public function ambil_keuangan_studio(){
 		$this->db->select('*');
 		$this->db->from('finance');
 		$this->db->where('id_activity', 0);
 		$query = $this->db->get();
 		$result = $query->result();
 		return $result;
 	}

 	public function ambil_tabungan_studio(){
 		$this->db->select('(SELECT amount from savings WHERE id_savings = 1) + (SELECT amount from savings WHERE id_savings = 2) as jumlah, (SELECT amount from savings WHERE id_savings = 1) as tabungan, (SELECT amount from savings WHERE id_savings = 2) as cash ');
	      $this->db->limit(1);
	      $get_index = $this->db->get('savings');
	      return $get_index->result();
   }
  public function insertSaving($data){
    $query = $this->db->insert('savings', $data) ;
    return $query ;
  }
 	public function inputDataVokasi($insert){
	  	$this->db->set($insert);
	  	return $this->db->insert('finance');
	}
	public function inputDataDefisitVokasi($insert)
  {
    $this->db->set($insert);
    return $this->db->insert('debt');
  }
	public function updateTabunganVokasi($amount, $id, $operation)
	{	
    print_r($operation);
		$this->db->where('id_savings', $id);
	  $q = $this->db->get('savings')->row('amount');  

		if ($operation == 'pemasukan vokasi' OR $operation == 'pemasukan proyek') {
			$total = $q +  $amount; 
			$this->db->set('amount', $total);    
	    $this->db->where('id_savings',$id);   
	    $this->db->update('savings');
		}elseif ($operation == 'pengeluaran vokasi' OR $operation == 'pengeluaran proyek') {
      $total = $q - $amount; 
      $this->db->set('amount', $total);    
      $this->db->where('id_savings',$id);   
      $this->db->update('savings');
    }elseif ($operation == 'update pengeluaran vokasi' OR $operation == 'update pengeluaran proyek') {
      if ($id == 1) {
        $this->db->where('id_savings', 2);
        $q2 = $this->db->get('savings')->row('amount'); 
        $total2 = $q2 + $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_savings',2);   
        $this->db->update('savings');

        $total1 = $q - $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_savings',$id);   
        $this->db->update('savings');
      }elseif ($id == 2) {
        $this->db->where('id_savings', 1);
        $q2 = $this->db->get('savings')->row('amount'); 
        $total2 = $q2 + $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_savings',1);   
        $this->db->update('savings');

        $total1 = $q - $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_savings',$id);   
        $this->db->update('savings');
      }
    }elseif ($operation == 'update pemasukan vokasi' OR $operation == 'update pemasukan proyek') {
      if ($id == 2) {
        $total1 = $q + $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_savings',$id);   
        $this->db->update('savings');

        $this->db->where('id_savings', 1);
        $q2 = $this->db->get('savings')->row('amount');
        $total2 = $q2 - $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_savings',1);   
        $this->db->update('savings');
      }elseif ($id == 1) {
        $total1 = $q - $amount; 
        $this->db->set('amount', $total1);    
        $this->db->where('id_savings',$id);   
        $this->db->update('savings');

        $total2 = $q + $amount; 
        $this->db->set('amount', $total2);    
        $this->db->where('id_savings',2);   
        $this->db->update('savings');
      }
    }
	}
  public function viewEdit($id)
  {
      $this->db->select('*');
      $this->db->where('id_finance', $id);
      $get_index = $this->db->get('finance');
      return $get_index->result();
  }
  public function viewEditDefisit($id)
  {
      $this->db->select('user.name as name, finance.amount as amount, finance.date as date, debt.status as status, debt.id_debt as id_debt'); 
      $this->db->from('debt');
      $this->db->join('finance', 'debt.id_finance=finance.id_finance');
      $this->db->join('staff', 'debt.id_staff=staff.id_staff');
      $this->db->join('user', 'user.id_user = staff.id_user') ;
      $this->db->where('finance.id_finance', $id);
      $this->db->order_by('finance.date', 'desc'); 
      $get_index = $this->db->get();
      return $get_index->result();
  }
  public function updatePengeluaranVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_finance',$id);   
    $this->db->update('finance');
  }
  public function updateDefisitVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_finance',$id);   
    $this->db->update('debt');
  }
  public function updatePemasukanVokasi($update, $id)
  {
    $this->db->set($update);    
    $this->db->where('id_finance',$id);   
    $this->db->update('finance');
  }
  public function delete($id)
  {
    $this->db->where('id_finance',$id);
    return $this->db->delete('finance');
  }
  public function pilih_staff()
  {
      $this->db->select('*'); 
      $get_index = $this->db->get('staff');
      return $get_index->result();
  }
 }