<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Login extends CI_Model
 {
 	public function cek_login($data) 
 	{
		$query = $this->db->get_where('staff', $data);
		return $query;
 	}

 	public function login($data){
 		$this->db->select('*');
 		$this->db->from('staff');
 		$query = $this->db->get();
		$result = $query->result();
		return $result;
 	}

	public function cek_email($kode)
    {
        $this->db->where('email',$kode);
        $query=$this->db->get('staff');
        return $query;
    }
    public function ambil_user($email)
    {
		$query = $this->db->get_where('staff', $email);
		return $query;
		
    }

/*    public function ambil_staff($id)
 	{
 		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
 	}

 	public function ambil_skill($)

 	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('staff',$data);
	}*/
}

?>