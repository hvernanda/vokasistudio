<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_penugasan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('m_master_penugasan');
        $this->load->library('session');
        $this->load->model('m_login');

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
		// print_r($this->session->userdata('id_project'));exit;
		$data = array(
			'page' => 'content/master_penugasan',
			'data' => $this->m_login->ambil_user($id),
			'isi' => $this->m_master_penugasan->tampilJob($this->session->userdata('id_project')),
		);
		$this->load->view('home', $data);
	}
	public function form_tambah_penugasan(){
		$data = array(
			'tugas' => $this->input->post('tugas')
		);
		$data2 = array(
			'page' => 'content/form_tambah_penugasan'
		);
		$data['isi']		= $this->penugasan_model->tambahJob($data);

		$this->load->view('home',$data2);
	}

	
	public function tambahJob(){
		$job = $this->input->post('job');
		$data = array(
			'name' => $this->input->post('job')
			);
		// return $this->input->post('job');
		// print_r($this->input->post());
		// print_r($this->m_master_penugasan->tambahJob($data));
		
		 if(empty($job)){
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
			redirect('master_penugasan');
		
		}else{
		
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
			if ($this->m_master_penugasan->tambahJob($data)==1) {
		 	redirect('master_penugasan');
		 } 
		} 
	}

	public function edit($id_j){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$a = $this->m_master_penugasan->tampilEditJob($id);
		$data = array(
				'view' =>$this->m_master_penugasan->tampilEditJob($id_j),
				'page' => 'content/form_edit_penugasan',
				'data' => $this->m_login->ambil_user($id)
			);
		$this->load->view('home',$data);
	}
	public function prosesEdit(){
		$name = $this->input->post('name');
		$id = $this->input->post('id_job');
		$data = array(
			'name' => $name
			);
		if(empty($name)){
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
			redirect('master_penugasan');
		
		}else{
			$a = $this->m_master_penugasan->update('job', $data, $id);
		// print_r($a);
		
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di Edit</br>
	            </div>'
	            );
			if($a>=1){
			redirect('master_penugasan');
		}
		} 
		// if(empty($name)){
		// 	$this->session->set_flashdata(
		// 		'msgfalse',
		// 		'<div class="callout callout-danger">
		// 			<h4>Tugas harus diisi</h4>
		// 		</div>');
		// 	redirect('master_penugasan');
		// }
		// else{
		// 	$this->session->set_flashdata(
		// 		'msgtrue',
		// 		'<div class="callout callout-success">
		// 			<h4>Tugas berhasil diubah</h4>
		// 		</div>');
		// 	redirect('master_penugasan');
		// }
		
	}
	public function delete($key){
		$this->m_master_penugasan->getdelete($key);
		redirect('master_penugasan');
	}

	public function inputData(){
		$name = $this->input->post('name');
		$id_crew = $this->input->post('id_crew');
		$acceptance = $this->input->post('diterima');
		$deadline = $this->input->post('deadline');

		$data = array (
			'name' => $name,
			'id_crew' => $id_crew,
			'acceptanceDate' => $acceptance,
			'deadline' => $deadline
			);
		// print_r($data);
	if(empty($name) OR empty($id_crew) OR empty($acceptance) OR empty($deadline)){
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
			redirect('Penugasan/tambahPenugasan');
		
		}else{
			$this->db->insert('jobassignment', $data);
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
			redirect('Penugasan/tambahPenugasan');
		} 
	}
}
