<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmaster extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect('Clogin');
		}
		$this->load->model('Mmaster');
	}

	public function index()
	{
		$id_pengurus = $this->session->userdata('id_pengurus');

		$profil = $this->Mmaster->profil_by_pengurus($id_pengurus);

		$data = [
			'title'   => 'Dashboard Admin',
			'nama'    => $profil->nama,
			'alamat'  => $profil->alamat_lengkap,
			'jabatan' => $profil->nm_jabatan,
			'foto'    => $profil->foto_warna_santri
		];

		$this->load->view('template', $data);
	}

	public function menu_halaman_utama()
	{
		$data = array(
			'santri' => $this->Mmaster->jum_santri(),
			'putra' => $this->Mmaster->jum_putra(),
			'putri' => $this->Mmaster->jum_putri(),
			'pengurus' => $this->Mmaster->jum_pengurus(),
			// 'kamar' => $this->Mmaster->jumlah_santri_perwilayah(),
			// 'karyawan' => $this->Mmaster->jum_karyawan(),
			// 'pengajar' => $this->Mmaster->jum_pengajar(),
			'grafik_divisi_gender' => $this->Mmaster->getGrafikDivisiGender(),
			'grafik_tahun_kelamin' => $this->Mmaster->getGrafikTahunKelamin()
		);
		$this->load->view('halaman_utama', $data);
	}
}
