<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_proyek extends CI_Controller {
  public function __construct(){
    parent::__construct() ;
  }

  public function index(){
    $session_data = $this->session->userdata('logged_in');
    $id_user = $session_data['id_user'];
    $id_project = $session_data['id_project'];

    if(!auth($id_user,$id_project)){
        show_404();
    }
    
    $data = array(
      'page' => 'dashboard/keuangan_proyek/index'
    );
    $this->load->view('home', $data);
  }
}

?>
