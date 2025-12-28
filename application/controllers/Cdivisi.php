<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('plugin/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cdivisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('Mdivisi');
    }

    public function menu_divisi()
    {
        $this->load->view('menu_divisi/divisi_list');
    }

    function get_data_divisi()
    {
        $list = $this->Mdivisi->get_datatables("1");
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode_divisi;
            $row[] = $field->divisi;
            $row[] = $field->penjab;
            $row[] = '<button type="button" id="bt-info" onclick="infoDivisi(' . $field->id_divisi . ')" class="btn btn-sm btn-info text-light" title="Info">
                            <i class="fas fa-info"></i> Info
                        </button>
                        <button type="button" id="bt-edit" class="btn btn-sm btn-warning text-light" title="Edit" data="' . $field->id_divisi . '">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </button>
                        ';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mdivisi->count_all(),
            "recordsFiltered" => $this->Mdivisi->count_filtered("1"),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function create_divisi()
    {
        $nama = $this->input->post('divisi');
        $penjab = $this->input->post('penjab');
        $cek = $this->Mdivisi->checkNamaDivisi($nama);

        // CEK DUPLIKAT
        if ($cek) {
            $output = array(
                'status' => 'error',
                'pesan' => 'Gagal',
                'sukses' => 'Nama divisi sudah ada'
            );
            echo json_encode($output);
            return; // ← INI PENTING
        }

        // GENERATE KODE OTOMATIS
        $last = $this->Mdivisi->getLastCode();

        if ($last) {
            $number = (int) substr($last->kode_divisi, 3);
            $number++;
            $kode = "DIV" . str_pad($number, 3, '0', STR_PAD_LEFT);
        } else {
            $kode = "DIV001";
        }

        // SIMPAN
        $data = [
            'kode_divisi' => $kode,
            'divisi' => $nama,
            'penjab' => $penjab
        ];

        $this->Mdivisi->insertDivisi($data);

        echo json_encode([
            'status' => 'success',
            'pesan'  => 'Berhasil',
            'sukses' => 'Data berhasil disimpan'
        ]);
    }

    public function getById()
    {
        $id = $this->input->post('id');
        $data = $this->Mdivisi->getById($id);
        echo json_encode($data);
    }

    public function edit_divisi()
    {
        $id     = $this->input->post('id');
        $nama   = $this->input->post('divisi');
        $penjab   = $this->input->post('penjab');

        // CEK DUPLIKAT NAMA (kecuali dirinya sendiri)
        $cek = $this->Mdivisi->checkNamaDivisiEdit($nama, $id);
        if ($cek) {
            echo json_encode([
                'status' => 'error',
                'pesan'  => 'Gagal',
                'sukses' => 'Nama divisi sudah digunakan'
            ]);
            return;
        }

        // UPDATE TANPA MENGUBAH KODE DIVISI
        $data = [
            'divisi' => $nama,
            'penjab' => $penjab
        ];

        $this->db->where('id_divisi', $id);
        $this->db->update('tb_divisi', $data);

        echo json_encode([
            'status' => 'success',
            'pesan'  => 'Berhasil',
            'sukses' => 'Data divisi berhasil diperbarui'
        ]);
    }

    public function info_divisi()
    {
        $id = $this->input->post('id');
        $data = [
            'divisi' => $this->Mdivisi->getById($id),
            'divall' => $this->Mdivisi->div_all($id),
            'total_person' => $this->Mdivisi->count_person_by_divisi($id),
            'laki'          => $this->Mdivisi->count_laki_by_divisi($id),
            'perempuan'     => $this->Mdivisi->count_perempuan_by_divisi($id)
        ];
        $this->load->view('menu_divisi/divisi_info', $data);
    }

    public function ui_data()
    {
        $keyword = $this->input->post('cari', TRUE);

        $data = $this->Mdivisi->searchSantri($keyword);

        $result = [];

        foreach ($data as $row) {
            $result[] = [
                'id_person' => $row->id_person,
                'niup'      => $row->niup,
                'nama'      => $row->nama,
                'alamat'    => $row->alamat_lengkap, // kosong karena tidak ada field-nya
                'tgl'       => date('Y-m-d'),
                'label'     => $row->nama,
                'value'     => $row->nama,
                'sukses'    => true
            ];
        }

        echo json_encode($result);
    }

    public function simpanHistoryDivisi()
    {
        $id_person  = $this->input->post('id_person');
        $id_divisi  = $this->input->post('id_divisi');
        $tgl_mulai  = $this->input->post('tgl_mulai');

        if (!$id_person || count($id_person) == 0) {
            echo json_encode(['status' => false, 'message' => 'Data kosong']);
            return;
        }

        foreach ($id_person as $idp) {

            // FIX 1: pastikan id_person tidak kosong / spasi / null
            if (empty(trim($idp))) {
                echo json_encode([
                    'status'  => false,
                    'message' => 'Terdapat ID Person kosong, pastikan semua data terisi!'
                ]);
                return;
            }

            // FIX 2: pastikan id_person adalah angka
            if (!ctype_digit((string)$idp)) {
                echo json_encode([
                    'status'  => false,
                    'message' => 'ID Person ' . $idp . ' tidak valid!'
                ]);
                return;
            }

            // FIX 3: pengecekan benar-benar aman
            $cek = $this->db
                ->where('id_person', $idp)
                ->where('status', 'Aktif')
                ->count_all_results('tb_history_divisi');

            if ($cek > 0) {
                echo json_encode([
                    'status'  => false,
                    'message' => 'Santri dengan ID Person ' . $idp . ' sudah aktif di salah satu divisi!'
                ]);
                return;
            }
        }

        // insert batch
        $dataInsert = [];
        for ($i = 0; $i < count($id_person); $i++) {

            // FIX 4: sanitasi sebelum insert
            if (empty(trim($id_person[$i]))) continue;

            $dataInsert[] = [
                'id_person' => trim($id_person[$i]),
                'id_divisi' => $id_divisi,
                'tgl_masuk' => $tgl_mulai[$i],
                'status'    => 'Aktif'
            ];
        }

        if (!empty($dataInsert)) {
            $this->db->insert_batch('tb_history_divisi', $dataInsert);
        }

        echo json_encode(['status' => true]);
    }

    public function getSantriData()
    {
        $id = $this->input->post('id_divisi');

        $list = $this->Mdivisi->get_datatable($id);
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $value) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->niup;
            $row[] = $value->nama;
            $row[] = $value->jenis_kelamin;
            $row[] = $value->tgl_masuk;
            $row[] = '<button class="btn btn-sm btn-primary" id="bt-pindah" data="' . $value->id . '">Pindahkan</button>';
            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mdivisi->count($id),
            "recordsFiltered" => $this->Mdivisi->count_filter($id),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function getHistoryById()
    {
        $id = $this->input->post('id');
        $data = $this->Mdivisi->getHistoryById($id);
        echo json_encode($data);
    }

    public function pindah_divisi()
    {
        $id_history  = $this->input->post('id'); // id tb_history_divisi
        $id_person   = $this->input->post('id_person');
        $id_divisi   = $this->input->post('divisi');

        // 1. Nonaktifkan history lama
        $update = $this->Mdivisi->nonaktifkanHistory($id_history);

        if (!$update) {
            echo json_encode([
                'status' => 'error',
                'pesan'  => 'Gagal',
                'sukses' => 'History lama tidak dapat dinonaktifkan.'
            ]);
            return;
        }

        // 2. Buat history baru
        $insert = $this->Mdivisi->tambahHistoryBaru($id_person, $id_divisi);

        if ($insert) {
            echo json_encode([
                'status' => 'success',
                'pesan'  => 'Berhasil',
                'sukses' => 'Divisi berhasil dipindahkan.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'pesan'  => 'Gagal',
                'sukses' => 'Gagal membuat history baru.'
            ]);
        }
    }

    public function cek_export()
    {
        $gender = $this->input->post('gender');
        $divisi = $this->input->post('divisi');

        $this->db->from('tb_history_divisi');
        $this->db->join('tb_person', 'tb_person.id_person = tb_history_divisi.id_person');
        $this->db->where('tb_history_divisi.id_divisi', $divisi);
        $this->db->where('tb_person.jenis_kelamin', $gender);

        $jumlah = $this->db->count_all_results();

        if ($jumlah > 0) {
            echo json_encode([
                'status' => 'success',
                'jumlah' => $jumlah
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'pesan' => 'Data santri ' . $gender . ' kosong',
                'sukses' => ''
            ]);
        }
    }

    public function export_divisi()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A4', 'NO');
        $sheet->setCellValue('B4', 'NIUP');
        $sheet->setCellValue('C4', 'NIK');
        $sheet->setCellValue('D4', 'NAMA');
        $sheet->setCellValue('E4', 'TEMPAT LAHIR');
        $sheet->setCellValue('F4', 'TANGGAL LAHIR');
        $sheet->setCellValue('G4', 'JENIS KELAMIN');
        $sheet->setCellValue('H4', 'STATUS DALAM KELUARGA');
        $sheet->setCellValue('I4', 'ANAK KE');
        $sheet->setCellValue('J4', 'JUMLAH SAUDARA');
        $sheet->setCellValue('K4', 'ALAMAT LENGKAP');
        $sheet->setCellValue('L4', 'DESA');
        $sheet->setCellValue('M4', 'KECAMATAN');
        $sheet->setCellValue('N4', 'KABUPATEN');
        $sheet->setCellValue('O4', 'PROVINSI');
        $sheet->setCellValue('P4', 'KODE POS');
        $sheet->setCellValue('Q4', 'DIVISI YANG DIPILIH');
        $sheet->setCellValue('R4', 'NIK AYAH');
        $sheet->setCellValue('S4', 'NAMA AYAH');
        $sheet->setCellValue('T4', 'TANGGAL LAHIR AYAH');
        $sheet->setCellValue('U4', 'PENDIDIKAN AYAH');
        $sheet->setCellValue('V4', 'PEKERJAAN AYAH');
        $sheet->setCellValue('W4', 'NIK IBU');
        $sheet->setCellValue('X4', 'NAMA IBU');
        $sheet->setCellValue('Y4', 'TANGGAL LAHIR IBU');
        $sheet->setCellValue('Z4', 'PENDIDIKAN IBU');
        $sheet->setCellValue('AA4', 'PEKERJAAN IBU');
        $sheet->setCellValue('AB4', 'NAMA WALI');
        $sheet->setCellValue('AC4', 'PENDIDIKAN WALI');
        $sheet->setCellValue('AD4', 'PEKERJAAN WALI');
        $sheet->setCellValue('AE4', 'PENDAPATAN WALI');
        $sheet->setCellValue('AF4', 'ALAMAT WALI');
        $sheet->setCellValue('AG4', 'NO WA/ NO TELP WALI');
        $sheet->setCellValue('AH4', 'TANGGAL DAFTAR');

        $gender = $this->input->get('gender');
        $id_divisi = $this->input->get('divisi');
        $divisi = $this->Mdivisi->getById($id_divisi);
        $sheet->mergeCells("A2:AH2");
        $sheet->setCellValue('A2', 'DATA SANTRI ' . strtoupper($gender) . ' ' . strtoupper($divisi->divisi) . ' DIUNDUH TANGGAL ' . date('Y-m-d H:i:s'));
        $styleArray_header = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
            'font' => array(
                'bold' => true
            )
        );
        $styleArray_all = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            )
        );
        $sheet->getStyle('A4:AH4')->applyFromArray($styleArray_header);
        $data = $this->Mdivisi->export_excel($id_divisi, $gender);
        $no = 0;
        $row = 4;
        foreach ($data as $dt) {
            $desa_uy = $this->db->where('id', $dt->desa)
                ->get('desa')
                ->row();
            // ->num_rows();
            $camat_uy = $this->db->where('id', $dt->kec)
                ->get('kecamatan')
                ->row();
            $kabu_uy = $this->db->where('id', $dt->kab)
                ->get('kabupaten')
                ->row();
            $prov_uy = $this->db->where('id', $dt->prov)
                ->get('provinsi')
                ->row();
            $no++;
            $row++;
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValueExplicit('B' . $row, $dt->niup, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValueExplicit('C' . $row, $dt->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('D' . $row, $dt->nama);
            $sheet->setCellValue('E' . $row, $dt->tempat_lahir);
            $sheet->setCellValue('F' . $row, $dt->tanggal_lahir);
            $sheet->setCellValue('G' . $row, $dt->jenis_kelamin);
            $sheet->setCellValue('H' . $row, $dt->dlm_klrg);
            $sheet->setCellValue('I' . $row, $dt->ank_ke);
            $sheet->setCellValue('J' . $row, $dt->sdr);
            $sheet->setCellValue('K' . $row, $dt->alamat_lengkap);
            $sheet->setCellValue('L' . $row, $desa_uy->name);
            $sheet->setCellValue('M' . $row, $camat_uy->name);
            $sheet->setCellValue('N' . $row, $kabu_uy->name);
            $sheet->setCellValue('O' . $row, $prov_uy->name);
            $sheet->setCellValue('P' . $row, $dt->pos);
            $sheet->setCellValue('Q' . $row, strtoupper($dt->divisi));
            $sheet->setCellValueExplicit('R' . $row, $dt->nik_a, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('S' . $row, $dt->nm_a);
            $sheet->setCellValue('T' . $row, $dt->tgl_lahir_a);
            $sheet->setCellValue('U' . $row, $dt->pndkn_a);
            $sheet->setCellValue('V' . $row, $dt->pkrjn_a);
            $sheet->setCellValueExplicit('W' . $row, $dt->nik_i, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('X' . $row, $dt->nm_i);
            $sheet->setCellValue('Y' . $row, $dt->tgl_lahir_i);
            $sheet->setCellValue('Z' . $row, $dt->pndkn_i);
            $sheet->setCellValue('AA' . $row, $dt->pkrjn_i);
            $sheet->setCellValue('AB' . $row, $dt->nm_w);
            $sheet->setCellValue('AC' . $row, $dt->pndkn_w);
            $sheet->setCellValue('AD' . $row, $dt->pkrjn_w);
            $sheet->setCellValue('AE' . $row, $dt->pndptn_w);
            $sheet->setCellValue('AF' . $row, $dt->almt_w);
            $sheet->setCellValue('AG' . $row, $dt->hp_w . " - " . $dt->telp_w);
            $sheet->setCellValue('AH' . $row, date('d-m-Y', strtotime($dt->tgl_daftar)));
            $sheet->getStyle('A' . $row . ':AH' . $row)->applyFromArray($styleArray_all);
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $writer = new Xlsx($spreadsheet);

        $filename = 'DATA SANTRI ' . strtoupper($gender) . ' ' . strtoupper($divisi->divisi) . ' DIUNDUH TANGGAL ' . date('Y-m-d H:i:s');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function pdf_divisi()
    {
        $gender = $this->input->get('gender');
        $id_divisi = $this->input->get('divisi');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mdivisi->export_excel($id_divisi, $gender);
        $divisi = $this->Mdivisi->getById($id_divisi);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA SANTRI ' . strtoupper($gender) . ' ' . strtoupper($divisi->divisi), 0, 1, 'C');
        $pdf->Cell(10, 0, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Exported' . date('M_Y'), 0, 1, 'C');
        $pdf->Cell(10, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 5, 'No', 1, 0, 'C');
        $pdf->Cell(25, 5, 'NIUP', 1, 0, 'C');
        $pdf->Cell(52, 5, 'NAMA', 1, 0, 'C');
        $pdf->Cell(70, 5, 'ALAMAT', 1, 0, 'C');
        $pdf->Cell(31, 5, 'WALI', 1, 0, 'C');
        $pdf->Cell(19, 5, 'NO HP', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 7);
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 5, $no, 1, 0, 'C');
            $pdf->Cell(25, 5, $data->niup, 1, 0);
            $pdf->Cell(52, 5, $data->nama, 1, 0);
            $pdf->Cell(70, 5, strtoupper($data->alamat_lengkap), 1, 0);
            $pdf->Cell(31, 5, $data->nm_w, 1, 0);
            $pdf->Cell(19, 5, $data->hp_w, 1, 1);
            $no++;
        }
        $pdf->Output();
    }
}
