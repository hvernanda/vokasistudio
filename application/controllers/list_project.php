<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_project extends CI_Controller {

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
		$this->load->model('list_project_model','',true);
		
		//$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{ 
		

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/list_project', 
			'view_project' => $this->list_project_model->viewProject(),
			'manajer' => TRUE
		);

	$this->load->view('home',$data);
}

public function indexCrew()
	{
		$data = array(
			'page' => 'content/list_staff',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'manajer' => TRUE
		);

		$this->load->view('home',$data);
	}

	/*public function search()
	{
		$q = $this->input->post('q');

		$data = array(
			'page' => 'content/list_staff',
			'view_staff' => $this->list_staff_model->viewStaffSearch($q)
		);

		$this->load->view('home',$data);
	}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */