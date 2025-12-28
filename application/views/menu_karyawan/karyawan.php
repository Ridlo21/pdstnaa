<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Karyawan</h1>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="contianer-fluid">
		<div class="card">
			<div class="card-body p-1">
				<h3 class="card-title"><a class="btn btn-block btn-sm bg-teal" href="#" onclick="tambah_data_karyawan()"><i class="fas fa-plus "></i> Tambah Data</a></h3>
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIUP</th>
							<th>NAMA</th>
							<th>INSTANSI</th>
							<th>TANGGAL DIANGKAT</th>
							<th>TANGGAL BERHENTI</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($karyawan as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->instansi ?></td>
								<td><?= $value->tgl_diangkat ?></td>
								<td><?= $value->tgl_berhenti ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-info" title="Info" onclick="detail_karyawan('<?= $value->id_karyawan ?>')">
											<i class="fas fa-info-circle"></i>
										</button>
										<button type="button" class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_karyawan('<?= $value->id_karyawan ?>')">
											<i class=" fas fa-edit"></i>
										</button>
										<button type="button" class="btn btn-sm btn-danger" title="Nonaktifkan" onclick="nonaktifkan_karyawan('<?= $value->id_karyawan ?>')">
											<i class="fas fa-user-slash"></i>
										</button>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</section>

<script>
	$(function() {
		$("#example1").DataTable({
			"paging": true,
			"lengthChange": false,
			"ordering": false,
			"searching": true,
			"info": false,
			"autoWidth": true,
		});
		$('#example2').DataTable();
	});

	function detail_karyawan(id) {
		$.post('<?= site_url('Ckaryawan/detail_karyawan') ?>', {
			idkaryawan: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function tambah_data_karyawan() {
		$.post('<?= site_url('Ckaryawan/tambah_karyawan') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_karyawan(id) {
		$.post('<?= site_url('Ckaryawan/form_edit_karyawan') ?>', {
			idkaryawan: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function nonaktifkan_karyawan(id) {
		swal.fire({
			title: 'PDST NAA',
			text: "Apakah Anda Yakin menonaktifkan karyawan ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Ckaryawan/nonaktifkan_karyawan',
							type: 'POST',
							data: {
								id: id
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Karyawan Sukses Dinonaktifkan",
								type: "success"
							}).then(okay => {
								if (okay) {
									karyawan();
								}
							});
						});
				});
			}
		});
	}
</script>