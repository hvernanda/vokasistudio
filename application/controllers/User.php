<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class User extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user_login_model') ;
      $this->load->model('staff_model') ;
      $this->load->model('client_model') ;

      if($this->user_login_model->checkLogged() == false) redirect('/') ;
    }

    public function index(){
      if($this->user_login_model->checkLogged())
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;
      else
        redirect('/') ;
    }

    public function profile($id){
      // redirect if there is no session or no user data
      $isUser = $this->user_login_model->isUser($id) ;
      if($this->user_login_model->checkLogged() == false) redirect('/') ;
      elseif($isUser == false) 
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      $data = array(
        'page' => intval($isUser[0]->id_user_role) == 4 ? 'dashboard/client/profile_contact' : 'dashboard/staff/profile',
        'result' => intval($isUser[0]->id_user_role) == 4 ? $this->client_model->ambil_user_id($id) : $this->staff_model->ambil_user_id($id),
        'projects' => intval($isUser[0]->id_user_role) == 4 ? $this->client_model->get_projects_user($id) : $this->staff_model->get_projects_user($id),
        'data_skill' =>$this->staff_model->get_staff_skill($id)
      ) ;

      $this->load->view('home', $data) ;

    }

    public function edit($id){
      $isUser = $this->user_login_model->isUser($id) ;
      if($isUser == false) redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email') ;
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim') ;
        $this->form_validation->set_rules('address', 'Address', 'required|trim') ;
        
        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('errormsg', 'Data harus lengkap!') ;
          redirect('/user/profile/'.$id) ;
        }else{
          $user_data = array(
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
          ) ;

          $staff_data = array(
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
          ) ;

          if(!empty($this->input->post('password'))) 
            $user_data['password'] = md5($this->input->post('password')) ;

          if(!empty($this->upload->data('file_name'))){
            $staff_data['photo'] = $_FILES['photo']['name'] ;
            $config['upload_path'] = './uploads/img/' ;
            $config['allowed_types'] = 'gif|jpg|png' ;

            $this->upload->initialize($config) ;
          }

          if($this->user_login_model->update_user($id, $user_data, $staff_data) && $this->upload->do_upload('photo'))
            redirect('/user/profile/'.$id) ;
          else{
            $this->session->set_flashdata('errormsg', 'Update data failed!') ;
            redirect('/user/profile/'.$id) ;
          }
        }
      }else{
        $this->session->set_flashdata('errormsg', 'Can not access page directly!') ;
        redirect('/user/profile/'.$id) ;
      }
    }
  }
?>