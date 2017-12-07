<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_klien extends CI_Controller {

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
		$this->load->library('security');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function check()
  	{
		$email 		= $this->input->post('email');
	  	$password 	= md5($this->input->post('password', TRUE));

		$this->form_validation->set_rules('email','email','required');
  		$this->form_validation->set_rules('password','password','required');
     
		  if($this->form_validation->run()){
	   	  	
	   	  	$get = $this->login_model->getCompanyID($email,$password)->row()->id_company;
	    	if($get){
		       	$reg = array(
		       		'global' => true,
		        	'email' => $email,
		        	'password' => $password
		      	);
		      	
		      	$this->session->set_userdata($reg);
		      	redirect('home_klien');
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
	            Maaf, Username atau Pasasword Salah. Silahkan Coba Lagi!'.$password.' </br>
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