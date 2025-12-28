<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Alumni</h1>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="contianer-fluid">
		<div class="card">
			<div class="card-body p-1">
				<!-- <h3 class="card-title"><a class="btn btn-block btn-sm bg-teal" href="#" onclick="tambah_alumni()"><i class="fas fa-plus "></i> Tambah Data</a></h3> -->
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIUP</th>
							<th>NAMA</th>
							<th>ALAMAT</th>
							<th>TANGGAL KELUAR</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alumni as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->alamat_lengkap ?></td>
								<td><?= $value->tgl_berhenti ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-info" title="Info" onclick="detail_alumni('<?= $value->id_person ?>')">
											<i class="fas fa-info-circle"></i>
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

	function detail_alumni(id) {
		$.post('<?= site_url('Calumni/detail_santri') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	function tambah_alumni() {
		$.post('<?= site_url('Calumni/tambah_alumni') ?>', function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>