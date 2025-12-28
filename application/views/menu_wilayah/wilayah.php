<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Wilayah</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<!-- /.card-header -->
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap">
				<h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" onclick="tambah_wilayah()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA WILAYAH</th>
						<th>KEPALA WILAYAH</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($wilayah as $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama_wilayah ?></td>
							<td><?= $value->kepala_wilayah ?></td>
							<td>
								<button class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_wilayah('<?= $value->id_wilayah ?>')"><i class="fas fa-edit"></i></button>
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

	function tambah_wilayah() {
		$.post('<?= site_url('Cwilayah/tambah_wilayah') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_wilayah(id) {
		$.post('<?= site_url('Cwilayah/form_edit_wilayah') ?>', {
			idwilayah: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>