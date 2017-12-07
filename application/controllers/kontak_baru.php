<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak_baru extends CI_Controller {

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
		$this->load->model('kontak_baru_model','',true);
		//$this->login_model->is_logged_global('');
		$this->load->library('session');
	}

	public function index($id)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/kontak_baru',
			'id_company' => $id
		);

		$this->load->view('home',$data);
	}

	public function tambah($id_company)
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		
		$nama = $this->input->post('nama');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		
		

		$insert_contact = array(
			'name' => $nama,
			'phone' => $phone,
			'email' => $email,
			'id_company' => $id_company
		);

		if(empty($nama) OR empty($phone) OR empty($email)){
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
			redirect('kontak_baru/index/'.$id_company);
		}else{
			$this->kontak_baru_model->insertContact($insert_contact);
		$idCon = $this->db->insert_id();
		$id = $this->kontak_baru_model->getIdContact($nama,$phone,$email);
		foreach ($id as $row) {
			$id_contact = $row->id_contact;
		}
		print_r($id_contact);
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
			
		redirect('riwayat_kontak/indexId/'.$idCon);
		}
	}

		

		
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */