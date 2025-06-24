<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Device_model');
        $this->load->helper(['url']);
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Semua role bisa lihat daftar device
        $data['devices'] = $this->Device_model->get_all();
        $this->load->view('device/index', $data);
    }

    public function create() {
        $role = $this->session->userdata('role');

        if ($role !== 'admin') {
            show_error('Access denied', 403);
            return;
        }

        $this->load->view('device/create');
    }

    public function store() {
        $role = $this->session->userdata('role');

        if ($role !== 'admin') {
            show_error('Access denied', 403);
            return;
        }

        $post = $this->input->post();
        $data = [
            'nama_device' => $post['nama_device'],
            'tipe_device' => $post['tipe_device'],
            'lokasi' => $post['lokasi'],
            'status' => $post['status']
        ];
        $this->Device_model->insert($data);
        redirect('device');
    }

    public function edit($id) {
        $role = $this->session->userdata('role');

        if ($role !== 'admin') {
            show_error('Access denied', 403);
            return;
        }

        $data['device'] = $this->Device_model->get_by_id($id);
        if (!$data['device']) {
            show_404();
            return;
        }
        $this->load->view('device/edit', $data);
    }

    public function update($id) {
        $role = $this->session->userdata('role');
    
        if ($role !== 'admin') {
            show_error('Access denied', 403);
            return;
        }
    
        $post = $this->input->post();
        $data = [
            'nama_device' => $post['nama_device'],
            'tipe_device' => $post['tipe_device'],
            'lokasi' => $post['lokasi'],
            'status' => $post['status']
        ];
        $this->Device_model->update($id, $data);
        redirect('device');
    }
    

    public function delete($id) {
        $role = $this->session->userdata('role');

        if ($role !== 'admin') {
            show_error('Access denied', 403);
            return;
        }

        $this->Device_model->delete($id);
        redirect('device');
    }
}
