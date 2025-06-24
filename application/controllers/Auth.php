<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login_action() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->User_model->get_by_email($email);
    
        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'id' => $user->id,
                'nama_user' => $user->nama_user,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => true
            ]);
            // Redirect ke dashboard universal
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('auth');
        }
    }
    

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
