<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class riwayat_keuangan_proyek extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model');
    $this->load->model('riwayat_keuangan_proyek_model');
    $this->load->model('staff_model');
    $this->load->model('project_model');
    


    if(!$this->user_login_model->checkLogged())
      redirect('/') ;
    else{
      $this->id_staf = $this->staff_model->getStaffId($this->session->userdata('logged_in')['id_user'])[0]->id_staff;
    }
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/keuangan/index',
    );
    $this->load->view('home', $data);
  }

  public function all(){
    // echo "ini riwayat" ;
    $data = array(
      'page' => 'dashboard/keuangan/riwayat_keuangan_proyek',
      'result' => $this->project_model->ambil_project(),
    );

    $this->load->view('home',$data);
  }
  public function detail($id)
  {
    $data = array(
      'result' => $this->riwayat_keuangan_proyek_model->viewRiwayatProject($id),
      'viewKeuangan' => $this->riwayat_keuangan_proyek_model->viewKeuanganProject($id),
      'viewPengeluaran' => $this->riwayat_keuangan_proyek_model->viewPengeluaranPerproject($id),
      'viewPemasukan' => $this->riwayat_keuangan_proyek_model->viewPemasukanp($id),
      'viewTotalPengeluaran' => $this->riwayat_keuangan_proyek_model->viewPengeluaranPerproject($id),
      'viewTotalHonor' => $this->riwayat_keuangan_proyek_model->viewHonor($id),
      'viewTotalPemasukan' => $this->riwayat_keuangan_proyek_model->viewPemasukan($id),
      'viewAmount' => $this->riwayat_keuangan_proyek_model->viewamount($id),
      'viewTransaksi' => $this->riwayat_keuangan_proyek_model->viewTransaksi($id),
      'id' => $id,
      'page' => 'dashboard/keuangan/riwayat_keuangan_proyek_detail'
    );

    $this->load->view('home',$data); 
  }
}

?>
