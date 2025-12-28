<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('plugin/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cexport_pdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('Mexport_pdf');
    }

    public function cetak_person()
    {
        $output = array(
            'provinsi' => $this->Mexport_pdf->get_provinsi()->result(),
            'periode' => $this->Mexport_pdf->get_periode()->result(),
            'divisi' => $this->Mexport_pdf->div_all()
        );
        $this->load->view('laporan/cetak_person', $output);
    }

    // export PDF Tahun
    public function cek_tahun()
    {
        $tahun = $this->input->post('tahun');
        $datanya = $this->Mexport_pdf->cek_tahun($tahun);
        echo json_encode($datanya);
    }

    function pdf_tahun()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_tahun($id, $jenis);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA SANTRI ' . strtoupper($jenis) . ' ' . 'TAHUN ANGKATAN ' . $id, 0, 1, 'C');
        $pdf->Cell(10, 0, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
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
            $pdf->Cell(70, 5, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(31, 5, $data->nm_w, 1, 0);
            $pdf->Cell(19, 5, $data->hp_w, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF Provinsi
    public function cek_prov()
    {
        $prov = $this->input->post('prov');
        $datanya = $this->Mexport_pdf->cek_prov($prov);
        echo json_encode($datanya);
    }

    function pdf_provinsi()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_provinsi($id, $jenis);
        $prov = $this->Mexport_pdf->provinsi($id);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA SANTRI ' . strtoupper($jenis) . ' ' . 'DARI ' . $prov->name, 0, 1, 'C');
        $pdf->Cell(10, 0, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
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
            $pdf->Cell(70, 5, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(31, 5, $data->nm_w, 1, 0);
            $pdf->Cell(19, 5, $data->hp_w, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF kabupaten
    public function cek_kab()
    {
        $kab = $this->input->post('kab');
        $datanya = $this->Mexport_pdf->cek_kab($kab);
        echo json_encode($datanya);
    }

    function pdf_kabupaten()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_kabupaten($id, $jenis);
        $kab = $this->Mexport_pdf->kabupaten($id);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA SANTRI ' . strtoupper($jenis) . ' ' . 'DARI ' . $kab->name, 0, 1, 'C');
        $pdf->Cell(10, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
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
            $pdf->Cell(70, 5, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(31, 5, $data->nm_w, 1, 0);
            $pdf->Cell(19, 5, $data->hp_w, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF kecamatan
    public function cek_kec()
    {
        $kec = $this->input->post('kec');
        $datanya = $this->Mexport_pdf->cek_kec($kec);
        echo json_encode($datanya);
    }

    function pdf_kecamatan()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_kecamatan($id, $jenis);
        $kec = $this->Mexport_pdf->kecamatan($id);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA SANTRI ' . strtoupper($jenis) . ' ' . 'DARI KECAMATAN ' . $kec->name, 0, 1, 'C');
        $pdf->Cell(10, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
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
            $pdf->Cell(70, 5, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(31, 5, $data->nm_w, 1, 0);
            $pdf->Cell(19, 5, $data->hp_w, 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF kecamatan
    public function cek_periode()
    {
        $per = $this->input->post('per');
        $datanya = $this->Mexport_pdf->cek_periode($per);
        echo json_encode($datanya);
    }

    function pdf_pengurus()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_pengurus($id, $jenis);
        $per = $this->Mexport_pdf->periode($id);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA PENGURUS ' . strtoupper($jenis) . ' ' . 'PERIODE ' . $per->periode, 0, 1, 'C');
        $pdf->Cell(10, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
        $pdf->Cell(10, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 5, 'No', 1, 0, 'C');
        $pdf->Cell(25, 5, 'NIUP', 1, 0, 'C');
        $pdf->Cell(60, 5, 'NAMA', 1, 0, 'C');
        $pdf->Cell(50, 5, 'JABATAN', 1, 0, 'C');
        $pdf->Cell(31, 5, 'TANGGAL DIANGKAT', 1, 0, 'C');
        $pdf->Cell(31, 5, 'TANGGAL BERHENTI', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 7);
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 5, $no, 1, 0, 'C');
            $pdf->Cell(25, 5, $data->niup, 1, 0);
            $pdf->Cell(60, 5, strtoupper($data->nama), 1, 0);
            $pdf->Cell(50, 5, strtoupper($data->nm_jabatan), 1, 0);
            $pdf->Cell(31, 5, date('d-M-Y', strtotime($data->tanggal_diangkat)), 1, 0);
            $pdf->Cell(31, 5, date('d-M-Y', strtotime($data->tanggal_berhenti)), 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF Pengajar
    public function cek_tahun_angkat()
    {
        $tahun = $this->input->post('tahn');
        $datanya = $this->Mexport_pdf->cek_tahun_angkat($tahun);
        echo json_encode($datanya);
    }

    function pdf_pengajar()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');
        // $jns = substr(0, 4, $jenis);


        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_pengajar($id, $jenis);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA PENGAJAR ' . strtoupper($jenis) . ' ANGKATAN TAHUN ' . $id, 0, 1, 'C');
        $pdf->Cell(10, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
        $pdf->Cell(10, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 5, 'No', 1, 0, 'C');
        $pdf->Cell(25, 5, 'NIUP', 1, 0, 'C');
        $pdf->Cell(60, 5, 'NAMA', 1, 0, 'C');
        $pdf->Cell(31, 5, 'TANGGAL DIANGKAT', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 7);
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 5, $no, 1, 0, 'C');
            $pdf->Cell(25, 5, $data->niup, 1, 0);
            $pdf->Cell(60, 5, strtoupper($data->nama), 1, 0);
            $pdf->Cell(31, 5, date('d-M-Y', strtotime($data->tgl_diangkat)), 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // export PDF karyawan
    public function cek_instansi()
    {
        $instansi = $this->input->post('instansi');
        $datanya = $this->Mexport_pdf->cek_instansi($instansi);
        echo json_encode($datanya);
    }

    function pdf_karyawan()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');
        // $jns = substr(0, 4, $jenis);


        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_karyawan($id, $jenis);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA KARYAWAN ' . strtoupper($jenis) . ' INSTANSI ' . $id, 0, 1, 'C');
        $pdf->Cell(10, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
        $pdf->Cell(10, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 5, 'No', 1, 0, 'C');
        $pdf->Cell(25, 5, 'NIUP', 1, 0, 'C');
        $pdf->Cell(60, 5, 'NAMA', 1, 0, 'C');
        $pdf->Cell(31, 5, 'TANGGAL DIANGKAT', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 7);
        $no = 1;
        foreach ($santri as $data) {
            $pdf->Cell(8, 5, $no, 1, 0, 'C');
            $pdf->Cell(25, 5, $data->niup, 1, 0);
            $pdf->Cell(60, 5, strtoupper($data->nama), 1, 0);
            $pdf->Cell(31, 5, date('d-M-Y', strtotime($data->tgl_diangkat)), 1, 1);
            $no++;
        }
        $pdf->Output();
    }

    // pdf alumni
    public function cek_tahun_keluar()
    {
        $tahun = $this->input->post('tahn');
        $datanya = $this->Mexport_pdf->cek_tahun_keluar($tahun);
        echo json_encode($datanya);
    }

    function pdf_alumni()
    {
        $id = $this->input->get('id');
        $jenis = $this->input->get('jenis');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetMargins(2, 6, 2);
        $pdf->AddPage();
        $pdf->SetX(10);
        $santri = $this->Mexport_pdf->pdf_alumni($id, $jenis);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, 'DATA ALUMNI ' . strtoupper($jenis) . ' ' . ' KELUAR TAHUN ' . $id, 0, 1, 'C');
        $pdf->Cell(10, 0, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetX(15);
        $pdf->Cell(0, 6, '#Update' . date('M_Y'), 0, 1, 'C');
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
            $pdf->Cell(70, 5, $data->alamat_lengkap, 1, 0);
            $pdf->Cell(31, 5, $data->nm_w, 1, 0);
            $pdf->Cell(19, 5, $data->hp_w, 1, 1);
            $no++;
        }
        $pdf->Output();
    }
}
