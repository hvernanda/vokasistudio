<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_keuangan_proyek extends CI_Controller {

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
		$this->load->model('riwayat_keuangan_proyek_model','',true);
		$this->load->model('keuangan_proyek_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{
		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id = $row->id_project;
			// print_r($status);
		}

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'view' => $this->riwayat_keuangan_proyek_model->viewProject(),
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/riwayat-keuangan-proyek'
		);

		$this->load->view('home',$data);
	}
	public function detail($id)
	{

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id_pryk = $row->id_project;
			// print_r($status);
		}

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR ($id != $id_pryk AND  $this->session->userdata('status') == 'manajer proyek'))
		{
			show_404();
		}


		$data = array(
			'view' => $this->riwayat_keuangan_proyek_model->viewRiwayatProject($id),
			'viewKeuangan' => $this->riwayat_keuangan_proyek_model->viewKeuanganProject($id),
			'viewTransaksi' => $this->riwayat_keuangan_proyek_model->viewTransaksi($id),
			'viewPemasukan' => $this->riwayat_keuangan_proyek_model->viewPemasukanp($id),
			'viewTotalPengeluaran' => $this->riwayat_keuangan_proyek_model->viewPengeluaranPerproject($id),
			'viewTotalHonor' => $this->riwayat_keuangan_proyek_model->viewHonor($id),
			'viewTotalPemasukan' => $this->riwayat_keuangan_proyek_model->viewPemasukan($id),
			'viewAmount' => $this->riwayat_keuangan_proyek_model->viewamount($id), 
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'id' => $id,
			'page' => 'content/riwayat-keuangan-proyek-detail'
		);

		$this->load->view('home',$data);
	}
	public function printPage($id)
	{

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id_pryk = $row->id_project;
			// print_r($status);
		}

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR ($id != $id_pryk AND  $this->session->userdata('status') == 'manajer proyek'))
		{
			show_404();
		}


		$data = array(
			'view' => $this->riwayat_keuangan_proyek_model->viewRiwayatProject($id),
			'viewKeuangan' => $this->riwayat_keuangan_proyek_model->viewKeuanganProject($id),
			'viewPengeluaran' => $this->riwayat_keuangan_proyek_model->viewPengeluaran($id),
			'viewPemasukan' => $this->riwayat_keuangan_proyek_model->viewPemasukanp($id),
			'viewTotalPengeluaran' => $this->riwayat_keuangan_proyek_model->viewPengeluaranPerproject($id),
			'viewTotalHonor' => $this->riwayat_keuangan_proyek_model->viewHonor($id),
			'viewTotalPemasukan' => $this->riwayat_keuangan_proyek_model->viewPemasukan($id),
			'viewAmount' => $this->riwayat_keuangan_proyek_model->viewamount($id),
			'viewAmountP' => $this->riwayat_keuangan_proyek_model->viewamountp($id),
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'id' => $id,
			'page' => 'content/riwayat-keuangan-proyek-detail-print'
		);

		$this->load->view('home',$data); 
	}
}