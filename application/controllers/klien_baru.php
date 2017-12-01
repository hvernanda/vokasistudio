<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klien_baru extends CI_Controller {

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
		$this->load->model('klien_baru_model','',true);
		//$this->login_model->is_logged_global('');
		$this->load->library('session');
	}
	public function index()
	{

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/klien_baru'
		);

		$this->load->view('home',$data);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');
		

		$insert_client = array(
			'name' => $nama,
			'phone' => $phone,
			'email' => $email,
			'address' => $alamat,
			'password' => $password
		);

		if(empty($nama) OR empty($phone) OR empty($email) OR empty($alamat)OR empty($password)){
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
			redirect('klien_baru/index');
		}else{
			$this->klien_baru_model->insertClient($insert_client);
			$id = $this->db->insert_id(); 
			print_r($id);
			$insert_type = NULL;
           	for ($i=0; $i < count($type) ; $i++) { 
                $insert_type = array('id_type' => $type[$i],'id_project' => $id);
                $this->proyek_baru_model->insertProjectType($insert_type);
            $id = $this->klien_baru_model->getIdClient($nama,$phone,$email,$alamat);
			foreach ($id as $row) {
				$id_company = $row->id_company;
				}
			print_r($id_company);
			}
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
			redirect('riwayat_klien');
			}
	}
		

		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */