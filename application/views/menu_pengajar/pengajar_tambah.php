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
                <h3 class="card-title">Tambah Pengajar Nubdzah</h3>
            </div>
            <form id="tambah_pengajar">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Pengajar</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_pengajar" placeholder="nama" autocomplete="off">
                                <input type="hidden" name="id_person" id="id_pengajar">
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
                                        <input type="text" class="form-control" name="tgl_diangkat" id="tgl" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="150" rows="2" readonly></textarea>
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

        $('#nama_pengajar').focus();
        $('#nama_pengajar').on('input', function() {
            UI_Pengajar();
            $("#alamat").val("");
        });

    });

    function UI_Pengajar() {
        $('#nama_pengajar').autocomplete({
            minLength: 1,
            autoFocus: true,
            source: function(req, res) {
                $.ajax({
                    url: "<?= site_url('Cpengajar/ui_pengajar') ?>",
                    data: {
                        cari: $('#nama_pengajar').val()
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
                    $('#id_pengajar').val(ui.item.id_person);
                    $('#nama_pengajar').val(ui.item.nama);
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
    $('#tambah_pengajar').validate({
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
                url: "<?= site_url('Cpengajar/simpan_pengajar_nubdah') ?>",
                data: $('#tambah_pengajar').serialize(),
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
    });
</script>