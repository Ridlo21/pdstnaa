<?php
if ($santri->prov_w == "") {
    $prov_w = "0";
} else {
    $prov_w = $santri->prov_w;
}
if ($santri->kab_w == "") {
    $kab_w = "0";
} else {
    $kab_w = $santri->kab_w;
}
if ($santri->kec_w == "") {
    $kec_w = "0";
} else {
    $kec_w = $santri->kec_w;
}
if ($santri->desa_w == "") {
    $desa_w = "0";
} else {
    $desa_w = $santri->desa_w;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Identitas Wali dari <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="prov" value="<?= $prov_w ?>">
<input type="hidden" id="kab" value="<?= $kab_w ?>">
<input type="hidden" id="kec" value="<?= $kec_w ?>">
<input type="hidden" id="des" value="<?= $desa_w ?>">
<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_tambah_santri_v3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" onclick="ayahnya()" class="btn btn-sm btn-primary"><i class="fas fa-male"></i> Salin Data Ayah</button>
                                    <button type="button" onclick="ibunya()" class="btn btn-sm btn-success ml-1"><i class="fas fa-female"></i> Salin Data Ibu</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK WALI</label>
                                        <input type="number" class="form-control" name="nik_w" id="nik_w" value="<?= $santri->nik_w ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NAMA WALI</label>
                                        <input type="text" class="form-control" name="nm_w" id="nm_w" value="<?= $santri->nm_w ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PENDIDIKAN WALI</label>
                                        <select class="form-control" name="pndkn_w" id="pndkn_w">
                                            <?php
                                            $pndknw1 = "";
                                            $pndknw2 = "";
                                            $pndknw3 = "";
                                            $pndknw4 = "";
                                            $pndknw5 = "";
                                            $pndknw6 = "";
                                            if ($santri->pndkn_w == "") {
                                                $pndknw1 = "selected";
                                                $pndknw2 = "";
                                                $pndknw3 = "";
                                                $pndknw4 = "";
                                                $pndknw5 = "";
                                                $pndknw6 = "";
                                            } elseif ($santri->pndkn_w == "SD") {
                                                $pndknw1 = "";
                                                $pndknw2 = "selected";
                                                $pndknw3 = "";
                                                $pndknw4 = "";
                                                $pndknw5 = "";
                                                $pndknw6 = "";
                                            } elseif ($santri->pndkn_w == "SLTP") {
                                                $pndknw1 = "";
                                                $pndknw2 = "";
                                                $pndknw3 = "selected";
                                                $pndknw4 = "";
                                                $pndknw5 = "";
                                                $pndknw6 = "";
                                            } elseif ($santri->pndkn_w == "SLTA") {
                                                $pndknw1 = "";
                                                $pndknw2 = "";
                                                $pndknw3 = "";
                                                $pndknw4 = "selected";
                                                $pndknw5 = "";
                                                $pndknw6 = "";
                                            } elseif ($santri->pndkn_w == "SARJANA") {
                                                $pndknw1 = "";
                                                $pndknw2 = "";
                                                $pndknw3 = "";
                                                $pndknw4 = "";
                                                $pndknw5 = "selected";
                                                $pndknw6 = "";
                                            } elseif ($santri->pndkn_w == "DLL") {
                                                $pndknw1 = "";
                                                $pndknw2 = "";
                                                $pndknw3 = "";
                                                $pndknw4 = "";
                                                $pndknw5 = "";
                                                $pndknw6 = "selected";
                                            }
                                            ?>
                                            <option <?= $pndknw1 ?> hidden value="default">-Pilih Pendidikan-</option>
                                            <option <?= $pndknw2 ?> value="SD">SD</option>
                                            <option <?= $pndknw3 ?> value="SLTP">SLTP</option>
                                            <option <?= $pndknw4 ?> value="SLTA">SLTA</option>
                                            <option <?= $pndknw5 ?> value="SARJANA">SARJANA</option>
                                            <option <?= $pndknw6 ?> value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PEKERJAAN WALI</label>
                                        <select class="form-control" name="pkrjn_w" id="pkrjn_w">
                                            <?php
                                            if ($santri->pkrjn_w == "") {
                                                $pkrjni1 = "selected";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Petani") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "selected";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Wiraswasta") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "selected";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Nelayan") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "selected";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Guru") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "selected";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "PNS") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "selected";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "TNI") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "selected";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Polisi") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "selected";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Dokter") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "selected";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Buruh") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "selected";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Karyawan") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "selected";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "Pedagang") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "selected";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_w == "DLL") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "selected";
                                            }
                                            ?>
                                            <option <?= $pkrjni1 ?> hidden value="default">-Pilih Pekerjaan-</option>
                                            <option <?= $pkrjni2 ?> value="Petani">Petani</option>
                                            <option <?= $pkrjni3 ?> value="Wiraswasta">Wiraswasta</option>
                                            <option <?= $pkrjni4 ?> value="Nelayan">Nelayan</option>
                                            <option <?= $pkrjni5 ?> value="Guru">Guru</option>
                                            <option <?= $pkrjni6 ?> value="PNS">PNS</option>
                                            <option <?= $pkrjni7 ?> value="TNI">TNI</option>
                                            <option <?= $pkrjni8 ?> value="Polisi">Polisi</option>
                                            <option <?= $pkrjni9 ?> value="Dokter">Dokter</option>
                                            <option <?= $pkrjni10 ?> value="Buruh">Buruh</option>
                                            <option <?= $pkrjni11 ?> value="Karyawan">Karyawan</option>
                                            <option <?= $pkrjni12 ?> value="Pedagang">Pedagang</option>
                                            <option <?= $pkrjni13 ?> value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NO HP WALI</label>
                                        <input type="number" class="form-control" id="hp_w" name="hp_w" value="<?= $santri->hp_w ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NO TELP WALI</label>
                                        <input type="number" class="form-control" id="telp_w" name="telp_w" value="<?= $santri->telp_w ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PENDAPATAN WALI</label>
                                        <?php if ($santri->pndptn_w == "") {
                                            $pndptn1 = "selected";
                                            $pndptn2 = "";
                                            $pndptn3 = "";
                                            $pndptn4 = "";
                                        } elseif ($santri->pndptn_w == "tinggi") {
                                            $pndptn1 = "";
                                            $pndptn2 = "selected";
                                            $pndptn3 = "";
                                            $pndptn4 = "";
                                        } elseif ($santri->pndptn_w == "sedang") {
                                            $pndptn1 = "";
                                            $pndptn2 = "";
                                            $pndptn3 = "selected";
                                            $pndptn4 = "";
                                        } elseif ($santri->pndptn_w == "rendah") {
                                            $pndptn1 = "";
                                            $pndptn2 = "";
                                            $pndptn3 = "";
                                            $pndptn4 = "selected";
                                        }
                                        ?>
                                        <select class="form-control" name="pndptn_w" id="pndptn_w">
                                            <option <?= $pndptn1 ?> hidden value="default">-Pilih Pendapatan-</option>
                                            <option <?= $pndptn2 ?> value="tinggi">Tinggi</option>
                                            <option <?= $pndptn3 ?> value="sedang">Sedang</option>
                                            <option <?= $pndptn4 ?> value="rendah">Rendah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP WALI SESUAI KTP</label>
                                        <textarea name="almt_w" id="almt_w" class="form-control"><?= $santri->almt_w ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KODE POS</label>
                                        <input type="number" class="form-control" id="pos_w" name="pos_w" value="<?= $santri->pos_w ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PROVINSI</label>
                                        <select class="form-control select2" name="prov_w" id="provinsi">
                                            <option selected hidden value="default">-Pilih Provinsi-</option>
                                            <?php foreach ($provinsi as $value) {
                                                if ($santri->prov_w == $value->id) {
                                                    $prov_w = "selected";
                                                } else {
                                                    $prov_w = "";
                                                }
                                            ?>
                                                <option <?= $prov_w ?> value="<?= $value->id ?>"><?= $value->name ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KABUPATEN</label>
                                        <select class="form-control select2" name="kab_w" id="kabupaten">
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
                                                            html += '<option value=' + ' default' + '>' + '-Pilih Kabupaten-' + '</option>';
                                                            for (i = 0; i < data.length; i++) {
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                            $('#kabupaten').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var provinsi = $('#prov').val();
                                                var k = $('#kab').val()
                                                if (provinsi == 0) {
                                                    var html = '';
                                                    html += '<option value=' + ' default' + '>' + '-Pilih Kabupaten-' + '</option>';
                                                    $('#kabupaten').html(html);
                                                } else {
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_kabupaten'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: provinsi
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
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">KECAMATAN</label>
                                        <select class="form-control select2" name="kec_w" id="kecamatan">
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
                                                            html += '<option value=' + ' default' + '>' + '-Pilih Kecamatan-' + '</option>';
                                                            for (i = 0; i < data.length; i++) {
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                            $('#kecamatan').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var kabupaten = $('#kab').val();
                                                var k = $('#kec').val()
                                                if (kabupaten == 0) {
                                                    var html = '';
                                                    html += '<option value=' + ' default' + '>' + '-Pilih Kecamatan-' + '</option>';
                                                    $('#kecamatan').html(html);
                                                } else {
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_kecamatan'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: kabupaten
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
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">DESA</label>
                                        <select class="form-control select2" name="desa_w" id="desa">
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
                                                            html += '<option value=' + ' default' + '>' + '-Pilih Desa-' + '</option>';
                                                            for (i = 0; i < data.length; i++) {
                                                                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                                            }
                                                            $('#desa').html(html);

                                                        }
                                                    });
                                                    return false;
                                                });
                                                var kecamatan = $('#kec').val();
                                                var k = $('#des').val()
                                                if (kecamatan == 0) {
                                                    var html = '';
                                                    html += '<option value=' + ' default' + '>' + '-Pilih Desa-' + '</option>';
                                                    $('#desa').html(html);
                                                } else {
                                                    $.ajax({
                                                        url: "<?php echo site_url('Cperson/get_desa'); ?>",
                                                        method: "POST",
                                                        data: {
                                                            id: kecamatan
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
                                                }
                                            })
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">PENDIDIKAN YANG AKAN DITEMPUH</label>
                                        <?php
                                        if ($santri->pndkn == "") {
                                            $sekolah1 = "selected";
                                            $sekolah2 = "";
                                            $sekolah3 = "";
                                            $sekolah4 = "";
                                            $sekolah5 = "";
                                            $sekolah6 = "";
                                            $sekolah7 = "";
                                        } elseif ($santri->pndkn == "RA") {
                                            $sekolah1 = "";
                                            $sekolah2 = "selected";
                                            $sekolah3 = "";
                                            $sekolah4 = "";
                                            $sekolah5 = "";
                                            $sekolah6 = "";
                                            $sekolah7 = "";
                                        } elseif ($santri->pndkn == "MI") {
                                            $sekolah1 = "";
                                            $sekolah2 = "";
                                            $sekolah3 = "selected";
                                            $sekolah4 = "";
                                            $sekolah5 = "";
                                            $sekolah6 = "";
                                            $sekolah7 = "";
                                        } elseif ($santri->pndkn == "SMP") {
                                            $sekolah1 = "";
                                            $sekolah2 = "";
                                            $sekolah3 = "";
                                            $sekolah4 = "selected";
                                            $sekolah5 = "";
                                            $sekolah6 = "";
                                            $sekolah7 = "";
                                        } elseif ($santri->pndkn == "SMK") {
                                            $sekolah1 = "";
                                            $sekolah2 = "";
                                            $sekolah3 = "";
                                            $sekolah4 = "";
                                            $sekolah5 = "selected";
                                            $sekolah6 = "";
                                            $sekolah7 = "";
                                        } elseif ($santri->pndkn == "STRATA I") {
                                            $sekolah1 = "";
                                            $sekolah2 = "";
                                            $sekolah3 = "";
                                            $sekolah4 = "";
                                            $sekolah5 = "";
                                            $sekolah6 = "selected";
                                            $sekolah7 = "";
                                        } elseif ($santri->pndkn == "NON FORMAL") {
                                            $sekolah1 = "";
                                            $sekolah2 = "";
                                            $sekolah3 = "";
                                            $sekolah4 = "";
                                            $sekolah5 = "";
                                            $sekolah6 = "";
                                            $sekolah7 = "selected";
                                        }
                                        ?>
                                        <select class="form-control" name="pndkn">
                                            <option <?= $sekolah1 ?> value="default">-Pilih Pendidikan-</option>
                                            <option <?= $sekolah2 ?> value="RA">Raudatul Athfal</option>
                                            <option <?= $sekolah3 ?> value="MI">MI</option>
                                            <option <?= $sekolah4 ?> value="SMP">SMP</option>
                                            <option <?= $sekolah5 ?> value="SMK">SMK</option>
                                            <option <?= $sekolah6 ?> value="STRATA I">STRATA I</option>
                                            <option <?= $sekolah7 ?> value="NON FORMAL">NON FORMAL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">TANGGAL DAFTAR</label>
                                        <input type="datetime-local" name="tgl_daftar" value="<?//= $santri->tgl_daftar ?>" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" onclick="dibatalkan('<?= $santri->id_person ?>')"><i class="fas fa-times"></i> Batal</button>
                            <div class="float-right">
                                <button type="button" class="btn btn-info" onclick="kembali_pole('<?= $santri->id_person ?>')"><i class="fas fa-arrow-left"></i> Kembali</button>
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
    $(document).ready(function() {
        $("#nik_w, #hp_w, #telp_w, #pos_w").keypress(function(e) {
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
        });
    });
    
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
    
    function provinsi() {
        let a = `<?php foreach ($provinsi as $value) {
            if ($santri->prov == $value->id) {
                $prov_w = "selected";
            } else {
                $prov_w = "";
            }
            ?>
            <option <?= $prov_w ?> value="<?= $value->id ?>"><?= $value->name ?></option>
            <?php } ?>`;
            $('#provinsi').html(a);
    }

    function kabupaten() {
        var id = "<?= $santri->prov ?>";
        var k = "<?= $santri->kab ?>"
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
    }

    function kecamatan() {
        var id = "<?= $santri->kab ?>";
        var k = "<?= $santri->kec ?>";
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
    }

    function desa() {
        var id = "<?= $santri->kec ?>";
        var k = "<?= $santri->desa ?>";
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
    }

    function ayahnya() {
        // alert('hehe')
        $('#nik_w').val(`<?= $santri->nik_a ?>`);
        $('#nm_w').val(`<?= $santri->nm_a ?>`);
        $('#pndkn_w').val(`<?= $santri->pndkn_a ?>`);
        $('#pkrjn_w').val(`<?= $santri->pkrjn_a ?>`);
        $('#almt_w').val(`<?= $santri->alamat_lengkap ?>`);
        $('#pos_w').val(`<?= $santri->pos ?>`);
        provinsi();
        kabupaten();
        kecamatan();
        desa();
    }

    function ibunya() {
        // alert('hehe')
        $('#nik_w').val(`<?= $santri->nik_i ?>`);
        $('#nm_w').val(`<?= $santri->nm_i ?>`);
        $('#pndkn_w').val(`<?= $santri->pndkn_i ?>`);
        $('#pkrjn_w').val(`<?= $santri->pkrjn_i ?>`);
        $('#almt_w').val(`<?= $santri->alamat_lengkap ?>`);
        $('#pos_w').val(`<?= $santri->pos ?>`);
        provinsi();
        kabupaten();
        kecamatan();
        desa();
    }

    function kembali_pole(id) {
        $.post('<?= site_url('Cperson/tambah_santri_2') ?>', {
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
    $('#form_tambah_santri_v3').validate({
        rules: {
            nik_w: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nm_w: {
                required: true
            },
            pndkn_w: {
                valueNotEquals: "default"
            },
            pkrjn_w: {
                valueNotEquals: "default"
            },
            hp_w: {
                required: true
            },
            telp_w: {
                required: true
            },
            pndptn_w: {
                valueNotEquals: "default"
            },
            almt_w: {
                required: true
            },
            pos_w: {
                valueNotEquals: ""
            },
            prov_w: {
                valueNotEquals: "default"
            },
            kab_w: {
                valueNotEquals: "default"
            },
            kec_w: {
                valueNotEquals: "default"
            },
            desa_w: {
                valueNotEquals: "default"
            },
            pndkn: {
                valueNotEquals: "default"
            },
            tgl_daftar: {
                required: true
            }
        },
        messages: {
            nik_w: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nm_w: {
                required: "Tidak Boleh Kosong"
            },
            pndkn_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pkrjn_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            hp_w: {
                required: "Tidak Boleh Kosong"
            },
            telp_w: {
                required: "Tidak Boleh Kosong"
            },
            pndptn_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            almt_w: {
                required: "Tidak Boleh Kosong"
            },
            pos_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            prov_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            kab_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            kec_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            desa_w: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pndkn: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tgl_daftar: {
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
                url: "<?= site_url('Cperson/simpan_santri_v3') ?>",
                data: $('#form_tambah_santri_v3').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    var o = data.i;
                    $.post('<?= site_url('Cperson/tambah_santri_4') ?>', {
                        o: o
                    }, function(Res) {

                        $('#ini_isinya').html(Res);
                    });
                }
            });
        }
    });

    function dibatalkan(id) {
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