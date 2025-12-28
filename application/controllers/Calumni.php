<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calumni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Malumni');
    }

    public function alumni()
    {
        $output['alumni'] = $this->Malumni->alumni();
        $this->load->view('menu_alumni/alumni', $output);
    }

    public function tambah_alumni()
    {
        $this->load->view('menu_alumni/alumni_tambah');
    }

    public function otomatis_santri()
    {
        $q = $this->Malumni->otomatis_santri();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $k) {
                $data[] = [
                    'nama' => $k['nama'],
                    'id_person' => $k['id_person'],
                    'niup' => $k['niup']
                ];
            }
        } else {
            $data[] = [
                'nama' => "Tidak ada",
            ];
        }
        echo json_encode($data);
    }

    public function simpan_alumni()
    {
        $id = $this->input->post('idperson');
        $data = array('status' => "tidak");
        $this->Malumni->edit_santri(array('id_person' => $id), $data);
        $data2 = array(
            'id_person' => $this->input->post('idperson'),
            'tgl_berhenti' => $this->input->post('tgl_berhenti')
        );
        $this->Malumni->simpan_alumni($data2);
        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Malumni->santri_idx($id),
            'data_alamat' => $this->Malumni->alamat_wali($id),
            'mahrom' => $this->Malumni->data_mahrom($id),
            'domisili' => $this->Malumni->data_domisili($id)
        );
        $this->load->view('menu_alumni/detail_santri', $data);
    }
}
