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
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIUP</th>
							<th>NAMA</th>
							<th>JENIS KELAMIN</th>
							<th>TANGGAL KELUAR</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$(function() {
		$('#example1').DataTable({
			processing: true,
			serverSide: true,
			ordering: false,
			info: false,
			lengthChange: false,
			order: [],
			ajax: {
				url: "<?= site_url('Calumni/alumni_data') ?>",
				type: "POST",
			}
		});
	});

	function detail_alumni(id) {
		$.post('<?= site_url('Calumni/detail_alumni') ?>', {
			idperson: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}
</script>