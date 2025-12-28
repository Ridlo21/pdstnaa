<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmaster extends CI_Model
{

    public function profil_by_pengurus($id_pengurus)
    {
        return $this->db
            ->select('
            tb_person.nama,
            tb_person.alamat_lengkap,
            tb_jabatan.nm_jabatan,
            tb_person.foto_warna_santri
        ')
            ->from('tb_pengurus')
            ->join('tb_person', 'tb_person.id_person = tb_pengurus.id_person')
            ->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_pengurus.id_jabatan')
            ->where('tb_pengurus.id_pengurus', $id_pengurus)
            ->get()
            ->row();
    }

    public function jum_santri()
    {
        $this->db->where('status', 'aktif');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_putra()
    {
        $this->db->where('jenis_kelamin', 'Laki-Laki');
        $this->db->where('status', 'aktif');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_putri()
    {
        $this->db->where('jenis_kelamin', 'Perempuan');
        $this->db->where('status', 'aktif');
        return $this->db->count_all_results('tb_person');
    }

    public function jum_pengurus()
    {
        $this->db->where('status', 'aktif');
        return $this->db->count_all_results('tb_pengurus');
    }

    // public function jum_karyawan()
    // {
    //     $this->db->where('tb_karyawan.status', 'Aktif');
    //     return $this->db->count_all_results('tb_karyawan');
    // }

    // public function jum_pengajar()
    // {
    //     $this->db->where('status_guru_nubdah', 'Aktif');
    //     return $this->db->count_all_results('tb_guru_nubdah');
    // }

    // public function jumlah_santri_perwilayah()
    // {
    //     $query = $this->db->query("SELECT tb_wilayah.nama_wilayah,COUNT(tb_kamar.id_kamar) as jml from tb_history,tb_kamar,tb_wilayah,tb_blok where tb_history.id_kamar=tb_kamar.id_kamar AND tb_kamar.id_blok=tb_blok.id_blok AND tb_blok.id_wilayah=tb_wilayah.id_wilayah AND tb_history.aktif='ya' GROUP BY nama_wilayah ORDER BY jml desc LIMIT 10");
    //     return $query->result();
    // }

    public function getGrafikDivisiGender()
    {
        $query = $this->db->query("
            SELECT 
                d.divisi,
                SUM(CASE WHEN p.jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) AS laki,
                SUM(CASE WHEN p.jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) AS perempuan
            FROM tb_divisi d
            LEFT JOIN tb_history_divisi h ON h.id_divisi = d.id_divisi AND h.status = 'Aktif'
            LEFT JOIN tb_person p ON p.id_person = h.id_person
            GROUP BY d.id_divisi
            ORDER BY d.id_divisi ASC
        ");

        return $query->result();
    }

    public function getGrafikTahunKelamin()
    {
        $query = $this->db->query("
            SELECT 
                YEAR(tgl_daftar) AS tahun,
                SUM(CASE WHEN jenis_kelamin = 'Laki-Laki' THEN 1 ELSE 0 END) AS laki,
                SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) AS perempuan
            FROM tb_person
            GROUP BY YEAR(tgl_daftar)
            ORDER BY YEAR(tgl_daftar) ASC
        ");

        return $query->result();
    }
}
