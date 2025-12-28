<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajar</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Pengajar Nubdzah</h3>
            </div>
            <form id="edit_pengajar">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="idpengajar" value="<?= $id_guru_nubdah ?>">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Pengajar</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_pengajar" value="<?= $nama ?>" readonly>
                                <input type="hidden" name="id_person" id="id_pengajar" value="<?= $id_person ?>">
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
                                        <input type="text" class="form-control" name="tgl_diangkat" id="tgl" placeholder="" value="<?= $tgl_diangkat ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="150" rows="2" readonly><?= $alamat_lengkap ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-default bg-danger" onclick="menu_pengajar()"><i class="fas fa-reply"></i> Keluar</button>
                    <button class="btn btn-sm btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('#tgl').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        UI_pengajar_dari_dalam();
        $('#nama_pengajar').focus();

    });

    function UI_pengajar_dari_dalam() {
        var options = {
            url: "<?= site_url('Cpengajar/otomatis_pengajar_dari_dalam'); ?>",
            getValue: "nama",
            list: {
                match: {
                    enabled: true
                },
                onKeyEnterEvent: function() {
                    var id = $("#nama_pengajar").getSelectedItemData().id_person;
                    $("#id_pengajar").val(id).trigger("change");
                    var alamat = $("#nama_pengajar").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                },
                onClickEvent: function() {
                    var id = $("#nama_pengajar").getSelectedItemData().id_person;
                    $("#id_pengajar").val(id).trigger("change");
                    var alamat = $("#nama_pengajar").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                }
            }
        };
        $("#nama_pengajar").easyAutocomplete(options);
    }


    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#edit_pengajar').validate({
        rules: {
            nama_pengajar: {
                required: true
            },
            tgl_diangkat: {
                required: true
            },
            alamat: {
                required: true
            }

        },
        messages: {
            nama_pengajar: {
                required: "Tidak Boleh Kosong"
            },
            tgl_diangkat: {
                required: "Tidak Boleh Kosong"
            },
            alamat: {
                required: "Tidak Boleh Kosong"
            }
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
                url: "<?= site_url('Cpengajar/edit_pengajar') ?>",
                data: $('#edit_pengajar').serialize(),
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
                                menu_pengajar()
                            }
                        })
                    }
                }
            });
        }
    })
</script>