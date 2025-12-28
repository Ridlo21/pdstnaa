<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clembaga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlembaga');
    }

    public function menu_lembaga()
    {
        $output['lembaga'] = $this->Mlembaga->lembaga_all();
        $this->load->view('menu_lembaga/lembaga', $output);
    }

    public function tambah_lembaga()
    {
        $output['wilayah'] = $this->Mlembaga->wilayah_all();
        $this->load->view('menu_lembaga/lembaga_tambah', $output);
    }

    public function simpan_lembaga()
    {
        if ($this->input->post('nama_lembaga') === "") {
            $pesan = "tidak";
            $sukses = "Nama Lembaga Tidak Boleh Kosong";
        } else {
            $data = array(
                'nama' => $this->input->post('nama_lembaga'),
                'id_wilayah' => $this->input->post('nama_wilayah')
            );
            $this->Mlembaga->simpan_lembaga($data);
            $pesan = "ya";
            $sukses = "Data Berhasil Disimpan";
        }
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function form_edit_lembaga()
    {
        $id = $this->input->post('idlembaga');
        $data = array(
            'data_lembaga' => $this->Mlembaga->lembaga_id($id),
            'wilayah' => $this->Mlembaga->wilayah_all()
        );
        $this->load->view('menu_lembaga/lembaga_edit', $data);
    }

    public function edit_lembaga()
    {
        $id = $this->input->post('idlembaga');
        $data = array(
            'nama' => $this->input->post('nama_lembaga'),
            'id_wilayah' => $this->input->post('nama_wilayah')
        );
        $this->Mlembaga->edit_lembaga(array('id_lembaga' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }
}
