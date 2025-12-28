<?php
class Cmembers extends CI_Controller 
{
    public function __construct() {
        parent :: __construct();
        $this->load->model('Mperson');
    }

    public function index()
    {
        $output = array(
            'nama_members' => $this->session->userdata['logged_in']['nama'],
            'jabatan' => $this->session->userdata['logged_in']['jabatan'],
        );
        $this->load->view('members/members_beranda', $output);
    }

    public function halaman_utama()
    {
        $date = date('Y');
        $santriBaru = $this->db->where('YEAR(tgl_daftar)', $date)->get('tb_person')->num_rows();
        $santriPsb = $this->db->where('YEAR(tgl_daftar)', $date)->where_not_in('no_regristrasi', '')->get('tb_psb')->num_rows();
        $santripsbPutra =  $this->db->where('YEAR(tgl_daftar)', $date)->where('jenis_kelamin', 'Laki-Laki')->get('tb_person')->num_rows();
        $santripsbPutri = $this->db->where('YEAR(tgl_daftar)', $date)->where('jenis_kelamin', 'Perempuan')->get('tb_person')->num_rows();

        $output = array(
            'santriBaru' => $santriBaru,
            'putra' => $santripsbPutra,
            'putri' => $santripsbPutri,
            'psb' => $santriPsb,
        );
        $this->load->view('members/halaman_utama', $output);

    }

    
    public function halaman_santri()
    {
        $this->load->view('members/halaman_santri');
    }

    public function data_person()
    {
        $list = $this->Mperson->get_datatables("1");
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $field->niup;
			$row[] = strtoupper($field->nama);
			$row[] = strtoupper($field->alamat_lengkap);
            // $row[] = '<img src="https://ponpesnaa.net/gambar/qr_code/'.$field->qr_code.'" alt="" class="size-32" >';
            $row[] = '
                        <button type="button" id="bt-detail" class="btn btn-sm rounded-circle btn-info" title="Detail" data="'.$field->id_person.'">
                            <i class="fas fa-info-circle"></i>
                        </button>
                        ';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mperson->count_all(),
			"recordsFiltered" => $this->Mperson->count_filtered("1"),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    }

    public function halaman_detail()
    {
        $id = $this->input->post('idperson');
        $data = array(
            'data' => $this->Mperson->santri_idx($id),
            'data_alamat' => $this->Mperson->alamat_wali($id),
            'mahrom' => $this->Mperson->data_mahromnya($id),
            'domisili' => $this->Mperson->data_domisili($id)
        );
        $this->load->view('members/halaman_detail', $data);
    }

    public function download()
    {
        $this->load->helper('download');
        $qr = $this->input->get('qr');
        $name = "QrCode_".$this->input->get('nama').".jpg";
        $fileContents = file_get_contents('../gambar/qr_code/'.$qr);
        force_download($name, $fileContents);
    }
    
    public function download_foto()
    {
        $this->load->helper('download');
        $filename = $this->input->get('nama');
        $files = $this->input->get('file');
        $fileContents = file_get_contents($files);
        $file = $filename.'.jpg';
        force_download($file, $fileContents);
    }



}
