<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chistory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mhistory');
        $this->load->model('Mkamar');
    }
    // Fitur data history
    public function menu_history()
    {
        $output['history'] = $this->Mhistory->history_all();
        $this->load->view('menu_history/history', $output);
    }

    // Fitur tambah history
    public function aturKamar()
    {
        $id = $this->input->post('id');
        $output = array(
            'data' => $this->Mhistory->personId($id),
            'wilayah' => $this->Mhistory->get_wilayah()->result()
        );
        $this->load->view('menu_history/history_tambah', $output);
    }
    
    public function aturKamar2() {
        $id = $this->input->post("id");
        $result = $this->db->where('id_person', $id)
                ->get('tb_history')
                ->num_rows();
        if($result > 0) {
            $msg = array(
                "message" => "Data sudah ada",
                "hasil" => "N"
                );
           echo json_encode($msg);
        } else {
            $msg = array(
                "message" => "Data Tidak Ada",
                "hasil" => "G"
                );
           echo json_encode($msg);
        }
    }

    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mhistory->get_blok($id)->result();
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mhistory->get_kamar($id)->result();
        echo json_encode($output);
    }

    public function simpan_history()
    {
        $data = array(
            'id_person' => $this->input->post('id_person'),
            'id_kamar' => $this->input->post('nama_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mhistory->simpan_history($data);
        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }

    // fitur edit history
    public function form_edit_history()
    {
        $id = $this->input->post('idhistory');
        $data = array(
            'wilayah' => $this->Mhistory->get_wilayah()->result(),
            'data_history' => $this->Mhistory->history_id($id),
        );
        $this->load->view('menu_history/history_edit', $data);
    }

    public function edit_history()
    {
        $id = $this->input->post('id_history');
        $data1 = array(
            'aktif' => 'Tidak'
        );
        $this->Mhistory->edit_history(array('id_history' => $id), $data1);
        $data = array(
            'id_person' => $this->input->post('id_person'),
            'id_kamar' => $this->input->post('nama_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mhistory->simpan_history($data);
        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }
}