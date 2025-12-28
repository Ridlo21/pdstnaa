<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mkamar');
        $this->load->model('Mblok');
    }

    public function menu_kamar()
    {
        $output['kamar'] = $this->Mkamar->kamar_all();
        $this->load->view('menu_kamar/kamar', $output);
    }

    public function tambah_kamar()
    {
        $output['wilayah'] = $this->Mkamar->get_wilayah()->result();
        $this->load->view('menu_kamar/kamar_tambah', $output);
    }

    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mkamar->get_blok($id)->result();
        echo json_encode($output);
    }

    public function simpan_kamar()
    {
        $kamar = $this->input->post('nama_kamar');
        $cek_kamar =  $this->db->where('nama_kamar', $kamar)
            ->get('tb_kamar')
            ->num_rows();
        if ($cek_kamar > 0) {
            $pesan = "tidak";
            $sukses = "Nama Kamar Sudah Ada !!!!";
        } else {
            $data = array(
                'nama_kamar' => $this->input->post('nama_kamar'),
                'id_blok' => $this->input->post('nama_blok')
            );
            $this->Mkamar->simpan_kamar($data);
            $pesan = "ya";
            $sukses = "Data Berhasil Disimpan";
        }

        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function form_edit_kamar()
    {
        $id = $this->input->post('idkamar');
        $data = array(
            'data_kamar' => $this->Mkamar->kamar_id($id),
            'blok' => $this->Mblok->blok_all(),
            'wilayah' => $this->Mkamar->get_wilayah()->result()
        );
        $this->load->view('menu_kamar/kamar_edit', $data);
    }

    public function edit_kamar()
    {
        $id = $this->input->post('idkamar');
        $data = array(
            'nama_kamar' => $this->input->post('nama_kamar'),
            'id_blok' => $this->input->post('nama_blok')
        );
        $this->Mkamar->edit_kamar(array('id_kamar' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function info()
    {
        $id = $this->input->post('idkamar');
        $data = array(
            'data_kamar' => $this->Mkamar->kamar_id($id),
            'p_kamar' => $this->Mkamar->history($id),
        );
        $this->load->view('menu_kamar/info_kamar', $data);
    }

    public function cetak()
    {
        $id = $this->input->get('id');
        $data = array(
            'data_kamar' => $this->Mkamar->kamar_id($id),
            'p_kamar' => $this->Mkamar->history($id),
        );
        $this->load->view('menu_kamar/cetak_kamar', $data);
    }
}
