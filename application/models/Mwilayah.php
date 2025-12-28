<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mwilayah extends CI_Model
{

    public function wilayah_all()
    {
        $this->db->from('tb_wilayah');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpan_wilayah($data)
    {
        return $this->db->insert('tb_wilayah', $data);
    }

    public function wilayah_id($id)
    {
        $this->db->where('id_wilayah', $id);
        $this->db->from('tb_wilayah');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_wilayah($id, $data)
    {
        return $this->db->update('tb_wilayah', $data, $id);
    }
}
