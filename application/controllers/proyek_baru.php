<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyek_baru extends CI_Controller {

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
		$this->load->model('proyek_baru_model','',true);
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
			'tipeProyek' => $this->proyek_baru_model->getTipeProyek(),
			'page' => 'content/proyek_baru',
			'id' => $id
		);

		$this->load->view('home',$data);
	}
	public function tambah($id)
	{
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$dp = $this->input->post('dp');
		$deadline = $this->input->post('deadline');
		$revisideadline = $this->input->post('revisi');
		$type = $this->input->post('tipe');
		$status = $this->input->post('status');
		$idCrew = $id;

		$amountHarga = str_replace('.', '', $harga);
		$amountDp = str_replace('.', '', $dp);

		$insert_project = array(
			'name' => $nama,
			'price' => $amountHarga,
			'DP' => $amountDp,
			'dealTime' => date('Y-m-d'),
			'deadline' => $deadline,
			'revisionDeadline' => $revisideadline,
			'status' => $status,
			'id_contact' => $id
		);

		if(empty($nama) OR empty($harga) OR empty($type)){
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
			//redirect('proyek_baru/index/'.$id);
			echo $type;
		}else{
			$this->proyek_baru_model->insertProject($insert_project);
			$id = $this->db->insert_id(); 
			//print_r($id);
			$insert_type = NULL;

           for ($i=0; $i < count($type) ; $i++) { 
                $insert_type = array('id_type' => $type[$i],'id_project' => $id);
                $this->proyek_baru_model->insertProjectType($insert_type);
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
			//redirect('detil_proyek/index/'.$id);
			echo $id;
			}
		}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */