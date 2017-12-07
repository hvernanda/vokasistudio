<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StaffUser extends CI_Controller {

	public function __construct()
    {
       	parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_kru');
        $this->load->model('m_history');
        
        if($this->session->userdata('user_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
    	}
    }

	Public function index()
	{
		if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id');
            $email = $this->session->userdata('email');
        }
        //$ids = $this->input->post('id');
		$data = array(
			'page' => 'content/v_staff',
            'result' => $this->m_home->ambil_user($email),
            'staff' => $this->m_kru->ambil_semua_user_staff(),
            'data' => $this->m_kru->ambil_done($email)
            // 'status' => $this->m_kru->ambil_semua_user_status()    
		);
        
		$this->load->view('v_template',$data);
	}
}
