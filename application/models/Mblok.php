<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mblok extends CI_Model
{

    public function blok_all()
    {
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->from('tb_blok');
        $query = $this->db->get();
        return $query->result();
    }

    public function wilayah_all()
    {
        $this->db->from('tb_wilayah');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_blok($data)
    {
        return $this->db->insert('tb_blok', $data);
    }

    public function blok_id($id)
    {
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('id_blok', $id);
        $this->db->from('tb_blok');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_blok($id, $data)
    {
        return $this->db->update('tb_blok', $data, $id);
    }
}
