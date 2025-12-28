<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Block</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap">
				<h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" onclick="tambah_blok()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA BLOCK</th>
						<th>WILAYAH</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($blok as $value) {
					?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama_blok ?></td>
							<td><?= $value->nama_wilayah ?></td>
							<td>
								<button class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_blok('<?= $value->id_blok ?>')"><i class="fas fa-edit"></i></button>
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

	function tambah_blok() {
		$.post('<?= site_url('cblok/tambah_blok') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_blok(id) {
		$.post('<?= site_url('Cblok/form_edit_blok') ?>', {
			idblok: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>