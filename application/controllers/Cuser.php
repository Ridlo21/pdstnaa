<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mmaster');
    }
    
    public function index()
    {
        $id = $this->Mmaster->profil($this->session->userdata['logged_in']['id_user']);
		$output = array(
			'nama_user' => $id->nama,
			'alamat' => $id->alamat_lengkap,
			'jabatan' => $id->nm_jabatan,
			'foto' => $id->foto_warna_santri
		);
        $this->load->view('user/user_beranda', $output);
    }
    
}
