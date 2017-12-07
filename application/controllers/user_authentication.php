<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_authentication extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');
        
        // Load form validation library
        $this->load->library('form_validation');
        
        // Load session library
        $this->load->library('session');
        
        // Load database
        $this->load->model('user_login_model');
        }

    public function index() {
        $user_data = $this->session->userdata('logged_in');
        if ($user_data['id_user_role']=='1') {
            //redirect('homeManajerVokasi');
            ob_start();
            var_dump('Manajer Vokasi');
            $result = ob_get_contents();
        } if ($user_data['id_user_role']=='2') {
            var_dump('Manajer Vokasi');
            //redirect('homeStaff');
        }elseif ($user_data['id_user_role']=='3') {
            var_dump('Manajer Vokasi');
            //redirect('homeStaffKeuangan');
        }elseif ($user_data['id_user_role']=='4') {
            var_dump('Manajer Vokasi');
            //redirect('homeClient');
        }else{
        $this->load->view('auth/login');
        }
    }
        
        // Show login page
        // public function index() {
        // $this->load->view('login_form');
        // }
        
        // Show registration page
        // public function user_registration_show() {
        // $this->load->view('registration_form');
        // }
        

        // Check for user login process
    public function user_login_process() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){   
                //$this->load->view('dashboarde');
                //return "DASHBOARD VIEW";
                echo 'Test_dash';
            } else {
                //$this->load->view('view logine');
                echo 'login_view';
                //$this->load->view('login/v_login');
            }
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $result = $this->user_login_model->login($data);
            if ($result == TRUE) {
                $email = $this->input->post('email');
                $result = $this->user_login_model->read_user_information($email);
                echo var_dump($result);
                if ($result != false) {
                    $session_data = array(
                    'id_user' => $result[0]->id_user,
                    'email' => $result[0]->email,
                    'id_user_role' => $result[0]->id_user_role
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    //$this->load->view('admin_page');
                    echo 'Test';
                } else {
                    echo 'Test1';
                }
            } else {
                $data = array(
                'error_message' => 'Invalid Username or Password'
                );
                echo "LOGIN VIEW";
                //$this->load->view('login/v_login',$data);
                //$this->load->view('login_form', $data);
            }
        }
    }
    
    // Logout from admin page
    public function logout() {
    
        // Removing session data
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        //$this->load->view('login_form', $data);
        $this->load->view('login/v_login',$data);
    }
}

?>