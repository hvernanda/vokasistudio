<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfilManajer extends CI_Controller {

		public function __construct()
    {
       	parent::__construct();
        $this->load->model('m_profil');
        
        if($this->session->userdata('manajer_vs_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
    	}
    }
    
	Public function index()
	{
		if($this->session->userdata('manajer_vs_is_logged_in'))
        {
            $id = $this->session->userdata('id_staff');
            $email = $this->session->userdata('email');
        }
		$data = array(
			'page' => 'content/v_profilManajer',
            'result' => $this->m_profil->ambil_user($id)
		);
		$this->load->view('v_template', $data);
	}
}