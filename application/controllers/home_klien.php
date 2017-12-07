<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_klien extends CI_Controller {

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
		$this->login_model->is_logged_global('home_klien');
		$this->load->library('session');
		$this->load->model('home_klien_model','',true);
		$this->load->model('profil_model','',true);
	}
	public function index()
	{
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getCompanyID($email,$password)->row()->id_company;
		$listProject = $this->home_klien_model->viewProjectClient($get);
		//$idCompany = $this->profil_model->ambil_user($get);
		$data = array(
			'page' => 'content/home',
			'user' => $this->login_model->getClient($this->session->userdata('email'),$this->session->userdata('password')),
			'idCompany' => $get,
			'listProject' => $listProject,
			'client'=>FALSE
			/*'status' => $this->session->userdata('status'),
			'menu1' => $this->session->userdata('menu1'),
			'menu2' => $this->session->userdata('menu2'),
			'menu3' => $this->session->userdata('menu3'),
			'menu4' => $this->session->userdata('menu4'),
			'menu5' => $this->session->userdata('menu5')*/
		);


		$this->load->view('home_klien',$data);
	}
	
	public function ClientProject($idProject="")
	{
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getCompanyID($email,$password)->row()->id_company;
		$listProject = $this->home_klien_model->viewProjectClient($get);
		$data = array(
			'page' => 'content/home',
			'user' => $this->login_model->getClient($this->session->userdata('email'),$this->session->userdata('password')),
			'idCompany' => $get,
			'listProject' => $idProject,
			'client' => TRUE
		);

		if($idProject==""){
			redirect('home_klien');
		}else{
		$this->load->view('home_klien',$data);
		}
	}
}