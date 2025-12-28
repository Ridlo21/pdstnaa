<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pengajar</h1>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="contianer-fluid">
		<div class="card">
			<div class="card-body p-1">
				<h3 class="card-title"><a class="btn btn-block btn-sm bg-teal" href="#" onclick="tambah_pengajar_nubdah()"><i class="fas fa-plus "></i> Tambah Data</a></h3>
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIUP</th>
							<th>NAMA</th>
							<th>ALAMAT</th>
							<th>TGL DIANGKAT</th>
							<th>STATUS</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pengajar as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->alamat_lengkap ?></td>
								<td><?= $value->tgl_diangkat ?></td>
								<?php
								if ($value->status_guru_nubdah == 'Aktif') {
									$st = "<span class='badge bg-primary'>Aktif</span>";
								} else {
									$st = "<span class='badge bg-danger'>Tidak Aktif</span>";
								}
								?>
								<td><?= $st ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-info" title="Info" onclick="detail_pengajar('<?= $value->id_person ?>')">
											<i class="fas fa-info-circle"></i>
										</button>
										<button type="button" class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_pengajar('<?= $value->id_guru_nubdah ?>')">
											<i class=" fas fa-edit"></i>
										</button>
										<button type="button" class="btn btn-sm btn-danger" title="Nonaktifkan" onclick="nonaktifkan_pengajar('<?= $value->id_guru_nubdah ?>','<?= date('Y-m-d') ?>')">
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

	function detail_pengajar(id) {
		$.post('<?= site_url('Cpengajar/detail_santri') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function tambah_pengajar_nubdah() {
		$.post('<?= site_url('Cpengajar/tambah_pengajar_nubdah') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_pengajar(id) {
		$.post('<?= site_url('Cpengajar/form_edit_pengajar') ?>', {
			idpengajar: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function nonaktifkan_pengajar(id, tgl) {
		swal.fire({
			title: 'PDST NAA',
			text: "Apakah Anda Yakin menonaktifkan pengajar ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Cpengajar/nonaktifkan_pengajar',
							type: 'POST',
							data: {
								id: id,
								tgl_berhenti: tgl
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Pengajar Dinonaktifkan",
								type: "success"
							}).then(okay => {
								if (okay) {
									menu_pengajar();
								}
							});
						});
				});
			}
		});
	}
</script>