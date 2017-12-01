<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summary extends CI_Controller {

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
		$this->load->model('summary_model','',true);
		
		//$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}

	public function index($id)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_vokasi('login'))
		{
			show_404();
		}

		$this->load->model('manajer_proyek_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getStatusId($email,$password)->row()->id_staff;
		$data = array(
			'page' => 'content/summary',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'manajer' => TRUE,
			'listProject' => $id,
			'view_crew' => $this->summary_model->viewCrew($id)
		);

		$this->load->view('home',$data);
	}

	public function updateFinish()
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$id = $this->input->post('id');
		$data = array(
			'finishTime' => date('Y-m-d')
		);

		$this->summary_model->updateFinish($data, $id);
		
	}

	public function updatetoUndone()
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$id = $this->input->post('id');
		$data = array(
			'finishTime' => date('0000-00-00')
		);

		$this->summary_model->updateFinish($data, $id);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */