<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class honor_kru extends CI_Controller {

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
		$this->load->model('honor_kru_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
    	date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		
		$data = array(
			'page' => 'content/honor-kru',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'view' => $this->honor_kru_model->viewKru()
		);

		$this->load->view('home',$data);
	}
	public function manajer()
	{
		if($this->login_model->is_logged_crew('login'))
		{
			show_404();
		}

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id = $row->id_project;
			// print_r($status);
		}
		
		$data = array(
			'page' => 'content/honor-kru',
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'view' => $this->honor_kru_model->viewKruProyek($id)
		);

		$this->load->view('home',$data);
	}
	public function updatePembayaranKru($id)
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_manajer_proyek('login'))
		{
			show_404();
		}
		$date = $this->input->post('date');

		if ($date == '') {
			$date = date("Y-m-d");
		}

		$update = array(
			'paymentDate' => $date
		);

		$this->honor_kru_model->updatePembayaranKru($update, $id);
		$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">
                <div class="glyphicon glyphicon-remove">
                </div>
                </span>
                <span class="sr-only">Close</span>
              </button>
            <b>Success!</b> Data berhasil di update</br>
            </div>'
            );
		if ($this->session->userdata('keuangan proyek')) {
			redirect('honor_kru/manajer');
		}elseif ($this->session->userdata('staf keuangan vokasi')) {
			redirect('honor_kru');
		} 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */