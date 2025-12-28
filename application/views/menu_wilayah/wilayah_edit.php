<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Wilayah</h1>
			</div>
		</div>
	</div>
</section>
<section class="content mt-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="form_edit_wilayah">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<input type="hidden" name="idwilayah" value="<?= $id_wilayah ?>">
									<div class="form-group row">
										<label for="nama_wilayah" class="col-form-label">Nama Wilayah</label>
										<input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" value="<?= $nama_wilayah ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="kepala_wilayah" class="col-form-label">Kepala Wilayah</label>
										<input type="text" class="form-control" id="kepala_wilayah" name="kepala_wilayah" value="<?= $kepala_wilayah ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" class="btn btn-sm btn-danger" onclick="menu_wilayah()"><i class="fas fa-reply"></i> Kembali Ke data Wilayah</button>
							<button class="btn btn-sm btn-primary  float-right"><i class="fas fa-edit"></i> Edit</button>
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
	$('#form_edit_wilayah').validate({
		rules: {
			nama_wilayah: {
				required: true
			},
			kepala_wilayah: {
				required: true
			},
		},
		messages: {
			nama_wilayah: {
				required: "Tidak Boleh Kosong"
			},
			kepala_wilayah: {
				required: "Tidak Boleh Kosong"
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
				url: "<?= site_url('Cwilayah/edit_wilayah') ?>",
				data: $('#form_edit_wilayah').serialize(),
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
								menu_wilayah()
							}
						})
					}
				}
			});
		}
	})
</script>