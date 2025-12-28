<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cperson extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mperson');
        $this->load->helper(array('url', 'form', 'download'));
    }

    // Fitur data santri aktif
    public function menu_santri()
    {
        $this->load->view('menu_person/santri');
    }

    function get_data_person()
    {
        $list = $this->Mperson->get_datatables("1");
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->niup;
            $row[] = $field->nama;
            $row[] = $field->alamat_lengkap;
            $row[] = '
                        <button type="button" id="bt-detail" class="btn btn-sm rounded-circle btn-info" title="Detail" data="' . $field->id_person . '">
                            <i class="fas fa-info-circle"></i>
                        </button>
                        <button type="button" id="bt-edit" class="btn btn-sm rounded-circle btn-warning text-light" title="Edit" data="' . $field->id_person . '">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button type="button" id="bt-berkas" class="btn btn-sm rounded-circle btn-primary" title="Upload" data="' . $field->id_person . '">
                            <i class="fas fa-image"></i>
                        </button>
                        <button type="button" id="bt-print" class="btn btn-sm rounded-circle btn-secondary" title="Cetak" data="' . $field->id_person . '">
                            <i class="fas fa-print"></i>
                        </button>
                        <button type="button" id="bt-hapus" class="btn btn-sm rounded-circle btn-danger" title="Hapus" data="' . $field->id_person . '">
                            <i class="fas fa-trash-alt"></i>
                        </button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mperson->count_all(),
            "recordsFiltered" => $this->Mperson->count_filtered("1"),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    // Fitur tambah santri
    public function tambah_santri_1()
    {
        $id = $this->input->post('o');
        $output = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'provinsi' => $this->Mperson->get_provinsi()->result()
        );
        $this->load->view('menu_person/tambah/santri_tambah', $output);
    }

    public function tambah_santri_2()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'ayah' => $this->Mperson->data_mahrom_a($id),
            'ibu' => $this->Mperson->data_mahrom_i($id)
        );
        $this->load->view('menu_person/tambah/santri_tambah_v2', $data);
    }

    public function tambah_santri_3()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'provinsi' => $this->Mperson->get_provinsi()->result()
        );
        $this->load->view('menu_person/tambah/santri_tambah_v3', $data);
    }

    public function tambah_santri_4()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'kamar' => $this->Mperson->domisili($id),
            'wilayah' => $this->Mperson->get_wilayah()->result(),
        );
        $this->load->view('menu_person/tambah/santri_tambah_v4', $data);
    }

    // Fitur Simpan
    public function simpan_santri()
    {
        $data = array(
            'niup' => "",
            'nik' => "",
            'nama' => "",
            'tempat_lahir' => "",
            'tanggal_lahir' => "",
            'jenis_kelamin' => "",
            'dlm_klrg' => "",
            'ank_ke' => "",
            'sdr' => "",
            'alamat_lengkap' => "",
            'desa' => "",
            'kec' => "",
            'kab' => "",
            'prov' => "",
            'pos' => "",
            'pndkn' => "",
            'nik_a' => "",
            'nm_a' => "",
            'tgl_lahir_a' => "",
            'pndkn_a' => "",
            'pkrjn_a' => "",
            'nik_i' => "",
            'nm_i' => "",
            'tgl_lahir_i' => "",
            'pndkn_i' => "",
            'pkrjn_i' => "",
            'nik_w' => "",
            'nm_w' => "",
            'pndkn_w' => "",
            'pkrjn_w' => "",
            'pndptn_w' => "",
            'almt_w' => "",
            'desa_w' => "",
            'kec_w' => "",
            'kab_w' => "",
            'prov_w' => "",
            'pos_w' => "",
            'hp_w' => "",
            'telp_w' => "",
            'foto_warna_santri' => "",
            'foto_wali_santri_warna' => "",
            'foto_scan_kk' => "",
            'foto_scan_akta' => "",
            'foto_scan_skck' => "",
            'foto_scan_ket_sehat' => "",
            'status' => "",
            'tgl_daftar' => "",
        );
        $i = $this->Mperson->simpan($data);
        $p = array('i' => $i);
        echo json_encode($p);
    }
    public function simpan_santri_v1()
    {
        $id = $this->input->post('o');
        $t_l = $this->input->post('tanggal_lahir');
        $bulan = $this->input->post('bulan_lahir');
        $thn = $this->input->post('tahun_lahir');
        $tgl_lahir = $thn . '-' . $bulan . '-' . $t_l;
        $data1 = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $tgl_lahir,
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'kab' => $this->input->post('kab'),
            'prov' => $this->input->post('prov'),
            'pos' => $this->input->post('pos'),
            'dlm_klrg' => $this->input->post('dlm_klrg'),
            'ank_ke' => $this->input->post('ank_ke'),
            'sdr' => $this->input->post('sdr'),
        );
        $this->Mperson->simpan_santri_v2(array('id_person' => $id), $data1);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function simpan_santri_v2()
    {
        $id = $this->input->post('o');
        $tgl_a = $this->input->post('tanggal_lahir_a');
        $bln_a = $this->input->post('bulan_lahir_a');
        $thn_a = $this->input->post('tahun_lahir_a');
        $tgl_lahir_a = $thn_a . '-' . $bln_a . '-' . $tgl_a;
        $tgl_i = $this->input->post('tanggal_lahir_i');
        $bln_i = $this->input->post('bulan_lahir_i');
        $thn_i = $this->input->post('tahun_lahir_i');
        $tgl_lahir_i = $thn_i . '-' . $bln_i . '-' . $tgl_i;
        $data1 = array(
            'nik_a' => $this->input->post('nik_a'),
            'nm_a' => $this->input->post('nm_a'),
            'tgl_lahir_a' => $tgl_lahir_a,
            'pndkn_a' => $this->input->post('pndkn_a'),
            'pkrjn_a' => $this->input->post('pkrjn_a'),
            'nik_i' => $this->input->post('nik_i'),
            'nm_i' => $this->input->post('nm_i'),
            'tgl_lahir_i' => $tgl_lahir_i,
            'pndkn_i' => $this->input->post('pndkn_i'),
            'pkrjn_i' => $this->input->post('pkrjn_i'),
        );
        $this->Mperson->simpan_santri_v2(array('id_person' => $id), $data1);
        $data_a = array(
            'nik_m' => $this->input->post('nik_a'),
            'nama_mahrom' => $this->input->post('nm_a'),
            'tanggal_lahir' => $tgl_lahir_a,
            'alamat_mahrom' => $this->input->post('alamat_a'),
            'hubungan' => "Ayah",
        );
        $a = $this->Mperson->simpan_ayah($data_a);
        $detail_a = array(
            'id_person' => $id,
            'id_mahrom' => $a
        );
        $this->Mperson->detail_ayah($detail_a);
        $data_i = array(
            'nik_m' => $this->input->post('nik_i'),
            'nama_mahrom' => $this->input->post('nm_i'),
            'tanggal_lahir' => $tgl_lahir_i,
            'alamat_mahrom' => $this->input->post('alamat_i'),
            'hubungan' => "Ibu",
        );
        $i = $this->Mperson->simpan_ibu($data_i);
        $detail_i = array(
            'id_person' => $id,
            'id_mahrom' => $i
        );
        $this->Mperson->detail_ibu($detail_i);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function simpan_santri_v3()
    {
        $id = $this->input->post('o');
        $data1 = array(
            'nik_w' =>  $this->input->post('nik_w'),
            'nm_w' => $this->input->post('nm_w'),
            'pndkn_w' => $this->input->post('pndkn_w'),
            'pkrjn_w' => $this->input->post('pkrjn_w'),
            'hp_w' => $this->input->post('hp_w'),
            'telp_w' => $this->input->post('telp_w'),
            'pndptn_w' => $this->input->post('pndptn_w'),
            'almt_w' => $this->input->post('almt_w'),
            'pos_w' => $this->input->post('pos_w'),
            'desa_w' => $this->input->post('desa_w'),
            'kec_w' => $this->input->post('kec_w'),
            'kab_w' => $this->input->post('kab_w'),
            'prov_w' => $this->input->post('prov_w'),
            'pndkn' => $this->input->post('pndkn'),
            'tgl_daftar' => $this->input->post('tgl_daftar')
        );
        $this->Mperson->simpan_santri_v2(array('id_person' => $id), $data1);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function simpan_santri_v4()
    {
        $id = $this->input->post('o');
        $data = array(
            'id_person' => $id,
            'id_kamar' => $this->input->post('kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan')
        );
        $this->Mperson->simpan_penempatan($data);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function domisilinya()
    {
        $id = $this->input->post('history');
        $n = $this->input->post('o');
        $data = array(
            'id_kamar' => $this->input->post('kamar'),
            'tgl_penetapan' => $this->input->post('tgl_penetapan'),
            'aktif' => "Ya"
        );
        $this->Mperson->edit_penempatan(array('id_history' => $id), $data);
        $p = array('i' => $n);
        echo json_encode($p);
    }

    public function selesai()
    {
        $id = $this->input->post('o');
        $b = $this->input->post('angkatan');
        $kodenya = $this->input->post('kodenya');
        $santri_terakhir = $this->Mperson->santri_terakhir_diinput($b);
        $countsantri_terakhir = $santri_terakhir[0]->jumlah;

        if ($countsantri_terakhir == NULL) {
            $nomor_induk_baru = '0001';
        } else {
            $kode = '0000';
            $panjang = 4 - strlen($countsantri_terakhir);
            // $countsantri_terakhir++;
            $nomor_induk_baru = substr($kode, 0, $panjang) . $countsantri_terakhir;
        }
        $niupnya = $nomor_induk_baru;
        $data1 = array(
            'niup' => $kodenya . $niupnya,
            'status' => "aktif"
        );
        $this->Mperson->simpan_santri_v2(array('id_person' => $id), $data1);
    }

    public function batal()
    {
        $id = $this->input->post('id');
        $data = $this->Mperson->batalkan($id);
        json_encode($data);
    }

    public function nonaktif()
    {
        $id = $this->input->post('id');
        $data1 = array(
            'status' => "tidak"
        );
        $this->Mperson->simpan_santri_v2(array('id_person' => $id), $data1);
        $data2 = array(
            'id_person' => $this->input->post('id'),
            'tgl_berhenti' => date('Y-m-d')
        );
        $this->Mperson->simpan_alumni($data2);
        $data = array(
            'aktif' => 'tidak'
        );
        $this->Mperson->edit_penempatan(array('id_person' => $id), $data);
        $data2 = array(
            'status' => 'Tidak Aktif'
        );

        $this->Mperson->edit_history_divisi(array('id_person' => $id), $data2);

        $id_pengurus = $this->db->get_where('tb_pengurus', ['id_person' => $id], ['status' => 'aktif'])->row_array();
        $id_pengajar = $this->db->get_where('tb_guru_nubdah', ['id_person' => $id], ['status_guru_nubdah' => 'aktif'])->row_array();
        $id_karyawan = $this->db->get_where('tb_karyawan', ['id_person' => $id], ['statsu' => 'aktif'])->row_array();
        // $id_pengurus = $this->db->from('tb_pengurus')->where('id_person', $id)->where('status', 'aktif')->get()->row();
        if ($id_pengurus['id_person'] === $id) {
            $data4 = array(
                'status' => 'tidak aktif'
            );
            $this->Mperson->nonaktif_pengurus(array('id_person' => $id), $data4);
        }

        if ($id_pengajar['id_person'] === $id) {
            $data5 = array(
                'status_guru_nubdah' => 'Tidak Aktif'
            );
            $this->Mperson->nonaktif_pengajar(array('id_person' => $id), $data5);
        }

        if ($id_karyawan['id_person'] === $id) {
            $data6 = array(
                'status' => 'Tidak Aktif'
            );
            $this->Mperson->nonaktif_karyawan(array('id_person' => $id), $data6);
        }
    }

    // Ambil Wilayah Indonesia
    public function get_kabupaten()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mperson->get_kabupaten($id)->result();
        echo json_encode($output);
    }

    public function get_kecamatan()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mperson->get_kecamatan($id)->result();
        echo json_encode($output);
    }

    public function get_desa()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mperson->get_desa($id)->result();
        echo json_encode($output);
    }

    // Ambil Data Blok, dan Kamar
    public function get_blok()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mperson->get_blok($id)->result();
        echo json_encode($output);
    }

    public function get_kamar()
    {
        $id = $this->input->post('id', TRUE);
        $output = $this->Mperson->get_kamar($id)->result();
        echo json_encode($output);
    }

    // Edit santri
    public function form_edit_santri()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'provinsi' => $this->Mperson->get_provinsi()->result()
        );
        $this->load->view('menu_person/edit/santri_edit', $data);
    }

    public function form_edit_santri_2()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'ayah' => $this->Mperson->data_mahrom_a($id),
            'ibu' => $this->Mperson->data_mahrom_i($id)
        );
        $this->load->view('menu_person/edit/santri_edit_v2', $data);
    }

    public function form_edit_santri_3()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_terakhir($id),
            'provinsi' => $this->Mperson->get_provinsi()->result()
        );
        $this->load->view('menu_person/edit/santri_edit_v3', $data);
    }

    public function form_edit_santri_4()
    {
        $id = $this->input->post('o');
        $data = array(
            'kamar' => $this->Mperson->domisili($id),
            'santri' => $this->Mperson->santri_terakhir($id),
            'wilayah' => $this->Mperson->get_wilayah()->result()
        );
        $this->load->view('menu_person/edit/santri_edit_v4', $data);
    }

    public function form_tambah_mahrom_2()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_id($id),
            'mahrom' => $this->Mperson->data_mahrom($id),
        );
        $this->load->view('menu_person/edit/mahrom_tambah_2', $data);
    }

    public function edit_santri_v1()
    {
        $id = $this->input->post('o');
        $t_l = $this->input->post('tanggal_lahir');
        $bulan = $this->input->post('bulan_lahir');
        $thn = $this->input->post('tahun_lahir');
        $tgl_lahir = $thn . '-' . $bulan . '-' . $t_l;
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $tgl_lahir,
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'kab' => $this->input->post('kab'),
            'prov' => $this->input->post('prov'),
            'pos' => $this->input->post('pos'),
            'dlm_klrg' => $this->input->post('dlm_klrg'),
            'ank_ke' => $this->input->post('ank_ke'),
            'sdr' => $this->input->post('sdr'),
        );
        $this->Mperson->edit_santri(array('id_person' => $id), $data);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function edit_santri_v2()
    {
        $id = $this->input->post('o');
        $id_a = $this->input->post('a');
        $id_i = $this->input->post('i');
        $tgl_a = $this->input->post('tanggal_lahir_a');
        $bln_a = $this->input->post('bulan_lahir_a');
        $thn_a = $this->input->post('tahun_lahir_a');
        $tgl_lahir_a = $thn_a . '-' . $bln_a . '-' . $tgl_a;
        $tgl_i = $this->input->post('tanggal_lahir_i');
        $bln_i = $this->input->post('bulan_lahir_i');
        $thn_i = $this->input->post('tahun_lahir_i');
        $tgl_lahir_i = $thn_i . '-' . $bln_i . '-' . $tgl_i;
        $data = array(
            'nik_a' => $this->input->post('nik_a'),
            'nm_a' => $this->input->post('nm_a'),
            'tgl_lahir_a' => $tgl_lahir_a,
            'pndkn_a' => $this->input->post('pndkn_a'),
            'pkrjn_a' => $this->input->post('pkrjn_a'),
            'nik_i' => $this->input->post('nik_i'),
            'nm_i' => $this->input->post('nm_i'),
            'tgl_lahir_i' => $tgl_lahir_i,
            'pndkn_i' => $this->input->post('pndkn_i'),
            'pkrjn_i' => $this->input->post('pkrjn_i'),
        );
        $this->Mperson->edit_santri(array('id_person' => $id), $data);
        $data_a = array(
            'nik_m' => $this->input->post('nik_a'),
            'nama_mahrom' => $this->input->post('nm_a'),
            'tanggal_lahir' => $tgl_lahir_a,
            'alamat_mahrom' => $this->input->post('alamat_a'),
            'hubungan' => "Ayah",
        );
        $this->Mperson->edit_ayah(array('id_mahrom' => $id_a), $data_a);
        $data_i = array(
            'nik_m' => $this->input->post('nik_i'),
            'nama_mahrom' => $this->input->post('nm_i'),
            'tanggal_lahir' => $tgl_lahir_i,
            'alamat_mahrom' => $this->input->post('alamat_i'),
            'hubungan' => "Ibu",
        );
        $this->Mperson->edit_ibu(array('id_mahrom' => $id_i), $data_i);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function edit_santri_v3()
    {
        $id = $this->input->post('o');
        $data1 = array(
            'nik_w' =>  $this->input->post('nik_w'),
            'nm_w' => $this->input->post('nm_w'),
            'pndkn_w' => $this->input->post('pndkn_w'),
            'pkrjn_w' => $this->input->post('pkrjn_w'),
            'hp_w' => $this->input->post('hp_w'),
            'telp_w' => $this->input->post('telp_w'),
            'pndptn_w' => $this->input->post('pndptn_w'),
            'almt_w' => $this->input->post('almt_w'),
            'pos_w' => $this->input->post('pos_w'),
            'desa_w' => $this->input->post('desa_w'),
            'kec_w' => $this->input->post('kec_w'),
            'kab_w' => $this->input->post('kab_w'),
            'prov_w' => $this->input->post('prov_w'),
            'pndkn' => $this->input->post('pndkn'),
        );
        $this->Mperson->edit_santri(array('id_person' => $id), $data1);
        $p = array('i' => $id);
        echo json_encode($p);
    }

    public function selesai_untuk_edit()
    {
        $id = $this->input->post('o');
        $data1 = array(
            'status' => "aktif"
        );
        $this->Mperson->simpan_santri_v2(array('id_person' => $id), $data1);
    }

    //  Fitur form upload berkas
    public function berkas()
    {
        $id = $this->input->post('idperson');
        $data = $this->Mperson->santri_id($id);
        $this->load->view('menu_person/berkas', $data);
    }

    //  Fitur upload berkas

    public function simpan_berkas()
    {
        $config['upload_path'] = '../gambar/foto/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($this->upload->do_upload('foto'))) {
            $data =  array(
                'upload_foto' => $this->upload->data(),
            );
            $id = $this->input->post('idperson');
            $idperson = $this->input->post('idperson');
            $fotos = $data['upload_foto']['file_name'];
            $data =  array(
                'foto_warna_santri' => "https://ponpesnaa.net/gambar/foto/" . $fotos
            );
            $this->Mperson->upload_foto_santri(array('id_person' => $idperson), $data, $id);
        }

        $configr['upload_path'] = '../gambar/wali/';
        $configr['allowed_types'] = 'gif|jpg|png';
        $configr['encrypt_name'] = TRUE;
        $this->upload->initialize($configr);
        if (!empty($this->upload->do_upload('wali'))) {
            $data =  array(
                'upload_wali' => $this->upload->data(),
            );
            $id = $this->input->post('idperson');
            $idperson = $this->input->post('idperson');
            $foto = $data['upload_wali']['file_name'];
            $data =  array(
                'foto_wali_santri_warna' => "https://ponpesnaa.net/gambar/wali/" . $foto
            );
            $this->Mperson->upload_foto_wali(array('id_person' => $idperson), $data, $id);
        }

        $configs['upload_path'] = '../gambar/kk/';
        $configs['allowed_types'] = 'gif|jpg|png';
        $configs['encrypt_name'] = TRUE;
        $this->upload->initialize($configs);
        if (!empty($this->upload->do_upload('kk'))) {
            $data =  array(
                'upload_kk' => $this->upload->data(),
            );
            $id = $this->input->post('idperson');
            $idperson = $this->input->post('idperson');
            $fotog = $data['upload_kk']['file_name'];
            $data =  array(
                'foto_scan_kk' => "https://ponpesnaa.net/gambar/kk/" . $fotog
            );
            $this->Mperson->upload_foto_kk(array('id_person' => $idperson), $data, $id);
        }

        $configt['upload_path'] = '../gambar/akta/';
        $configt['allowed_types'] = 'gif|jpg|png';
        $configt['encrypt_name'] = TRUE;
        $this->upload->initialize($configt);
        if (!empty($this->upload->do_upload('akta'))) {
            $data =  array(
                'upload_akta' => $this->upload->data(),
            );
            $id = $this->input->post('idperson');
            $idperson = $this->input->post('idperson');
            $fotogs = $data['upload_akta']['file_name'];
            $data =  array(
                'foto_scan_akta' => "https://ponpesnaa.net/gambar/akta/" . $fotogs
            );
            $this->Mperson->upload_foto_akta(array('id_person' => $idperson), $data, $id);
        }

        $configm['upload_path'] = '../gambar/skck/';
        $configm['allowed_types'] = 'gif|jpg|png';
        $configm['encrypt_name'] = TRUE;
        $this->upload->initialize($configm);
        if (!empty($this->upload->do_upload('skck'))) {
            $data =  array(
                'upload_skck' => $this->upload->data(),
            );
            $id = $this->input->post('idperson');
            $idperson = $this->input->post('idperson');
            $fotot = $data['upload_skck']['file_name'];
            $data =  array(
                'foto_scan_skck' => "https://ponpesnaa.net/gambar/skck/" . $fotot
            );
            $this->Mperson->upload_foto_skck(array('id_person' => $idperson), $data, $id);
        }

        $confign['upload_path'] = '../gambar/sukes/';
        $confign['allowed_types'] = 'gif|jpg|png';
        $confign['encrypt_name'] = TRUE;
        $this->upload->initialize($confign);
        if (!empty($this->upload->do_upload('ket_sehat'))) {
            $data =  array(
                'upload_ket_sehat' => $this->upload->data(),
            );
            $id = $this->input->post('idperson');
            $idperson = $this->input->post('idperson');
            $fotom = $data['upload_ket_sehat']['file_name'];
            $data =  array(
                'foto_scan_ket_sehat' => "https://ponpesnaa.net/gambar/sukes/" . $fotom
            );
            $this->Mperson->upload_foto_skck(array('id_person' => $idperson), $data, $id);
        }
    }


    // fitur download
    public function download_foto()
    {
        $filename = $this->input->get('nama');
        $fileContents = file_get_contents($filename);
        $file = $filename;
        force_download($file, $fileContents);
    }

    public function download_wali()
    {
        $filename = $this->input->get('nama');
        $fileContents = file_get_contents($filename);
        $file = $filename;
        force_download($file, $fileContents);
    }

    public function download_kk()
    {
        $filename = $this->input->get('nama');
        $fileContents = file_get_contents($filename);
        $file = $filename;
        force_download($file, $fileContents);
    }

    public function download_akta()
    {
        $filename = $this->input->get('nama');
        $fileContents = file_get_contents($filename);
        $file = $filename;
        force_download($file, $fileContents);
    }

    public function download_skck()
    {
        $filename = $this->input->get('nama');
        $fileContents = file_get_contents($filename);
        $file = $filename;
        force_download($file, $fileContents);
    }

    public function download_sukes()
    {
        $filename = $this->input->get('nama');
        $fileContents = file_get_contents($filename);
        $file = $filename;
        force_download($file, $fileContents);
    }

    // Fitur detail santri
    public function detail_santri()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Mperson->santri_idx($id),
            'data_alamat' => $this->Mperson->alamat_wali($id),
            'mahrom' => $this->Mperson->data_mahromnya($id),
            'domisili' => $this->Mperson->data_domisili($id)
        );
        $this->load->view('menu_person/detail_santri', $data);
    }

    // Fitur print formulir Surat Pernyataan Santri dan Wali
    public function print_santri()
    {
        $id = $this->input->post('idperson');
        $data = [
            'data' => $this->Mperson->santri_idx($id),
        ];
        $this->load->view('menu_person/print', $data);
    }

    public function cetak()
    {
        $id = $this->input->get('id');
        $data = array(
            'data' => $this->Mperson->santri_idx($id),
            'data_divisi' => $this->Mperson->divisi_by_person($id),
            'mahrom'  => $this->Mperson->mahrom_by_person($id),
        );
        $this->load->view('menu_person/cetak_formulir', $data);
    }

    public function cetak_p()
    {
        $id = $this->input->get('id');
        $data = array(
            'data' => $this->Mperson->santri_idx($id)
        );
        $this->load->view('menu_person/pernyataan_santri', $data);
    }

    public function cetak_ws()
    {
        $id = $this->input->get('id');
        $data = array(
            'data' => $this->Mperson->santri_idx($id),
            'data_alamat' => $this->Mperson->alamat_wali($id)
        );
        $this->load->view('menu_person/pernyataan_wali', $data);
    }

    // Fitur tambah Mahrom
    public function form_tambah_mahrom()
    {
        $id = $this->input->post('o');
        $data = array(
            'santri' => $this->Mperson->santri_id($id),
            'mahrom' => $this->Mperson->data_mahrom($id),
        );
        $this->load->view('menu_mahrom/mahrom_tambah', $data);
    }

    public function simpan_detail_mahrom()
    {
        $id =  $this->input->post('id_person');
        $ayahtiri = $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom')
            ->where('id_person', $id)
            ->where('hubungan', 'Ayah Tiri')
            ->get('tb_detail_mahrom')
            ->num_rows();
        $ibutiri = $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom')
            ->where('id_person', $id)
            ->where('hubungan', 'Ibu Tiri')
            ->get('tb_detail_mahrom')
            ->num_rows();
        $kakek_Ayah = $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom')
            ->where('id_person', $id)
            ->where('hubungan', 'Kakek (Dari Ayah)')
            ->get('tb_detail_mahrom')
            ->num_rows();
        $kakek_Ibu = $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom')
            ->where('id_person', $id)
            ->where('hubungan', 'Kakek (Dari Ibu)')
            ->get('tb_detail_mahrom')
            ->num_rows();
        $nenek_Ayah = $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom')
            ->where('id_person', $id)
            ->where('hubungan', 'Nenek (Dari Ayah)')
            ->get('tb_detail_mahrom')
            ->num_rows();
        $nenek_Ibu = $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom')
            ->where('id_person', $id)
            ->where('hubungan', 'Nenek (Dari Ibu)')
            ->get('tb_detail_mahrom')
            ->num_rows();
        if ($this->input->post('hubungan') == "Ayah Tiri" && $ayahtiri > 0) {
            $pesan = "tidak";
            $sukses = "Ayah tidak Boleh Lebih Dari Satu";
        } elseif ($this->input->post('hubungan') == "Ibu Tiri" && $ibutiri > 0) {
            $pesan = "tidak";
            $sukses = "Ibu tidak Boleh Lebih Dari Satu";
        } elseif ($this->input->post('hubungan') == "Kakek (Dari Ayah)" && $kakek_Ayah > 0) {
            $pesan = "tidak";
            $sukses = "Kakek (Dari Ayah)  tidak Boleh Lebih Dari Satu";
        } elseif ($this->input->post('hubungan') == "Kakek (Dari Ibu)" && $kakek_Ibu > 0) {
            $pesan = "tidak";
            $sukses = "Kakek (Dari Ibu)  tidak Boleh Lebih Dari Satu";
        } elseif ($this->input->post('hubungan') == "Nenek (Dari Ayah)" && $nenek_Ayah > 0) {
            $pesan = "tidak";
            $sukses = "Nenek (Dari Ayah)  tidak Boleh Lebih Dari Satu";
        } elseif ($this->input->post('hubungan') == "Nenek (Dari Ibu)" && $nenek_Ibu > 0) {
            $pesan = "tidak";
            $sukses = "Nenek (Dari Ibu)  tidak Boleh Lebih Dari Satu";
        } else {
            $data1 = array(
                'nik_m' => $this->input->post('nik'),
                'nama_mahrom' => $this->input->post('nama'),
                'hubungan' => $this->input->post('hubungan'),
                'alamat_mahrom' => $this->input->post('alamat'),
                'tanggal_lahir' => $this->input->post('tanggal'),

            );
            $last_id = $this->Mperson->simpan_data_mahrom($data1);
            $data2 = array(
                'id_person' => $this->input->post('id_person'),
                'id_mahrom' => $last_id
            );
            $this->Mperson->simpan_detail_mahrom($data2);
            $pesan = "ya";
            $sukses = "Berhasil Disimpan";
        }
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    function get_mahrom()
    {
        $id = $this->input->post('id');
        $data = $this->Mperson->get_mahrom($id);
        echo json_encode($data);
    }

    public function edit_detail_mahrom()
    {
        $id = $this->input->post('id_edit');
        $data = array(
            'nik_m' => $this->input->post('nik_m'),
            'nama_mahrom' => $this->input->post('nama_m'),
            'hubungan' => $this->input->post('hubungannya'),
            'alamat_mahrom' => $this->input->post('alamat'),
            'tanggal_lahir' => $this->input->post('tanggal')
        );
        $this->Mperson->edit_mahrom(array('id_mahrom' => $id), $data);
        $pesan = "ya";
        $sukses = "Berhasil Diedit";
        $output = array(
            'pesan' => $pesan,
            'sukses' => $sukses
        );
        echo json_encode($output);
    }

    public function simpan_berkas_mahrom()
    {
        $config['upload_path'] = '../gambar/mahrom/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($this->upload->do_upload('foto_diri'))) {
            $data =  array(
                'upload_foto' => $this->upload->data(),
            );
            $id = $this->input->post('id_mahrom');
            $id_mahrom = $this->input->post('id_mahrom');
            $fotos = $data['upload_foto']['file_name'];
            $data =  array(
                'foto_diri' => $fotos
            );
            $this->Mperson->upload_foto_mahrom(array('id_mahrom' => $id_mahrom), $data, $id);
        }

        $configr['upload_path'] = '../gambar/ktp/';
        $configr['allowed_types'] = 'gif|jpg|png';
        $configr['encrypt_name'] = TRUE;
        $this->upload->initialize($configr);
        if (!empty($this->upload->do_upload('ktp'))) {
            $data =  array(
                'upload_ktp' => $this->upload->data(),
            );
            $id = $this->input->post('id_mahrom');
            $id_mahrom = $this->input->post('id_mahrom');
            $foto = $data['upload_ktp']['file_name'];
            $data =  array(
                'foto_kk_atau_ktp' => $foto
            );
            $this->Mperson->upload_foto_ktp(array('id_mahrom' => $id_mahrom), $data, $id);
        }
    }
}
