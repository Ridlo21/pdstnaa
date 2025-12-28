<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdewan extends CI_Model
{
    public function dewan_pengasuh()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('id_person ,niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i');
        $this->db->where('status_dipesantren', 'Dewan Pengasuh');
        $this->db->from('tb_person');
        $query = $this->db->get();
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

    public function santri_terakhir_diinput()
    {
        $query = $this->db->query('SELECT MAX(id_person) as jumlah FROM `tb_person`');
        return $query->result();
    }

    public function simpan_dewan_pengasuh($data)
    {
        $this->db->insert('tb_person', $data);
    }

    public function pengasuh_id($id)
    {
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->row();
    }

    public function alamat($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('id_person ,niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i');
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_pengasuh($id, $data)
    {
        return $this->db->update('tb_person', $data, $id);
    }

    public function dewan_pengasuh_putra()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('id_person ,niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i');
        $this->db->where_not_in('jenis_kelamin', 'Perempuan');
        $this->db->where('status_dipesantren', 'Dewan Pengasuh');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }

    public function dewan_pengasuh_putri()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('id_person ,niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i');
        $this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
        $this->db->where('status_dipesantren', 'Dewan Pengasuh');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }

}
