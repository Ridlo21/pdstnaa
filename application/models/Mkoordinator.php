<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkoordinator extends CI_Model
{
    public function priode()
    {
        $this->db->from('tb_periode');
        return $this->db->get()->result();
    }

    public function simpan_priode($data)
    {
        return $this->db->insert('tb_periode', $data);
    }

    public function pengurus_all($id)
    {
        $this->db->join('tb_periode', 'tb_periode.id_periode=tb_pengurus.id_periode');
        $this->db->join('tb_person', 'tb_person.id_person=tb_pengurus.id_person');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_pengurus.id_jabatan');
        $this->db->where('tb_periode.id_periode', $id);
        $this->db->where('tb_pengurus.status', 'aktif');
        $this->db->from('tb_pengurus');
        $query = $this->db->get();
        return $query->result();
    }

    public function jabatan()
    {
        $this->db->where('status', 'Aktif');
        $this->db->from('tb_jabatan');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_pengurus($data1)
    {
        $this->db->insert('tb_pengurus', $data1);
        return $this->db->insert_id();
    }

    public function akun_id($id)
    {
        $this->db->where('id_pengurus', $id);
        $this->db->from('tb_login');
        $query = $this->db->get();
        return $query->row();
    }
    public function simpan_akun($data)
    {
        return $this->db->insert('tb_login', $data);
    }

    public function simpan_akun_id($id, $data)
    {
        $this->db->update('tb_login', $data, $id);
    }

    public function pengurus_id($id)
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_pengurus.id_person');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
        $this->db->where('id_pengurus', $id);
        $this->db->from('tb_pengurus');
        $query = $this->db->get();
        return $query->row();
    }

    public function login($id)
    {
        // $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan=tb_pengurus.id_jabatan');
        $this->db->where('id_pengurus', $id);
        $this->db->from('tb_login');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_pengurus($id, $data)
    {
        $this->db->update('tb_pengurus', $data, $id);
    }

    public function edit_akun($idnya, $data2)
    {
        $this->db->update('tb_login', $data2, $idnya);
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
