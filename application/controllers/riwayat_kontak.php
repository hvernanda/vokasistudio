<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_kontak extends CI_Controller {

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
		$this->load->model('riwayat_kontak_model','',true);
		//$this->login_model->is_logged_global('');
		$this->load->library('session');
	}
	public function index($id="")
	{
		if($id=""){

			if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/riwayat_kontak',
			'view_contact' => $this->riwayat_kontak_model->viewContact(),
			'view_project' => $this->riwayat_kontak_model->viewProject()
		);
	}else{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/riwayat_kontak',
			'view_contact' => $this->riwayat_kontak_model->viewContact($id),
			'view_project' => $this->riwayat_kontak_model->viewProject($id)
		);
	}

		$this->load->view('home',$data);
	}
	public function indexId($id)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/riwayat_kontak',
			'view_contact' => $this->riwayat_kontak_model->viewContactId($id),
			'view_project' => $this->riwayat_kontak_model->viewProjectId($id)
		);

		$this->load->view('home',$data);
	}

	public function search()
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$q = $this->input->post('q');

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/riwayat_kontak', 
			'view_contact' => $this->riwayat_kontak_model->viewContactSearch($q),
			'view_project' => $this->riwayat_kontak_model->viewProjectSearch($q)
		);

		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */