<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aktivitasm extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('aktivitas_model');
	        		$this->load->model('m_login');
	        $this->load->helper(array('url','download'));	

		if($this->session->userdata('user_is_logged_in')==''){
			$this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
											<button type='button' class='close' data-dismiss='alert'>x</button>
											<class='fa fa-thumbs-up'> Silahkan Login Kembali ! ");
		redirect('login');
		}
        
    }
    public function index(){
    	if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$ambil_id = $this->session->userdata('id_project');
		$data = array(
			'page' => 'content/Aktivitasm',
			'isi' => $this->aktivitas_model->tampilAkt($ambil_id),
			'data' => $this->m_login->ambil_user($id)
		);
		//print_r($data['isi']);exit;
		$this->load->view('home',$data);
	}
	public function lokasi($id){
		$data = array(
			'page' => 'content/Aktivitasm',
			'lokasi' => $this->aktivitas_model->tampilLokasi($id, $ambil_id)
		);
		
		$this->load->view('Aktivitasm',$data);
	}
	public function download($id){
		$fileInfo = $this->aktivitas_model->download($id);
		// print_r($fileInfo[0]->download);
		$file = 'file/' .$fileInfo[0]->download;
		print_r($file);
		force_download($file, NULL);
	}
	public function detail($id){
		$data = array(
			'page' => 'content/Aktivitasm',
			'isi' => $this->aktivitas_model->tampilDetailAkt($id)
		);
		
		$this->load->view('home',$data);
	}
	public function form_activity(){
		$data = array(
			'Aktivitas' => $this->input->post('aktivitas')
		);
		$data2 = array(
			'page' => 'content/form_activity'

		);
		$data['isi']		= $this->aktivitas_model->tambahAkt($data);

		$this->load->view('home',$data2);
	}

	public function tambahAktivitas(){
		$a = $this->aktivitas_model->namaAkt()->result();
		// $b = $this->penugasan_model->viewJob()->result();
		$data = array(
			'page' => 'content/form_activity',
			'ini' => $a,
			// 'hasil2' => $b
		);
		$this->load->view('home',$data);
	}
	

	public function inputData(){
		$penugasan = $this->input->post('penugasan');
		$aktivitas = $this->input->post('aktivitas');
		$date = $this->input->post('date');
		$start = $this->input->post('start');
		$finish = $this->input->post('finish');
		$informasi = $this->input->post('informasi');
		$lokasi_file = $this->input->post('lokasi_file');
		$lokasi_backup = $this->input->post('lokasi_backup');
		$upload_file = $this->input->post('upload_file');

		$input = array (
			'id_jobassignment' => $penugasan,
			'name' => $aktivitas,
			'date' => $date,
			'startTime' => $start,
			'finishTime' => $finish,
			'information' => $informasi,
			'fileLocation' => $lokasi_file,
			'fileBackupLocation' => $lokasi_backup,
			'uploadFile' => $upload_file
		);


	if(empty($penugasan) OR empty($aktivitas) OR empty($date) OR empty($start) OR empty($finish) OR empty($informasi) OR empty($lokasi_file) OR empty($lokasi_backup) OR empty($upload_file)){
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
			redirect('Aktivitasm/tambahAktivitas');
		
		}else{
			$this->aktivitas_model->tambahAkt($input);
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
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
			redirect('Aktivitasm/tambahAktivitas');
		} 
	}

	public function tambahKomen($id_activity){
		$komen = $this->input->post('commentByManager');

		$data = array(
			'commentByManager' => $komen
			);
		
		if(empty($komen)){
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
			redirect('Aktivitasm');
		}else{
			$this->aktivitas_model->tambahKomen($id_activity,$data);
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di tambah</br>
	            </div>'
	            );
			redirect('Aktivitasm');
		 } 
	}

	public function setKomen(){
		// var_dump($this->input->post();
		$komen = $this->input->post('_val');
		if($komen==''||$komen==null)echo 'failed';
		else{

			$data = array(
				'commentByManager' => $komen
				);
			$insert = $this->aktivitas_model->tambahKomen($this->input->post('_id'), $data);
			// var_dump($insert);
			if($insert){
				echo $komen;
				// echo 'success';
			}
			else echo 'failed';

		}

	}
}
