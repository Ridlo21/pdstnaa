<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cterima extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mterima');
    }

    public function menu_terima_santri()
    {
        $output['psb'] = $this->Mterima->psb_all();
        $this->load->view('terima_santri/terima', $output);
    }

    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mterima->get_blok($id)->result();
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mterima->get_kamar($id)->result();
        echo json_encode($output);
    }

    public function form_terima()
    {
        $id = $this->input->post('idpsb');
        $data = array(
            'data_psb' => $this->Mterima->terima_id($id),
            'alamat' => $this->Mterima->alamat_santri($id),
            'data_alamat' => $this->Mterima->alamat_wali($id),
            'mahrom' => $this->Mterima->data_mahrom($id),
            'wilayah' => $this->Mterima->get_wilayah()->result()
        );
        $this->load->view('terima_santri/form_terima', $data);
    }

    public function simpan_santri_baru()
    {
        $santri_terakhir = $this->Mterima->santri_terakhir_diinput();
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
        $status = 'Santri';
        $data = array(
            'nik' => $this->input->post('nik'),
            'niup' => $kode_awal . $thn_daftar . $tgl . $niupnya,
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'kab' => $this->input->post('kab'),
            'prov' => $this->input->post('prov'),
            'pos' => $this->input->post('pos'),
            'pndkn' => $this->input->post('pndkn'),
            'nm_a' => $this->input->post('nm_a'),
            'pndkn_a' => $this->input->post('pndkn_a'),
            'pkrjn_a' => $this->input->post('pkrjn_a'),
            'nm_i' => $this->input->post('nm_i'),
            'pndkn_i' => $this->input->post('pndkn_i'),
            'pkrjn_i' => $this->input->post('pkrjn_i'),
            'dlm_klrg' => $this->input->post('dlm_klrg'),
            'ank_ke' => $this->input->post('ank_ke'),
            'sdr' => $this->input->post('sdr'),
            'nm_w' => $this->input->post('nm_w'),
            'pndkn_w' => $this->input->post('pndkn_w'),
            'pkrjn_w' => $this->input->post('pkrjn_w'),
            'pndptn_w' => $this->input->post('pndptn_w'),
            'almt_w' => $this->input->post('almt_w'),
            'kec_w' => $this->input->post('kec_w'),
            'kab_w' => $this->input->post('kab_w'),
            'prov_w' => $this->input->post('prov_w'),
            'pos_w' => $this->input->post('pos_w'),
            'hp_w' => $this->input->post('hp_w'),
            'telp_w' => $this->input->post('telp_w'),
            'status_dipesantren' => $status,
            'foto_warna_santri' => $this->input->post('foto_warna_santri'),
            'foto_wali_santri_warna' => $this->input->post('foto_wali_santri_warna'),
            'foto_scan_kk' => $this->input->post('foto_scan_kk'),
            'foto_scan_akta' => $this->input->post('foto_scan_akta'),
            'foto_scan_skck' => $this->input->post('foto_scan_skck'),
            'foto_scan_ket_sehat' => $this->input->post('foto_scan_ket_sehat'),
        );
        $last_id = $this->Mterima->simpan_santri_baru($data);
        $status_a = 'Ayah';
        $data1 = array(
            'id_person' => $last_id,
            'nama_mahrom' => $this->input->post('nm_a'),
            'hubungan' => $status_a
        );
        $this->Mterima->simpan_mahrom($data1);
        $status_i = 'Ibu';
        $data2 = array(
            'id_person' => $last_id,
            'nama_mahrom' => $this->input->post('nm_i'),
            'hubungan' => $status_i
        );
        $this->Mterima->simpan_mahrom_i($data2);
        $data3 = array(
            'id_person' => $last_id,
            'id_kamar' => $this->input->post('id_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mterima->simpan_penempatan($data3);
        $output = array(
            'pesan' => 'sukses'

        );
        echo json_encode($output);
    }
}
