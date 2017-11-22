<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('proyek_model');
		$this->load->model('m_login');

		if($this->session->userdata('user_is_logged_in')==''){
			$this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
											<button type='button' class='close' data-dismiss='alert'>x</button>
											<class='fa fa-thumbs-up'> Silahkan Login Kembali ! ");
		redirect('login');
		}
	}
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
		 * So any other public methods not prefixed wit)h an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}

		$data = array(
			'page' => 'content/awal',
			'result' => $this->m_login->ambil_user($id),
			'proyek' => $this->proyek_model->tampilProyek($id)
		);

		$this->load->view('anu', $data);
	}

	public function coba($idp){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
			$project = $this->session->userdata('id_project');
		}
		$ambil_id = $idp;
		$this->session->set_userdata('id_project',$ambil_id);
		$id_status = $this->input->post('id_status');
		$data = array(
			'page' => 'content/table2',
			'data' => $this->m_login->ambil_user($id),
			'result' => $this->m_login->ambil_user($id),
			'project' => $this->proyek_model->tampilKru($ambil_id),
			'crew'=>$this->m_login->ambil_crew($id,$idp)[0]->id_status
		);

		$crew=array(
			'crew'=>$this->m_login->ambil_crew($id,$idp)[0]->id_status
		);
		
		$this->session->set_userdata($crew);

		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
// SELECT staff.name, project.name from staff join crew on staff.id_staff = crew.id_staff join project on project.id_project = crew.id_project