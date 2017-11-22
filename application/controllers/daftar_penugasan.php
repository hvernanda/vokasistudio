<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftar_penugasan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('m_daftar_penugasan');
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
			'page' 	=> 'content/daftar_penugasan',
			'data' 	=> $this->m_login->ambil_user($id),
			'isi' 	=> $this->m_daftar_penugasan->tampilPenugasan($this->session->userdata('id_project')),
			'crew' 	=> $this->m_daftar_penugasan->getCrew($this->session->userdata('id_project')),
		);
		// print_r($data['isi']);
		$this->load->view('home', $data);
	}
	
	public function namaJob(){
		$data['hasil'] = $this->m_daftar_penugasan->namaJob()->result;
	}

	public function namaKru(){

		$ambil_id = $this->session->userdata('id_project');
		$data['hasil2'] = $this->m_daftar_penugasan->namaKru($ambil_id)->result;
	}

	public function penugasan(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		$ambil_id = $this->session->userdata('id_project');
		$a = $this->m_daftar_penugasan->namaJob()->result();
		$b = $this->m_daftar_penugasan->namaKru($ambil_id)->result();
		$data = array(
			'page' => 'content/form_penugasan',
			'data' => $this->m_login->ambil_user($id),
			'hasil' => $a,
			'hasil2' => $b
		);
		$this->load->view('home',$data);
	}

	public function inputData(){
		
		if(empty($this->input->post('id_crew')) OR empty($this->input->post('id_job'))
			OR empty($this->input->post('upah')) OR empty($this->input->post('namaJob'))){

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
			redirect('Daftar_penugasan/penugasan');
		
		}else{
			$date = null;
				if ($this->input->post('diterima')=="") {
			// echo('asdasd');
			$date = date("Y-m-d");
		}
			else{
				$date = $this->input->post('diterima');
			}
				$st=1;
				$count = count($this->input->post('id_crew'));
				$this->db->trans_begin();
				foreach ($this->input->post('id_crew') as $row) {
					print_r($row);
					$data = array(
						'id_job' => $this->input->post('id_job'),
						'id_crew' => $row,
						'acceptanceDate' => $date,
						'deadline' => $this->input->post('deadline'),
						'name' => $this->input->post('namaJob'),
						'fee' => $this->input->post('upah')
						);
					$q = $this->m_daftar_penugasan->inputDataPenugasan($data);
					if($q !=1)$st=0;
				}
				if ($this->db->trans_status() === FALSE){

			       		$this->db->trans_rollback();
			       		echo 'gagal';
				}
			else{
	        		$this->db->trans_commit();
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
	        		redirect('daftar_penugasan');
			}
		} 

		$date = null;
		if ($this->input->post('diterima')=="") {
			// echo('asdasd');
			$date = date("Y-m-d");
		}
		else{
			$date = $this->input->post('diterima');
		}
		$st=1;
		$count = count($this->input->post('id_crew'));
		$this->db->trans_begin();
		foreach ($this->input->post('id_crew') as $row) {
			print_r($row);
			$data = array(
				'id_job' => $this->input->post('id_job'),
				'name' => $this->input->post('name'),
				'id_crew' => $row,
				'acceptanceDate' => $date,
				'deadline' => $this->input->post('deadline'),
				'name' => $this->input->post('namaJob'),
				'fee' => $this->input->post('upah')
				);
			$q = $this->m_daftar_penugasan->inputDataPenugasan($data);
			if($q !=1)$st=0;
		}
		if ($this->db->trans_status() === FALSE){

	       		$this->db->trans_rollback();
	       		echo 'gagal';
		}
		else{
        		$this->db->trans_commit();
        		redirect('daftar_penugasan');
		}
	}

	public function setScore()
	{

		$data =	array(
			'rating' => $this->input->post('_val'),
		);

		$q = $this->m_daftar_penugasan->setScore($this->input->post('_id'),$data);
		if($q==1){
			echo $this->input->post('_val');
		}else{
			echo 'failed';
		}

	}

	public function setFee()
	{
		$data = array(
			'fee' => $this->input->post('_val'),
		);

		$a = $this->m_daftar_penugasan->setFee($this->input->post('_id'),$data);
		if($a==1){
			echo $this->input->post('_val');
		}else{
			echo 'failed';
		}
	}

	public function getFee()
	{
		# code...
		// print_r($this->input->post('_name'));
		// echo 'halo';
		// echo $this->input->post('_name');

		$a = $this->m_daftar_penugasan->getFee($this->input->post('_name'));
		if($a->num_rows() < 1 ){
			echo 'fail';
		}else{
			
			echo json_encode($a->result())  ;
		}
	}

	public function getScore()
	{
		$a = $this->m_daftar_penugasan->getScore($this->input->post('_score'));
		if($a->num_rows() < 1 ){
			echo 'fail';
		}else{
			
			echo json_encode($a->result())  ;
		} 
	}
}
