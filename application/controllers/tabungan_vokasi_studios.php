<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tabungan_vokasi_studios extends CI_Controller {

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
		$this->load->model('tabungan_vokasi_studios_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{
		if($this->login_model->is_logged_crew('login')OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'page' => 'content/tabungan-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'view' => $this->tabungan_vokasi_studios_model->viewTabungan()
		);

		$this->load->view('home',$data);
	}
	public function perbaharui()
	{
		if($this->login_model->is_logged_crew('login')OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'page' => 'content/form-tabungan-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'view' => $this->tabungan_vokasi_studios_model->viewTabungan()
		);

		$this->load->view('home',$data);
	}
	public function updateTabunganVokasi()
	{
		
		$oldTabungan = $this->input->post('oldTabungan');
		$tabungan = $this->input->post('tabungan');
		$OldCash = $this->input->post('oldCash');
		$cash = $this->input->post('cash');

		if ($oldTabungan != $tabungan AND $oldCash != $cash) {
			$update1 = array(
				'amount' => $tabungan
			);
			$update2 = array(
				'amount' => $cash
			);

		}elseif ($oldTabungan != $tabungan) {
			$id = 1;
			$update = array(
				'amount' => $tabungan
			);

		}elseif ($oldCash != $cash) {
			$id = 2;
			$update = array(
				'amount' => $cash
			);
		}
		
		if(empty($tabungan) OR empty($cash)){
			$this->session->set_flashdata('msgfalsevokasi','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>');
			redirect('tabungan_vokasi_studios/perbaharui');
		}else if(!is_numeric($tabungan) OR !is_numeric($cash)){
			$this->session->set_flashdata('msgfalsevokasi','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Format angka salah </br>
	            </div>');
			redirect('tabungan_vokasi_studios/perbaharui');
		}elseif($tabungan < 1 OR $cash < 1){
			$this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> data tidak boleh negatif atau nol </br>
	            </div>');
			redirect('tabungan_vokasi_studios/perbaharui');
		}else{
			if ($oldTabungan != $tabungan AND $oldCash != $cash) {
				$this->tabungan_vokasi_studios_model->updateTabunganVokasi($update1, 1);
				$this->tabungan_vokasi_studios_model->updateTabunganVokasi($update2, 2);
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
				redirect('tabungan_vokasi_studios/perbaharui');
			}else{
				$this->tabungan_vokasi_studios_model->updateTabunganVokasi($update, $id);
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
				redirect('tabungan_vokasi_studios/perbaharui');
			}
		} 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */