<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {
	public function is_logged_crew($position)
	{
		$redirect = ($position == 'login')? 'home/crew' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('crew') : $this->session->userdata('crew');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_manajer_proyek($position)
	{
		$redirect = ($position == 'login')? 'home/manajer_proyek' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('manajer proyek') : $this->session->userdata('manajer proyek');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_keuangan_proyek($position)
	{
		$redirect = ($position == 'login')? 'home/keuangan_proyek' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('keuangan proyek') : $this->session->userdata('keuangan proyek');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_keuangan_vokasi($position)
	{
		$redirect = ($position == 'login')? 'home/keuangan_vokasi' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('staf keuangan vokasi') : $this->session->userdata('staf keuangan vokasi');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_manajer_vokasi($position)
	{
		$redirect = ($position == 'login')? 'home/manajer_vokasi' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('manajer vokasi') : $this->session->userdata('manajer vokasi');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_global($position)
	{
		$redirect = ($position == 'login')? 'home' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('global') : $this->session->userdata('global');
		if(!$condition){
		  redirect($redirect); 
		}
	}

	public function getClient($email, $password)
	{
		$this->db->select('id_company, name,photo');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
	    $get_index = $this->db->get('company');
	    return $get_index->result();
	}

	public function getStatus($email, $password)
	{
		$this->db->select('id_staff, name');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
	    $get_index = $this->db->get('staff');
	    return $get_index->result();
	}

	public function getStatusId($email, $password)
	{
		$this->db->select('id_staff');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
	    return $this->db->get('staff');
	}
	public function getJumlahStatus($email,$password){
		$this->db->select('count(*) as jumlah');
		$this->db->from('staff');
		$this->db->join('crew','staff.id_staff=crew.id_staff');
		$this->db->join('status','crew.id_status=status.id_status');
		$this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
	    $get_index = $this->db->get();
	    return $get_index->result();
	}
	public function getNamaStatus($email, $password)
	{
		$this->db->select('status.name as name');
		$this->db->from('status');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
	    $this->db->join('crew','status.id_status=crew.id_status');
	    $this->db->join('staff','crew.id_staff=staff.id_staff');
	    $get_index = $this->db->get();
	    return $get_index->result();
	}
	public function getIdProyek($email, $password, $status)
	{
		$this->db->select('crew.id_project as id_project');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('staff.password',$password);
	    $this->db->where('status.name',$status);
	    $this->db->join('crew', 'staff.id_staff=crew.id_staff', 'left');
	    $this->db->join('status', 'crew.id_status=status.id_status', 'left');
	    $get_index = $this->db->get('staff');
	    return $get_index->result();
	}

	public function getCompanyID($email, $password)
	{
		$this->db->select('id_company');
		$this->db->where('email = "'.$email.'" AND password ="'.$password.'"');
		return $this->db->get('company');
	}

	function check($email, $password)
	{
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
		$this->db->from('staff');
		$get = $this->db->count_all_results();
		return $get;
	}
	
	function check_user($email, $password, $status)
	{
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('staff.password',$password);
	    $this->db->where('status.name',$status);
		$this->db->from('staff');
	    $this->db->join('crew', 'staff.id_staff=crew.id_staff', 'left');
	    $this->db->join('status', 'crew.id_status=status.id_status', 'left');
		$get = $this->db->count_all_results();
		return $get;
	}
}


// SELECT `crew`.`id_project` as id_project, `staf`.`id_staf` as id_staf, `staf`.`name` as name, `status`.`name` as status FROM (`staf`) LEFT JOIN `status` ON `staf`.`id_staf`=`status`.`id_staf` left join crew on staf.id_staf=crew.id_staf left join project on crew.id_project=project.id_project WHERE `staf`.`email` = 'ipoel@gmail.com' AND `staf`.`password` = '1234' group by status.name

// SELECT `status`.`id_project` as id_project, `staf`.`id_staf` as id_staf, `staf`.`name` as name, `status`.`name` as status FROM (`staf`) LEFT JOIN `status` ON `staf`.`id_staf`=`status`.`id_staf`  WHERE `staf`.`email` = 'ipoel@gmail.com' AND `staf`.`password` = '1234' AND status.name='manajer proyek'
