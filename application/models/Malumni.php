<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Malumni extends CI_Model
{

    var $table = 'tb_alumni';
    var $column_search = ['tb_person.niup', 'tb_person.nama', 'tb_person.jenis_kelamin'];
    var $order = null;

    private function _get_datatables_query()
    {
        $this->db->select('
            tb_alumni.id_alumni,
            tb_alumni.tgl_berhenti,
            tb_person.id_person,
            tb_person.niup,
            tb_person.nama,
            tb_person.jenis_kelamin
        ');
        $this->db->from($this->table)->order_by('tb_alumni.id_alumni', 'DESC');
        $this->db->join('tb_person', 'tb_person.id_person = tb_alumni.id_person');

        if (!empty($_POST['search']['value'])) {
            $this->db->group_start();
            foreach ($this->column_search as $i => $item) {
                if ($i === 0) {
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
            }
            $this->db->group_end();
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        return $this->db->get()->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function santri_idx($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->where('id_person', $id);
        $this->db->select('id_person, niup, nik, nama, tempat_lahir, tanggal_lahir,
                                    jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                                    desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                                    pos, nik_a, tgl_lahir_a, nm_a, pndkn_a, pkrjn_a, nik_i, tgl_lahir_i, nm_i, pndkn_i, pkrjn_i,
                                    nik_w, nm_w, pndkn_w, pkrjn_w, pndptn_w, almt_w, pos_w, hp_w, telp_w,
                                    foto_warna_santri, foto_wali_santri_warna, foto_scan_kk, foto_scan_akta, 
                                    foto_scan_skck, foto_scan_ket_sehat');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->row();
    }

    public function alamat_wali($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa_w');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec_w');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab_w');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov_w');
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $this->db->select('desa.name as nama_desa_w, kecamatan.name as nama_kec_w, kabupaten.name as nama_kab_w,
                            provinsi.name as nama_prov_w');
        $query = $this->db->get();
        return $query->row();
    }

    public function data_boyong($alumni)
    {

        $this->db->from('tb_alumni');
        $this->db->where('id_alumni', $alumni);
        $query = $this->db->get();
        return $query->row();
    }

    public function divisi_by_person($id, $alumni)
    {
        $this->db->select('
        d.divisi,
        d.penjab,
        d.id_divisi,
        a.tgl_berhenti AS tanggal_keluar
    ');
        $this->db->from('tb_person p');
        $this->db->join('tb_alumni a', 'a.id_person = p.id_person', 'left');
        $this->db->join('tb_history_divisi h', 'h.id_person = p.id_person', 'left');
        $this->db->join('tb_divisi d', 'd.id_divisi = h.id_divisi', 'left');
        $this->db->where('p.id_person', $id);
        $this->db->where('a.id_alumni', $alumni);
        $this->db->order_by('h.tgl_masuk', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    public function data_mahrom($id)
    {
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom');
        $this->db->where('id_person', $id);
        $this->db->order_by('id_detail_mahrom', 'desc');
        $this->db->from('tb_detail_mahrom');
        $query = $this->db->get();
        return $query->result();
    }
}
