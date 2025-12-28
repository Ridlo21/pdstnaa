<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpenempatan extends CI_Model
{

    public function history_all()
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_history.id_person');
        $this->db->join('tb_kamar', 'tb_kamar.id_kamar=tb_history.id_kamar');
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('aktif', 'Ya');
        $this->db->from('tb_history');
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

    // public function otomatis_person()
    // {

    //     $this->db->from('tb_person');
    //     $this->db->order_by('nama', 'ASC');
    //     $query = $this->db->get();
    //     return $query;
    // }

    
    public function history_id($id)
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_history.id_person');
        $this->db->join('tb_kamar', 'tb_kamar.id_kamar=tb_history.id_kamar');
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('id_history', $id);
        $this->db->from('tb_history');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_history($id, $data1)
    {
        return $this->db->update('tb_history', $data1, $id);
    }

    public function simpan_history($data2)
    {
        return $this->db->insert('tb_history', $data2);
    }

}