<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class type extends CI_Controller {

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
		$this->load->model('type_model','',true);
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
			'page' => 'content/type',
			'view_type' => $this->type_model->viewType()
		);

		$this->load->view('home',$data);
	}

	public function tambah()
	{
		$type = $this->input->post('type');

		$insert_type = array(
			'name' => $type
		);

		if(empty($type)){
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
			redirect('type/index');
		}else{
			$this->type_model->insertType($insert_type);
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
			redirect('type/index');
			}
	}

	public function delete($id_type)
	{
		$data = array(
			'visibility' => '1'
		);

		$this->type_model->deleteType($data, $id_type);
		redirect('type/index/');
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */