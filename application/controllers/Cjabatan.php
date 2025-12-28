 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Cjabatan extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Mjabatan');
        }

        public function menu_jabatan()
        {
            $output['jabatan'] = $this->Mjabatan->jabatan_all();
            $this->load->view('menu_jabatan/jabatan', $output);
        }

        public function tambah_jabatan()
        {
            $this->load->view('menu_jabatan/jabatan_tambah');
        }

        public function simpan_jabatan()
        {
            $jbtn = $this->input->post('nama_jabatan');
            $jabatan = $this->db->where('nm_jabatan', $jbtn)
                ->where('status', 'aktif')
                ->get('tb_jabatan')
                ->num_rows();
            if ($jabatan > 0) {
                $pesan = "tidak";
                $sukses = " Jabatan Sudah Ada ";
            } else {
                $data = array(
                    'nm_jabatan' => $jbtn,
                    // 'thn_dibuat' => $this->input->post('tahun_jabatan'),
                    'status' => "Aktif"
                );
                $this->Mjabatan->simpan_jabatan($data);
                $pesan = "ya";
                $sukses = "Data Berhasil Disimpan";
            }
            $output = array(
                'pesan' => $pesan,
                'sukses' => $sukses
            );
            echo json_encode($output);
        }

        public function form_edit_jabatan()
        {
            $id = $this->input->post('idjabatan');
            $data = $this->Mjabatan->jabatan_id($id);
            $this->load->view('menu_jabatan/jabatan_edit', $data);
        }

        public function edit_jabatan()
        {
            $id = $this->input->post('idjabatan');
            // $jbtn = $this->input->post('nama_jabatan');
            // $jabatan = $this->db->where('nm_jabatan', $jbtn)
            //                 ->where('status','aktif')
            //                 ->get('tb_jabatan')
            //                 ->num_rows();
            // if ($jabatan > 0 ) {
            //     $pesan = "tidak";
            //     $sukses = " Jabatan Sudah Ada ";
            // } else {
            $data = array(
                'nm_jabatan' => $this->input->post('nama_jabatan'),
                // 'thn_dibuat' => $this->input->post('tahun_jabatan'),
            );
            $this->Mjabatan->edit_jabatan(array('id_jabatan' => $id), $data);
            $pesan = "ya";
            $sukses = "Data Berhasil Diedit";
            // }
            $output = array(
                'pesan' => $pesan,
                'sukses' => $sukses
            );
            echo json_encode($output);
        }

        public function detail()
        {
            $id = $this->input->post("id");
            $data = $this->Mjabatan->detail($id);
            if (count($data) > 0) {
                $no = 1;
                foreach ($data as $value) {
                    $row = array();
                    $row[] = '<tr style="color: dimgrey;">';
                    $row[] = '<td>' . $no++ . '</td>';
                    $row[] = '<td>' . $value->niup . '</td>';
                    $row[] = '<td>' . $value->nama . '</td>';
                    $row[] = '<td>' . $value->alamat_lengkap . '</td>';
                    $row[] = '<td>' . $value->nm_jabatan . '</td>';
                    if ($value->sts === "aktif") {
                        $row[] = '<td>' . '<span class="badge bg-primary">' .  $value->sts . '</span>' . '</td>';
                    } else {
                        $row[] = '<td>' . '<span class="badge bg-danger">' .  $value->sts . '</span>' . '</td>';
                    }
                    $row[] = '</tr>';
                    $data[] = $row;
                }
                $sukses = "ya";
            } else {
                $sukses = "tidak";
                $data = '<tr><td colspan="10" class="text-center text-bold"><span class="text-danger" style="text-transform: uppercase"> Data kosong boss </span>  </td></tr>';
            }
            $out = array(
                'pesan' => $sukses,
                'list_detail' => $data
            );
            echo json_encode($out);
        }
    }
