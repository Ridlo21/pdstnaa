<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cblok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mblok');
    }

    public function menu_blok()
    {
        $output['blok'] = $this->Mblok->blok_all();
        $this->load->view('menu_blok/blok', $output);
    }

    public function tambah_blok()
    {
        $output['wilayah'] = $this->Mblok->wilayah_all();
        $this->load->view('menu_blok/blok_tambah', $output);
    }

    public function simpan_blok()
    {
        $blok = $this->input->post('nama_blok');
        $cek_blok =  $this->db->where('nama_blok', $blok)
            ->get('tb_blok')
            ->num_rows();
        if ($cek_blok > 0) {
            $pesan = "tidak";
            $sukses = "Nama Block Sudah Ada !!!";
        } else {
            $data = array(
                'nama_blok' => $this->input->post('nama_blok'),
                'id_wilayah' => $this->input->post('nama_wilayah')
            );
            $this->Mblok->simpan_blok($data);
            $pesan = "ya";
            $sukses = "Data Berhasil Disimpan";
        }
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function form_edit_blok()
    {
        $id = $this->input->post('idblok');
        $data = array(
            'data_blok' => $this->Mblok->blok_id($id),
            'wilayah' => $this->Mblok->wilayah_all()
        );
        $this->load->view('menu_blok/blok_edit', $data);
    }

    public function edit_blok()
    {
        $id = $this->input->post('idblok');
        $data = array(
            'nama_blok' => $this->input->post('nama_blok'),
            'id_wilayah' => $this->input->post('nama_wilayah')
        );
        $this->Mblok->edit_blok(array('id_blok' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }
}
