<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mperson extends CI_Model
{
    // Hanya Untuk Umum
    public function get_provinsi()
    {
        $query = $this->db->get('provinsi');
        return $query;
    }
    public function get_kabupaten($id)
    {
        $query = $this->db->get_where('kabupaten', array('province_id' => $id));
        return $query;
    }

    public function get_kecamatan($id)
    {
        $query = $this->db->get_where('kecamatan', array('regency_id' => $id));
        return $query;
    }

    public function get_desa($id)
    {
        $query = $this->db->get_where('desa', array('district_id' => $id));
        return $query;
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

    // Fitur Menu Santri
    var $table = 'tb_person'; //nama tabel dari database
    var $column_order = array(null, 'niup', 'nama', 'alamat_lengkap'); //field yang ada di table person
    var $column_search = array('niup', 'nama', 'alamat_lengkap'); //field yang diizin untuk pencarian 
    var $order = array('tgl_daftar' => 'desc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from($this->table)->where('niup IS NOT NULL')->where('niup !=',  '')->where('status', 'aktif');

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($where)
    {
        $date = date("Y");
        $date2 = date("Y") - 1;
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start'])->where('status', 'aktif');
        if ($where === "1") {
            $query = $this->db->get();
        } else {
            // $query = $this->db->where('YEAR(tgl_daftar) BETWEEN "'. $date2 . '" and "'. $date .'"')->get();
            $query = $this->db->where('YEAR(tgl_daftar)', $date)->get();
        }
        return $query->result();
    }

    function count_filtered($where)
    {
        $date = date("Y");
        $this->_get_datatables_query();
        if ($where === "1") {
            $query = $this->db->get();
        } else {
            $query = $this->db->where('YEAR(tgl_daftar)', $date)->get();
        }
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Fitur tambah Santri
    public function santri_terakhir($id)
    {
        $this->db->from('tb_person');
        $this->db->where("id_person", "$id");
        $query = $this->db->get();
        return $query->row();
    }

    public function simpan($data)
    {
        $this->db->insert('tb_person', $data);
        return $this->db->insert_id();
    }

    public function santri_terakhir_diinput($b)
    {
        // $query = $this->db->query('SELECT MAX(id_person) as jumlah FROM `tb_person`');
        // $query = $this->db->query('SELECT COUNT(niup) AS jumlah FROM `tb_person` WHERE niup');
        // $b = date('Y');
        $query = $this->db->query("SELECT COUNT(tgl_daftar) AS jumlah FROM tb_person WHERE SUBSTRING(tgl_daftar, 1, 4) = $b");
        return $query->result();
    }

    public function simpan_santri_v2($id, $data1)
    {
        $this->db->update('tb_person', $data1, $id);
    }

    public function simpan_ayah($data_a)
    {
        $this->db->insert('tb_mahrom', $data_a);
        return $this->db->insert_id();
    }

    public function detail_ayah($data_a)
    {
        $this->db->insert('tb_detail_mahrom', $data_a);
        return $this->db->insert_id();
    }

    public function simpan_ibu($data_i)
    {
        $this->db->insert('tb_mahrom', $data_i);
        return $this->db->insert_id();
    }

    public function detail_ibu($data_i)
    {
        $this->db->insert('tb_detail_mahrom', $data_i);
        return $this->db->insert_id();
    }

    public function simpan_penempatan($data)
    {
        $this->db->insert('tb_history', $data);
    }

    public function batalkan($id)
    {
        return $this->db->delete('tb_person', array('id_person'  =>  $id));
    }

    public function simpan_alumni($data2)
    {
        return $this->db->insert('tb_alumni', $data2);
    }

    public function nonaktif_pengurus($id, $data4)
    {
        $this->db->update('tb_pengurus', $data4, $id);
    }

    public function nonaktif_pengajar($id, $data5)
    {
        $this->db->update('tb_guru_nubdah', $data5, $id);
    }

    public function nonaktif_karyawan($id, $data6)
    {
        $this->db->update('tb_karyawan', $data6, $id);
    }

    // Fitur edit santri
    public function edit_santri($id, $data)
    {
        $this->db->update('tb_person', $data, $id);
    }

    public function alamat_santri($id)
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->where('id_person', $id);
        $this->db->from('tb_person');
        $this->db->select('desa.name as nama_desa, kecamatan.name as nama_kec, kabupaten.name as nama_kab,
                            provinsi.name as nama_prov,');
        $query = $this->db->get();
        return $query->row();
    }

    // fitur upload berkas foto santri
    public function upload_foto_santri($idperson, $data, $id)
    {
        $this->db->where('id_person', $id);
        $query = $this->db->get('tb_person')->row();
        unlink('../gambar/foto/' . $query->foto_warna_santri);
        $this->db->update('tb_person', $data, $idperson);
    }

    // fitur upload berkas foto wali santri
    public function upload_foto_wali($idperson, $data, $id)
    {
        $this->db->where('id_person', $id);
        $query = $this->db->get('tb_person')->row();
        unlink('../gambar/wali/' . $query->foto_wali_santri_warna);
        $this->db->update('tb_person', $data, $idperson);
    }

    // fitur upload berkas foto scan kk
    public function upload_foto_kk($idperson, $data, $id)
    {
        $this->db->where('id_person', $id);
        $query = $this->db->get('tb_person')->row();
        unlink('../gambar/kk/' . $query->foto_scan_kk);
        $this->db->update('tb_person', $data, $idperson);
    }

    // fitur upload berkas foto scan akata
    public function upload_foto_akta($idperson, $data, $id)
    {
        $this->db->where('id_person', $id);
        $query = $this->db->get('tb_person')->row();
        unlink('../gambar/akta/' . $query->foto_scan_akta);
        $this->db->update('tb_person', $data, $idperson);
    }

    // fitur upload berkas foto scan skck
    public function upload_foto_skck($idperson, $data, $id)
    {
        $this->db->where('id_person', $id);
        $query = $this->db->get('tb_person')->row();
        unlink('../gambar/skck/' . $query->foto_scan_skck);
        $this->db->update('tb_person', $data, $idperson);
    }

    // fitur upload berkas foto scan kec
    public function upload_foto_kec($idperson, $data, $id)
    {
        $this->db->where('id_person', $id);
        $query = $this->db->get('tb_person')->row();
        unlink('../gambar/sukes/' . $query->foto_scan_ket_sehat);
        $this->db->update('tb_person', $data, $idperson);
    }

    // fitur tambah mahrom
    public function simpan_data_mahrom($data1)
    {
        $this->db->insert('tb_mahrom', $data1);
        return  $this->db->insert_id();
    }

    public function simpan_detail_mahrom($data2)
    {
        $this->db->insert('tb_detail_mahrom', $data2);
    }

    public function upload_foto_mahrom($id_mahrom, $data, $id)
    {
        $this->db->where('id_mahrom', $id);
        $query = $this->db->get('tb_mahrom')->row();
        unlink('../gambar/mahrom/' . $query->foto_diri);
        $this->db->update('tb_mahrom', $data, $id_mahrom);
    }

    public function upload_foto_ktp($id_mahrom, $data, $id)
    {
        $this->db->where('id_mahrom', $id);
        $query = $this->db->get('tb_mahrom')->row();
        unlink('../gambar/ktp/' . $query->foto_kk_atau_ktp);
        $this->db->update('tb_mahrom', $data, $id_mahrom);
    }

    public function get_mahrom($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_mahrom WHERE id_mahrom='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_mahrom' => $data->id_mahrom,
                    'nik_m' => $data->nik_m,
                    'nama_mahrom' => $data->nama_mahrom,
                    'hubungan' => $data->hubungan,
                    'alamat_mahrom' => $data->alamat_mahrom,
                    'tanggal_lahir' => $data->tanggal_lahir,
                );
            }
        }
        return $hasil;
    }



    public function edit_mahrom($id, $data)
    {
        $this->db->update('tb_mahrom', $data, $id);
    }

    // Fitur detail santri
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
                                    foto_scan_skck, foto_scan_ket_sehat, qr_code, tgl_daftar');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->row();
    }

    public function mahrom_by_person($id_person)
    {
        $this->db->select('
        tb_mahrom.id_mahrom,
        tb_mahrom.nama_mahrom,
        tb_mahrom.hubungan
    ');
        $this->db->from('tb_detail_mahrom');
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom = tb_detail_mahrom.id_mahrom');
        $this->db->where('tb_detail_mahrom.id_person', $id_person);
        $this->db->where_not_in('tb_mahrom.hubungan', ['ayah', 'ibu']);

        return $this->db->get()->result();
    }

    public function divisi_by_person($id)
    {
        $this->db->select('d.divisi');
        $this->db->from('tb_person p');
        $this->db->join('tb_history_divisi h', 'h.id_person = p.id_person', 'left');
        $this->db->join('tb_divisi d', 'd.id_divisi = h.id_divisi', 'left');
        $this->db->where('p.id_person', $id);
        $this->db->where('h.status', 'Aktif');

        return $this->db->get()->row();
    }

    public function santri_id($id)
    {
        $this->db->from('tb_person');
        $this->db->where('id_person', $id);
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

    public function data_mahrom($id)
    {
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom');
        $this->db->where('id_person', $id);
        $this->db->order_by('id_detail_mahrom', 'desc');
        $this->db->from('tb_detail_mahrom');
        $query = $this->db->get();
        return $query->result();
    }

    public function upload_data_mahrom($data)
    {
        $this->db->insert('tb_mahrom', $data);
    }

    public function data_mahromnya($id)
    {
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom');
        $this->db->where('id_person', $id);
        // $this->db->order_by('id_detail_mahrom', 'desc');
        $this->db->from('tb_detail_mahrom');
        $query = $this->db->get();
        return $query->result();
    }

    public function data_mahrom_a($id)
    {
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom');
        $this->db->where('id_person', $id);
        $this->db->where('tb_mahrom.hubungan', 'Ayah');
        $this->db->from('tb_detail_mahrom');
        $query = $this->db->get();
        return $query->row();
    }

    public function data_mahrom_i($id)
    {
        $this->db->join('tb_mahrom', 'tb_mahrom.id_mahrom=tb_detail_mahrom.id_mahrom');
        $this->db->where('id_person', $id);
        $this->db->where('tb_mahrom.hubungan', 'Ibu');
        $this->db->from('tb_detail_mahrom');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_ayah($id_a, $data_a)
    {
        $this->db->update('tb_mahrom', $data_a, $id_a);
    }

    public function edit_ibu($id_i, $data_i)
    {
        $this->db->update('tb_mahrom', $data_i, $id_i);
    }

    public function domisili($id)
    {
        $this->db->join('tb_kamar', 'tb_kamar.id_kamar=tb_history.id_kamar');
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('id_person', $id);
        $this->db->where_not_in('aktif', 'Tidak');
        $this->db->from('tb_history');
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_penempatan($id, $data)
    {
        $this->db->update('tb_history', $data, $id);
    }

    public function edit_history_divisi($id, $data)
    {
        $this->db->update('tb_history_divisi', $data, $id);
    }

    public function data_domisili($id)
    {
        $this->db->join('tb_kamar', 'tb_kamar.id_kamar=tb_history.id_kamar');
        $this->db->join('tb_blok', 'tb_blok.id_blok=tb_kamar.id_blok');
        $this->db->join('tb_wilayah', 'tb_wilayah.id_wilayah=tb_blok.id_wilayah');
        $this->db->where('id_person', $id);
        $this->db->from('tb_history');
        $query = $this->db->get();
        return $query->result();
    }

    public function export()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i, nm_w, pndkn_w, pkrjn_w, pndptn_w, hp_w, telp_w');
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }

    public function export_putra()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i, nm_w, pndkn_w, pkrjn_w, pndptn_w, hp_w, telp_w');
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->where_not_in('jenis_kelamin', 'Perempuan');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }

    public function excel_putri()
    {
        $this->db->join('desa', 'desa.id=tb_person.desa');
        $this->db->join('kecamatan', 'kecamatan.id=tb_person.kec');
        $this->db->join('kabupaten', 'kabupaten.id=tb_person.kab');
        $this->db->join('provinsi', 'provinsi.id=tb_person.prov');
        $this->db->select('niup, nik, nama, tempat_lahir, tanggal_lahir,
                            jenis_kelamin, dlm_klrg, ank_ke, sdr, pndkn, alamat_lengkap,
                            desa.name as nama_desa, kecamatan.name as nama_kecamatan, kabupaten.name as nama_kabupaten, provinsi.name as nama_provinsi,
                            pos, nm_a, pndkn_a, pkrjn_a, nm_i, pndkn_i, pkrjn_i, nm_w, pndkn_w, pkrjn_w, pndptn_w, hp_w, telp_w');
        $this->db->where('status_dipesantren', 'Santri');
        $this->db->where_not_in('jenis_kelamin', 'Laki-Laki');
        $this->db->where_not_in('status_dipesantren', 'Alumni');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query->result();
    }
}
