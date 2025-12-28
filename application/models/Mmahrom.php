<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmahrom extends CI_Model
{
    public function simpan_mahrom($data)
    {
        return $this->db->insert('tb_mahrom', $data);
    }

    public function mahrom_id($id)
    {
        $this->db->where('id_mahrom', $id);
        $this->db->from('tb_mahrom');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_mahrom($id, $data)
    {
        return $this->db->update('tb_mahrom', $data, $id);
    }

    public function simpan_upload_berkas($id, $data)
    {
        return $this->db->update('tb_mahrom', $data, $id);
    }
}
