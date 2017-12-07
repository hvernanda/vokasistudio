<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kelola_honor_kru extends CI_Controller {

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
		$this->load->model('kelola_honor_kru_model','',true);
		$this->login_model->is_logged_global('home');
		$this->load->library('session');
	}
	public function index()
	{
		if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login'))
		{
			show_404();
		}

		$id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

		foreach ($id_proyek as $row) {
			$id = $row->id_project;
			// print_r($status);
		}
		
		$data = array(
			'view' => $this->kelola_honor_kru_model->viewKru($id),
			'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
			'status' => $this->session->userdata('status'),
			'jumlah' => $this->kelola_honor_kru_model->viewJumlahKru($id),
			'total_keuangan' => $this->kelola_honor_kru_model->viewtotalKeuangan($id),'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
			'page' => 'content/kelola-honor-kru'
		);

		$this->load->view('home',$data);
	}
	public function update()
	{

    $name = $this->input->post();
    $total = $this->input->post('total');
    $id = $this->input->post('id');
    // unset($this->input->post('total'));
    // unset($this->input->post('id'));

    $id_proyek = $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status'));

	foreach ($id_proyek as $row) {
		$id = $row->id_project;
		// print_r($status);
	}

    $jumlah = $this->kelola_honor_kru_model->viewJumlahKru($id);
    foreach($jumlah as $row){
    	$fee = $this->input->post('fee'.$row->id);
    }

    $teks = preg_replace("a-zA-Z/(?![.=$'€%-])\p{P}/u", "", $name);

    if(empty($name) OR empty($total)){
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
			redirect('kelola_honor_kru');
		}elseif( $fee < 0){
			$this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> data tidak boleh negatif atau nol </br>
	            </div>');
			redirect('kelola_honor_kru');
		}else{
			// $this->kelola_honor_kru_model->updateKeuanganProyek($total, $id);
			$this->kelola_honor_kru_model->updateHonor($name);
			$this->session->set_flashdata('msgtrue','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di ubah</br>
	            </div>'
	            );
			redirect('kelola_honor_kru');
		} 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */