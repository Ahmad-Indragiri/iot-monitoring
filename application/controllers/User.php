<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);

        // Hanya admin yang boleh akses semua fungsi User
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['users'] = $this->User_model->get_all();
        $this->load->view('user/index', $data);
    }

    public function create()
    {
        $this->load->view('user/create');
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,viewer]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/create');
        } else {
            $post = $this->input->post(null, true);
            $data = [
                'nama_user' => $post['nama_user'],
                'email' => $post['email'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'role' => $post['role']
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('success', 'User berhasil ditambahkan.');
            redirect('user');
        }
    }


    public function edit($id)
    {
        $data['user'] = $this->User_model->get_by_id($id);
        if (!$data['user']) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('user');
        }
        $this->load->view('user/edit', $data);
    }

    public function update($id)
    {
        $user = $this->User_model->get_by_id($id);
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('user');
        }

        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,operator,viewer]');

        $post = $this->input->post(null, true);
        if ($post['email'] != $user->email) {
            $this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]');
        }

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $user;
            $this->load->view('user/edit', $data);
        } else {
            $dataUpdate = [
                'nama_user' => $post['nama_user'],
                'email' => $post['email'],
                'role' => $post['role'],
            ];

            if (!empty($post['password'])) {
                $dataUpdate['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
            }

            $this->User_model->update($id, $dataUpdate);
            $this->session->set_flashdata('success', 'User berhasil diupdate.');
            redirect('user');
        }
    }

    public function delete($id)
    {
        $user = $this->User_model->get_by_id($id);
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
        } else {
            $this->User_model->delete($id);
            $this->session->set_flashdata('success', 'User berhasil dihapus.');
        }
        redirect('user');
    }
}
