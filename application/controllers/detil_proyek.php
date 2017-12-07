<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detil_proyek extends CI_Controller {

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
		$this->load->model('detil_proyek_model','',true);
		//$this->login_model->is_logged_global('');
		$this->load->library('session');
	}
	public function index($id)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/detil_proyek',
			'view_project' => $this->detil_proyek_model->viewProject($id),
			'view_type' => $this->detil_proyek_model->viewType($id),
			'id_project' => $id
		);

		$this->load->view('home',$data);
	}

	public function indexSummary($id)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/detil_proyek',
			'view_project' => $this->detil_proyek_model->viewProject($id),
			'view_type' => $this->detil_proyek_model->viewType($id),
			'manajer' => TRUE,
			'listProject' => $id
		);

		$this->load->view('home',$data);
	}

	public function updateStatus($id)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$data = array(
			'status' => 'done'
		);

		$this->detil_proyek_model->updateProject($data, $id);
			redirect('detil_proyek/indexSummary/'.$id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */