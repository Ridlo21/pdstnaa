<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Cetak Person</h1>
			</div>
		</div>
	</div>
</section>
<section class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6" id="accordion">
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
						<div class="card-header">
							<h4 class="card-title w-100">
								1. Cetak Person Setiap Tahun Angkatan
							</h4>
						</div>
					</a>
					<div id="collapseOne" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH SANTRI</label>
									<select name="" id="jen_kel" class="form-control">
										<option hidden value="0">-Pilih Santri-</option>
										<option value="Laki-Laki">Santri Laki-Laki</option>
										<option value="Perempuan">Santri Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH TAHUN ANGKATAN</label>
									<select name="" id="tahun" class="form-control">
										<option hidden value="0">-Pilih Tahun-</option>
										<?php for ($i = 2001; $i < date('Y') + 5; $i++) : ?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" title="Cetak PDF" id="bt_cetak_tahun"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" title="Cetak PDF" id="bt_cetak_tahun2"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#bt_cetak_tahun').on('click', function() {
									var jenkel = $('#jen_kel').val()
									var tahun = $('#tahun').val()
									if (jenkel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (tahun == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Tahun Angkatan",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_tahun') ?>",
											data: {
												tahun: tahun
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_tahun?id=" + tahun + "&jenis=" + jenkel, '_blank');
											}
										})
									}
								})

								$('#bt_cetak_tahun2').on('click', function() {
									var jenkel = $('#jen_kel').val()
									var tahun = $('#tahun').val()
									if (jenkel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (tahun == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Tahun Angkatan",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_tahun') ?>",
											data: {
												tahun: tahun
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_excel/excel_tahun?id=" + tahun + "&jenis=" + jenkel, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
						<div class="card-header">
							<h4 class="card-title w-100">
								2. Cetak Person Setiap Provinsi
							</h4>
						</div>
					</a>
					<div id="collapseTwo" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH SANTRI</label>
									<select name="" id="jenkel" class="form-control">
										<option hidden value="0">-Pilih Santri-</option>
										<option value="Laki-Laki">Santri Laki-Laki</option>
										<option value="Perempuan">Santri Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH PROVINSI</label>
									<select name="" id="prov" class="form-control select2">
										<option value="0">-Pilih Provinsi-</option>
										<?php foreach ($provinsi as $key => $value) { ?>
											<option value="<?= $value->id ?>"><?= $value->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" title="Cetak PDF" id="bt_cetak_prov"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" title="Export Excel" id="bt_cetak_prov2"><i class="fas fa-file-excel"></i> Export Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#bt_cetak_prov').on('click', function() {
									var jenkel = $('#jenkel').val()
									var provinsi = $('#prov').val()
									if (jenkel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (provinsi == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Provinsi",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_prov') ?>",
											data: {
												prov: provinsi
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_provinsi?id=" + provinsi + "&jenis=" + jenkel, '_blank');
											}
										})
									}
								})

								$('#bt_cetak_prov2').on('click', function() {
									var jenkel = $('#jenkel').val()
									var provinsi = $('#prov').val()
									if (jenkel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (provinsi == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Provinsi",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_prov') ?>",
											data: {
												prov: provinsi
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_excel/excel_provinsi?id=" + provinsi + "&jenis=" + jenkel, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
						<div class="card-header">
							<h4 class="card-title w-100">
								3. Cetak Person Setiap Kabupaten
							</h4>
						</div>
					</a>
					<div id="collapseThree" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH SANTRI</label>
									<select name="" id="kel" class="form-control">
										<option hidden value="0">-Pilih Santri-</option>
										<option value="Laki-Laki">Santri Laki-Laki</option>
										<option value="Perempuan">Santri Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH PROVINSI</label>
									<select name="" id="provinsi" class="form-control select2">
										<option value="0">-Pilih Provinsi-</option>
										<?php foreach ($provinsi as $key => $value) { ?>
											<option value="<?= $value->id ?>"><?= $value->name ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH KABUPATEN</label>
									<select name="" id="kabupaten" class="form-control select2">
										<option value="0">-Pilih Kabupaten-</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" title="Cetak PDF" id="bt_cetak_kab"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" title="Export Excel" id="bt_cetak_kab2"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#provinsi').change(function() {
									var id = $(this).val();
									$.ajax({
										url: "<?php echo site_url('Cperson/get_kabupaten'); ?>",
										method: "POST",
										data: {
											id: id
										},
										async: true,
										dataType: 'json',
										success: function(data) {

											var html = '';
											var i;
											html += '<option value=' + '0' + '>' + '-Pilih Kabupaten-' + '</option>';
											for (i = 0; i < data.length; i++) {
												html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
											}
											$('#kabupaten').html(html);

										}
									});
									return false;
								});

								$('#bt_cetak_kab').on('click', function() {
									var kel = $('#kel').val()
									var prov = $('#provinsi').val()
									var kab = $('#kabupaten').val()
									if (kel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (prov == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Provinsi",
											type: "warning"
										})
									} else if (kab == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Kabupaten",
											type: "warning"
										})
									} else {
										var kabupaten = $('#kabupaten').val()
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_kab') ?>",
											data: {
												kab: kabupaten
											},
											dataType: "JSON",
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_kabupaten?id=" + kabupaten + "&jenis=" + kel, '_blank');
											}
										})
									}
								})

								$('#bt_cetak_kab2').on('click', function() {
									var kel = $('#kel').val()
									var prov = $('#provinsi').val()
									var kab = $('#kabupaten').val()
									if (kel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (prov == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Provinsi",
											type: "warning"
										})
									} else if (kab == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Kabupaten",
											type: "warning"
										})
									} else {
										var kabupaten = $('#kabupaten').val()
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_kab') ?>",
											data: {
												kab: kabupaten
											},
											dataType: "JSON",
											success: function(hasil) {
												window.open("Cexport_excel/excel_kabupaten?id=" + kabupaten + "&jenis=" + kel, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
						<div class="card-header">
							<h4 class="card-title w-100">
								4. Cetak Person Setiap Kecamatan
							</h4>
						</div>
					</a>
					<div id="collapseFour" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH SANTRI</label>
									<select name="" id="kelamin" class="form-control">
										<option hidden value="0">-Pilih Santri-</option>
										<option value="Laki-Laki">Santri Laki-Laki</option>
										<option value="Perempuan">Santri Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH PROVINSI</label>
									<select name="" id="provinsinya" class="form-control select2">
										<option value="0">-Pilih Provinsi-</option>
										<?php foreach ($provinsi as $key => $value) { ?>
											<option value="<?= $value->id ?>"><?= $value->name ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH KABUPATEN</label>
									<select name="" id="kabupatennya" class="form-control select2">
										<option value="0">-Pilih Kabupaten-</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH KECAMATAN</label>
									<select name="" id="kecamatannya" class="form-control select2">
										<option value="0">-Pilih Kecamatan-</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" id="bt_cetak_kec"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" id="bt_cetak_kec2"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#provinsinya').change(function() {
									var id = $(this).val();
									$.ajax({
										url: "<?php echo site_url('Cperson/get_kabupaten'); ?>",
										method: "POST",
										data: {
											id: id
										},
										async: true,
										dataType: 'json',
										success: function(data) {

											var html = '';
											var i;
											html += '<option value=' + '0' + '>' + '-Pilih Kabupaten-' + '</option>';
											for (i = 0; i < data.length; i++) {
												html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
											}
											$('#kabupatennya').html(html);

										}
									});
									return false;
								});

								$('#kabupatennya').change(function() {
									var id = $(this).val();
									$.ajax({
										url: "<?php echo site_url('Cperson/get_kecamatan'); ?>",
										method: "POST",
										data: {
											id: id
										},
										async: true,
										dataType: 'json',
										success: function(data) {

											var html = '';
											var i;
											html += '<option value=' + '0' + '>' + '-Pilih Kecamatan-' + '</option>';
											for (i = 0; i < data.length; i++) {
												html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
											}
											$('#kecamatannya').html(html);
										}
									});
									return false;
								});

								$('#bt_cetak_kec').on('click', function() {
									var kel = $('#kelamin').val()
									var prov = $('#provinsinya').val()
									var kab = $('#kabupatennya').val()
									var kec = $('#kecamatannya').val()
									if (kel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (prov == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Provinsi",
											type: "warning"
										})
									} else if (kab == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Kabupaten",
											type: "warning"
										})
									} else if (kec == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Kecamatan",
											type: "warning"
										})
									} else {
										var kecamatan = $('#kecamatannya').val()
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_kec') ?>",
											data: {
												kec: kecamatan
											},
											dataType: "JSON",
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_kecamatan?id=" + kecamatan + "&jenis=" + kel, '_blank');
											}
										})
									}
								})

								$('#bt_cetak_kec2').on('click', function() {
									var kel = $('#kelamin').val()
									var prov = $('#provinsinya').val()
									var kab = $('#kabupatennya').val()
									var kec = $('#kecamatannya').val()
									if (kel == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Santri",
											type: "warning"
										})
									} else if (prov == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Provinsi",
											type: "warning"
										})
									} else if (kab == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Kabupaten",
											type: "warning"
										})
									} else if (kec == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Kecamatan",
											type: "warning"
										})
									} else {
										var kecamatan = $('#kecamatannya').val()
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_kec') ?>",
											data: {
												kec: kecamatan
											},
											dataType: "JSON",
											success: function(hasil) {
												window.open("Cexport_excel/excel_kecamatan?id=" + kecamatan + "&jenis=" + kel, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
						<div class="card-header">
							<h4 class="card-title w-100">
								5. Cetak Person Setiap Divisi
							</h4>
						</div>
					</a>
					<div id="collapseNine" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH SANTRI</label>
									<select name="" id="gender" class="form-control">
										<option hidden value="0">-Pilih Santri-</option>
										<option value="Laki-Laki">Santri Laki-Laki</option>
										<option value="Perempuan">Santri Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH DIVISI</label>
									<select name="" id="divisi" class="form-control select2">
										<option value="0">-Pilih Divisi-</option>
										<?php foreach ($divisi as $value) { ?>
											<option value="<?= $value->id_divisi ?>"><?= $value->divisi ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" id="btDivisiPdf"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" id="btDivisiExcel"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#btDivisiExcel').on('click', function() {
									let gender = $('#gender').val()
									let divisi = $('#divisi').val()
									$.ajax({
										type: "POST",
										url: "<?= site_url('Cdivisi/cek_export') ?>",
										data: {
											gender: gender,
											divisi: divisi
										},
										dataType: 'JSON',
										success: function(response) {
											if (response.status == 'success') {
												window.open("Cdivisi/export_divisi?gender=" + gender + "&divisi=" + divisi, '_blank');
											} else {
												Swal.fire({
													type: 'error',
													title: "Gagal",
													text: response.pesan,
												});
											}
										},
										error: function() {
											Swal.fire({
												type: 'error',
												title: 'Error',
												text: 'Terjadi kesalahan pada server.',
											});
										}
									})
								})

								$('#btDivisiPdf').on('click', function() {
									let gender = $('#gender').val()
									let divisi = $('#divisi').val()
									$.ajax({
										type: "POST",
										url: "<?= site_url('Cdivisi/cek_export') ?>",
										data: {
											gender: gender,
											divisi: divisi
										},
										dataType: 'JSON',
										success: function(response) {
											if (response.status == 'success') {
												window.open("Cdivisi/pdf_divisi?gender=" + gender + "&divisi=" + divisi, "_blank");
											} else {
												Swal.fire({
													type: 'error',
													title: "Gagal",
													text: response.pesan,
												});
											}
										},
										error: function() {
											Swal.fire({
												type: 'error',
												title: 'Error',
												text: 'Terjadi kesalahan pada server.',
											});
										}
									})
								})
							});
						</script>
					</div>
				</div>
			</div>
			<div class="col-md-6" id="accordione">
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
						<div class="card-header">
							<h4 class="card-title w-100">
								6. Cetak Pengurus
							</h4>
						</div>
					</a>
					<div id="collapseFive" class="collapse" data-parent="#accordione">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH PENGURUS</label>
									<select name="" id="pengurus" class="form-control">
										<option value="0" hidden>-Pilih Pengurus-</option>
										<option value="Laki-Laki">Pengurus Laki-Laki</option>
										<option value="Perempuan">Pengurus Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH PERIODE</label>
									<select name="" id="periode" class="form-control select2">
										<option value="0">-Pilih Periode-</option>
										<?php foreach ($periode as $value) { ?>
											<option value="<?= $value->id_periode ?>"><?= $value->periode ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" id="bt_pengurus_pdf"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" id="bt_pengurus_excel"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#bt_pengurus_pdf').on('click', function() {
									var pengurus = $('#pengurus').val()
									var periode = $('#periode').val()
									if (pengurus == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Pengurus",
											type: "warning"
										})
									} else if (periode == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Periode",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_periode') ?>",
											data: {
												per: periode
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_pengurus?id=" + periode + "&jenis=" + pengurus, '_blank');
											}
										})
									}
								})
								$('#bt_pengurus_excel').on('click', function() {
									var pengurus = $('#pengurus').val()
									var periode = $('#periode').val()
									if (pengurus == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Pengurus",
											type: "warning"
										})
									} else if (periode == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Periode",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_periode') ?>",
											data: {
												per: periode
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_excel/excel_pengurus?id=" + periode + "&jenis=" + pengurus, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
						<div class="card-header">
							<h4 class="card-title w-100">
								7. Cetak Pengajar
							</h4>
						</div>
					</a>
					<div id="collapseSix" class="collapse" data-parent="#accordione">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH PENGAJAR</label>
									<select name="" id="pengajar" class="form-control">
										<option value="0" hidden>-Pilih Pengajar-</option>
										<option value="Laki-Laki">Pengajar Laki-Laki</option>
										<option value="Perempuan">Pengajar Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH TAHUN ANGKATAN</label>
									<select name="" id="thun" class="form-control select2">
										<option value="0">-Pilih Tahun-</option>
										<?php for ($g = 2010; $g < date('Y') + 3; $g++) { ?>
											<option value="<?= $g ?>"><?= $g ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" id="bt_pengajar_pdf"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success  float-right" id="bt_pengajar_excel"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#bt_pengajar_pdf').on('click', function() {
									var pengajar = $('#pengajar').val()
									var angkatan = $('#thun').val()
									if (pengajar == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Pengajar",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_tahun_angkat') ?>",
											data: {
												tahn: angkatan
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_pengajar?id=" + angkatan + "&jenis=" + pengajar, '_blank');
											}
										})
									}
								})

								$('#bt_pengajar_excel').on('click', function() {
									var pengajar = $('#pengajar').val()
									var angkatan = $('#thun').val()
									if (pengajar == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Pengajar",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_tahun_angkat') ?>",
											data: {
												tahn: angkatan
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_excel/excel_pengajar?id=" + angkatan + "&jenis=" + pengajar, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
						<div class="card-header">
							<h4 class="card-title w-100">
								8. Cetak Karyawan
							</h4>
						</div>
					</a>
					<div id="collapseSeven" class="collapse" data-parent="#accordione">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH KARYAWAN</label>
									<select name="" id="karyawan" class="form-control">
										<option value="0" hidden>-Pilih Karyawan-</option>
										<option value="Laki-Laki">Karyawan Laki-Laki</option>
										<option value="Perempuan">Karyawan Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH INSTANSI</label>
									<select class="form-control select2" name="instansi" id="instansi">
										<option selected hidden value="0">Pilih Instansi</option>
										<option value="NAA Media">NAA MEDIA</option>
										<option value="Kopontren Al-Mubarokah">Kopontren Al-Mubarokah</option>
										<option value="Kantin Al-Mubarokah">Kantin Al-Mubarokah</option>
										<option value="Koperasi Sekolah">Koperasi Sekolah</option>
										<option value="Meubel">Meubel</option>
										<option value="LK SMKNAA">LK SMKNAA</option>
										<option value="AMDK Oemboel">AMDK Oemboel</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" id="bt_karyawan_pdf"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" id="bt_karyawan_excel"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#bt_karyawan_pdf').on('click', function() {
									var karyawan = $('#karyawan').val()
									var instansi = $('#instansi').val()
									if (karyawan == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Karyawan",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_instansi') ?>",
											data: {
												instansi: instansi
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_karyawan?id=" + instansi + "&jenis=" + karyawan, '_blank');
											}
										})
									}
								})

								$('#bt_karyawan_excel').on('click', function() {
									var karyawan = $('#karyawan').val()
									var instansi = $('#instansi').val()
									if (karyawan == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Karyawan",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_instansi') ?>",
											data: {
												instansi: instansi
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_excel/excel_karyawan?id=" + instansi + "&jenis=" + karyawan, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="card card-teal card-outline">
					<a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
						<div class="card-header">
							<h4 class="card-title w-100">
								9. Cetak Alumni
							</h4>
						</div>
					</a>
					<div id="collapseEight" class="collapse" data-parent="#accordione">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-12">
									<label for="">PILIH ALUMNI</label>
									<select name="" id="alumni" class="form-control">
										<option value="0" hidden>-Pilih Alumni-</option>
										<option value="Laki-Laki">Alumni Laki-Laki</option>
										<option value="Perempuan">Alumni Perempuan</option>
									</select>
								</div>
								<div class="form-group col-md-12">
									<label for="">PILIH TAHUN KELUAR</label>
									<select name="" id="thune" class="form-control select2">
										<option value="0">-Pilih Tahun-</option>
										<?php for ($g = 2010; $g < date('Y') + 3; $g++) { ?>
											<option value="<?= $g ?>"><?= $g ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-sm btn-primary" id="bt_alumni_pdf"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
							<button class="btn btn-sm btn-success float-right" id="bt_alumni_excel"><i class="fas fa-file-excel"></i> Cetak Excel</button>
						</div>
						<script>
							$(document).ready(function() {
								$('#bt_alumni_pdf').on('click', function() {
									var alumni = $('#alumni').val()
									var angkatan = $('#thune').val()
									if (alumni == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Alumni",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_pdf/cek_tahun_keluar') ?>",
											data: {
												tahn: angkatan
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_pdf/pdf_alumni?id=" + angkatan + "&jenis=" + alumni, '_blank');
											}
										})
									}
								})

								$('#bt_alumni_excel').on('click', function() {
									var alumni = $('#alumni').val()
									var angkatan = $('#thune').val()
									if (alumni == 0) {
										swal.fire({
											title: "PDST NAA",
											text: "Anda Belum Memilih Alumni",
											type: "warning"
										})
									} else {
										$.ajax({
											type: "POST",
											url: "<?= site_url('Cexport_excel/cek_tahun_keluar') ?>",
											data: {
												tahn: angkatan
											},
											dataType: 'JSON',
											success: function(hasil) {
												window.open("Cexport_excel/excel_alumni?id=" + angkatan + "&jenis=" + alumni, '_blank');
											}
										})
									}
								})
							})
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<script type="text/javascript">
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>