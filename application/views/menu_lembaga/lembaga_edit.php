<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Lembaga</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="form_edit_lembaga">
					<input type="hidden" name="idlembaga" value="<?= $data_lembaga->id_lembaga ?>">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_lembaga">Nama Lembaga</label>
										<input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" autocomplete="off" value="<?= $data_lembaga->nama ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_wilayah">Wilayah</label>
										<select name="nama_wilayah" class="form-control">
											<option value="default">Pilih Wilayah</option>
											<?php foreach ($wilayah as $value) {
												if ($data_lembaga->id_wilayah == $value->id_wilayah) {
													$wly = "selected";
												} else {
													$wly = "";
												}
											?>
												<option <?= $wly ?> value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" class="btn btn-sm btn-danger" onclick="menu_lembaga()"><i class="fas fa-reply"></i> Kembali Ke Data Lembaga</button>
							<button class="btn btn-sm btn-primary float-right"><i class="fas fa-edit"></i> Edit</button>
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
	$('#form_edit_lembaga').validate({
		rules: {
			nama_lembaga: {
				required: true
			},
			nama_wilayah: {
				valueNotEquals: "default"
			},
		},
		messages: {
			nama_lembaga: {
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
				url: "<?= site_url('Clembaga/edit_lembaga') ?>",
				data: $('#form_edit_lembaga').serialize(),
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
								menu_lembaga()
							}
						})
					}
				}
			});
		}
	})
</script>
<!-- <script>
	function edit_lembaga() {
		$.ajax({
			url: "<?= site_url('Clembaga/edit_lembaga') ?>",
			data: $('#form_edit_lembaga').serialize(),
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
							menu_lembaga()
						}
					});
				}
			}
		});
	}
</script> -->