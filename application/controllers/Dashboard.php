<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Device_model');
        $this->load->model('Sensor_log_model');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['total_user'] = $this->User_model->count_all();
        $data['total_device'] = $this->Device_model->count_all();
        $data['total_log'] = $this->Sensor_log_model->count_all();

        $this->load->view('dashboard/index', $data);
    }
}
