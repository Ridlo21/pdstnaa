<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csantri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Msantri');
    }

    public function menu_santri()
    {
    	$output['santri']= $this->Msantri->santri();
        $this->load->view('user/menu_santri/data_santri', $output);
    }

    public function menu_tambah_santri()
    {
        $output = array(
            'provinsi' => $this->Msantri->get_provinsi()->result(),
            'wilayah' => $this->Msantri->get_wilayah()->result()
        );
        $this->load->view('user/menu_santri/tambah_santri', $output);
    }

    public function get_kabupaten()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Msantri->get_kabupaten($id)->result();
        echo json_encode($output);
    }

    public function get_kecamatan()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Msantri->get_kecamatan($id)->result();
        echo json_encode($output);
    }

    public function get_desa()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Msantri->get_desa($id)->result();
        echo json_encode($output);
    }

    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Msantri->get_blok($id)->result();
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Msantri->get_kamar($id)->result();
        echo json_encode($output);
    }

    public function simpan_santri()
    {
        $santri_terakhir = $this->Msantri->santri_terakhir_diinput();
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
            'desa_w' => $this->input->post('desa_w'),
            'kec_w' => $this->input->post('kec_w'),
            'kab_w' => $this->input->post('kab_w'),
            'prov_w' => $this->input->post('prov_w'),
            'pos_w' => $this->input->post('pos_w'),
            'hp_w' => $this->input->post('hp_w'),
            'telp_w' => $this->input->post('telp_w'),
            'status_dipesantren' => $this->input->post('status')
        );
        $last_id = $this->Msantri->simpan_santri($data);
        $data2 = array(
            'id_person' => $last_id,
            'id_kamar' => $this->input->post('id_kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Msantri->simpan_penempatan($data2);
        $data3 = array(
            'id_person' => $last_id,
            'nama_mahrom' => $this->input->post('nm_a'),
            'hubungan' => $this->input->post('hbg')
        );
        $this->Msantri->simpan_mahrom($data3);
        $data4 = array(
            'id_person' => $last_id,
            'nama_mahrom' => $this->input->post('nm_i'),
            'hubungan' => $this->input->post('hbgi')
        );
        $this->Msantri->simpan_mahrom_i($data4);
        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses

        );
        echo json_encode($output);
    }

    public function berkas()
    {
        $id = $this->input->post('idperson');
        $data = $this->Msantri->santri_id($id);
        $this->load->view('user/menu_santri/berkas', $data);
    }

    public function simpan_berkas()
    {
        $config['upload_path'] = './gambar/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("foto")) {
            $data = array('upload_data' => $this->upload->data());

            $id_santri = $this->input->post('idperson');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto_warna_santri' => 'gambar/dokumen/' . $image,);

            $result = $this->Msantri->simpan_upload_berkas(array('id_person' => $id_santri), $data_update);
            echo json_encode($result);
        }
    }

    public function simpan_berkas_foto_wl()
    {
        $config['upload_path'] = './gambar/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("wali")) {
            $data = array('upload_data' => $this->upload->data());

            $id_santri = $this->input->post('idperson');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto_wali_santri_warna' => 'gambar/dokumen/' . $image,);

            $result = $this->Msantri->simpan_upload_berkas(array('id_person' => $id_santri), $data_update);
            echo json_encode($result);
        }
    }

    public function simpan_berkas_kk()
    {
        $config['upload_path'] = './gambar/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("kk")) {
            $data = array('upload_data' => $this->upload->data());

            $id_santri = $this->input->post('idperson');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto_scan_kk' => 'gambar/dokumen/' . $image,);

            $result = $this->Msantri->simpan_upload_berkas(array('id_person' => $id_santri), $data_update);
            echo json_encode($result);
        }
    }

    public function simpan_berkas_akta()
    {
        $config['upload_path'] = './gambar/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("akta")) {
            $data = array('upload_data' => $this->upload->data());

            $id_santri = $this->input->post('idperson');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto_scan_akta' => 'gambar/dokumen/' . $image,);

            $result = $this->Msantri->simpan_upload_berkas(array('id_person' => $id_santri), $data_update);
            echo json_encode($result);
        }
    }

    public function simpan_berkas_skck()
    {
        $config['upload_path'] = './gambar/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("skck")) {
            $data = array('upload_data' => $this->upload->data());

            $id_santri = $this->input->post('idperson');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto_scan_skck' => 'gambar/dokumen/' . $image,);

            $result = $this->Msantri->simpan_upload_berkas(array('id_person' => $id_santri), $data_update);
            echo json_encode($result);
        }
    }

    public function simpan_berkas_ket_sehat()
    {
        $config['upload_path'] = './gambar/dokumen/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("ket_sehat")) {
            $data = array('upload_data' => $this->upload->data());

            $id_santri = $this->input->post('idperson');
            $image = $data['upload_data']['file_name'];
            $data_update = array('foto_scan_ket_sehat' => 'gambar/dokumen/' . $image,);

            $result = $this->Msantri->simpan_upload_berkas(array('id_person' => $id_santri), $data_update);
            echo json_encode($result);
        }
    }

    public function form_edit_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Msantri->santri_id($id),
            'alamat' => $this->Msantri->alamat_santri($id),
            'data_alamat' => $this->Msantri->alamat_wali($id),
            'provinsi' => $this->Msantri->get_provinsi()->result()
        );
        $this->load->view('user/menu_santri/edit_santri', $data);
    }

    public function edit_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
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
            'desa_w' => $this->input->post('desa_w'),
            'kec_w' => $this->input->post('kec_w'),
            'kab_w' => $this->input->post('kab_w'),
            'prov_w' => $this->input->post('prov_w'),
            'pos_w' => $this->input->post('pos_w'),
            'hp_w' => $this->input->post('hp_w'),
            'telp_w' => $this->input->post('telp_w'),
        );
        $this->Msantri->edit_santri(array('id_person' => $id), $data);

        $pesan = "ya";
        $sukses = "Data Berhasil Disimpan";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses

        );
        echo json_encode($output);
    }

    // Fitur detail santri
    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Msantri->santri_idx($id),
            'data_alamat' => $this->Msantri->alamat_wali($id),
            'mahrom' => $this->Msantri->data_mahrom($id),
            'domisili' => $this->Msantri->data_domisili($id)
        );
        $this->load->view('user/menu_santri/detail_santri', $data);
    }

    // Fitur print formulir
    public function print_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Msantri->santri_idx($id),
            'data_alamat' => $this->Msantri->alamat_wali($id)
        );
        $this->load->view('user/menu_santri/print', $data);
    }

    public function form_tambah_mahrom()
    {
        $data['idx'] = $this->input->post('idperson');
        $this->load->view('user/menu_santri/tambah_mahrom', $data);
    }

    public function simpan_detail_mahrom()
    {
        $jumlah_barisan = $this->input->post('nomor_urut');
        for ($i = 0; $i < $jumlah_barisan; $i++) {
            if (trim($this->input->post('person[' . $i . ']') != '')) {
                $id_person = trim($this->input->post('person[' . $i . ']'));
                $nama_mahrom = trim($this->input->post('mahrom[' . $i . ']'));
                $hubungan_mahrom = trim($this->input->post('hubungan[' . $i . ']'));
                $data1 = array(
                    'id_person' => $id_person,
                    'nama_mahrom' => $nama_mahrom,
                    'hubungan' => $hubungan_mahrom
                );
                $this->Msantri->simpan_data_mahrom($data1);
                // $data2 = array(
                //     'id_mahrom' => $last_id,
                //     'id_person' => $this->input->post('id_person')
                // );
                // $this->Msantri->simpan_detail_data_mahrom($data2);
            }
        }
        $output = array(
            'pesan' => 'sukses',
            'id' => $this->input->post('id_person')
        );
        echo json_encode($output);
    }

    // export
    public function export_excel()
    {
        $output['santri'] = $this->Msantri->export();
        $this->load->view('user/menu_santri/export_santri', $output);
    }

    public function excel_putra()
    {
        $output['santri'] = $this->Msantri->export_putra();
        $this->load->view('user/menu_santri/export_santri_putra', $output);
    }

    public function excel_putri()
    {
        $output['santri'] = $this->Msantri->excel_putri();
        $this->load->view('user/menu_santri/export_santri_putri', $output);
    }
}