<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Data Mahrom Untuk Ananda <span class="text-danger"><?= $santri->nama ?></span></h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body pb-4">
				<div class="row">
					<div class="col-12">
						<button type="button" id="btn-tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalaAdd" data-backdrop="static">
							<i class="fas fa-plus"></i> Tambah Data
						</button>
						<table id="example1" class="table table-bordered projects">
							<thead>
								<tr>
									<th>NO</th>
									<th>NIK</th>
									<th>NAMA MAHROM</th>
									<th>TANGGAL LAHIR</th>
									<th>HUBUNGAN</th>
									<th>FOTO</th>
									<th>FOTO KTP</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody id="show_data">
								<?php $no = 1;
								foreach ($mahrom as $value) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->nik_m ?></td>
										<td><?= $value->nama_mahrom ?></td>
										<td><?= $value->tanggal_lahir ?></td>
										<td><?= $mahrom = $value->hubungan ?></td>
										<?php if ($value->foto_diri == "") {
											$foto = "plugin/dist/img/person.png";
										} else {
											$foto = 'https://ponpesnaa.net/gambar/mahrom/'. $value->foto_diri;
										} ?>
										<?php if ($value->foto_kk_atau_ktp == "") {
											$ktp = "plugin/dist/img/ktp.png";
										} else {
											$ktp = 'https://ponpesnaa.net/gambar/ktp/'. $value->foto_kk_atau_ktp  ;
										} ?>
										<td>
											<ul class="list-inline">
												<li class="list-inline-item">
													<a class="item_upload" data="<?= $value->id_mahrom ?>" datanya="<?= $foto ?>" datan="<?= $ktp ?>">
														<img alt="Avatar" class="table-avatar" id="fotonya" title="FOTO DIRI" data="<?= $value->id_mahrom ?>" src="<?= $foto ?>">
													</a>
												</li>
											</ul>
										</td>
										<td>
											<a class="item_upload" data="<?= $value->id_mahrom ?>" datanya="<?= $foto ?>" datan="<?= $ktp ?>">
												<img alt="Avatar" width="45" title="KTP" id="ktpnya" data="<?= $value->id_mahrom ?>" src="<?= $ktp ?>" id="ee">
											</a>
										</td>
										<?php if ($mahrom == "Ayah") {
											$tombol = '';
										} elseif ($mahrom == "Ibu") {
											$tombol = '';
										} else {
											$tombol = "<button type='button' class='btn btn-sm btn-warning item_edit' title='Edit' id='btn-edit' data='" . $value->id_mahrom . "'><i class='fas fa-edit'></i></button>";
										} ?>
										<td>
											<?= $tombol ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-danger" onclick="batal('<?= $santri->id_person ?>')"><i class="fas fa-times"></i> Batal</button>
				<div class="float-right">
					<form id="form_selesai">
						<?php
						if ($santri->jenis_kelamin == "Laki-Laki") {
							$jk = "01";
						} else {
							$jk = "02";
						}
				        // 	$th = substr(date("Y"), 2, 4);
				        $th = substr("$santri->tgl_daftar", 2, 2);
						$tanggal = date('dmY', strtotime($santri->tanggal_lahir));
						?>
						<input type="hidden" name="kodenya" value="<?= $jk . $th . $tanggal ?>">
						<input type="hidden" name="o" value="<?= $santri->id_person ?>">
					</form>
					<button type="button" onclick="kembali_lah('<?= $santri->id_person ?>')" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</button>
					<button type="button" class="btn btn-info" id="btn_selesai" onclick="selesai()"><i class="fas fa-check"></i> Selesai</button>
				</div>
				<script>
					function kembali_lah(id) {
						$.post('<?= site_url('Cuser/tambah_santri_4') ?>', {
							o: id
						}, function(Res) {
							$('#ini_isinya').html(Res);
						})
					}

					function selesai() {
						swal.fire({
							title: 'SELESAI ?',
							text: "Pastikan semua data benar !!",
							type: 'question',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'YA',
							cancelButtonText: 'TIDAK',
							preConfirm: function() {
								return new Promise(function(resolve) {
									$.ajax({
											url: "<?= site_url('Cuser/selesai') ?>",
											type: 'POST',
											data: $('#form_selesai').serialize(),
											dataType: 'json'
										})
										.fail(function() {
											swal.fire({
												title: "PDST NAA",
												text: "Berhasil Disimpan",
												type: "success"
											}).then(okay => {
												if (okay) {
													print_santri('<?= $santri->id_person ?>')
												}
											});
										});
								});
							}
						});
					}
				</script>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Tambah Mahrom</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form class="form-horizontal" id="form_tambah_mahrom">
				<div class="modal-body">
					<input type="hidden" name="id_person" id="idperson" value="<?= $santri->id_person ?>">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" class="form-control" id="nik" name="nik" autocomplete="off" placeholder="Isi Dengan Angka">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama">NAMA MAHROM</label>
								<input type="text" autocomplete="off" class="form-control" id="nama" name="nama" placeholder="Nama Mahrom">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="hubungan">HUBUNGAN</label>
								<select name="hubungan" id="hubungan_m" class="form-control">
									<option value="default">-Pilih Hubungan-</option>
									<option value="Ayah Tiri">Ayah Tiri</option>
									<option value="Ibu Tiri">Ibu Tiri</option>
									<option value="Kakek (Dari Ayah)">Kakek (Dari Ayah)</option>
									<option value="Kakek (Dari Ibu)">Kakek (Dari Ibu)</option>
									<option value="Nenek (Dari Ayah)">Nenek (Dari Ayah)</option>
									<option value="Nenek (Dari Ibu)">Nenek (Dari Ibu)</option>
									<option value="Kakak Kandung">Kakak Kandung</option>
									<option value="Adik Kandung">Adik Kandung</option>
									<option value="Keponakan">Keponakan</option>
									<option value="Paman (Saudara Ayah)">Paman (Saudara Ayah)</option>
									<option value="Paman (Saudara Ibu)">Paman (Saudara Ibu)</option>
									<option value="Bibi (Saudari Ayah)">Bibi (Saudari Ayah)</option>
									<option value="Bibi (Saudari Ibu)">Bibi (Saudari Ibu)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label for="alamat">ALAMAT LENGKAP SESUAI KTP</label>
								<textarea name="alamat" id="alamat_m" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tanggal">TANGGAL LAHIR</label>
								<input type="text" name="tanggal" id="tanggal_m" class="form-control" autocomplete="off">
							</div>
							<script>
								$(function() {
									$('#tanggal_m').datepicker({
										dateFormat: 'yy-mm-dd'
									})
								})
							</script>
						</div>
					</div>
				</div>

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
					<button class="btn btn-info" id="btn_simpan"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Edit Mahrom</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form class="form-horizontal" id="form_edit_mahrom">
				<div class="modal-body">
					<input type="hidden" name="id_edit" id="nik_m">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" class="form-control" id="nik" name="nik_m" autocomplete="off" placeholder="Isi Dengan Angka">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama">NAMA MAHROM</label>
								<input type="text" autocomplete="off" class="form-control" id="nama" name="nama_m" placeholder="Nama Mahrom">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="hubungan">HUBUNGAN</label>
								<select name="hubungannya" id="hubungan_m" class="form-control">
									<option value="default">-Pilih Hubungan-</option>
									<option value="Ayah Tiri">Ayah Tiri</option>
									<option value="Ibu Tiri">Ibu Tiri</option>
									<option value="Kakek (Dari Ayah)">Kakek (Dari Ayah)</option>
									<option value="Kakek (Dari Ibu)">Kakek (Dari Ibu)</option>
									<option value="Nenek (Dari Ayah)">Nenek (Dari Ayah)</option>
									<option value="Nenek (Dari Ibu)">Nenek (Dari Ibu)</option>
									<option value="Kakak Kandung">Kakak Kandung</option>
									<option value="Adik Kandung">Adik Kandung</option>
									<option value="Keponakan">Keponakan</option>
									<option value="Paman (Saudara Ayah)">Paman (Saudara Ayah)</option>
									<option value="Paman (Saudara Ibu)">Paman (Saudara Ibu)</option>
									<option value="Bibi (Saudari Ayah)">Bibi (Saudari Ayah)</option>
									<option value="Bibi (Saudari Ibu)">Bibi (Saudari Ibu)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label for="alamat">ALAMAT LENGKAP SESUAI KTP</label>
								<textarea name="alamat" id="alamat_m" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="tanggal">TANGGAL LAHIR</label>
								<input type="text" name="tanggal" id="tanggal" class="form-control" autocomplete="off">
							</div>
							<script>
								$(function() {
									$('#tanggal').datepicker({
										dateFormat: 'yy-mm-dd'
									})
								})
							</script>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
					<button class="btn btn-info" id="btn_edit"><i class="fas fa-edit"></i> Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalaUpload" tabindex="-1" role="dialog" aria-labelledby="largeModal" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Upload Mahrom</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form class="form-horizontal" id="form_upload">
				<div class="modal-body">
					<input type="hidden" name="id_mahrom" id="">
					<div class="row">
						<div class="col-md-6 text-center">
							<img id="foto_diri" src="" alt="gambar" width="300"><br><br>
							<input type="file" name="foto_diri" id="foto">
						</div>
						<script>
							$(document).ready(function() {

								function bacaGambar(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function(e) {
											$('#foto_diri').attr('src', e.target.result);
										}

										reader.readAsDataURL(input.files[0]);
									}
								}
								$("#foto").change(function() {
									$('#foto_diri').show()
									bacaGambar(this);
								});
							})
						</script>
						<div class="col-md-6 text-center">
							<img id="foto_ktp" src="" alt="gambar" width="300"><br><br>
							<input type="file" name="ktp" id="ktp">
						</div>
						<script>
							$(document).ready(function() {

								function bacaGambar(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function(e) {
											$('#foto_ktp').attr('src', e.target.result);
										}

										reader.readAsDataURL(input.files[0]);
									}
								}
								$("#ktp").change(function() {
									$('#foto_ktp').show()
									bacaGambar(this);
								});
							})
						</script>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
					<button class="btn btn-info"><i class="fas fa-arrow-up"></i> Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#example1").DataTable({
			"paging": true,
			"lengthChange": false,
			"ordering": false,
			"searching": false,
			"info": false,
			"autoWidth": false,
		});
	});

	$('#btn_simpan').on('click', function() {
		$.validator.addMethod("valueNotEquals", function(value, element, arg) {
			return arg !== value;
		}, "Value must not equal arg.");
		$("select").on("select2:close", function(e) {
			$(this).valid();
		});
		$('#form_tambah_mahrom').validate({
			rules: {
				nik: {
					required: true,
					maxlength: 16,
					minlength: 16
				},
				nama: {
					required: true
				},
				hubungan: {
					valueNotEquals: "default"
				},
				alamat: {
					required: true
				},
				tanggal: {
					required: true
				},
			},
			messages: {
				nik: {
					required: "Tidak Boleh Kosong",
					maxlength: "NIK lebih dari 16 digit",
					minlength: "NIK kurang dari 16 digit"
				},
				nama: {
					required: "Tidak Boleh Kosong"
				},
				hubungan: {
					valueNotEquals: "Tidak Boleh Kosong"
				},
				alamat: {
					required: "Tidak Boleh Kosong"
				},
				tanggal: {
					required: "Tidak Boleh Kosong"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			// highlight: function(element, errorClass, validClass) {
			//     $(element).addClass('is-invalid');
			// },
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			submitHandler: function() {
				$.ajax({
					url: "<?= site_url('Cuser/simpan_detail_mahrom') ?>",
					data: $('#form_tambah_mahrom').serialize(),
					type: 'POST',
					dataType: 'JSON',
					success: function(data) {
						if (data.pesan === "ya") {
							$('#ModalaAdd').modal('hide');
							swal.fire({
								title: "PDST NAA",
								text: data.sukses,
								type: "success",
								showConfirmButton: false,
								timer: 1000
							}).then(okay => {
								if (okay) {
									form_tambah_mahrom('<?= $santri->id_person ?>')
								}
							})
						} else {
							swal.fire({
								title: "PDST NAA",
								text: data.sukses,
								type: "error",
							}).then(okay => {
								if (okay) {
									$('#hubungan_m').focus();
								}
							})
						}
					}
				});
			}

		})
	})

	$('.item_upload').on('click', function() {
		var f = $(this).attr('datanya')
		var u = $(this).attr('datan')
		var id = $(this).attr('data');
		$('#ModalaUpload').modal('show');
		$('#foto_diri').attr('src', f);
		$('#foto_ktp').attr('src', u);
		$('[name="id_mahrom"]').val(id);
	})

	$(document).ready(function() {
		$('#form_upload').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?php echo site_url('Cuser/simpan_berkas_mahrom') ?>',
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					$('#ModalaUpload').modal('hide');
					swal.fire({
						title: "PDST NAA",
						text: "Berkas Berhasil Diupload",
						type: "success",
						showConfirmButton: false,
						timer: 1000
					}).then(okay => {
						if (okay) {
							form_tambah_mahrom('<?= $santri->id_person ?>')
						}
					});
				}
			});
		});
	});

	$('.item_edit').on('click', function() {
		var id = $(this).attr('data');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Cuser/get_mahrom') ?>",
			dataType: "JSON",
			data: {
				id: id
			},
			success: function(data) {
				$.each(data, function(id_mahrom, nik_m, nama_mahrom, hubungan, alamat_mahrom) {
					$('#ModalaEdit').modal('show');
					$('[name="id_edit"]').val(data.id_mahrom);
					$('[name="nik_m"]').val(data.nik_m);
					$('[name="nama_m"]').val(data.nama_mahrom);
					$('[name="hubungannya"]').val(data.hubungan);
					$('[name="alamat"]').val(data.alamat_mahrom);
					$('[name="tanggal"]').val(data.tanggal_lahir);
				});
			}
		});
		return false;
	})

	$('#btn_edit').on('click', function() {
		$.validator.addMethod("valueNotEquals", function(value, element, arg) {
			return arg !== value;
		}, "Value must not equal arg.");
		$("select").on("select2:close", function(e) {
			$(this).valid();
		});
		$('#form_edit_mahrom').validate({
			rules: {
				nik_m: {
					required: true,
					maxlength: 16,
					minlength: 16
				},
				nama_m: {
					required: true
				},
				hubungannya: {
					valueNotEquals: "default"
				},
				alamat: {
					required: true
				},
				tanggal: {
					required: true
				},
			},
			messages: {
				nik_m: {
					required: "Tidak Boleh Kosong",
					maxlength: "NIK lebih dari 16 digit",
					minlength: "NIK kurang dari 16 digit"
				},
				nama_m: {
					required: "Tidak Boleh Kosong"
				},
				hubungannya: {
					valueNotEquals: "Tidak Boleh Kosong"
				},
				alamat: {
					required: "Tidak Boleh Kosong"
				},
				tanggal: {
					required: "Tidak Boleh Kosong"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			// highlight: function(element, errorClass, validClass) {
			//     $(element).addClass('is-invalid');
			// },
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			submitHandler: function() {
				$.ajax({
					url: "<?= site_url('Cuser/edit_detail_mahrom') ?>",
					data: $('#form_edit_mahrom').serialize(),
					type: 'POST',
					dataType: 'JSON',
					success: function(data) {
						if (data.pesan === "ya") {
							$('#ModalaEdit').modal('hide');
							swal.fire({
								title: "PDST NAA",
								text: data.sukses,
								type: "success",
								showConfirmButton: false,
								timer: 1000
							}).then(okay => {
								if (okay) {
									form_tambah_mahrom('<?= $santri->id_person ?>')
								}
							})
						}
					}
				});
			}

		})
	})
</script>