<?php
class Mdivisi extends CI_Model
{

	var $table = 'tb_divisi';
	var $column_order = array(null, 'kode_divisi', 'divisi');
	var $column_search = array('kode_divisi', 'divisi');
	var $order = array('id_divisi' => 'DESC');

	private function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;
		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {

				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by(
				$this->column_order[$_POST['order']['0']['column']],
				$_POST['order']['0']['dir']
			);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	// GET DATATABLE RESULT
	public function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);

		return $this->db->get()->result();
	}

	// HITUNG FILTER
	public function count_filtered()
	{
		$this->_get_datatables_query();
		return $this->db->get()->num_rows();
	}

	// HITUNG TOTAL
	public function count_all()
	{
		return $this->db->count_all($this->table);
	}

	public function getLastCode()
	{
		$this->db->select('kode_divisi');
		$this->db->order_by('id_divisi', 'DESC');
		$this->db->limit(1);
		return $this->db->get('tb_divisi')->row();
	}

	public function checkNamaDivisi($nama)
	{
		return $this->db->get_where('tb_divisi', ['divisi' => $nama])->row();
	}

	public function insertDivisi($data)
	{
		return $this->db->insert('tb_divisi', $data);
	}

	public function getById($id)
	{
		return $this->db->get_where('tb_divisi', ['id_divisi' => $id])->row();
	}

	public function checkNamaDivisiEdit($nama, $id)
	{
		$this->db->where('divisi', $nama);
		$this->db->where('id_divisi !=', $id);
		return $this->db->get('tb_divisi')->row();
	}

	public function searchSantri($keyword)
	{
		$this->db->select('p.id_person, p.niup, p.nama, p.alamat_lengkap');
		$this->db->from('tb_person p');

		$this->db->group_start();
		$this->db->like('p.nama', $keyword);
		$this->db->or_like('p.niup', $keyword);
		$this->db->group_end();

		$this->db->where('p.niup IS NOT NULL');
		$this->db->where('p.niup !=', '');

		// status person aktif
		$this->db->where('p.status', 'aktif');

		// belum terdaftar di history divisi aktif
		$this->db->where("
        p.id_person NOT IN (
            SELECT id_person
            FROM tb_history_divisi
            WHERE status = 'Aktif'
        )
    ", NULL, FALSE);

		$query = $this->db->get();
		return $query->result();
	}

	private function _get_datatable_query($id)
	{
		$this->db->from('tb_history_divisi');
		$this->db->join('tb_person', 'tb_person.id_person = tb_history_divisi.id_person');
		$this->db->where('tb_history_divisi.id_divisi', $id);
		$this->db->where('tb_history_divisi.status', 'Aktif');

		$column_search = [
			'tb_person.niup',
			'tb_person.nama',
			'tb_person.jenis_kelamin',
			'tb_history_divisi.tgl_masuk'
		];

		$column_order  = [
			null,
			'tb_person.niup',
			'tb_person.nama',
			'tb_person.jenis_kelamin',
			'tb_history_divisi.tgl_masuk',
			null
		];

		// Search
		$i = 0;
		foreach ($column_search as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		// Order
		if (isset($_POST['order'])) {
			$this->db->order_by(
				$column_order[$_POST['order'][0]['column']],
				$_POST['order'][0]['dir']
			);
		} else {
			$this->db->order_by('tb_history_divisi.id', 'DESC');
		}
	}

	public function get_datatable($id)
	{
		$this->_get_datatable_query($id);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		return $this->db->get()->result();
	}

	public function count_filter($id)
	{
		$this->_get_datatable_query($id);
		return $this->db->get()->num_rows();
	}

	public function count($id)
	{
		$this->db->from('tb_history_divisi');
		$this->db->where('id_divisi', $id);
		return $this->db->count_all_results();
	}

	public function div_all($id)
	{
		$this->db->from('tb_divisi');
		$this->db->where_not_in('id_divisi', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_person_by_divisi($id_divisi)
	{
		$this->db->where('id_divisi', $id_divisi);
		$this->db->where('status', 'Aktif');
		return $this->db->count_all_results('tb_history_divisi');
	}

	public function count_laki_by_divisi($id_divisi)
	{
		$this->db->select('COUNT(*) as total');
		$this->db->from('tb_history_divisi hd');
		$this->db->join('tb_person p', 'p.id_person = hd.id_person');
		$this->db->where('hd.id_divisi', $id_divisi);
		$this->db->where('p.jenis_kelamin', 'Laki-Laki');
		$this->db->where('hd.status', 'Aktif');
		$query = $this->db->get();
		return $query->row()->total;
	}

	public function count_perempuan_by_divisi($id_divisi)
	{
		$this->db->select('COUNT(*) as total');
		$this->db->from('tb_history_divisi hd');
		$this->db->join('tb_person p', 'p.id_person = hd.id_person');
		$this->db->where('hd.id_divisi', $id_divisi);
		$this->db->where('p.jenis_kelamin', 'Perempuan');
		$this->db->where('hd.status', 'Aktif');
		$query = $this->db->get();
		return $query->row()->total;
	}

	public function getHistoryById($id)
	{
		$this->db->join('tb_person', 'tb_person.id_person=tb_history_divisi.id_person');
		$this->db->where('id', $id);
		$this->db->from('tb_history_divisi');
		$query = $this->db->get();
		return $query->row();
	}

	public function nonaktifkanHistory($id)
	{
		$data = [
			'status' => 'Tidak Aktif',
			'tgl_berhenti' => date('Y-m-d')
		];

		$this->db->where('id', $id);
		return $this->db->update('tb_history_divisi', $data);
	}

	public function tambahHistoryBaru($id_person, $id_divisi)
	{
		$data = [
			'id_person'     => $id_person,
			'id_divisi'     => $id_divisi,
			'tgl_masuk'     => date('Y-m-d'),
			'status'        => 'Aktif'
		];

		return $this->db->insert('tb_history_divisi', $data);
	}

	public function export_excel($id_divisi, $gender)
	{
		$this->db->from('tb_history_divisi');
		$this->db->join('tb_person', 'tb_person.id_person = tb_history_divisi.id_person');
		$this->db->join('tb_divisi', 'tb_divisi.id_divisi = tb_history_divisi.id_divisi');
		$this->db->where('tb_history_divisi.id_divisi', $id_divisi);
		$this->db->where('tb_history_divisi.status', 'Aktif');
		$this->db->where('tb_person.jenis_kelamin', $gender);
		$query = $this->db->get();
		return $query->result();
	}
}
