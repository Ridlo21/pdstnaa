<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dewan Pengasuh</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Dewan Pengasuh</h3>
            </div>
            <div class="card-body">
                <form id="edit_dewan_pengasuh">
                    <input type="hidden" name="idperson" value="<?= $data->id_person ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nik" class="col-form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $data->nik ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data->nama ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tempat_lahir" class="col-form-label">Tempat lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data->tempat_lahir ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data->tanggal_lahir ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?php
                                if ($data->jenis_kelamin == 'Laki-Laki') {
                                    $jk1 = 'checked';
                                    $jk2 = '';
                                } else {
                                    $jk1 = '';
                                    $jk2 = 'checked';
                                }
                                ?>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="col-form-label">jenis Kelamin</label><br>
                                    <div class="form-group" style="margin-top: 10px; margin-bottom: 22px;">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="jenkel1" name="jenis_kelamin" value="Laki-Laki" <?= $jk1 ?>>
                                            <label for="jenkel1">Laki-Laki</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="jenkel2" name="jenis_kelamin" value="Perempuan" <?= $jk2 ?>>
                                            <label for="jenkel2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="alamat_lengkap" class="col-form-label">Alamat</label>
                                <textarea class="form-control" name="alamat_lengkap" id="" cols="35" rows="2"><?= $data->alamat_lengkap ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="prov" class="col-form-label">Provinsi</label>
                                <select class="form-control select2" style="width: 100%;" name="prov" id="prov">
                                    <option value="<?= $data->prov ?>"><?= $alamat->nama_provinsi ?></option>
                                    <?php
                                    foreach ($provinsi as $value) { ?>
                                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="kab" class="col-form-label">Kabupaten</label>
                                <select class="form-control select2" name="kab" id="kab">
                                    <option value="<?= $data->kab?>"><?= $alamat->nama_kabupaten ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="kec" class="col-form-label">Kecamatan</label>
                                <select class="form-control select2" name="kec" id="kec">
                                    <option value="<?= $data->kec ?>"><?= $alamat->nama_kecamatan ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="desa" class="col-form-label">Desa</label>
                                <select class="form-control select2" name="desa" id="desa">
                                    <option value="<?= $data->desa ?>"><?= $alamat->nama_desa ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="pos" class="col-form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="pos" name="pos" value="<?= $data->pos ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="nama_a" class="col-form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_a" name="nama_a" value="<?= $data->nm_a ?>">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="nama_i" class="col-form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_i" name="nama_i" value="<?= $data->nm_i ?>">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="" name="status" value="Dewan Pengasuh">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-default" onclick="dewan_pengasuh()">Keluar</button>
                <button class="btn btn-sm btn-primary float-right" onclick="edit_pengasuh()"><i class="fas fa-edit"></i> Edit</button>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $('#prov').change(function() {
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
                    $('#kab').html(html);

                }
            });
            return false;
        });

        $('#kab').change(function() {
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
                    $('#kec').html(html);

                }
            });
            return false;
        });

        $('#kec').change(function() {
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

        $('#prov_w').change(function() {
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
                    $('#kab_w').html(html);

                }
            });
            return false;
        });

        $('#kab_w').change(function() {
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
                    $('#kec_w').html(html);

                }
            });
            return false;
        });

    });
</script>
<script>
    function edit_pengasuh() {
        $.ajax({
            url: "<?= site_url('Cdewan/edit_pengasuh') ?>",
            data: $('#edit_dewan_pengasuh').serialize(),
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
                            dewan_pengasuh()
                        }
                    })
                }
            }
        });
    }

    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
</script>