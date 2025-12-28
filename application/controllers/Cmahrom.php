<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmahrom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mmahrom');
    }

    public function tambah_mahrom()
    {
        $this->load->view('menu_mahrom/mahrom_tambah');
    }

    public function simpan_mahrom()
    {
        $data = array(
            'nama_mahrom' => $this->input->post('nama_mahrom'),
            'hubungan' => $this->input->post('hubungan')
        );
        $this->Mmahrom->simpan_mahrom($data);
        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }

    public function form_edit_mahrom()
    {
        $id = $this->input->post('idmahrom');
        $data = $this->Mmahrom->mahrom_id($id);
        $this->load->view('menu_mahrom/mahrom_edit', $data);
    }

    public function edit_mahrom()
    {
        $id = $this->input->post('idmahrom');
        $data = array(
            'nama_mahrom' => $this->input->post('nama_mahrom'),
            'hubungan' => $this->input->post('hubungan')
        );
        $this->Mmahrom->edit_mahrom(array('id_mahrom' => $id), $data);

        $output = array(
            'pesan' => 'sukses'
        );
        echo json_encode($output);
    }

    public function tambah_berkas()
    {
        $id = $this->input->post('idmahrom');
        $data = $this->Mmahrom->mahrom_id($id);
        $this->load->view('menu_mahrom/berkas', $data);
    }

    public function simpan_berkas()
    {
        $config['upload_path'] = './berkas';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("foto")) {
            $data = array('upload_data' => $this->upload->data());

            $id = $this->input->post('idmahrom');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto' => $image);

            $result = $this->Mmahrom->simpan_upload_berkas(array('id_mahrom' => $id), $data_update);
            echo json_encode($result);
        }
    }
}
