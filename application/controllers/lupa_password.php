<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lupa_password extends CI_Controller {

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
		$this->load->model('lupa_password_model','',true);
	}
	public function index()
	{
		
		$data = array(
		'page' => 'lupa_password'
		);

		$this->load->view('lupa_password');
	}

	public function kirim(){
		$email = $this->input->post('email');
		$newPass = $this->lupa_password_model->genRndSalt();

		$data = array(
			'password' => md5($newPass)
			);
	if($this->lupa_password_model->check($email)){
		if(!$this->lupa_password_model->updatePassword($email,$data)){
			
		}else{
			if($this->lupa_password_model->resetPassword($email,$newPass))
			{
				
			}
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
	            Maaf, Email tidak terdaftar. Silahkan Coba Lagi! </br>
	            </div>'
	          );
		redirect('lupa_password');
		}
	}

}