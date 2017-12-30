<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Honor_kru extends CI_Controller {
  public $id_staf;
  public $id_crew_role;

  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model');
    $this->load->model('keuangan_studio_model');
    $this->load->model('honor_kru_model');
    $this->load->model('staff_model');    

    if(!$this->user_login_model->checkLogged())
      redirect('/') ;
    else{
      $this->id_staf = $this->staff_model->getStaffId($this->session->userdata('logged_in')['id_user'])[0]->id_staff;
    }
  }
  public function honor_kru(){
    $data = array(
      'page' => 'dashboard/keuangan/honor_kru',
      'result' => $this->honor_kru_model->viewKru(),
    );
    $this->load->view('home', $data);
  }
  public function index(){
    $data = array(
      'page' => 'dashboard/keuangan/index',
      'result' => $this->honor_kru_model->viewKru(),
    );

    $this->load->view('home',$data);
  }
  public function manajer(){
    $this->id_proyek = $this->project_model->getIdProject();
    foreach ($id_proyek as $row) {
      $id = $row->id_project;
      // print_r($status);
    }
    
    $data = array(
      'page' => 'dashboard/keuangan/honor_kru',
      'result' => $this->honor_kru_model->viewKruProyek($id)
    );
    $this->load->view('home',$data);
  }



  public function updatePembayaranKru($id){
    $date = $this->input->post('date');
    if ($date == ''){
      $date = date("Y-m-d");
    }

    $update = array(
      'payment_date' => $date);

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
?>