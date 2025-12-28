<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Karyawan</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Karyawan</h3>
            </div>
            <form id="edit_karyawan">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="idkaryawan" value="<?= $id_karyawan ?>">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Santri</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_santri" value="<?= $nama ?>" readonly>
                                <input type="hidden" name="idperson" id="idperson" value="<?= $id_person ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat_lengkap" id="alamat" cols="30" rows="1" readonly><?= $alamat_lengkap ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal Pengangkatan</label>
                                <div class="form-line">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="tanggal_diangkat" class="form-control" id="pengangkatan" value="<?= $tgl_diangkat ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                $tgl1 = new DateTime($tgl_diangkat);
                                $tgl2 = new DateTime($tgl_berhenti);
                                $jarak = $tgl2->diff($tgl1);
                                $hasil =  $jarak->days;
                                ?>
                                <label for="tanggal" class="col-form-label">Masa Bakti</label>
                                <select class="form-control select2" name="" id="angkat">
                                    <option <?= $hasil == "365"  ? "selected " : "" ?> value="365">1 Tahun</option>
                                    <option <?= $hasil == "730"  ? "selected " : "" ?> value="730">2 Tahun</option>
                                    <option <?= $hasil == "1095"  ? "selected " : "" ?> value="1095">3 Tahun</option>
                                    <option <?= $hasil == "1460"  ? "selected " : "" ?> value="1460">4 Tahun</option>
                                    <option <?= $hasil == "1825"  ? "selected " : "" ?> value="1825">5 Tahun</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal Berhenti</label>
                                <input type="text" name="tanggal_berhenti" class="form-control" id="berhenti" readonly value="<?= $tgl_berhenti ?>">
                            </div>
                            <div class="form-group">
                                <label for="instansi" class="col-form-label">Instansi</label>
                                <select class="form-control select2" name="instansi" id="instansi">
                                    <option selected hidden value="<?= $instansi ?>"><?= $instansi ?></option>
                                    <option value="NAA Media">NAA MEDIA</option>
                                    <option value="Kopontren Al-Mubarokah">Kopontren Al-Mubarokah</option>
                                    <option value="Kantin Al-Mubarokah">Kantin Al-Mubarokah</option>
                                    <option value="Koperasi Sekolah">Koperasi Sekolah</option>
                                    <option value="Meubel">Meubel</option>
                                    <option value="LK SMKNAA">LK SMKNAA</option>
                                    <option value="AMDK Oemboel">AMDK Oemboel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-default bg-danger" onclick="karyawan()"><i class="fas fa-reply"></i> Keluar</button>
                    <button class="btn btn-sm btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
        $('#pengangkatan').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    })

    $('#pengangkatan').on('change', function() {
        var ll = $(this).val();
        var bb = $('#angkat').val();
        var date = new Date(ll);

        date.setDate(date.getDate() + (+bb));

        var dd = date.getDate();
        var mm = date.getMonth() + 1;
        var y = date.getFullYear();
        var someFormattedDate = y + '-' + mm + '-' + dd;

        $('#berhenti').val(someFormattedDate);
    })

    $('#angkat').on('change', function() {
        var ll = $(this).val();
        var bb = $('#pengangkatan').val();
        var date = new Date(bb);

        date.setDate(date.getDate() + (+ll));

        var dd = date.getDate();
        var mm = date.getMonth() + 1;
        var y = date.getFullYear();
        var someFormattedDate = y + '-' + mm + '-' + dd;

        $('#berhenti').val(someFormattedDate);

    })

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#edit_karyawan').validate({
        rules: {
            nama_pengajar: {
                required: true
            },
            alamat_lengkap: {
                required: true
            },
            tanggal_diangkat: {
                required: true
            },
            nama_wilayah: {
                valueNotEquals: "default"
            },
            angkat: {
                valueNotEquals: "0"
            },
            instansi: {
                valueNotEquals: "0"
            },
            tanggal_berhenti: {
                required: true
            },
        },
        messages: {
            nama_pengajar: {
                required: "Tidak Boleh Kosong"
            },
            alamat_lengkap: {
                required: "Tidak Boleh Kosong"
            },
            tanggal_diangkat: {
                required: "Tidak Boleh Kosong"
            },
            nama_wilayah: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            angkat: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            instansi: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tanggal_berhenti: {
                required: "Tidak Boleh Kosong"
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
                url: "<?= site_url('Ckaryawan/edit_karyawan') ?>",
                data: $('#edit_karyawan').serialize(),
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
                                karyawan()
                            }
                        })
                    }
                }
            });
        }
    })
</script>