<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyek_update extends CI_Controller {

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
		
		
		$this->load->model('proyek_update_model','',true);
		//$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}

	public function index($idProject="")
	{
		$this->load->model('home_klien_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getCompanyID($email,$password)->row()->id_company;
		$listProject = $this->home_klien_model->viewProjectClient($get);
		/*foreach ($listProject as $key) {
			$idProject = $key->id_project;
		}*/
		$data = array(
			'page' => 'content/proyek_update',
			'user' => $this->login_model->getClient($this->session->userdata('email'),$this->session->userdata('password')),
			'view_update' => $this->proyek_update_model->viewUpdate($idProject),
			'idAct'=> $this->proyek_update_model->viewUpdate($idProject),
			'listProject' => $idProject,
			'idCompany' => $get,
			'client' => TRUE
		);



		if($idProject==""){
			redirect('home_klien');
		}else{
		$this->load->view('home_klien',$data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */