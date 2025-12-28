<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Lembaga</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap">
				<h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" title="Tambah Lembaga" href="#" onclick="tambah_lembaga()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA LEMBAGA</th>
						<th>WILAYAH</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($lembaga as $value) {
					?>
						<tr title="<?= $value->nama ?>">
							<td><?= $no++ ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->nama_wilayah ?></td>
							<td>
								<button class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_lembaga('<?= $value->id_lembaga ?>')"><i class="fas fa-edit"></i></button>
							</td>
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

	function tambah_lembaga() {
		$.post('<?= site_url('clembaga/tambah_lembaga') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_lembaga(id) {
		$.post('<?= site_url('Clembaga/form_edit_lembaga') ?>', {
			idlembaga: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>