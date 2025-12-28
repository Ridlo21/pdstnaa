<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('Mpetugas');
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect(site_url('admin'));
        } else {
            $this->load->view('login');
        }
    }

    public function auth()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        // VALIDASI WAJIB
        if ($username === '' || $password === '') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Username dan password wajib diisi'
            ]);
            return;
        }

        $cek = $this->Mpetugas->cek_login($username, $password);

        if (!$cek) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Username atau password salah'
            ]);
            return;
        }

        if ($cek->status !== 'aktif') {
            echo json_encode([
                'status' => 'expired',
                'message' => 'Pengguna telah kedaluarsa'
            ]);
            return;
        }

        $this->session->set_userdata([
            'login'       => true,
            'id_login'    => $cek->id_login,
            'id_pengurus' => $cek->id_pengurus,
            'nama'        => $cek->nama,
            'username'    => $cek->username,
            'jabatan'     => $cek->nm_jabatan
        ]);

        echo json_encode([
            'status'   => 'success',
            'redirect' => site_url('Cmaster')
        ]);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('log-in'));
    }
}
