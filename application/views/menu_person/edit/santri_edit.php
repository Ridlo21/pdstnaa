<?php
$namaBulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
if ($santri->prov == "") {
    $prov = "0";
} else {
    $prov = $santri->prov;
}
if ($santri->kab == "") {
    $kab = "0";
} else {
    $kab = $santri->kab;
}
if ($santri->kec == "") {
    $kec = "0";
} else {
    $kec = $santri->kec;
}
if ($santri->desa == "") {
    $desa = "0";
} else {
    $desa = $santri->desa;
}
$waktu = explode("-", $santri->tanggal_lahir);
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Diri</h1>
            </div>
        </div>
    </div>
</section>
<input type="hidden" name="prov" id="prov" value="<?= $prov ?>">
<input type="hidden" name="kabi" id="kab" value="<?= $kab ?>">
<input type="hidden" name="kec" id="kec" value="<?= $kec ?>">
<input type="hidden" name="desa" id="des" value="<?= $desa ?>">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_edit_santri">
                    <div class="card">
                        <input type="hidden" name="o" class="col-sm-2" value="<?= $santri->id_person ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK SANTRI</label>
                                        <input type="number" class="form-control" name="nik" value="<?= $santri->nik ?>">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">NAMA SANTRI</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $santri->nama ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TEMPAT LAHIR</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $santri->tempat_lahir ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL LAHIR</label>
                                        <select name="tanggal_lahir" id="" class="form-control">
                                            <option value="default">Pilih Tanggal</option>
                                            <?php
                                            for ($tg = 1; $tg < 32; $tg++) {
                                                if ($tg < 10) {
                                                    $tgl = "0" . $tg;
                                                } else {
                                                    $tgl = $tg;
                                                }
                                                if ($waktu[2] == $tg) {
                                            ?>
                                                    <option selected value="<?= $tg ?>"><?= $tg ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $tg ?>"><?= $tg ?></option>
                                            <?php
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BULAN LAHIR</label>
                                        <select name="bulan_lahir" id="" class="form-control">
                                            <option value="default">Pilih Bulan</option>
                                            <?php
                                            for ($bl = 1; $bl < 13; $bl++) {
                                                if ($bl < 10) {
                                                    $bulan = "0" . $bl;
                                                } else {
                                                    $bulan = $bl;
                                                }
                                                if ($waktu[1] == $bulan) {
                                            ?>
                                                    <option selected value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TAHUN LAHIR</label>
                                        <select name="tahun_lahir" id="" class="form-control">
                                            <option value="default">Pilih Tahun</option>
                                            <?php for ($th = 1980; $th < date("Y") + 5; $th++) {
                                                if ($waktu[0] == $th) {
                                            ?>
                                                    <option selected value="<?= $th ?>"><?= $th ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $th ?>"><?= $th ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">JENIS KELAMIN</label>
                                        <?php
                                        $k1 = "";
                                        $k2 = "";
                                        $k3 = "";
                                        if ($santri->jenis_kelamin == "0") {
                                            $k1 = "selected";
                                            $k2 = "";
                                            $k3 = "";
                                        } else if ($santri->jenis_kelamin == "Laki-Laki") {
                                            $k1 = "";
                                            $k2 = "selected";
                                            $k3 = "";
                                        } else if ($santri->jenis_kelamin == "Perempuan") {
                                            $k1 = "";
                                            $k2 = "";
                                            $k3 = "selected";
                                        }
                                        ?>
                                        <select name="jenis_kelamin" id="" class="form-control">
                                            <option <?= $k1 ?> value="default">Pilih Jenis Kelamin</option>
                                            <option <?= $k2 ?> value="Laki-Laki">Laki-Laki</option>
                                            <option <?= $k3 ?> value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">STATUS ANAK</label>
                                        <?php
                                        $klrg1 = "";
                                        $klrg2 = "";
                                        $klrg3 = "";
                                        $klrg4 = "";
                                        if ($santri->dlm_klrg == "0") {
                                            $klrg1 = "selected";
                                            $klrg2 = "";
                                            $klrg3 = "";
                                            $klrg4 = "";
                                        } else if ($santri->dlm_klrg == "Kandung") {
                                            $klrg1 = "";
                                            $klrg2 = "selected";
                                            $klrg3 = "";
                                            $klrg4 = "";
                                        } else if ($santri->dlm_klrg == "Tiri") {
                                            $klrg1 = "";
                                            $klrg2 = "";
                                            $klrg3 = "selected";
                                            $klrg4 = "";
                                        } else if ($santri->dlm_klrg == "Angkat") {
                                            $klrg1 = "";
                                            $klrg2 = "";
                                            $klrg3 = "";
                                            $klrg4 = "selected";
                                        }
                                        ?>
                                        <select name="dlm_klrg" id="" class="form-control">
                                            <option <?= $klrg1 ?> value="default">Pilih Status</option>
                                            <option <?= $klrg2 ?> value="Kandung">Kandung</option>
                                            <option <?= $klrg3 ?> value="Tiri">Tiri</option>
                                            <option <?= $klrg4 ?> value="Angkat">Angkat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">ANAK KE</label>
                                        <input type="number" class="form-control" name="ank_ke" value="<?= $santri->ank_ke ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">JUMLAH SAUDARA</label>
                                        <input type="number" class="form-control" name="sdr" value="<?= $santri->sdr ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP SESUAI KTP</label>
                                        <textarea name="alamat_lengkap" id="" class="form-control"><?= $santri->alamat_lengkap ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KODE POS</label>
                                        <input type="number" class="form-control" name="pos" value="<?= $santri->pos ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PROVINSI</label>
                                        <select class="form-control select2 provinsi" name="prov" id="provinsi">
                                            <option selected hidden value="default">-Pilih Provinsi-</option>
                                            <?php foreach ($provinsi as $value) {
                                                if ($santri->prov == $value->id) {
                                                    $prov = "selected";
                                                } else {
                                                    $prov = "";
                                                }
                                            ?>
                                                <option <?= $prov ?> value="<?= $value->id ?>"><?= $value->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KABUPATEN</label>
                                        <select class="form-control select2 kabupaten" name="kab" id="kabupaten">
                                            <option value="default">-Pilih kabupaten-</option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#provinsi').change(function() {
                                                    var id = $(this).val();
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_kabupaten'); ?>",
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
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                            $('#kabupaten').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var id = $('#prov').val();
                                                var k = $('#kab').val()
                                                $.ajax({
                                                    url: "<?php echo site_url('Cperson/get_kabupaten'); ?>",
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
                                                            if (data[i].id == k) {
                                                                html += '<option selected value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            } else {
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                        }
                                                        $('#kabupaten').html(html);
                                                    }
                                                });
                                                return false;
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KECAMATAN</label>
                                        <select class="form-control select2 kecamatan" name="kec" id="kecamatan">
                                            <option value="default">-Pilih Kecamatan-</option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#kabupaten').change(function() {
                                                    var id = $(this).val();
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_kecamatan'); ?>",
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
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                            $('#kecamatan').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var id = $('#kab').val();
                                                var k = $('#kec').val()
                                                $.ajax({
                                                    url: "<?php echo site_url('Cperson/get_kecamatan'); ?>",
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
                                                            if (data[i].id == k) {
                                                                html += '<option selected value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            } else {
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                        }
                                                        $('#kecamatan').html(html);
                                                    }
                                                });
                                                return false;
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">DESA</label>
                                        <select class="form-control select2 desa" name="desa" id="desa">
                                            <option value="default">- Pilih Desa-</option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#kecamatan').change(function() {
                                                    var id = $(this).val();
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_desa'); ?>",
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
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                            $('#desa').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var id = $('#kec').val();
                                                var k = $('#des').val()
                                                $.ajax({
                                                    url: "<?php echo site_url('Cperson/get_desa'); ?>",
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
                                                            if (data[i].id == k) {
                                                                html += '<option selected value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            } else {
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                        }
                                                        $('#desa').html(html);
                                                    }
                                                });
                                                return false;
                                            })
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" onclick="menu_santri()"><i class="fas fa-reply"></i> Kembali Ke Data Santri</button>
                            <button class="btn btn-info float-right">Simpan dan Lanjut <i class="fas fa-arrow-right"></i></button>
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
        })
    })

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#form_edit_santri').validate({
        rules: {
            nik: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nama: {
                required: true
            },
            tempat_lahir: {
                required: true
            },
            tanggal_lahir: {
                valueNotEquals: "default"
            },
            bulan_lahir: {
                valueNotEquals: "default"
            },
            tahun_lahir: {
                valueNotEquals: "default"
            },
            jenis_kelamin: {
                valueNotEquals: "default"
            },
            dlm_klrg: {
                valueNotEquals: "default"
            },
            ank_ke: {
                required: true
            },
            sdr: {
                required: true
            },
            alamat_lengkap: {
                required: true
            },
            pos: {
                required: true
            },
            prov: {
                valueNotEquals: "default"
            },
            kab: {
                valueNotEquals: "default"
            },
            kec: {
                valueNotEquals: "default"
            },
            desa: {
                valueNotEquals: "default"
            }
        },
        messages: {
            nik: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nama: {
                required: "Tidak Boleh Kosong"
            },
            tempat_lahir: {
                required: "Tidak Boleh Kosong"
            },
            tanggal_lahir: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            bulan_lahir: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tahun_lahir: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            jenis_kelamin: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            dlm_klrg: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            ank_ke: {
                required: "Tidak Boleh Kosong"
            },
            sdr: {
                required: "Tidak Boleh Kosong"
            },
            alamat_lengkap: {
                required: "Tidak Boleh Kosong"
            },
            pos: {
                required: "Tidak Boleh Kosong"
            },
            prov: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            kab: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            kec: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            desa: {
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
                url: "<?= site_url('Cperson/edit_santri_v1') ?>",
                data: $('#form_edit_santri').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    var o = data.i;
                    $.post('<?= site_url('Cperson/form_edit_santri_2') ?>', {
                        o: o
                    }, function(Res) {

                        $('#ini_isinya').html(Res);
                    });
                }
            });
        }
    })
</script>