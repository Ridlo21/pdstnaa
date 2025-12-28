<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mgrafik extends CI_Model
{
    public function grafik_tahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_daftar) as tahun, COUNT(id_person) as jml FROM tb_person WHERE niup != '' AND tgl_daftar != '' GROUP BY YEAR(tgl_daftar)");
        return $query->result();
    }

    public function grafik_perwilayah($tahun)
    {
        $query = $this->db->query("SELECT tb_wilayah.nama_wilayah,COUNT(tb_kamar.id_kamar) as jml from tb_history,tb_kamar,tb_wilayah,tb_blok where tb_history.id_kamar=tb_kamar.id_kamar AND tb_kamar.id_blok=tb_blok.id_blok AND tb_blok.id_wilayah=tb_wilayah.id_wilayah AND tb_history.aktif='ya' AND Year(tb_history.tgl_penetapan) = $tahun GROUP BY nama_wilayah");
        return $query->result();
    }
}
