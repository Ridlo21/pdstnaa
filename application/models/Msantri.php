<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msantri extends CI_Model
{

    public function simpan_pengajar_diniyah_luar($data1)
    {
        $this->db->insert('tb_person', $data1);
        return $this->db->insert_id();
    }

    public function santri()
    {
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->order_by("id_person", "desc");
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }


    // Fitur tambah Santri

    public function santri_terakhir_diinput()
    {
        $query = $this->db->query('SELECT MAX(id_person) as jumlah FROM `tb_person`');
        return $query->result();
    }

    public function get_provinsi()
    {
        $query = $this->db->get('provinsi');
        return $query;
    }

    public function get_kabupaten($id)
    {
        $query = $this->db->get_where('kabupaten', array('province_id' => $id));
        return $query;
    }

    public function get_kecamatan($id)
    {
        $query = $this->db->get_where('kecamatan', array('regency_id' => $id));
        return $query;
    }

    public function get_desa($id)
    {
        $query = $this->db->get_where('desa', array('district_id' => $id));
        return $query;
    }

    public function get_wilayah()
    {
        $query = $this->db->get('tb_wilayah');
        return $query;
    }

    public function get_blok($id)
    {
        $query = $this->db->get_where('tb_blok', array('id_wilayah' => $id));
        return $query;
    }

    public function get_kamar($id)
    {
        $query = $this->db->get_where('tb_kamar', array('id_blok' => $id));
        return $query;
    }

    public function simpan_santri($data)
    {
        $this->db->insert('tb_person', $data);
        return $this->db->insert_id();
    }

    public function simpan_penempatan($data2)
    {
        $this->db->insert('tb_history', $data2);
    }

    public function simpan_mahrom($data3)
    {
        $this->db->insert('tb_mahrom', $data3);
    }

    public function simpan_mahrom_i($data4)
    {
        $this->db->insert('tb_mahrom', $data4);
    }

    // Fitur edit santri
    public function santri_id($id)
    {
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->row();
    }

    public function alamat_santri($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $this->db->select('desa.name as nama_desa, kecamatan.name as nama_kec, kabupaten.name as nama_kab,
                            provinsi.name as nama_prov,');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_santri($id, $data)
    {
        return $this->db->update('tb_person', $data, $id);
    }

    // fitur upload berkas
    public function simpan_upload_berkas($id, $data)
    {
        return $this->db->update('tb_person', $data, $id);
    }

    // fitur tambah mahrom
    public function simpan_data_mahrom($data1)
    {
        $this->db->insert('tb_mahrom', $data1);
        return  $this->db->insert_id();
    }

    // Fitur detail santri
    public function santri_idx($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->where('id_person', $id);
        $this->db->select('id_person, niup, nik, nama, tempat_lahir, tanggal_lahir,
                                    jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                                    desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                                    pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i,
                                    nm_w, pndkn_w, pkrjn_w, pndptn_w, almt_w, pos_w, hp_w, telp_w,
                                    foto_warna_santri, foto_wali_santri_warna, foto_scan_kk, foto_scan_akta, 
                                    foto_scan_skck, foto_scan_ket_sehat');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->row();
    }

    public function alamat_wali($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa_w');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec_w');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab_w');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov_w');
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $this->db->select('desa.name as nama_desa_w, kecamatan.name as nama_kec_w, kabupaten.name as nama_kab_w,
                            provinsi.name as nama_prov_w');
        $query = $this->db->get();
        return $query->row();
    }

    public function data_mahrom($id)
    {
        $this->db->where('id_person', $id);
        $this->db->from('tb_mahrom');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_domisili($id)
    {
        $this->db->join('tb_kamar', 'tb_kamar.id_kamar=tb_history.id_kamar');
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('id_person', $id);
        $this->db->from('tb_history');
        $query = $this->db->get();
        return $query->result();
    }

    public function export()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i, nm_w, pndkn_w, pkrjn_w, pndptn_w, hp_w, telp_w');
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }

    public function export_putra()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i, nm_w, pndkn_w, pkrjn_w, pndptn_w, hp_w, telp_w');
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->where_not_in('jenis_kelamin', 'Perempuan');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }

    public function excel_putri()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i, nm_w, pndkn_w, pkrjn_w, pndptn_w, hp_w, telp_w');
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }
}