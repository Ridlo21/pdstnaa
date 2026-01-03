<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calumni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Malumni');
        $this->load->model('Mperson');
    }

    public function alumni()
    {
        $this->load->view('menu_alumni/alumni');
    }

    public function alumni_data()
    {
        $list = $this->Malumni->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $alumni) {
            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $alumni->niup;
            $row[] = strtoupper($alumni->nama);
            $row[] = $alumni->jenis_kelamin;
            $row[] = date('d-m-Y', strtotime($alumni->tgl_berhenti));

            // Aksi (bebas mau edit / hapus)
            $row[] = '
                <div class="btn-group">
							<button type="button" class="btn btn-sm btn-info" title="Info" onclick="detail_alumni(' . $alumni->id_person . ')">
								<i class="fas fa-info-circle"></i>
							</button>
                            <a href="Calumni/print?id=' . $alumni->id_person . '&alumni=' . $alumni->id_alumni . '" target="_blank" class="btn btn-sm btn-secondary" title="Print">
								<i class="fas fa-print"></i>
							</a>
						</div>';

            $data[] = $row;
        }

        $output = [
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Malumni->count_all(),
            "recordsFiltered" => $this->Malumni->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function detail_alumni()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Malumni->santri_idx($id),
            'data_alamat' => $this->Malumni->alamat_wali($id),
            'mahrom' => $this->Malumni->data_mahrom($id),
            'domisili' => $this->Malumni->data_domisili($id)
        );
        $this->load->view('menu_alumni/detail_santri', $data);
    }

    public function print()
    {
        $id = $this->input->get('id');
        $alumni = $this->input->get('alumni');
        $output = array(
            'data'         => $this->Malumni->santri_idx($id),
            'data_alamat'  => $this->Malumni->alamat_wali($id),
            'data_divisi'  => $this->Malumni->divisi_by_person($id, $alumni),
            'data_boyong'  => $this->Malumni->data_boyong($alumni)
        );
        $this->load->view('menu_alumni/print_boyong', $output);
    }
}
