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
        $this->db->select('*');
        $this->db->from('user');
         $this->db->where('id_user_role', '4');
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

  /*  public function notifikasi($id_staff){
    	$query = $this->db->query("SELECT * FROM crew 
    		join staff on crew.id_staff = staff.id_staff
    		join status on crew.id_status = status.id_status
    		join project on crew.id_project = project.id_project
    		where staff.id_staff = '$id_staff' ");
    	$result = $query->result();
		return $result;

    }

    public function update_permintan($id_staff, $id_crew, $data){
    	$this->db->where('id_staff', $id_staff);
        $this->db->where('id_crew', $id_crew);
        $this->db->update('crew', $data);
        // $que = $this->db->query("UPDATE crew SET status_permintaan = '$data' WHERE id_staff = '$id_staff' AND id_crew = '$id_crew'");
    }

    public function ambil_user_komplit($id){
        $query = $this->db->query("SELECT * FROM staff
            JOIN crew on crew.id_staff = staff.id_staff
            JOIN status on status.id_status = crew.id_status
            JOIN project on crew.id_project = project.id_project
            WHERE staff.id_staff = '$id'
            ");
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