<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mterima extends CI_Model
{

    public function santri_terakhir_diinput()
    {
        $query = $this->db->query('SELECT MAX(id_person) as jumlah FROM `tb_person`');
        return $query->result();
    }

    public function psb_all()
    {
        $this->db->where_not_in('no_regristrasi', '');
        $this->db->from('tb_psb');
        $query = $this->db->get();
        return $query->result();
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

    public function terima_id($id)
    {
        $this->db->where('token', $id);
        $this->db->from('tb_psb');
        $query = $this->db->get();
        return $query->row();
    }

    public function data_mahrom($id)
    {
        $this->db->where('token', $id);
        $this->db->from('tb_psb_mahrom');
        $query = $this->db->get();
        return $query->result();
    }

    public function alamat_santri($id)
    {
        $this->db->join('desa', 'desa.id=tb_psb.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_psb.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_psb.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_psb.prov');
        $this->db->where('token', $id);
        $this->db->from('tb_psb');
        $this->db->select('desa.name as nama_desa, kecamatan.name as nama_kec, kabupaten.name as nama_kab,
                            provinsi.name as nama_prov,');
        $query = $this->db->get();
        return $query->row();
    }

    public function alamat_wali($id)
    {
        $this->db->join('kecamatan', 'kecamatan.id=tb_psb.kec_w');
        $this->db->join('kabupaten', 'kabupaten.id=tb_psb.kab_w');
        $this->db->join('provinsi', 'provinsi.id=tb_psb.prov_w');
        $this->db->where('token', $id);
        $this->db->from('tb_psb');
        $this->db->select('kecamatan.name as nama_kec_w, kabupaten.name as nama_kab_w,
                            provinsi.name as nama_prov_w');
        $query = $this->db->get();
        return $query->row();
    }

    public function simpan_santri_baru($data)
    {
        $this->db->insert('tb_person', $data);
        return $this->db->insert_id();
    }

    public function simpan_mahrom($data1)
    {
        $this->db->insert('tb_mahrom', $data1);
    }

    public function simpan_mahrom_i($data2)
    {
        $this->db->insert('tb_mahrom', $data2);
    }

    public function simpan_penempatan($data2)
    {
        $this->db->insert('tb_history', $data2);
    }
}
