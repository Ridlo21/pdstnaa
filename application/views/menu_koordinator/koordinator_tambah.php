<style>
	#toggle {
		position: absolute;
		top: 55px;
		right: 20px;
		transform: translateY(-50%);
		width: 30px;
		height: 30px;
		background: url(plugin/dist/img/show.png);
		background-size: cover;
		cursor: pointer;
	}

	#toggle.hide {
		background: url(plugin/dist/img/hide.png);
		background-size: cover;
	}

	.ui-datepicker {
		z-index: 9999 !important;
	}

	.ui-autocomplete {
		z-index: 5000;
	}
</style>
<input type="hidden" id="oo" value="<?= $periode ?>">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1> Tambah Pengurus Pada Periode <i class="text-blue"><?= substr($periode, 0, 4)  ?> - <?= substr($periode, 7, 11)  ?></i> </h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<h3 class="profile-username text-center mt-3">Struktur Pengurus</h3>
						<ul class="list-group list-group-unbordered mb-3 mt-4">
							<?php foreach ($jabatan as $value) { ?>
								<!-- <li class="list-group-item"> -->
								<button class="btn btn-xs btn-primary float-right mt-2" onclick="modal('<?= $value->nm_jabatan ?>','<?= $value->id_jabatan ?>')"><?= $value->nm_jabatan ?></button>
								<!-- </li> -->
							<?php } ?>


					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-body table-responsive p-1">
						<table id="example1" class="table table-hover text-nowrap ">
							<!-- <h3 class="card-title"><a class="btn btn-sm btn-block bg-teal" href="#" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-plus"></i> Tambah</a></h3> -->
							<thead>
								<tr>
									<th>NO</th>
									<th>JABATAN</th>
									<th>NAMA</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pengurus as $value) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value->nm_jabatan ?></td>
										<td><?= $value->nama ?></td>

										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-info" title="Info" onclick="bio_koordinator('<?= $value->id_person ?>','<?= $id_periode ?>','<?= $periode ?>')">
													<i class="fas fa-info-circle"></i>
												</button>
												<button type="button" class="btn btn-sm btn-danger" title="Nonaktifkan" onclick="nonaktifkan('<?= $value->id_pengurus ?>')">
													<i class="fas fa-user-slash"></i>
												</button>
												<button type="button" class="btn btn-sm btn-warning" title="Setting Password" onclick="modal_akun('<?= $value->id_pengurus ?>')">
													<i class="fas fa-cog"></i>
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
		</div>
	</div>
</section>

<div class="modal fade" id="staticBackdrop" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Pengurus</h5>
				<button type="button" id="close" class="btn btn-xs bg-gradient-gray">X</button>
			</div>
			<form id="tambah_pengurus">
				<div class="modal-body">
					<input type="hidden" name="periode" id="periode" value="<?= $id_periode ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label" for="nama_pengajar">Pilih Nama Pengurus</label>
								<input type="text" class="form-control nama_santri" name="nama_pengajar" id="nama_santri" placeholder="nama" style="width: 100%;" autocomplete="off">
								<input type="hidden" name="idperson" id="idperson">
							</div>
							<div class="form-group">
								<label for="jabatan" class="col-form-label">Alamat</label>
								<input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 100%;" autocomplete="off" readonly>

							</div>

						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
								<div class="form-line">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
										</div>
										<?php
										$tgl1 = substr($periode, 7, 11);
										$tgl2 = substr($periode, 0, 4);
										$jarak = $tgl1 - $tgl2;
										?>
										<input type="hidden" value="<?= $jarak ?>" id="tahun_berhenti">
										<input type="hidden" name="tanggal_berhenti" id="berhenti">
										<input type="text" name="tanggal_diangkat" class="form-control " id="tanggal" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal" class="col-form-label">Jabatan</label>
								<input type="text" class="form-control" id="jabatan" name="jabatan" readonly>
								<input type="hidden" id="id_jabatan" name="id_jabatan">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-sm btn-default bg-danger" onclick="menu_koordinator()"> <i class="fa fa-reply"></i> Keluar</button> -->
						<button class="btn btn-sm bg-teal  offset-4"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<div class="modal fade" id="setting_pass" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Pass Dan User </h5>
				<button type="button" class="close" onclick="close()" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form id="tambah_password">
				<div class="modal-body">
					<input type="hidden" id="id_pengurus" name="id_pengurus">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-form-label" for="nama_pengajar">Username</label>
								<input type="text" class="form-control " name="name" id="name" placeholder="Username" style="width: 100%;" autocomplete="off">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-form-label" for="nama_pengajar">Username</label>
								<input type="text" class="form-control " name="username" id="username" placeholder="Username" style="width: 100%;" autocomplete="off">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="tanggal" class="col-form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<div id="toggle" onclick="showHide();"></div>
							</div>
							<script>
								var password = document.getElementById('password');
								var toggle = document.getElementById('toggle');

								function showHide() {
									if (password.type === 'password') {
										password.setAttribute('type', 'text');
										toggle.classList.add('hide')
									} else {
										password.setAttribute('type', 'password');
										toggle.classList.remove('hide')
									}
								}
							</script>
						</div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-sm btn-default bg-danger"> <i class="fa fa-reply"></i> Keluar</button> -->
						<button class="btn btn-sm bg-teal"><i class="fas fa-save"></i> Simpan</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<script>
    function bio_koordinator(id, u, o) {
        $.post('<?= site_url('Ckoordinator/detail_santri') ?>', {
            idperson: id,
			i: u,
			l: o
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
    
	$(function() {
		$('#tanggal').datepicker({
			dateFormat: 'yy-mm-dd'
		});
		$('#reservation').daterangepicker();

		$('.nama_santri').on('input', function() {
			UI_Nama_Santri();
			$("#namanya").val("");
		});

		$('#tanggal').on('change', function() {
			var i = $(this).val();

			var o = $('#tahun_berhenti').val();
			var u = moment(i).add(o, 'year').calendar();
			$('#berhenti').val(u);


		})
	});

	function nonaktifkan(id) {
		swal.fire({
			title: 'PDST NAA',
			text: "Anda Yakin menonaktifkan pengurus ini ?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Nonaktifkan',
			preConfirm: function() {
				return new Promise(function(resolve) {
					$.ajax({
							url: 'Ckoordinator/nonaktifkan_koordinator',
							type: 'POST',
							data: {
								id: id
							},
							dataType: 'json'
						})
						.fail(function() {
							swal.fire({
								title: "PDST NAA",
								text: "Pengurus Sukses Dinonaktifkan",
								type: "success"
							}).then(okay => {
								if (okay) {
									tambah_koordinator($('#periode').val(), $('#oo').val());
								}
							});
						});
				});
			}
		});
	}

	function modal(jabatan, id) {
		$('#staticBackdrop').modal('show');
		$('#jabatan').val(jabatan);
		$('#id_jabatan').val(id);

	}

	function modal_akun(id) {
		$.ajax({
			url: '<?= site_url('Ckoordinator/akun_id') ?>',
			data: {
				id: id
			},
			type: 'post',
			dataType: 'Json',
			success: function(data) {
				$('#setting_pass').modal('show');
				$('#id_pengurus').val(data.id);
				$('#username').val(data.username);
				$('#password').val(data.password);
				$('#nama').val(data.name)
			}
		})

	}

	$('#close').on('click', function() {
		$('#staticBackdrop').modal('hide');
		$('#tanggal').val('');
		$('#alamat').val('');
		$('#nama_santri').val('');

	})

	function UI_Nama_Santri() {
		$('.nama_santri').autocomplete({
			minLength: 1,
			autoFocus: true,
			source: function(req, res) {
				$.ajax({
					url: "<?= site_url('Ckoordinator/ui_nama_santri') ?>",
					data: {
						cari: $('.nama_santri').val(),
						periode: $('#periode').val()
					},
					dataType: 'json',
					type: "POST",
					success: function(data) {
						res(data);
					}
				});
			},
			select: function(event, ui) {
				if (ui.item.sukses === true) {
					$('#idperson').val(ui.item.id_person);
					$('#nama_santri').val(ui.item.nama);
					$('#alamat').val(ui.item.alamat);
					return false;
				} else {
					return false;
				}
			},
			create: function() {
				$(this).data('ui-autocomplete')._renderItem = function(ul, item) {
					return $("<li></li>")
						.data("item.autocomplete", item)
						.append("<a class='nav-link active'><strong>" + item.nama + "</strong> <br/><small>Niup : " + item.niup + "</small></a>")
						.appendTo(ul);
				};
			}
		});
	}

	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#tambah_pengurus').validate({
		rules: {
			nama_pengajar: {
				required: true
			},
			alamat: {
				required: true
			},
			tanggal_diangkat: {
				required: true
			},
			jabatan: {
				required: true
			}
		},
		messages: {
			nama_pengajar: {
				required: "Tidak Boleh Kosong"
			},
			alamat: {
				valueNotEquals: "Tidak Boleh Kosong"
			},
			tanggal_diangkat: {
				required: "Tidak Boleh Kosong"
			},
			jabatan: {
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
				url: "<?= site_url('Ckoordinator/simpan_koordinator') ?>",
				data: $('#tambah_pengurus').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					if (data.pesan === "ya") {
						$('#staticBackdrop').modal('hide');
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "success"
						}).then(okay => {
							if (okay) {
								tambah_koordinator(data.id, $('#oo').val());
							}
						});
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "warning"
						}).then(okay => {
							if (okay) {
								// menu_koordinator();
							}
						});
					}
				}
			})
		}
	});


	$.validator.addMethod("valueNotEquals", function(value, element, arg) {
		return arg !== value;
	}, "Value must not equal arg.");
	$("select").on("select2:close", function(e) {
		$(this).valid();
	});
	$('#tambah_password').validate({
		rules: {
			username: {
				required: true
			},
			password: {
				required: true
			}
		},
		messages: {
			username: {
				required: "Tidak Boleh Kosong"
			},
			password: {
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
				url: "<?= site_url('Ckoordinator/simpan_akun') ?>",
				data: $('#tambah_password').serialize(),
				type: 'POST',
				dataType: 'JSON',
				success: function(data) {
					if (data.pesan === "ya") {
						$('#setting_pass').modal('hide');
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "success"
						}).then(okay => {
							if (okay) {
								tambah_koordinator($('#periode').val(), $('#oo').val());
							}
						});
					} else {
						swal.fire({
							title: "PDST NAA",
							text: data.sukses,
							type: "warning"
						}).then(okay => {
							if (okay) {
								// menu_koordinator();
							}
						});
					}
				}
			})
		}
	})

	$(function() {
		$('.select2').select2({
			theme: 'bootstrap4'
		})
	})
</script>