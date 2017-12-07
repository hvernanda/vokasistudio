<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class check extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->login_model->is_logged_global('home');
		$this->load->helper('email');
	}

	public function check_user($stat)
	// public function check_user($stat, $asd) -> url/check/check_user/stat/asd
  	{ 
	   	$data = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));
 
		foreach ($data as $row) {
			$id_stf = $row->id_staff;
			// print_r($status);
		} 

	   	$status = str_replace('-', ' ', $stat); 

   	  	$get = $this->login_model->check_user($this->session->userdata('email'),$this->session->userdata('password'),$status);
    	if($get){
	      $get = $get[0];
	      if ($status == 'crew') {
	       	$reg = array(
	       		'crew' => true,
            	'status' => $status
          	);
          	$this->session->set_userdata($reg);
	      	redirect('home/crew');
	      }elseif ($status == 'manajer proyek') {
	       	$reg = array(
	       		'manajer proyek' => true,
            	'status' => $status
          	);
          	$this->session->set_userdata($reg);
	      	redirect('home/manajer_proyek');
	      }elseif ($status == 'keuangan proyek') {
	       	$reg = array(
	       		'keuangan proyek' => true,
            	'status' => $status
          	);
          	$this->session->set_userdata($reg);
	      	redirect('home/keuangan_proyek');
	      }elseif ($status == 'staf keuangan vokasi') {
	       	$reg = array(
	       		'staf keuangan vokasi' => true,
            	'status' => $status
          	);
          	$this->session->set_userdata($reg);
	      	redirect('home/keuangan_vokasi');
	      }elseif ($status == 'manajer vokasi') {
	       	$reg = array(
	       		'manajer vokasi' => true,
            	'status' => $status
          	);
          	$this->session->set_userdata($reg);
	      	redirect('home/manajer_vokasi');
	      }
		}elseif ($status == 'crew') {
	       	$reg = array(
	       		'crew' => true,
            	'status' => $status
          	);
          	$this->session->set_userdata($reg);
	      	redirect('home/crew/'.$id_stf);
	      }
	      else{
	       	$this->session->set_flashdata('msgfalse',
            '<div class="alert alert-warning">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">
                <div class="glyphicon glyphicon-volume-off">
                </div>
                </span>
                <span class="sr-only">Close</span>
              </button>
            Maaf, Anda tidak punya akses! </br>
            </div>'
          );
   	    	redirect('home');
     	}
	}
}