<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_honor_kru extends CI_Controller {

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
		$this->load->model('riwayat_honor_kru_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{

		$data = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));
 
		foreach ($data as $row) {
			$id = $row->id_staf;
			// print_r($status);
		} 


		if($this->login_model->is_logged_keuangan_proyek('login')  OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		} elseif ($this->session->userdata('status') == "crew") {
			redirect('riwayat_honor_kru/detail/'.$id);
		}

		$data = array(
			'page' => 'content/riwayat-honor-kru',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'view' => $this->riwayat_honor_kru_model->viewKru(),
		);

		$this->load->view('home',$data);
	}
	public function manajer()
	{	
		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id = $row->id_project;
			// print_r($status);
		}
		
		if($this->login_model->is_logged_keuangan_proyek('login') OR $this->session->userdata('status') == "crew")
		{
			show_404();
		} 
		$data = array(
			'page' => 'content/riwayat-honor-kru',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'view' => $this->riwayat_honor_kru_model->viewKruProyek($id),
		);

		$this->load->view('home',$data);
	}
	public function detail($id)
	{
		$id_staf = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));

		foreach ($id_staf as $row) {
			$id_crew = $row->id_staf;
		}

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id_proy = $row->id_project;
			// print_r($status);
		}
		
		$check=1;

		if ($this->session->userdata('status') == "manajer proyek") {
			$check = $this->riwayat_honor_kru_model->checkKru($id,$id_proy);
		}
		
		if($this->login_model->is_logged_keuangan_proyek('login'))
		{
			show_404();
		}elseif (($id != $id_crew AND $this->session->userdata('status') == "crew") OR ($check == 0 AND $this->session->userdata('status') == "manajer proyek")) {
			show_404();
		}elseif ($this->session->userdata('status') == "manajer proyek" OR $this->session->userdata('status') == "staf keuangan vokasi" OR $this->session->userdata('status') == "crew") {

			$data = array(
				'page' => 'content/riwayat-honor-kru-detail',
				'id' => $id,
				'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
				'status' => $this->session->userdata('status'),
				'view' => $this->riwayat_honor_kru_model->viewRiwayatHonor($id),
				'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
				'viewNama' => $this->riwayat_honor_kru_model->viewNamaKru($id)
			);

			$this->load->view('home',$data);

		}
		
	}
	public function updatePembayaranKru($id,$id_staf)
	{
		$date = $this->input->post('date');

		$update = array(
			'paymentDate' => $date
		);

		$this->riwayat_honor_kru_model->updatePembayaranKru($update, $id);
		$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">
                <div class="glyphicon glyphicon-remove">
                </div>
                </span>
                <span class="sr-only">Close</span>
              </button>
            <b>Success!</b> Data berhasil di update</br>
            </div>'
            );
		redirect('riwayat_honor_kru/detail/'.$id_staf);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */