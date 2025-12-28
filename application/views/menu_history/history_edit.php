<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>Penempatan Kamar untuk <?= $data_history->nama ?></h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
			    <form id="form_edit_history">
    				<div class="card card-outline card-teal">
    					<div class="card-header">
    						<h3 class="card-title">Edit History</h3>
    					</div>
    					<div class="card-body">
    						<div class="row">
    						    <input type="hidden" name="id_person" value="<?= $data_history->id_person ?>">
    						    <input type="hidden" name="id_history" value="<?= $data_history->id_history ?>">
    							<div class="col-sm-3">
    								<div class="form-group">
    									<label for="" class="col-form-label">Wilayah</label>
    									<select name="wilayah" id="wilayah" class="form-control select2">
    										<option value="0">-Pilih Wilayah-</option>
    										<?php foreach ($wilayah as $value) { ?>
    										<option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
    										<?php } ?>
    									</select>
    								</div>
    							</div>
    							<div class="col-sm-3">
    								<div class="form-group">
    									<label for="" class="col-form-label">Block</label>
    									<select name="blok" id="blok" class="form-control select2">
    										<option value="0">-Pilih Block-</option>
    									</select>
    								</div>
    							</div>
    							<div class="col-sm-3">
    								<div class="form-group">
    									<label for="nama_kamar" class="col-form-label">Kamar</label>
    									<select name="nama_kamar" id="kamar" class="form-control select2">
    										<option value="0">-Pilih Kamar-</option>
    									</select>
    								</div>
    							</div>
    							<div class="col-sm-3">
    								<div class="form-group">
    									<label for="tgl_penetapan" class="col-form-label">Tanggal Penetapan</label>
    									<div class="form-line">
    										<div class="input-group">
    											<div class="input-group-prepend">
    												<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    											</div>
    											<input type="text" class="form-control" name="tgl_penetapan" id="tgl_penetapan" autocomplete="off" >
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					<div class="card-footer">
							<button type="button" class="btn btn-sm btn-default bg-danger" onclick="detail('<?= $data_history->id_kamar ?>')"><i class="fas fa-reply"></i> Keluar</button>
							<button class="btn btn-sm btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
						</div>
    				</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
    function info(id) {
		$.post('<?= site_url('Ckamar/info') ?>', {
			idkamar: id
		}, function(Res) {
			$('#ini_isinya').html(Res);
		});
	}

	$(document).ready(function() {
		$('#wilayah').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Chistory/get_blok'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					html += '<option value=' + ' 0' + '>' + '-Pilih Block-' + '</option>';
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
					}
					$('#blok').html(html);

				}
			});
			return false;
		});

		$('#blok').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Chistory/get_kamar'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					html += '<option value=' + ' 0' + '>' + '-Pilih Kamar-' + '</option>';
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
					}

					$('#kamar').html(html);

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
		$('#tgl_penetapan').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	});

	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#form_edit_history').validate({
		rules: {
			tgl_penetapan: {
				required: true
			},
			wilayah: {
				valueNotEquals: "0"
			},
			nama_kamar: {
				valueNotEquals: "0"
			},
			blok: {
				valueNotEquals: "0"
			},
		},
		messages: {
			tgl_penetapan: {
				required: "Tidak Boleh Kosong"
			},
			wilayah: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			nama_kamar: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			blok: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
		},
		errorElement: 'span',
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function() {
			$.ajax({
				url: "<?= site_url('Chistory/edit_history') ?>",
				data: $('#form_edit_history').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					if (data.pesan === "sukses") {
						swal.fire({
							title: "PDST NAA",
							text: "Berhasil",
							type: "success"
						}).then(okay => {
							if (okay) {
								info('<?= $data_history->id_kamar ?>')
							}
						})
					}
				}
			});
		}
	})
</script>