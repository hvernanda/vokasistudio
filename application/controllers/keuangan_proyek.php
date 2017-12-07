<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class keuangan_proyek extends CI_Controller {

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
		$this->load->model('keuangan_proyek_model','',true);
		$this->load->model('keuangan_vokasi_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_manajer_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id = $row->id_project;
			// print_r($status);
		}

		$data = array(
			'view' => $this->keuangan_proyek_model->viewPengeluaran($id),
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'viewPemasukanPoject' => $this->keuangan_proyek_model->viewPemasukan($id),
			'viewPengeluaranProject' => $this->keuangan_proyek_model->viewPengeluaranproject($id),
			'viewGajiCrewProject' => $this->keuangan_proyek_model->viewGajiCrewproject($id),
			'page' => 'content/keuangan-proyek'
		);

		$this->load->view('home',$data);
	}
	public function pengeluaran()
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_manajer_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id = $row->id_project;
			// print_r($status);
		} 

		$data = array(
			'page' => 'content/form-tambah-data-transaksi-proyek',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'activity' => $this->keuangan_proyek_model->getActivity($id)
		);

		$this->load->view('home',$data);
	}
	public function edit($id)
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_manajer_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}
		$data = array(
			'view' => $this->keuangan_proyek_model->viewEditPengeluaran($id),
			'page' => 'content/form-edit-data-transaksi-proyek',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status')
		);

		$this->load->view('home',$data);
	}
	public function inputData()
	{

		$keperluan = $this->input->post('keperluan');
		$amnt = $this->input->post('amount');
		$total = $this->input->post('total');
		$date = $this->input->post('date');
		$keterangan = $this->input->post('keterangan');
		$type = $this->input->post('type');
		$oldType = $this->input->post('oldType');
		$id_activity = $this->input->post('aktivitas');

		$amount = str_replace('.', '', $amnt);
		$jumlah = $amount * $total;

		$data = $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password'));
 
		foreach ($data as $row) {
			$id_stf = $row->id_staf;
			// print_r($status);
		} 

		if ($keterangan == 1 AND $oldType == $type) {
			$input = array(
				'name' => $keperluan,
				'amount' => '-'.$amount,
				'total' => $total,
				'date' => $date,
				'id_type' => $type,
				'id_activity' => $id_activity,
				'id_staf' => $id_stf
			);
			$operration = "pengeluaran proyek";
		} elseif ($keterangan == 2 AND $oldType == $type) {
			$input = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => $total,
				'date' => $date,
				'id_type' => $type,
				'id_activity' => $id_activity,
				'id_staf' => $id_stf
			);
			$operration = "pemasukan proyek";
		} elseif ($keterangan == 2 AND $oldType != $type) {
			$input = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => $total,
				'date' => $date,
				'id_type' => $type,
				'id_activity' => $id_activity,
				'id_staf' => $id_stf
			);
			$operration = "update pemasukan proyek";
		} elseif ($keterangan == 1 AND $oldType != $type) {
			$input = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => $total,
				'date' => $date,
				'id_type' => $type,
				'id_activity' => $id_activity,
				'id_staf' => $id_stf
			);
			$operration = "update pengeluaran proyek";
		}

		if(empty($keperluan) OR empty($amount) OR empty($total) OR empty($date) OR empty($type)){
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
			redirect('keuangan_proyek/pengeluaran');
		}else if(!is_numeric($total) OR !is_numeric($amount)){
			$this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Format angka salah </br>
	            </div>');
			redirect('keuangan_proyek/pengeluaran');
		}elseif($total < 1 OR $amount < 1){
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
			redirect('keuangan_proyek/pengeluaran');
		}else{
			$this->keuangan_proyek_model->inputDataTransaksiProyek($input);
			$this->keuangan_vokasi_model->updateTabunganVokasi($jumlah, $type, $operration);
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
			redirect('keuangan_proyek/pengeluaran');
		} 
	}
	public function updateData($id)
	{
		$keperluan = $this->input->post('keperluan');
		$amnt = $this->input->post('amount');
		$total = $this->input->post('total');
		$date = $this->input->post('date');
		$keterangan = $this->input->post('keterangan');
		$type = $this->input->post('type');

		$amount = str_replace('.', '', $amnt);
		$jumlah = $amount * $total;
		
		if ($keterangan == 1) {
			$update = array(
				'name' => $keperluan,
				'amount' => '-'.$amount,
				'total' => $total,
				'date' => $date,
				'id_type' => $type
			);
		} elseif ($keterangan == 2) {
			$update = array(
				'name' => $keperluan,
				'amount' => '+'.$amount,
				'total' => $total,
				'date' => $date,
				'id_type' => $type
			);
		}

		if(empty($keperluan) OR empty($amount) OR empty($total) OR empty($date) OR empty($type) OR empty($keterangan)){
			$this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>');
			redirect('keuangan_proyek/edit/'.$id);
		}else if(!is_numeric($total) OR !is_numeric($amount)){
			$this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Format angka salah </br>
	            </div>');
			redirect('keuangan_proyek/edit/'.$id);
		}elseif($total < 1 OR $amount < 1){
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
			redirect('keuangan_proyek/edit/'.$id);
		}else{
			$this->keuangan_proyek_model->UpdateDataTransaksiProyek($update, $id);
			
			if ($keterangan == 1) {
				$this->keuangan_vokasi_model->updateTabunganVokasi($jumlah, $type, 'pengeluaran project');
			} elseif ($keterangan == 2) {
				$this->keuangan_vokasi_model->updateTabunganVokasi($jumlah, $type, 'pemasukan project');
			}
			
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
			redirect('keuangan_proyek/edit/'.$id);
		} 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
