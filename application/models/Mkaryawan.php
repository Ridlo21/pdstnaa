<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkaryawan extends CI_Model
{

    public function karyawan_all()
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_karyawan.id_person');
        $this->db->select('id_karyawan, niup, nama, tgl_diangkat, tgl_berhenti, instansi, tb_karyawan.status');
        $this->db->from('tb_karyawan');
        $this->db->where('tb_karyawan.status', 'Aktif');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_karyawan($data)
    {
        $this->db->insert('tb_karyawan', $data);
    }

    public function otomatis_santri()
    {
        $this->db->from('tb_person');
        $this->db->order_by('nama', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function karyawan_id($id)
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_karyawan.id_person');
        $this->db->where('id_karyawan', $id);
        $this->db->from('tb_karyawan');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_karyawan($id, $data)
    {
        $this->db->update('tb_karyawan', $data, $id);
    }

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
                                    pos, nik_a, tgl_lahir_a, nm_a, pndkn_a, pkrjn_a, nik_i, tgl_lahir_i, nm_i, pndkn_i, pkrjn_i,
                                    nik_w, nm_w, pndkn_w, pkrjn_w, pndptn_w, almt_w, pos_w, hp_w, telp_w,
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
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom');
        $this->db->where('id_person', $id);
        $this->db->order_by('id_detail_mahrom', 'desc');
        $this->db->from('tb_detail_mahrom');
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
}
