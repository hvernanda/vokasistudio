<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

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
		$this->login_model->is_logged_global('home');
		$this->load->model('home_klien_model');
		$this->load->library('session');
	}
	public function index()
	{
		$userdata = array(
	        'crew' => '',
	        'keuangan proyek' => '',
	        'manajer proyek' => '',
	        'staf keuangan vokasi' => '',
	        'status' => '',
	        'manajer vokasi' => ''
      	); 
      	$this->session->set_userdata($userdata);
		$data = array(
			'page' => 'content/home',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'menu1' => $this->session->userdata('menu1'),
			'menu2' => $this->session->userdata('menu2'),
			'menu3' => $this->session->userdata('menu3'),
			'menu4' => $this->session->userdata('menu4'),
			'menu5' => $this->session->userdata('menu5')
		);

		$this->load->view('home',$data);
	}
	public function crew()
	{ 
		$id = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));
 
		foreach ($id as $row) {
			$id_stf = $row->id_staff;
			// print_r($status);
		} 

		$data = array(
			'page' => 'content/home-crew',
			'id' => $id_stf,
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status') 
		);

		$this->load->view('home',$data);
	}
	public function manajer_proyek()
	{   
		$this->load->model('manajer_proyek_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getStatusId($email,$password)->row()->id_staff;
		$listProject = $this->manajer_proyek_model->viewProjectManajer($get);
		$data = array(
			'page' => 'content/home-manajer-proyek',  
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'), 
			'listProject' => $listProject,
			'manajer'=> FALSE
		);
		$this->load->view('home',$data);
	}
	public function keuangan_proyek()
	{   

		$data = array(
			'page' => 'content/home-keuangan-proyek',  
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status') 
		);

		$this->load->view('home',$data);
	}
	public function keuangan_vokasi()
	{   

		$data = array(
			'page' => 'content/home-keuangan-vokasi',  
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status') 
		);

		$this->load->view('home',$data);
	}
	public function manajer_vokasi()
	{   

		$data = array(
			'page' => 'content/home-manajer-vokasi',  
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status') 
		);

		$this->load->view('home',$data);
	}

	public function Project($idProject="")
	{
		$this->load->model('manajer_proyek_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getStatusId($email,$password)->row()->id_staff;
//		$listProject = $this->manajer_proyek_model->viewProjectManajer($get);
//		foreach ($listProject as $key) {
//			$idProject = $key->id_project;
//		}
		$data = array(
			'page' => 'content/home-manajer-proyek',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'listProject' => $idProject,
			'manajer' => TRUE,
			'summaryAjaxOn' => FALSE
		);

		if($idProject==""){
			redirect('home');
		}else{
		$this->load->view('home',$data);
		}
	}
}