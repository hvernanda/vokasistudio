<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aktivitas extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('aktivitas_model');
        		$this->load->model('m_login');
	    $this->load->helper(array('url','download','path'));

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
			'page' => 'content/Aktivitas',
			'isi' => $this->aktivitas_model->tampilAktPersonal($id,$ambil_id),
			'data' => $this->m_login->ambil_user($id)
		);
		
		$this->load->view('home',$data);
	}
	public function detail($id){
		$data = array(
			'page' => 'content/Aktivitas',
			'isi' => $this->aktivitas_model->tampilDetailAkt($id)
		);
		
		$this->load->view('home',$data);
	}
	public function form_activity(){
		$data = array(
			'Aktivitas' => $this->input->post('aktivitas')
		);
		$data2 = array(
			'page' => 'content/form_activity',
			'data' => $this->m_login->ambil_user($id)
		);
		$data['isi']		= $this->aktivitas_model->tambahAkt($data);

		$this->load->view('home',$data2);
	}

	public function tambahAktivitas(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$c = $this->session->userdata('id_project');
		$a = $this->aktivitas_model->namaAkt($id, $c);
		// $b = $this->penugasan_model->viewJob()->result();
		$data = array(
			'page' => 'content/form_activity',
			'ini' => $a,
			'data' => $this->m_login->ambil_user($id)
			// 'hasil2' => $b
		);
		$this->load->view('home',$data);
	}

	public function form_upload(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$data = array(
			'page' => 'content/form_upload',
			'data' => $this->m_login->ambil_user($id)
			);
		$this->load->view('home', $data);
	}

	public function do_upload(){
		$id = $this->input->post('id_activity');

		$config['upload_path'] = "./file";
		// echo $config['upload_path'] ;
		$config['allowed_types'] = 'gif|jpg|png|JPEG|pdf|docx';
		$config['file_name'] = url_title($this->input->post('file_upload'));

		$this->upload->initialize($config);
		if( !$this->upload->do_upload('file_upload'))
		{
			$this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> File tidak boleh kosong </br>
	            </div>');
			redirect('aktivitas');
		}
		else{
			$update = array(
				'uploadFile' 	=> $this->upload->file_name,
				);
			
			$this->aktivitas_model->getupdate($id, $update);
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di Upload</br>
	            </div>'
	            );
			redirect('aktivitas');
		}
	}

	public function inputData(){
		$penugasan = $this->input->post('penugasan');
		$aktivitas = $this->input->post('aktivitas');
		// $date = $this->input->post('date');
		// $start = $this->input->post('start');
		// $finish = $this->input->post('finish');
		$informasi = $this->input->post('informasi');
		$lokasi_file = $this->input->post('lokasi_file');
		$lokasi_backup = $this->input->post('lokasi_backup');
		$upload_file = $this->input->post('upload_file');

		$input = array (
			'id_jobassignment' => $penugasan,
			'name' => $aktivitas,
			// 'date' => $date,
			// 'startTime' => $start,
			// 'finishTime' => $finish,
			'information' => $informasi,
			'fileLocation' => $lokasi_file,
			'fileBackupLocation' => $lokasi_backup,
			'uploadFile' => $upload_file
			);
 
	if(empty($penugasan) OR empty($aktivitas)){
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
			redirect('Aktivitas');
		
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
			redirect('Aktivitas');
		} 
	}

	public function setEndTime()
	{
		// print_r($this->input->post());

		date_default_timezone_set("Asia/Jakarta");
		$now 	= date('Y-m-d H:i:s');
		$now2	= date('H:i:s');
		$data 	= array(
				'finishTime' => $now,
			);

		$query = $this->aktivitas_model->setEndTime($this->input->post('_id'),$data);
		if($query==1)echo $now2;
		else echo 'failed';
		// print_r($now);
	}
	public function setLokasi()
	{
		$komputer = $this->input->post('komputer');
		$lokasi_file = $this->input->post('lokasi');
		$lokasi_backup = $this->input->post('backup');
		$data = array (
			'komputer' => $komputer,
			'fileLocation' => $lokasi_file,
			'fileBackupLocation' => $lokasi_backup
			);
		if(empty($komputer) OR empty($lokasi_file) OR empty($lokasi_backup)){
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
			redirect('Aktivitas');
		}else{
		$this->aktivitas_model->setLokasi($this->input->post('id_act'),$data);
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
		 	redirect('Aktivitas');
	}
}
}
