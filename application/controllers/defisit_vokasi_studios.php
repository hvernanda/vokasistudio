<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class defisit_vokasi_studios extends CI_Controller {

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
		$this->load->model('keuangan_vokasi_model','',true);
		$this->load->model('tabungan_vokasi_studios_model','',true);
		$this->load->model('defisit_vokasi_model','',true);
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
			'page' => 'content/defisit-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'view' => $this->defisit_vokasi_model->viewDefisitVokasi()
		);

		$this->load->view('home',$data);
	}
	public function bayar($id)
	{
		$returnDate = date('Y-m-d');
		$status = 'sudah dibayar'; 

		$update = array(
			'returnDate' => $returnDate, 
			'status' => $status
		);

		$this->defisit_vokasi_model->updatePembayaran($update, $id); 
		$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">
                <div class="glyphicon glyphicon-remove">
                </div>
                </span>
                <span class="sr-only">Close</span>
              </button>
            <b>Success!</b> Data berhasil di input</br>
            </div>'
            );
		redirect('defisit_vokasi_studios'); 
	}
	public function TambahDataDefisitVokasi()
	{ 
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'page' => 'content/form-defisit-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
		);

		$this->load->view('home',$data);
	}
	public function editDatadefisitVokasi($id)
	{
		if($this->login_model->is_logged_crew('login')  OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'page' => 'content/form-edit-defisit-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'view' => $this->defisit_vokasi_model->viewEdit($id)
		);

		$this->load->view('home',$data);
	}
	public function inputDataDefisitVokasi()
	{ 

		$name = $this->input->post('name');
		$amnt = $this->input->post('amount');
		$borrowDate = $this->input->post('borrowDate');
		$keperluan = $this->input->post('info'); 

		$amount = str_replace('.', '', $amnt); 

		$input = array(
			'name' => $name,
			'amount' => $amount, 
			'borrowDate' => $borrowDate,
			'status' => 'belum dibayar',
			'info' => $keperluan 
		);

		if(empty($name) OR empty($amount) OR empty($borrowDate) OR empty($keperluan)){
			$this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>');
			redirect('defisit_vokasi_studios/TambahDataDefisitVokasi');
		}else{
			$this->defisit_vokasi_model->inputDataVokasi($input); 
			$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di input</br>
	            </div>'
	            );
			redirect('defisit_vokasi_studios/TambahDataDefisitVokasi');
		}	
	}
	public function updateDefisitVokasi($id)
	{ 

		$name = $this->input->post('name');
		$amnt = $this->input->post('amount');
		$borrowDate = $this->input->post('borrowDate');
		$keperluan = $this->input->post('info'); 

		$amount = str_replace('.', '', $amnt); 

		$update = array(
			'name' => $name,
			'amount' => $amount, 
			'borrowDate' => $borrowDate, 
			'info' => $keperluan 
		);

		if(empty($name) OR empty($amount) OR empty($borrowDate) OR empty($keperluan)){
			$this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>');
			redirect('defisit_vokasi_studios/editDatadefisitVokasi/'.$id);
		}else{
			$this->defisit_vokasi_model->updateDefisitVokasi($update, $id); 
			$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di input</br>
	            </div>'
	            );
			redirect('defisit_vokasi_studios/editDatadefisitVokasi/'.$id);
		}	
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */