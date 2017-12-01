<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

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
		$this->load->helper('email');
	}
	public function index()
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_vokasi('login') OR $this->login_model->is_logged_global('login') ){
      		show_404();
    	}  
		$this->load->view('login');
	}
	public function check()
  	{
   		if(!$_POST) show_404();
		
		$email = $this->input->post('email');
	  	$password = md5($this->input->post('password'));

		$this->form_validation->set_rules('email','email','required');
		  
		$this->form_validation->set_rules('password','password','required');
		
		$data = $this->login_model->getNamaStatus($email,$password);
		$jum = $this->login_model->getJumlahStatus($email,$password);
 		$get2 = $this->login_model->getCompanyID($email,$password);
 		$i=1;
		foreach ($data as $row) {
			$status[$i] = $row->name; 
			$i++;
		}
		foreach ($jum as $row) {
			$jumlah = $row->jumlah; 
		}  

		for ($i=1; $i <= $jumlah; $i++) {  
			if ($status[$i] == 'crew') {
				 $reg = array(
		       		'menu1' => true,
		      	); 
				$this->session->set_userdata($reg);	
			}elseif ($status[$i] == 'keuangan proyek') {
				 $reg = array(
		       		'menu2' => true, 
		      	); 
				$this->session->set_userdata($reg);
			}elseif ($status[$i] == 'manajer proyek') {
				$reg = array(
		       		'menu3' => true, 
		      	); 
				$this->session->set_userdata($reg);
			}elseif ($status[$i] == 'staf keuangan vokasi') {
				$reg = array(
		       		'menu4' => true, 
		      	); 
				$this->session->set_userdata($reg);
			}elseif ($status[$i] == 'manajer vokasi') {
				$reg = array(
		       		'menu5' => true,
		      	); 
				$this->session->set_userdata($reg);
			} 
		}  
		print_r($reg['menu5']);
		
		  if($this->form_validation->run()){
	   	  	
	   	  	$get = $this->login_model->check($email,$password,$status);
	    	if($get){
		      	$get = $get[0];
		       	
		       	$reg = array(
		       		'global' => true,
		        	'email' => $email,
		        	'password' => $password,
		      	);
		      	
		      	$this->session->set_userdata($reg);
		      	redirect('home');
			}
			else if($get2->row()){
		       	$reg = array(
		       		'global' => true,
		        	'email' => $email,
		        	'password' => $password,
		      	);
		      	
		      	$this->session->set_userdata($reg);
		      	redirect('home_klien');
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
	            Maaf, Username atau Password Salah. Silahkan Coba Lagi! </br>
	            </div>'
	          );
	   	    	redirect('login');
	     		}
		  }else{
	   	  $this->session->set_flashdata('msgfalse', 
	        '<div class="alert alert-warning">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-volume-off">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            Maaf, Username dan Password Kosong. Silahkan Coba Lagi! </br>
	            </div>'
	        );
		     redirect('login');
	   	}
	}
	public function quit()
  	{
      	$userdata = array(
	      	'username' => '',
	        'password' => '',
	        'crew' => '',
	        'keuangan proyek' => '',
	        'manajer proyek' => '',
	        'staf keuangan vokasi' => '',
	        'manajer vokasi' => '',
	        'global' => '',
	        'status' => '',
	        'menu1' => '',
	        'menu2' => '',
	        'menu3' => '',
	        'menu4' => '',
	        'menu5' => ''
      	); 
      	$this->session->set_userdata($userdata);
      	$this->session->set_flashdata('messageType','passed');
      	$this->session->set_flashdata('msgtrue',
        	'<div class="alert alert-success">
              	<button type="button" class="close" data-dismiss="alert">
              	<span aria-hidden="true">
                	<div class="glyphicon glyphicon-volume-off">
                	</div>
                </span>
                <span class="sr-only">Close</span>
              	</button>
            	Kamu, Berhasil Logout </br>
            </div>'
            );
      	redirect('login');
  	}
}