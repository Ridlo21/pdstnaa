<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cdewan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdewan');
    }

    public function dewan_pengasuh()
    {
        $output['santri'] = $this->Mdewan->dewan_pengasuh();
        $this->load->view('menu_dewan/dewan_pengasuh', $output);
    }

    public function menu_tambah_dewan_pengasuh()
    {
        $data['provinsi'] = $this->Mdewan->get_provinsi()->result();
        $this->load->view('menu_dewan/dewan_pengasuh_tambah', $data);
    }

    public function get_kabupaten()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mdewan->get_kabupaten($id)->result();
        echo json_encode($output);
    }

    public function get_kecamatan()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mdewan->get_kecamatan($id)->result();
        echo json_encode($output);
    }

    public function get_desa()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mdewan->get_desa($id)->result();
        echo json_encode($output);
    }

    public function simpan_dewan_pengasuh()
    {
        $santri_terakhir = $this->Mdewan->santri_terakhir_diinput();
        $countsantri_terakhir = $santri_terakhir[0]->jumlah;

        if ($countsantri_terakhir == NULL) {
            $nomor_induk_baru = '0001';
        } else {
            $kode = '0000';
            $panjang = 4 - strlen($countsantri_terakhir);
            $countsantri_terakhir++;
            $nomor_induk_baru = substr($kode, 0, $panjang) . $countsantri_terakhir;
        }
        $niupnya = $nomor_induk_baru;
        $tgl = explode("-", $this->input->post('tanggal_lahir'));
        $tgl = $tgl[2] . $tgl[1] . $tgl[0];
        $thn_daftar = substr(date("Y"), 2, 4);
        if ($this->input->post('jenis_kelamin') == "Perempuan") {
            $kode_awal = "02";
        } else {
            $kode_awal = "01";
        }
        $data = array(
            'nama' => $this->input->post('nama'),
            'niup' => $kode_awal . $thn_daftar . $tgl . $niupnya,
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'kab' => $this->input->post('kab'),
            'prov' => $this->input->post('prov'),
            'pos' => $this->input->post('pos'),
            'nm_a' => $this->input->post('nama_a'),
            'nm_i' => $this->input->post('nama_i'),
            'status_dipesantren' => $this->input->post('status')
        );
        $this->Mdewan->simpan_dewan_pengasuh($data);
        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses

        );
        echo json_encode($output);
    }

    public function form_edit_pengasuh()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'provinsi' => $this->Mdewan->get_provinsi()->result(),
            'alamat' => $this->Mdewan->alamat($id),
            'data' => $this->Mdewan->pengasuh_id($id)
        );
        $this->load->view('menu_dewan/dewan_pengasuh_edit', $data);
    }

    public function edit_pengasuh()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'kab' => $this->input->post('kab'),
            'prov' => $this->input->post('prov'),
            'pos' => $this->input->post('pos'),
            'nm_a' => $this->input->post('nama_a'),
            'nm_i' => $this->input->post('nama_i')
        );
        $this->Mdewan->edit_pengasuh(array('id_person' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses

        );
        echo json_encode($output);
    }

    public function export_excel()
    {
        $output['santri'] = $this->Mdewan->dewan_pengasuh();
        $this->load->view('menu_dewan/dewan_export', $output);
    }

    public function dewan_pengasuh_putra()
    {
        $output['santri'] = $this->Mdewan->dewan_pengasuh_putra();
        $this->load->view('menu_dewan/dewan_putra_export', $output);
    }

    public function dewan_pengasuh_putri()
    {
        $output['santri'] = $this->Mdewan->dewan_pengasuh_putri();
        $this->load->view('menu_dewan/dewan_putri_export', $output);
    }
}