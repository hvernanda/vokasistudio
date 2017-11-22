<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class progresproject extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('progresproject_model');
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
		
		$data = array(
			'page' => 'content/progresproject',
			'data' => $this->m_login->ambil_user($id)
			
		);
		$data['isi']		= $this->progresproject_model->tampilAktivitas();

		$this->load->view('home',$data);
	}

	public function beriKomen(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		// $b = $this->penugasan_model->viewJob()->result();
		$data = array(
			'page' => 'content/form_komen',
			'data' => $this->m_login->ambil_user($id)
		);
		$data['isi'] = $this->progresproject_model->tambahKomen();
		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
