<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>PILIH WILAYAH, BLOCK DAN KAMAR UNTUK <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>
<?php
$wilayahnya = empty($kamar->id_wilayah) ? "0" : $kamar->id_wilayah;
$blok = empty($kamar->id_blok) ? "0" : $kamar->id_blok;
$kamarnya = empty($kamar->id_kamar) ? "0" : $kamar->id_kamar;
$tanggal = empty($kamar->tgl_penetapan) ? "0" : $kamar->tgl_penetapan;
?>
<input type="hidden" id="wly" value="<?= $wilayahnya ?>">
<input type="hidden" id="blk" value="<?= $blok ?>">
<input type="hidden" id="kmr" value="<?= $kamarnya ?>">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_tambah_santri_v4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">WILAYAH</label>
                                        <select class="form-control select2" name="wilayah" id="wilayah">
                                            <option value="default">-Pilih Wilayah-</option>
                                            <?php foreach ($wilayah as $value) {
                                                if ($wilayahnya == $value->id_wilayah) {
                                                    $wlyh = "selected";
                                                } else {
                                                    $wlyh = "";
                                                }
                                            ?>

                                                <option <?= $wlyh ?> value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BLOCK</label>
                                        <select name="blok" id="blok" class="form-control select2">
                                            <option value="default">-Pilih Block-</option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#wilayah').change(function() {
                                                    var id = $(this).val();
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_blok'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: id
                                                        },
                                                        async: true,
                                                        dataType: 'json',
                                                        success: function(data) {

                                                            var html = '';
                                                            var i;
                                                            html += '<option value=' + 'default' + '>' + '-Pilih Block-' + '</option>';
                                                            for (i = 0; i < data.length; i++) {
                                                                html += '<option value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
                                                            }
                                                            $('#blok').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var wilayah = $('#wly').val();
                                                var k = $('#blk').val()
                                                if (wilayah == 0) {
                                                    var html = '';
                                                    html += '<option value=' + ' default' + '>' + '-Pilih Block-' + '</option>';
                                                    $('#blok').html(html);
                                                } else {
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_blok'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: wilayah
                                                        },
                                                        async: true,
                                                        dataType: 'json',
                                                        success: function(data) {

                                                            var html = '';
                                                            var i;
                                                            for (i = 0; i < data.length; i++) {
                                                                if (data[i].id_blok == k) {
                                                                    html += '<option selected value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
                                                                } else {
                                                                    html += '<option value=' + data[i].id_blok + '>' + data[i].nama_blok + '</option>';
                                                                }
                                                            }
                                                            $('#blok').html(html);
                                                        }
                                                    });
                                                    return false;
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KAMAR</label>
                                        <select name="kamar" id="kamar" class="form-control select2">
                                            <option value="default">-Pilih Kamar-</option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#blok').change(function() {
                                                    var id = $(this).val();
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_kamar'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: id
                                                        },
                                                        async: true,
                                                        dataType: 'json',
                                                        success: function(data) {

                                                            var html = '';
                                                            var i;
                                                            html += '<option value=' + 'default' + '>' + '-Pilih Kamar-' + '</option>';
                                                            for (i = 0; i < data.length; i++) {
                                                                html += '<option value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
                                                            }
                                                            $('#kamar').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var blok = $('#blk').val();
                                                var k = $('#kmr').val()
                                                if (blok == 0) {
                                                    var html = '';
                                                    html += '<option value=' + ' default' + '>' + '-Pilih Kamar-' + '</option>';
                                                    $('#kamar').html(html);
                                                } else {
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_kamar'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: blok
                                                        },
                                                        async: true,
                                                        dataType: 'json',
                                                        success: function(data) {

                                                            var html = '';
                                                            var i;
                                                            for (i = 0; i < data.length; i++) {
                                                                if (data[i].id_kamar == k) {
                                                                    html += '<option selected value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
                                                                } else {
                                                                    html += '<option value=' + data[i].id_kamar + '>' + data[i].nama_kamar + '</option>';
                                                                }
                                                            }
                                                            $('#kamar').html(html);
                                                        }
                                                    });
                                                    return false;
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL PENEMPATAN</label>
                                        <input type="text" name="tgl_penetapan" value="<?= $tanggal ?>" class="form-control" autocomplete="off" id="tgl_penetapan">
                                    </div>
                                </div>
                                <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                                <input type="hidden" name="history" id="history" value="<?= empty($kamar->id_history) ? "0" : $kamar->id_history ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" onclick="di_batalkan('<?= $santri->id_person ?>')"><i class="fas fa-times"></i> Batal</button>
                            <div class="float-right">
                                <button type="button" onclick="kembali_cuk('<?= $santri->id_person ?>')" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</button>
                                <button class="btn btn-info" id="simpn">Simpan dan Lanjut <i class="fas fa-arrow-right"></i></button>
                                <button class="btn btn-info" id="simpn2">Simpan dan Lanjut <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function kembali_cuk(id) {
        $.post('<?= site_url('Cperson/tambah_santri_3') ?>', {
            o: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        })

    }

    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('#tgl_penetapan').datepicker({
            dateFormat: 'yy-mm-dd'
        })
    });

    $(document).ready(function() {
        var id = $('#history').val()
        if (id == 0) {
            $('#simpn').show()
            $('#simpn2').hide()
        } else {
            $('#simpn2').show()
            $('#simpn').hide()
        }
    })
    $('#simpn').on('click', function() {
        $.validator.addMethod("valueNotEquals", function(value, element, arg) {
            return arg !== value;
        }, "Value must not equal arg.");
        $("select").on("select2:close", function(e) {
            $(this).valid();
        });
        $('#form_tambah_santri_v4').validate({
            rules: {
                tgl_penetapan: {
                    required: true
                },
                kamar: {
                    valueNotEquals: "default"
                },
                blok: {
                    valueNotEquals: "default"
                },
                wilayah: {
                    valueNotEquals: "default"
                }
            },
            messages: {
                tgl_penetapan: {
                    required: "Tidak Boleh Kosong"
                },
                kamar: {
                    valueNotEquals: "Tidak Boleh Kosong"
                },
                blok: {
                    valueNotEquals: "Tidak Boleh Kosong"
                },
                wilayah: {
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
                    url: "<?= site_url('Cperson/simpan_santri_v4') ?>",
                    data: $('#form_tambah_santri_v4').serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(data) {
                        var o = data.i;
                        $.post('<?= site_url('Cperson/form_tambah_mahrom') ?>', {
                            o: o
                        }, function(Res) {
                            $('#ini_isinya').html(Res);
                        });
                    }
                });
            }
        })
    })
    $('#simpn2').on('click', function() {
        $.validator.addMethod("valueNotEquals", function(value, element, arg) {
            return arg !== value;
        }, "Value must not equal arg.");
        $("select").on("select2:close", function(e) {
            $(this).valid();
        });
        $('#form_tambah_santri_v4').validate({
            rules: {
                tgl_penetapan: {
                    required: true
                },
                kamar: {
                    valueNotEquals: "default"
                },
                blok: {
                    valueNotEquals: "default"
                },
                wilayah: {
                    valueNotEquals: "default"
                }
            },
            messages: {
                tgl_penetapan: {
                    required: "Tidak Boleh Kosong"
                },
                kamar: {
                    valueNotEquals: "Tidak Boleh Kosong"
                },
                blok: {
                    valueNotEquals: "Tidak Boleh Kosong"
                },
                wilayah: {
                    valueNotEquals: "Tidak Boleh Kosong"
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
                    url: "<?= site_url('Cperson/domisilinya') ?>",
                    data: $('#form_tambah_santri_v4').serialize(),
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(data) {
                        var o = data.i;
                        $.post('<?= site_url('Cperson/form_tambah_mahrom') ?>', {
                            o: o
                        }, function(Res) {
                            $('#ini_isinya').html(Res);
                        });
                    }
                });
            }
        })
    })




    function di_batalkan(id) {
        swal.fire({
            title: 'PDST NAA',
            text: "Anda Yakin Untuk Membatalkan ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'YA',
            cancelButtonText: 'TIDAK',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'Cperson/batal',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            dataType: 'json'
                        })
                        .fail(function() {
                            swal.fire({
                                title: "PDST NAA",
                                text: "Berhasil Dibatalkan",
                                type: "success"
                            }).then(okay => {
                                if (okay) {
                                    menu_santri();
                                }
                            });
                        });
                });
            }
        });
    }
</script>