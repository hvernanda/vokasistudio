<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_staff extends CI_Controller {

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
		$this->load->model('list_staff_model','',true);
		
		//$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index($id)
	{ 
		

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$this->load->model('manajer_proyek_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getStatusId($email,$password)->row()->id_staff;
		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/list_staff', 
			'view_staff' => $this->list_staff_model->viewStaff($id),
			'view_crew' => $this->list_staff_model->viewCrew($id),
			'manajer' => TRUE,
			'listProject' => $id
		);

	$this->load->view('home',$data);
}

 public function index2($id)
 {
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}

		$this->load->model('manajer_proyek_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getStatusId($email,$password)->row()->id_staff;
		/*$listProject = $this->manajer_proyek_model->viewProjectManajer($get);
		foreach ($listProject as $key) {
			$id = $key->id_project;
		}*/

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/list_staff', 
			'view_staff' => $this->list_staff_model->viewStaff($id),
			'manajer' => TRUE,
			'summaryAjaxOn' => TRUE,
			'listProject' => $id
		);

	$this->load->view('home',$data);
 }

public function indexId($id)
	{ 
		

		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_vokasi('login'))
		{
			show_404();
		}

		$this->load->model('manajer_proyek_model','',true);
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		$get = $this->login_model->getStatusId($email,$password)->row()->id_staff;
		/*$listProject = $this->manajer_proyek_model->viewProjectManajer($get);
		foreach ($listProject as $key) {
			$id = $key->id_project;
		}*/

		$data = array(
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'page' => 'content/list_staff', 
			'view_staff' => $this->list_staff_model->viewStaff2($id),
			'view_crew' => $this->list_staff_model->viewCrew($id),
			'manajer' => TRUE,
			'summaryAjaxOn' => FALSE,
			'listProject' => $id
		);

	$this->load->view('home',$data);
}

public function indexCrew()
	{
		$data = array(
			'page' => 'content/list_staff',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'manajer' => TRUE
		);

		$this->load->view('home',$data);
	}

	public function tambah($id_project,$id_staff)
	{
		$insert_manager = array(
			'id_staff' => $id_staff,
			'id_project' => $id_project,
			'id_status' => 3
		);
		$checkManager = $this->list_staff_model->checkManager($id_project)->row();

		if($checkManager->countManager!=0){
			$this->list_staff_model->updateManager($insert_manager,$id_project);
		}else{
			$this->list_staff_model->insertManager($insert_manager);
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
		redirect('list_project');

	}

	public function tambahId($id_project)
	{
		$id_staff = $this->input->post('id_staff');
		if($id_staff == NULL){
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
			redirect('list_staff/indexId/'.$id_project);
		}else{
		$insert_staff = NULL;

           for ($i=0; $i < count($id_staff) ; $i++) {
                $insert_staff = array(
					'id_project' => $id_project,
					'id_status' => 1,
					'id_staff' => $id_staff[$i]

			);
                $this->list_staff_model->insertStaff($insert_staff);
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
		redirect('list_staff/indexId/'.$id_project);
		}

	}

	public function delete($id_crew, $id_project)
	{
		$this->list_staff_model->deleteCrew($id_crew);
		redirect('list_staff/indexId/'.$id_project);
	}
	/*public function search()
	{
		$q = $this->input->post('q');

		$data = array(
			'page' => 'content/list_staff',
			'view_staff' => $this->list_staff_model->viewStaffSearch($q)
		);

		$this->load->view('home',$data);
	}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */