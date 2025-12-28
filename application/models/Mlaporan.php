<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{

    public function data_blok($id)
    {
        $this->db->where('id_wilayah', $id);
        $this->db->from('tb_blok');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_kamar($id)
    {
        $this->db->where('id_blok', $id);
        $this->db->from('tb_kamar');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_history()
    {
        $this->db->join('tb_person', 'tb_person.id_person=tb_history.id_person');
        $this->db->join('tb_kamar', 'tb_kamar.id_kamar=tb_history.id_kamar');
        $this->db->where('aktif', 'Ya');
        $this->db->from('tb_history');
        $query = $this->db->get();
        return $query->result();
    }



    public function santri_all()
    {
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('nama, alamat_lengkap, pndkn, provinsi.name as nama_provinsi');
        $this->db->where('status', 'aktif');
        // $this->db->where_not_in('status_dipesantren', 'Dewan Pengasuh');
        // $this->db->where_not_in('status_dipesantren', 'Aktif');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }
}
