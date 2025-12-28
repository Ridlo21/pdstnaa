<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckaryawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mkaryawan');
    }

    public function karyawan()
    {
        $output['karyawan'] = $this->Mkaryawan->karyawan_all();
        $this->load->view('menu_karyawan/karyawan', $output);
    }

    public function tambah_karyawan()
    {
        $this->load->view('menu_karyawan/karyawan_tambah');
    }

    public function simpan_karyawan()
    {
        $data = array(
            'id_person' => $this->input->post('idperson'),
            'tgl_diangkat' => $this->input->post('tanggal_diangkat'),
            'tgl_berhenti' => $this->input->post('tanggal_berhenti'),
            'instansi' => $this->input->post('instansi'),
            'status' => "Aktif"
        );
        $this->Mkaryawan->simpan_karyawan($data);
        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function otomatis_karyawan()
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
        $q = $this->db->from('tb_person')
            ->order_by('nama', 'ASC')
            ->group_start()
            ->like('nama', $cari, 'both')
            ->or_like('niup', $cari, 'both')
            ->group_end()
            ->where_not_in('id_person', $dat)
            ->where('status', 'aktif')
            ->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $k) {
                $data[] = [
                    'sukses' => true,
                    'nama' => $k['nama'],
                    'id_person' => $k['id_person'],
                    'niup' => $k['niup'],
                    'alamat' => $k['alamat_lengkap']
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

    public function form_edit_karyawan()
    {
        $id = $this->input->post('idkaryawan');
        $data = $this->Mkaryawan->karyawan_id($id);
        $this->load->view('menu_karyawan/karyawan_edit', $data);
    }

    public function edit_karyawan()
    {
        $id = $this->input->post('idkaryawan');
        $data = array(
            'id_person' => $this->input->post('idperson'),
            'tgl_diangkat' => $this->input->post('tanggal_diangkat'),
            'tgl_berhenti' => $this->input->post('tanggal_berhenti'),
            'instansi' => $this->input->post('instansi')
        );
        $this->Mkaryawan->edit_karyawan(array('id_karyawan' => $id), $data);
        $pesan = "ya";
        $sukses = "Data Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function nonaktifkan_karyawan()
    {
        $id = $this->input->post('id');
        $tanggal = date('Y/m/d');
        $data = array(
            'status' => "Tidak Aktif",
            'tgl_berhenti' => $tanggal
        );
        $this->Mkaryawan->edit_karyawan(array('id_karyawan' => $id), $data);
    }

    public function detail_karyawan()
    {
        $id = $this->input->post('idkaryawan');
        $data = $this->Mkaryawan->karyawan_id($id);
        $this->load->view('menu_karyawan/karyawan_detail', $data);
    }

    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Mkaryawan->santri_idx($id),
            'data_alamat' => $this->Mkaryawan->alamat_wali($id),
            'mahrom' => $this->Mkaryawan->data_mahrom($id),
            'domisili' => $this->Mkaryawan->data_domisili($id)
        );
        $this->load->view('menu_karyawan/detail_santri', $data);
    }
}
