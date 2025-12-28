<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpengajar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpengajar');
    }

    public function pengajar()
    {
        $output['pengajar'] = $this->Mpengajar->pengajar();
        $this->load->view('menu_pengajar/pengajar', $output);
    }

    public function tambah_pengajar_nubdah()
    {
        $this->load->view('menu_pengajar/pengajar_tambah');
    }

    public function ui_pengajar()
    {
        $id_pengurus_lawas = $this->db->select('id_person')
            ->from('tb_pengurus')
            ->where('status', 'Aktif')
            ->get();
        $id_guru_lawas = $this->db->select('id_person')
            ->from('tb_guru_nubdah')
            ->where('status_guru_nubdah', 'Aktif')
            ->get();
        $id_karyawan_lawas = $this->db->select('id_person')
            ->from('tb_karyawan')
            ->where('status', 'Aktif')
            ->get();
        if ($id_pengurus_lawas->num_rows() > 0 || $id_guru_lawas->num_rows() > 0 || $id_karyawan_lawas->num_rows() > 0) {
            foreach ($id_pengurus_lawas->result_array() as  $e) {
                $dat[] = $e['id_person'];
            }
            foreach ($id_guru_lawas->result_array() as  $ll) {
                $dat[] = $ll['id_person'];
            }
            foreach ($id_karyawan_lawas->result_array() as  $jj) {
                $dat[] = $jj['id_person'];
            }
        } else {
            $dat = ['0'];
        }
        $cari = $this->input->post('cari');
        $q = $this->Mpengajar->ui_pengajar($cari, $dat);
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $k) {
                $data[] = [
                    'sukses' => true,
                    'nama' => $k['nama'],
                    'id_person' => $k['id_person'],
                    'niup' => $k['niup'],
                    'alamat' => $k['alamat_lengkap'],
                ];
            }
        } else {
            $data[] = [
                'sukses' => false,
                'nama' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
                'niup' =>  '<span style="color:red">' . $cari . '</span> tidak ditemukan',
            ];
        }
        echo json_encode($data);
    }

    public function simpan_pengajar_nubdah()
    {
        $tgl = "0000-00-00";
        $data = array(
            'id_person' => $this->input->post('id_person'),
            'tgl_diangkat' => $this->input->post('tgl_diangkat'),
            'tgl_berhenti' => $tgl,
            'status_guru_nubdah' => "Aktif"
        );
        $this->Mpengajar->simpan_pengajar_nubdah($data);
        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function form_edit_pengajar()
    {
        $id = $this->input->post('idpengajar');
        $data = $this->Mpengajar->pengajar_id($id);
        $this->load->view('menu_pengajar/pengajar_edit', $data);
    }

    public function edit_pengajar()
    {
        $id = $this->input->post('idpengajar');
        $data = array('id_person' => $this->input->post('id_person'));
        $this->Mpengajar->edit_pengajar(array('id_guru_nubdah' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function nonaktifkan_pengajar()
    {
        $id = $this->input->post('id');
        $data = array(
            'status_guru_nubdah' => "Tidak Aktif",
            'tgl_berhenti' => $this->input->post('tgl_berhenti')
        );
        $this->Mpengajar->edit_pengajar(array('id_guru_nubdah' => $id), $data);
    }

    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Mpengajar->santri_idx($id),
            'data_alamat' => $this->Mpengajar->alamat_wali($id),
            'mahrom' => $this->Mpengajar->data_mahrom($id),
            'domisili' => $this->Mpengajar->data_domisili($id)
        );
        $this->load->view('menu_pengajar/detail_santri', $data);
    }
}
