<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>PILIH WILAYAH, BLOCK DAN KAMAR UNTUK <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="wly" value="<?= $kamar->id_wilayah ?>">
<input type="hidden" id="blk" value="<?= $kamar->id_blok ?>">
<input type="hidden" id="kmr" value="<?= $kamar->id_kamar ?>">


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_edit_santri_v4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">WILAYAH</label>
                                        <select class="form-control select2" name="wilayah" id="wilayah">
                                            <option value="default">-Pilih Wilayah-</option>
                                            <?php foreach ($wilayah as $value) {
                                                if ($kamar->id_wilayah == $value->id_wilayah) {
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
                                                var id = $('#wly').val();
                                                var k = $('#blk').val()
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
                                                var id = $('#blk').val();
                                                var k = $('#kmr').val()
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
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL PENEMPATAN</label>
                                        <input type="text" name="tgl_penetapan" value="<?= $kamar->tgl_penetapan ?>" class="form-control" id="tgl_penetapan" autocomplete="off">
                                    </div>
                                </div>
                                <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                                <input type="hidden" name="history" value="<?= $kamar->id_history ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" onclick="menu_santri()"><i class="fas fa-reply"></i> Kembali Ke Data Santri</button>
                            <div class="float-right">
                                <button type="button" class="btn btn-info" onclick="kembali('<?= $santri->id_person ?>')"><i class="fas fa-arrow-left"></i> Kembali</button>
                                <button class="btn btn-info">Simpan dan Lanjut <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $('#tgl_penetapan').datepicker({
            dateFormat: 'yy-mm-dd'
        })
    });

    function kembali(id) {
        $.post('<?= site_url('Cperson/form_edit_santri_3') ?>', {
            o: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        })

    }

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#form_edit_santri_v4').validate({
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
                url: "<?= site_url('Cperson/domisilinya') ?>",
                data: $('#form_edit_santri_v4').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    var o = data.i;
                    $.post('<?= site_url('Cperson/form_tambah_mahrom_2') ?>', {
                        o: o
                    }, function(Res) {
                        $('#ini_isinya').html(Res);
                    });
                }
            });
        }
    })
</script>