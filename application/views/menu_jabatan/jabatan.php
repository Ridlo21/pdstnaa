<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Struktural</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="card">
		<!-- /.card-header -->
		<div class="card-body table-responsive p-1">
			<table id="example1" class="table table-hover text-nowrap">
				<h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" onclick="tambah_jabatan()"><i class="fas fa-plus"></i> Tambah Data</a></h3>
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA JABATAN</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($jabatan as $value) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nm_jabatan ?></td>
							<td>
								<div class="btn-group">
									<button class="btn btn-sm btn-warning" title="Edit" onclick="form_edit_jabatan('<?= $value->id_jabatan ?>')"><i class="fas fa-edit"></i></button>
									<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#staticBackdrop" title="Edit" onclick="detail('<?= $value->id_jabatan ?>')">
										<i class=" fas fa-eye"></i>
									</button>
									<div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Detail Jabatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table id="detail" class="table table-hover text-nowrap">
					<thead>
						<tr style="color: dimgrey;">
							<th>No</th>
							<th>Niup</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Jabatan</th>
							<th id="kk">Status</th>
						</tr>
					</thead>
					<tbody id="list_detail">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

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

	function tambah_jabatan() {
		$.post('<?= site_url('Cjabatan/tambah_jabatan') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function form_edit_jabatan(id) {
		$.post('<?= site_url('Cjabatan/form_edit_jabatan') ?>', {
			idjabatan: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function detail(id) {
		$.ajax({
			url: "<?= site_url('Cjabatan/detail') ?>",
			data: {
				id: id
			},
			type: "POST",
			dataType: "JSON",
			success: function(data) {
				if (data.pesan === "ya") {
					$('#list_detail').html('`' + data.list_detail + '`');
				} else {
					$('#list_detail').html('`' + data.list_detail + '`');
				}
			}
		})
	}
</script>