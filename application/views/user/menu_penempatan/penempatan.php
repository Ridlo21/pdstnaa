<div class="content-header">
	<div class="container">
		<div class="row mt-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Penempatan Kamar</h1>
			</div>
		</div>
	</div>
</div>

<div class="content mt-3">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table" id="example1">
					<thead>
						<tr>
							<th>#</th>
							<th>NIUP</th>
							<th>NAMA</th>
							<th>KAMAR</th>
							<th>TANGGAL</th>
							<th>STATUS</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($penempatan as $value) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->niup ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->nama_kamar ?></td>
								<td><?= date('d-M-Y', strtotime($value->tgl_penetapan))  ?></td>
								<?php
								if ($value->aktif == 'Ya') {
									$st = "<span class='badge bg-primary'>Aktif</span>";
								} else {
									$st = "Tidak Aktif";
								}
								?>
								<td><?= $st ?></td>
								<td>
									<button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
									<button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Nonaktifkan</button>
								</td>
							</tr>
						<?php } ?>
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
			"lengthChange": true,
			"ordering": false,
			"searching": true,
			"info": true,
			"autoWidth": true,
		});
		$('#example2').DataTable();
	});
</script>