<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeUser extends CI_Controller {

	public function __construct()
    {
       	parent::__construct();
        $this->load->model('m_home');

        if($this->session->userdata('user_is_logged_in')==''){
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
    	}

    }


	public function index()
	{
		  if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id_staff');
            $email = $this->session->userdata('email');
        }
        $data = array(
            'page' => 'content/dashboard',
            'result' => $this->m_home->ambil_user($email),
            'notifikasi' => $this->m_home->notifikasi($id)
        );
        
        $this->load->view('v_template', $data);
	}

    public function konfirmasiCrewTerima(){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id_staff');
            $email = $this->session->userdata('email');
        }
        $id_staff = $this->input->post('id_staff');
        $id_crew = $this->input->post('id_crew');
        $status_permintaan = $this->input->post('status_permintaan_terima');

        $data2 = array(
            'status_permintaan' => $status_permintaan
        );
        
        $this->m_home->update_permintan($id_staff, $id_crew, $data2);       
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Permintaan hubungan berhasil ditambah, Cek Menu Staff! ");
        redirect('homeUser');
    }

    public function konfirmasiCrewTolak(){
        if($this->session->userdata('user_is_logged_in'))
        {
            $id = $this->session->userdata('id_staff');
            $email = $this->session->userdata('email');
        }
        $id_crew = $this->input->post('id_crew');
        $status_permintaan = $this->input->post('status_permintaan_tolak');

        $data2 = array(
            'status_permintaan' => $status_permintaan
        );
        
        $this->m_home->update_permintan($id, $id_crew, $data2);       
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Permintaan berhasil di tolak ");
        redirect('homeUser');
    }

}
