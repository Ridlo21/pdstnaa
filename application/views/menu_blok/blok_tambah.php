<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Block</h1>
			</div>
		</div>
	</div>
</section>
<section class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="form_tambah_blok">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_blok" class="col-form-label">Nama Block</label>
										<input type="text" class="form-control" id="nama_blok" name="nama_blok" autocomplete="off">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_wilayah" class="col-form-label">Wilayah</label>
										<select name="nama_wilayah" class="form-control">
											<option selected value="default">Pilih Wilayah</option>
											<?php foreach ($wilayah as $value) { ?>
												<option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" class="btn btn-sm btn-danger" onclick="menu_blok()"><i class="fas fa-reply"></i> Kembali Ke Data Block</button>
							<button class="btn btn-sm btn-primary  float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#form_tambah_blok').validate({
		rules: {
			nama_blok: {
				required: true
			},
			nama_wilayah: {
				valueNotEquals: "default"
			},
		},
		messages: {
			nama_blok: {
				required: "Tidak Boleh Kosong"
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
				url: "<?= site_url('cblok/simpan_blok') ?>",
				data: $('#form_tambah_blok').serialize(),
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
								menu_blok()
							}
						})
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "error"
						}).then(okay => {
							if (okay) {
								$('#nama_blok').focus();
							}
						})
					}
				}
			});
		}
	})
</script>