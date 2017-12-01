<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_klien extends CI_Controller {

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
		$this->load->model('riwayat_klien_model','',true);
		//$this->login_model->is_logged_global('');
		$this->load->library('session');
	}
	public function index($id="")
	{
	if($id==""){ 

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'page' => 'content/riwayat_klien', 
			'view_company' => $this->riwayat_klien_model->viewCompany($id),
			'view_contact' => $this->riwayat_klien_model->viewContact($id),
			'view_project' => $this->riwayat_klien_model->viewProject($id),
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status')
		);
	}else{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			
			'page' => 'content/riwayat_klien', 
			'view_company' => $this->riwayat_klien_model->viewCompanyId($id),
			'view_contact' => $this->riwayat_klien_model->viewContact($id),
			'view_project' => $this->riwayat_klien_model->viewProject($id),
			'id' => $id,
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status')
		);

	}

		$this->load->view('home',$data);
	}
	public function search()
	{
		$q = $this->input->post('q');

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/riwayat_klien', 
			'view_company' => $this->riwayat_klien_model->viewCompanySearch($q),
			'view_contact' => $this->riwayat_klien_model->viewContactSearch($q),
			'view_project' => $this->riwayat_klien_model->viewProjectSearch($q)
		);

		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */