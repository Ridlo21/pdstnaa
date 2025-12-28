 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Cwilayah extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mwilayah');
        }

        public function menu_wilayah()
        {
            $output['wilayah'] = $this->Mwilayah->wilayah_all();
            $this->load->view('menu_wilayah/wilayah', $output);
        }

        public function tambah_wilayah()
        {
            $this->load->view('menu_wilayah/wilayah_tambah');
        }

        public function simpan_wilayah()
        {
            $wilayah = $this->input->post('nama_wilayah');
            $cek_wilayah = $this->db->where('nama_wilayah', $wilayah)
                ->get('tb_wilayah')
                ->num_rows();
            if ($cek_wilayah > 0) {
                $pesan = "tidak";
                $sukses = "Nama Wilayah Sudah ada !!";
            } else {
                $data = array(
                    'nama_wilayah' => $this->input->post('nama_wilayah'),
                    'kepala_wilayah' => $this->input->post('kepala_wilayah')
                );
                $this->Mwilayah->simpan_wilayah($data);
                $pesan = "ya";
                $sukses = "Data Berhasil Disimpan";
            }
            $output = array(
                'pesan' => $pesan,
                'sukses' => $sukses
            );
            echo json_encode($output);
        }

        public function form_edit_wilayah()
        {
            $id = $this->input->post('idwilayah');
            $data = $this->Mwilayah->wilayah_id($id);
            $this->load->view('menu_wilayah/wilayah_edit', $data);
        }

        public function edit_wilayah()
        {
            $id = $this->input->post('idwilayah');
            $data = array(
                'nama_wilayah' => $this->input->post('nama_wilayah'),
                'kepala_wilayah' => $this->input->post('kepala_wilayah')
            );
            $this->Mwilayah->edit_wilayah(array('id_wilayah' => $id), $data);
            $pesan = "ya";
            $sukses = "Data Berhasil Diedit";
            $output = array(
                'pesan' => $pesan,
                'sukses' => $sukses
            );
            echo json_encode($output);
        }
    }
