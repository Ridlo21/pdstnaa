<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlembaga extends CI_Model
{

    public function lembaga_all()
    {
        $this->db->from('tb_lembaga');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_lembaga.id_wilayah');
        $query = $this->db->get();
        return $query->result();
    }

    public function wilayah_all()
    {
        $this->db->from('tb_wilayah');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_lembaga($data)
    {
        return $this->db->insert('tb_lembaga', $data);
    }

    public function lembaga_id($id)
    {
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_lembaga.id_wilayah');
        $this->db->where('id_lembaga', $id);
        $this->db->from('tb_lembaga');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_lembaga($id, $data)
    {
        return $this->db->update('tb_lembaga', $data, $id);
    }
}
