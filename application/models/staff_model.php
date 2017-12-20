<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class staff_model extends CI_Model
 {

    public function ambil_user()
    {
		$this->db->select('*');
		$this->db->from('staff');
		// $this->db->where('id_staff');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }
      public function insert_staff($nama,$email,$password, $id_user_role)
    {
       

        $data = array(
            'name' => $nama,
            'email' => $email,
            'password' => $password,
            'id_user_role' => $id_user_role
             );
        $input = $this->db-> insert('user', $data);

    }


}

?>