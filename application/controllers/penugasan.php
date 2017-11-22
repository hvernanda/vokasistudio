f

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penugasan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('penugasan_model');
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
			'page' => 'content/penugasan',
			'data' => $this->m_login->ambil_user($id),
			'isi' => $this->penugasan_model->tampilKru($this->session->userdata('id_project')),
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
		$data['isi']		= $this->penugasan_model->tambahKru($data);

		$this->load->view('home',$data2);
	}

	public function tambahPenugasan(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$a = $this->penugasan_model->namaKru()->result();
		// $b = $this->penugasan_model->viewJob()->result();
		$data = array(
			'page' => 'content/form_tambah_penugasan',
			'data' => $this->m_login->ambil_user($id),
			'hasil' => $a,
			// 'hasil2' => $b
		);
		$this->load->view('home',$data);
	}

	public function namaKru(){
		$data['hasil'] = $this->penugasan_model->namaKru()->result;
	}

	public function edit($id_j){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$a = $this->penugasan_model->tampilEditPenugasan($id);
		$data = array(
				'view' =>$this->penugasan_model->tampilEditPenugasan($id_j),
				'page' => 'content/form_edit_penugasan',
				'data' => $this->m_login->ambil_user($id),
				'hasil' => $a
			);
		$this->load->view('home',$data);
	}
	public function prosesEdit(){
		$name = $_POST['name'];
		$id_crew = $_POST['id_crew'];
		$acceptance = $_POST['diterima'];
		$deadline = $_POST['deadline'];
		$id = $_POST['id'];
		$data = array(
			'name' => $name,
			'id_crew' => $id_crew,
			'acceptanceDate' => $acceptance,
			'deadline' => $deadline
			);
		$a = $this->penugasan_model->update('jobassignment', $data, $id);
		if($a>=1){
			redirect('Penugasan');
		}
	}
	public function delete($key){
		$this->penugasan_model->getdelete($key);
		redirect('penugasan');
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
			redirect('daftar_penugasan/');
		
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
