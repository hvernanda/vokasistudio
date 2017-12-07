<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {
	public function is_logged_crew($position)
	{
		$redirect = ($position == 'login')? 'riwayat_honor_kru' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('crew') : $this->session->userdata('crew');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_manajer_proyek($position)
	{
		$redirect = ($position == 'login')? 'kelola_honor_kru' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('manajer proyek') : $this->session->userdata('manajer proyek');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_keuangan_proyek($position)
	{
		$redirect = ($position == 'login')? 'keuangan_proyek' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('keuangan proyek') : $this->session->userdata('keuangan proyek');
		if(!$condition){
		  redirect($redirect); 
		}
	}
	public function is_logged_keuangan_vokasi($position)
	{
		$redirect = ($position == 'login')? 'keuangan_vokasi_studios' : 'login';
		$condition = ($position == 'login')? !$this->session->userdata('staf keuangan vokasi') : $this->session->userdata('staf keuangan vokasi');
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
	public function getStatus($email, $password)
	{
		$this->db->select('id_staf, name');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('password',$password);
	    $get_index = $this->db->get('staff');
	    return $get_index->result();
	}
	public function getIdProyek($email, $password, $status)
	{
		$this->db->select('status.id_project as id_project');
	    $this->db->where("email like '%".$email."%'");
	    $this->db->where('staff.password',$password);
	    $this->db->where('status.name',$status);
	    $this->db->join('status', 'staff.id_staf=status.id_staf', 'left');
	    $get_index = $this->db->get('staff');
	    return $get_index->result();
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
	    $this->db->join('status', 'staff.id_staf=status.id_staf', 'left');
		$get = $this->db->count_all_results();
		return $get;
	}
}


// SELECT `crew`.`id_project` as id_project, `staf`.`id_staf` as id_staf, `staf`.`name` as name, `status`.`name` as status FROM (`staf`) LEFT JOIN `status` ON `staf`.`id_staf`=`status`.`id_staf` left join crew on staf.id_staf=crew.id_staf left join project on crew.id_project=project.id_project WHERE `staf`.`email` = 'ipoel@gmail.com' AND `staf`.`password` = '1234' group by status.name

// SELECT `status`.`id_project` as id_project, `staf`.`id_staf` as id_staf, `staf`.`name` as name, `status`.`name` as status FROM (`staf`) LEFT JOIN `status` ON `staf`.`id_staf`=`status`.`id_staf`  WHERE `staf`.`email` = 'ipoel@gmail.com' AND `staf`.`password` = '1234' AND status.name='manajer proyek'
