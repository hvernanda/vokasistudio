<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class keuangan_vokasi_studios extends CI_Controller {

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
			'page' => 'content/keuangan-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'view' => $this->keuangan_vokasi_model->viewKeuanganVokasi(),
			'viewTabungan' => $this->tabungan_vokasi_studios_model->viewTabungan()
		);

		$this->load->view('home',$data);
	}
	public function TambahDataTransaksiVokasi()
	{ 
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$data = array(
			'page' => 'content/form-data-transaksi-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'namaStaf' => $this->keuangan_vokasi_model->viewUser(),
		);

		$this->load->view('home',$data);
	}
	public function editDataTransaksiVokasi($id)
	{
		if($this->login_model->is_logged_crew('login')  OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'page' => 'content/form-edit-data-transaksi-vokasi-studios',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'view' => $this->keuangan_vokasi_model->viewEdit($id),
			'viewDefisit' => $this->keuangan_vokasi_model->viewEditDefisit($id),
			'namaStaf' => $this->keuangan_vokasi_model->viewUser(),
		);

		$this->load->view('home',$data);
	}
	public function inputDataTransaksiVokasi()
	{ 

		$amnt = $this->input->post('amount');
		$date = $this->input->post('date');
		$keperluan = $this->input->post('keperluan');
		$keterangan = $this->input->post('keterangan');
		$type = $this->input->post('type'); 
		$id_staf_p = $this->input->post('id_staf');
		$status = $this->input->post('status');

		$data = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));
 
		foreach ($data as $row) {
			$id_stf = $row->id_staf;
			// print_r($status);
		} 

		$amount = str_replace('.', '', $amnt);
		
		if ($keterangan == 1) {
			$input = array(
				'name' => $keperluan,
				'amount' => '-'.$amount,
				'total' => 1,
				'date' => $date,
				'id_activity' => 0,
				'id_type' => $type, 
				'id_staf' => $id_stf
			);
			$operration = "pengeluaran vokasi";
		} elseif ($keterangan == 2) {
			$input = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => 1,
				'date' => $date,
				'id_activity' => 0,
				'id_type' => $type, 
				'id_staf' => $id_stf
			);
			$operration = "pemasukan vokasi";
		} 

		if(empty($keterangan) OR empty($amount) OR empty($date) OR empty($type)){
			$this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>'
	        );
			redirect('keuangan_vokasi_studios/TambahDataTransaksiVokasi');
		}else{
			$this->keuangan_vokasi_model->inputDataVokasi($input);
			if (!empty($id_staf_p) OR !empty($status)) {
				$id_saving = $this->db->insert_id();

				$inputPinjam = array(
					'id_staf' => $id_staf_p,
					'status' => $status,
					'id_saving' => $id_saving
				); 
				$this->keuangan_vokasi_model->inputDataDefisitVokasi($inputPinjam);
			}else{
				$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
		              <button type="button" class="close" data-dismiss="alert">
		              <span aria-hidden="true">
		                <div class="glyphicon glyphicon-remove">
		                </div>
		                </span>
		                <span class="sr-only">Close</span>
		              </button>
		            <b>Success!</b> Data tidak boleh kosong </br>
		            </div>'
	            );
				redirect('keuangan_vokasi_studios/TambahDataTransaksiVokasi');
			} 
			
			$this->keuangan_vokasi_model->updateTabunganVokasi($amount, $type, $operration);
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
			redirect('keuangan_vokasi_studios/TambahDataTransaksiVokasi');
		}	
	}
	public function updateTransaksiVokasi($id)
	{ 

		$amnt = $this->input->post('amount');
		$date = $this->input->post('date');
		$keperluan = $this->input->post('keperluan');
		$keterangan = $this->input->post('keterangan');
		$type = $this->input->post('type');
		$oldType = $this->input->post('oldType');
		$status = $this->input->post('status');
		$name = $this->input->post('name');

		$amount = str_replace('.', '', $amnt);

		$data = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));
 
		foreach ($data as $row) {
			$id_stf = $row->id_staf;
			// print_r($status);
		} 
		
		if ($keterangan == 1 AND $oldType == $type) {
			$update = array(
				'name' => $keperluan,
				'amount' => '-'.$amount,
				'total' => 1,
				'date' => $date,
				'id_type' => $type,
				'id_staf' => $id_stf
			);
			$operration = "pengeluaran vokasi";
		} elseif ($keterangan == 2 AND $oldType == $type) {
			$update = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => 1,
				'date' => $date,
				'id_type' => $type,
				'id_staf' => $id_stf
			);
			$operration = "pemasukan vokasi";
		}elseif ($keterangan == 2 AND $oldType != $type) {
			$update = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => 1,
				'date' => $date,
				'id_type' => $type, 
				'id_staf' => $id_stf
			);
			$operration = "update pemasukan vokasi";
		} elseif ($keterangan == 1 AND $oldType != $type) {
			$update = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => 1,
				'date' => $date,
				'id_type' => $type, 
				'id_staf' => $id_stf
			);
			$operration = "update pengeluaran vokasi";
		} 

		if(empty($keterangan) OR empty($amount) OR empty($date) OR empty($type)){
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
			redirect('keuangan_vokasi_studios/editDataTransaksiVokasi/'.$id);
		}else{
			
			if (!empty($name)) {
				$updateDefisit = array(
					'name' => $name,
					'status' => $status
				);

				$this->keuangan_vokasi_model->updateDefisitVokasi($updateDefisit, $id);
			}

			$this->keuangan_vokasi_model->updatePengeluaranVokasi($update, $id);
			$this->keuangan_vokasi_model->updateTabunganVokasi($amount, $type, $operration);
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
			redirect('keuangan_vokasi_studios/editDataTransaksiVokasi/'.$id);
		}	
	}
	public function updatePemasukanVokasi($id)
	{
 
		$amount = $this->input->post('amount');
		$date = $this->input->post('date');
		$keterangan = $this->input->post('keterangan');
		$type = $this->input->post('type');

		$update = array(
			'name' => $keterangan,
			'amount' => $amount,
			'date' => $date,
			'id_type' => $type
		);
		if(empty($keterangan) OR empty($amount) OR empty($date) OR empty($type)){
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
			redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
		}else if(!is_numeric($amount)){
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
			redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
		}elseif($amount < 1){
			$this->session->set_flashdata('msgfalsevokasi','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> data tidak boleh negatif atau nol </br>
	            </div>');
			redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
		}else{
			$this->keuangan_vokasi_model->updatePemasukanVokasi($update, $id);
			$this->keuangan_vokasi_model->updateTabunganVokasi($amount, $type, 'pemasukan vokasi');
			$this->session->set_flashdata('msgtruevokasi','<div class="alert alert-success">
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
			redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
		}	
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */