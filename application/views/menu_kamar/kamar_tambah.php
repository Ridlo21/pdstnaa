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
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="form_tambah_kamar">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="nama_kamar" class="col-form-label">Nama Kamar</label>
										<input type="text" class="form-control" id="nama_kamar" name="nama_kamar" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="" class="col-form-label">Wilayah</label>
										<select name="nama_wilayah" id="wilayah" class="form-control select2">
											<option value="default">Pilih wilayah</option>
											<?php foreach ($wilayah as $value) { ?>
												<option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="nama_blok" class="col-form-label">Blok</label>
										<select class="form-control select2" name="nama_blok" id="nama_blok">
											<option value="default">Pilih Block</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" class="btn btn-sm btn-danger" onclick="menu_kamar()"><i class="fas fa-reply"></i> Kembali Ke Data Kamar</button>
							<button class="btn btn-sm btn-primary  float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$('#wilayah').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Ckamar/get_blok'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					html += '<option value="default">' + 'Pilih Block' + '</option>'
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
					}
					$('#nama_blok').html(html);

				}
			});
			return false;
		});
	});

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})

	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#form_tambah_kamar').validate({
		rules: {
			nama_kamar: {
				required: true
			},
			nama_blok: {
				valueNotEquals: "default"
			},
			nama_wilayah: {
				valueNotEquals: "default"
			},
		},
		messages: {
			nama_kamar: {
				required: "Tidak Boleh Kosong"
			},
			nama_blok: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			nama_wilayah: {
				valueNotEquals: "Tidak Boleh Kosong"
			}
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
				url: "<?= site_url('Ckamar/simpan_kamar') ?>",
				data: $('#form_tambah_kamar').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					if (data.pesan === "ya") {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "success"
						}).then(okay => {
							if (okay) {
								menu_kamar()
							}
						})
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "error"
						}).then(okay => {
							if (okay) {
								$('#nama_kamar').focus();
							}
						})
					}
				}
			});
		}
	})
</script>