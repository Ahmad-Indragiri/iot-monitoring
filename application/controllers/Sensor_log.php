<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor_log extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Sensor_log_model');
        $this->load->model('Device_model');
        $this->load->model('User_model');
        $this->load->helper(['url']);
        $this->load->library('session');

        // Cek login dulu
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('id');

        if ($role === 'admin' || $role === 'viewer') {
            // Admin dan Viewer lihat semua log
            $data['logs'] = $this->Sensor_log_model->get_all();
        } elseif ($role === 'operator') {
            // Operator hanya lihat log miliknya sendiri
            $data['logs'] = $this->Sensor_log_model->get_all($user_id);
        } else {
            show_error('Access denied', 403);
            return;
        }

        $this->load->view('sensor_log/index', $data);
    }


    public function create() {
        $role = $this->session->userdata('role');
        if ($role !== 'admin' && $role !== 'operator') {
            show_error('Access denied', 403);
            return;
        }

        $data['devices'] = $this->Device_model->get_all();
        $data['users'] = $this->User_model->get_all();
        $this->load->view('sensor_log/create', $data);
    }

    public function store() {
        $role = $this->session->userdata('role');
        if ($role !== 'admin' && $role !== 'operator') {
            show_error('Access denied', 403);
            return;
        }

        $post = $this->input->post();
        $data = [
            'id_device' => $post['id_device'],
            'id_user' => $post['id_user'],
            'waktu_log' => $post['waktu_log'],
            'nilai_sensor' => $post['nilai_sensor'],
            'status_log' => $post['status_log']
        ];
        $this->Sensor_log_model->insert($data);
        redirect('sensor_log');
    }

    public function edit($id) {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('id');

        $log = $this->Sensor_log_model->get_by_id($id);
        if (!$log) {
            show_404();
            return;
        }

        // Admin bisa edit semua, operator cuma yang miliknya
        if ($role === 'operator' && $log->id_user != $user_id) {
            show_error('Access denied', 403);
            return;
        } elseif ($role !== 'admin' && $role !== 'operator') {
            show_error('Access denied', 403);
            return;
        }

        $data['log'] = $log;
        $data['devices'] = $this->Device_model->get_all();
        $data['users'] = $this->User_model->get_all();
        $this->load->view('sensor_log/edit', $data);
    }

    public function update($id) {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('id');

        $log = $this->Sensor_log_model->get_by_id($id);
        if (!$log) {
            show_404();
            return;
        }

        // Admin bisa update semua, operator cuma yang miliknya
        if ($role === 'operator' && $log->id_user != $user_id) {
            show_error('Access denied', 403);
            return;
        } elseif ($role !== 'admin' && $role !== 'operator') {
            show_error('Access denied', 403);
            return;
        }

        $post = $this->input->post();
        $data = [
            'id_device' => $post['id_device'],
            'id_user' => $post['id_user'],
            'waktu_log' => $post['waktu_log'],
            'nilai_sensor' => $post['nilai_sensor'],
            'status_log' => $post['status_log']
        ];
        $this->Sensor_log_model->update($id, $data);
        redirect('sensor_log');
    }

    public function delete($id) {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('id');

        $log = $this->Sensor_log_model->get_by_id($id);
        if (!$log) {
            show_404();
            return;
        }

        // Admin bisa hapus semua, operator cuma yang miliknya
        if ($role === 'operator' && $log->id_user != $user_id) {
            show_error('Access denied', 403);
            return;
        } elseif ($role !== 'admin' && $role !== 'operator') {
            show_error('Access denied', 403);
            return;
        }

        $this->Sensor_log_model->delete($id);
        redirect('sensor_log');
    }
}
