<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkamar extends CI_Model
{

    // Fitur data kamar
    public function kamar_all()
    {
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->from('tb_kamar');
        $query = $this->db->get();
        return $query->result();
    }

    // Fitur tambah kamar
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

    public function simpan_kamar($data)
    {
        return $this->db->insert('tb_kamar', $data);
    }

    // Fitur edit kamar
    public function kamar_id($id)
    {
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('id_kamar', $id);
        $this->db->from('tb_kamar');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_kamar($id, $data)
    {
        return $this->db->update('tb_kamar', $data, $id);
    }

    public function history($id)
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_history.id_person');
        $this->db->where('id_kamar', $id);
        $this->db->where_not_in('aktif', 'Tidak');
        $this->db->from('tb_history');
        $query = $this->db->get();
        return $query->result();
    }
}
