<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Kamar</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap ">
				<h3 class="card-title"><a class="btn btn-sm bg-teal" href="#" onclick="tambah_kamar()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA KAMAR</th>
						<th>BLOCK</th>
						<th>WILAYAH</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($kamar as $value) { ?>
						<tr title="<?= $value->nama_kamar ?>">
							<td><?= $no++ ?></td>
							<td><?= $value->nama_kamar ?></td>
							<td><?= $value->nama_blok ?></td>
							<td><?= $value->nama_wilayah ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-info" title="Info" onclick="info('<?= $value->id_kamar ?>')">
										<i class="fas fa-info-circle"></i>
									</button>
									<button type="button" class="btn btn-warning" title="Edit" onclick="form_edit_kamar('<?= $value->id_kamar ?>')">
										<i class="fas fa-edit"></i>
									</button>
									<a title="Cetak Penduduk Kamar" class="btn btn-secondary" href="Ckamar/cetak?id=<?= $value->id_kamar ?>" target="_blank"><i class="fas fa-print"></i></a>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
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

	function tambah_kamar() {
		$.post('<?= site_url('Ckamar/tambah_kamar') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_kamar(id) {
		$.post('<?= site_url('Ckamar/form_edit_kamar') ?>', {
			idkamar: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function info(id) {
		$.post('<?= site_url('Ckamar/info') ?>', {
			idkamar: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>