<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{

    public function profil($id)
    {
        $this->db->join('tb_pengurus', 'tb_pengurus.id_pengurus=tb_login.id_pengurus');
        $this->db->join('tb_person', 'tb_person.id_person=tb_pengurus.id_person');
        $this->db->from('tb_login');
        $this->db->where('id_login', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function jum_santri()
    {
        $this->db->where('status_dipesantren', 'Santri');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_putra()
    {
        $this->db->where_not_in('status_dipesantren', 'Dewan Pengasuh');
        $this->db->where_not_in('status_dipesantren', 'Pengurus');
        $this->db->where_not_in('status_dipesantren', 'Pengajar');
        $this->db->where_not_in('status_dipesantren', 'Karyawan');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->where('jenis_kelamin', 'Laki-Laki');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_putri()
    {
        $this->db->where_not_in('status_dipesantren', 'Dewan Pengasuh');
        $this->db->where_not_in('status_dipesantren', 'Pengurus');
        $this->db->where_not_in('status_dipesantren', 'Pengajar');
        $this->db->where_not_in('status_dipesantren', 'Karyawan');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->where('jenis_kelamin', 'Perempuan');
        return $this->db->count_all_results('tb_person');
    }

    public function psb_all()
    {
        $this->db->where_not_in('no_regristrasi', '');
        return $this->db->count_all_results('tb_psb');
    }

    

    public function jumlah_santri_perblok()
    {
        $query = $this->db->query("SELECT tb_blok.nama_blok,COUNT(tb_kamar.id_kamar) as jml from tb_history,tb_kamar,tb_blok where tb_history.id_kamar=tb_kamar.id_kamar AND tb_kamar.id_blok=tb_blok.id_blok AND tb_history.aktif='Ya' GROUP BY nama_blok ORDER BY jml desc LIMIT 10");
        return $query->result();
    }

    public function jumlah_santri_perkamar()
    {
        $query = $this->db->query("SELECT tb_kamar.nama_kamar,COUNT(tb_kamar.id_kamar) as jml from tb_history,tb_kamar where tb_history.id_kamar=tb_kamar.id_kamar AND tb_history.aktif='Ya' GROUP BY nama_kamar ORDER BY jml desc LIMIT 10");
        return $query->result();
    }
}
