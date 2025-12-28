
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpenempatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpenempatan');
        $this->load->model('Mkamar');
    }
    // Fitur data history
    public function menu_history()
    {
        $output['history'] = $this->Mpenempatan->history_all();
        $this->load->view('user/menu_penempatan/history', $output);
    }

    // Fitur tambah history
    public function tambah_history()
    {
        $output = array(
            'history' => $this->Mpenempatan->santri_all(),
            'wilayah' => $this->Mpenempatan->get_wilayah()->result()
        );
        $this->load->view('user/menu_penempatan/history_tambah', $output);
    }

    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mpenempatan->get_blok($id)->result();
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mpenempatan->get_kamar($id)->result();
        echo json_encode($output);
    }

    public function simpan_history()
    {
        $data = array(
            'id_person' => $this->input->post('id_person'),
            'id_kamar' => $this->input->post('id_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mpenempatan->simpan_history($data);
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
            'wilayah' => $this->Mpenempatan->get_wilayah()->result(),
            'data_history' => $this->Mpenempatan->history_id($id),
        );
        $this->load->view('user/menu_penempatan/history_edit', $data);
    }

    public function edit_history()
    {
        $id = $this->input->post('idhistory');
        $data1 = array(
            'id_person' => $this->input->post('nama_santri'),
            'aktif' => $this->input->post('aktif')
        );
        $this->Mpenempatan->edit_history(array('id_history' => $id), $data1);
        $data2 = array(
            'id_person' => $this->input->post('nama_santri'),
            'id_kamar' => $this->input->post('nama_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mpenempatan->simpan_history($data2);
        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }
}
