<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafik_keuangan extends CI_Controller {

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
		$this->load->model('grafik_keuangan_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'page' => 'content/grafik-keuangan',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'viewPengeluaranPerBulan' => $this->grafik_keuangan_model->viewPengeluaranPerbulan(),
			'viewPengeluaranPerTahun' => $this->grafik_keuangan_model->viewPengeluaranPertahun(),
			'viewPengeluaranPerProject' => $this->grafik_keuangan_model->viewPengeluaranPerproject(),
			'viewPemasukanPerBulan' => $this->grafik_keuangan_model->viewPemasukanPerbulan(),
			'viewPemasukanPerTahun' => $this->grafik_keuangan_model->viewPemasukanPertahun(),
			'viewHargapPoject' => $this->grafik_keuangan_model->viewHargaproject(),
			'viewPengeluaranProject' => $this->grafik_keuangan_model->viewPengeluaranproject(),
			'viewGajiCrewProject' => $this->grafik_keuangan_model->viewGajiCrewproject()
		);

		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */