<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cgrafik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mgrafik');
    }

    public function menu_grafik()
    {
        $this->load->view('menu_grafik/grafik');
    }

    public function grafik_wilayah()
    {
        $this->load->view('menu_grafik/grafik_wilayah');
    }

    function grafik_tahun()
    {
        $data = $this->Mgrafik->grafik_tahun();
        if ($data == null) {
            $da[] = '0';
            $dat[] = 'Data tidak ada. Silakan lakukan input santri!';
        } else {
            foreach ($data as $value) {
                $dat[] = $value->tahun;
                $da[] = $value->jml;
            }
        }
        echo json_encode(array('tahun' => $dat, 'jml' => $da));
    }

    function grafik_perwilayah()
    {
        $tahun = $this->input->post('tahun');
        $data = $this->Mgrafik->grafik_perwilayah($tahun);
        if ($data == null) {
            $date[] = '0';
            $dat[] = 'Data tidak ada';
        } else {
            foreach ($data as $value) {
                $dat[] = $value->nama_wilayah;
                $date[] = $value->jml;
            }
        }
        echo json_encode(array('wilayah' => $dat, 'jml' => $date));
    }
}
