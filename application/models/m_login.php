<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class M_Login extends CI_Model
 {
	// private $db;
	//public $db = $this->load->database('database_yola',TRUE);
	
	
	// private $DB_agi;
	// $DB_agi = $this->load->database('database_agi',TRUE);
	
	// private $DB_ikhsan;
	// $DB_ikhsan = $this->load->database('database_ikhsan',TRUE);
	
	// private $DB_ipul;
	// $DB_ipul = $this->load->database('database_ipu;',TRUE);

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
    public function ambil_user($id_staff)
    {
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('id_staff', $id_staff);
 		$query = $this->db->get();
		$result = $query->result();
		return $result;
		
    }
    public function ambil_crew($id_staff,$id_project)
    {
		$this->db->select('id_status');
 		$this->db->from('crew');
 		$this->db->where('id_staff', $id_staff);
 		$this->db->where('id_project', $id_project);
 		$query = $this->db->get();
		$result = $query->result();
		return $result;
		
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