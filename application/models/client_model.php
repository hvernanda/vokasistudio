<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class client_model extends CI_Model
 {
 /*	public function cek_login($data) 
 	{
		$query = $this->db->get_where('staff', $data);
		return $query;
 	}

	public function cek_email($kode)
    {
        $this->db->where('email',$kode);
        $query=$this->db->get('staff');
        return $query;
    }*/
    public function ambil_company()
    {
		$this->db->select('*');
		$this->db->from('company');
		// $this->db->where('id_staff');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
    public function ambil_user()
    {
        $this->db->select('user.email AS email, contact.name AS nama, contact.phone, company.name AS company');
        $this->db->from('company');
        $this->db->join('contact','contact.id_company = company.id_company');
        $this->db->join('user','contact.id_user= user.id_user');
         //$this->db->where('id_user_role', '4');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function ambil_user_id($id)
    {
        $this->db->select('user.email AS email, contact.name AS nama, contact.phone, company.name AS company');
        $this->db->from('company');
        $this->db->join('contact','contact.id_company = company.id_company');
        $this->db->join('user','contact.id_user= user.id_user');
        // $this->db->join('project','project.id_contact= contact.id_contact');
        $this->db->where('user.id_user', $id) ;
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function insert_client($nama, $email, $password)
    {
        $data = array(
            'name' => $nama,
            'email' => $email,
            'password' => $password,
            'id_user_role' => '4' );
        $input = $this->db-> insert('user', $data);

    }

    public function insert_client_company($nama,$phone, $email, $address)
    {
       

        $data = array(
            'name' => $nama,
            'phone' => $phone,
            'email' => $email,
            'address' => $address
             );
        $input = $this->db-> insert('company', $data);

    }
}

?>
