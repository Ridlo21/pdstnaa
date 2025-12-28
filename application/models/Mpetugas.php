<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mpetugas extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function cek_login($username, $password)
    {
        return $this->db
            ->select('
            tb_login.id_login,
            tb_login.nama,
            tb_login.username,
            tb_pengurus.id_pengurus,
            tb_pengurus.status,
            tb_jabatan.nm_jabatan
        ')
            ->from('tb_login')
            ->join('tb_pengurus', 'tb_pengurus.id_pengurus = tb_login.id_pengurus')
            ->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_pengurus.id_jabatan')
            ->where('tb_login.username', $username)
            ->where('tb_login.password', $password)
            ->get()
            ->row();
    }
}
