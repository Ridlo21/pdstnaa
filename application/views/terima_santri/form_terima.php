<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="form_simpan_santri">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body" style="font-size: 16px;">
                                    <div class="row ">
                                        <div class="col-12 mt-2">
                                            <h3>Data Diri</h3>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table cellpadding="5">
                                                <input type="hidden" value="<?= $data_psb->id ?>">
                                                <tbody>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->nik ?>
                                                            <input type="hidden" name="nik" value="<?= $data_psb->nik ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->nama ?>
                                                            <input type="hidden" name="nama" value="<?= $data_psb->nama ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->jenis_kelamin ?>
                                                            <input type="hidden" name="jenis_kelamin" value="<?= $data_psb->jenis_kelamin ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Lahir</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->tempat_lahir ?>
                                                            <input type="hidden" name="tempat_lahir" value="<?= $data_psb->tempat_lahir ?>">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table cellpadding="8">
                                                <tbody>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->tanggal_lahir ?>
                                                            <input type="hidden" name="tanggal_lahir" value="<?= $data_psb->tanggal_lahir ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Keluarga</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->dlm_klrg ?>
                                                            <input type="hidden" name="dlm_klrg" value="<?= $data_psb->dlm_klrg ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Anak Ke</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->ank_ke ?>
                                                            <input type="hidden" name="ank_ke" value="<?= $data_psb->ank_ke ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Saudara</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $data_psb->sdr ?>
                                                            <input type="hidden" name="sdr" value="<?= $data_psb->sdr ?>">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 mt-2">
                                            <h3>Detail Alamat</h3>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table cellpadding="5">
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->alamat_lengkap ?>
                                                        <input type="hidden" name="alamat_lengkap" value="<?= $data_psb->alamat_lengkap ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Desa</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $alamat->nama_desa ?>
                                                        <input type="hidden" name="desa" value="<?= $data_psb->desa ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kecamatan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $alamat->nama_kec ?>
                                                        <input type="hidden" name="kec" value="<?= $data_psb->kec ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kabupaten/Kota</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $alamat->nama_kab ?>
                                                        <input type="hidden" name="kab" value="<?= $data_psb->kab ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Provisi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $alamat->nama_prov ?>
                                                        <input type="hidden" name="prov" value="<?= $data_psb->prov ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Pos</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pos ?>
                                                        <input type="hidden" name="pos" value="<?= $data_psb->pos ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h3>Data Orang Tua</h3>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table cellpadding="5">
                                                <tr>
                                                    <td>Nama Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->nm_a ?>
                                                        <input type="hidden" name="nm_a" value="<?= $data_psb->nm_a ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pendidikan Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pndkn_a ?>
                                                        <input type="hidden" name="pndkn_a" value="<?= $data_psb->pndkn_a ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Ayah</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pkrjn_a ?>
                                                        <input type="hidden" name="pkrjn_a" value="<?= $data_psb->pkrjn_a ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table cellpadding="5">
                                                <tr>
                                                    <td>Nama Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->nm_i ?>
                                                        <input type="hidden" name="nm_i" value="<?= $data_psb->nm_i ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pendidikan Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pndkn_i ?>
                                                        <input type="hidden" name="pndkn_i" value="<?= $data_psb->pndkn_i ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pkrjn_i ?>
                                                        <input type="hidden" name="pkrjn_i" value="<?= $data_psb->pkrjn_i ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h3>Data Wali</h3>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table cellpadding="5">
                                                <tr>
                                                    <td>Nama Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->nm_w ?>
                                                        <input type="hidden" name="nm_w" value="<?= $data_psb->nm_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pendidikan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pndkn_w ?>
                                                        <input type="hidden" name="pndkn_w" value="<?= $data_psb->pndkn_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pkrjn_w ?>
                                                        <input type="hidden" name="pkrjn_w" value="<?= $data_psb->pkrjn_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pendapatan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pndptn_w ?>
                                                        <input type="hidden" name="pndptn_w" value="<?= $data_psb->pndptn_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->almt_w ?>
                                                        <input type="hidden" name="almt_w" value="<?= $data_psb->almt_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kecamatan Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_alamat->nama_kec_w ?>
                                                        <input type="hidden" name="kec_w" value="<?= $data_psb->kec_w ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table cellpadding="5">
                                                <tr>
                                                    <td>Kabupaten Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_alamat->nama_kab_w ?>
                                                        <input type="hidden" name="kab_w" value="<?= $data_psb->kab_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Provinsi Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_alamat->nama_prov_w ?>
                                                        <input type="hidden" name="prov_w" value="<?= $data_psb->prov_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Pos Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pos_w ?>
                                                        <input type="hidden" name="pos_w" value="<?= $data_psb->pos_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NO Handphone Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->hp_w ?>
                                                        <input type="hidden" name="hp_w" value="<?= $data_psb->hp_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NO Telephone Wali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->telp_w ?>
                                                        <input type="hidden" name="telp_w" value="<?= $data_psb->telp_w ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pendidikan Yang Ditempuh</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?= $data_psb->pndkn ?>
                                                        <input type="hidden" name="pndkn" value="<?= $data_psb->pndkn ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="col-md-9 offset-1">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width:1%">NO</th>
                                                    <th>STATUS MAHROM</th>
                                                    <th>NAMA MAHROM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($mahrom as $value) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td>
                                                            <?= $value->status ?>
                                                            <input type="hidden" name="hubungan" value="<?= $value->status ?>">
                                                        </td>
                                                        <td>
                                                            <?= $value->nama ?>
                                                            <input type="hidden" name="nama_mahrom" value="<?= $value->nama ?>">
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Foto Santri</label><br>
                                                <img src="<?= $data_psb->foto_warna_santri ?>" alt="" style="width: 200px;">
                                                <input type="hidden" name="foto_warna_santri" value="<?= $data_psb->foto_warna_santri ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Foto Wali Santri</label><br>
                                                <img src="<?= $data_psb->foto_wali_santri_warna ?>" alt="" style="width: 200px;">
                                                <input type="hidden" name="foto_wali_santri_warna" value="<?= $data_psb->foto_wali_santri_warna ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Foto Scan Kartu Keluarga</label><br>
                                                <img src="<?= $data_psb->foto_scan_kk ?>" alt="" style="width:250px;">
                                                <input type="hidden" name="foto_scan_kk" value="<?= $data_psb->foto_scan_kk ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Foto Scan Akta Kelahiran</label><br>
                                                <img src="<?= $data_psb->foto_scan_akta ?>" alt="" style="width: 200px;">
                                                <input type="hidden" name="foto_scan_akta" value="<?= $data_psb->foto_scan_akta ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Foto Scan SKCK</label><br>
                                                <img src="<?= $data_psb->foto_scan_skck ?>" alt="" style="width: 200px;">
                                                <input type="hidden" name="foto_scan_skck" value="<?= $data_psb->foto_scan_skck ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Foto Scan Keterangan Sehat</label><br>
                                                <img src="<?= $data_psb->foto_scan_ket_sehat ?>" alt="" style="width: 200px;">
                                                <input type="hidden" name="foto_scan_ket_sehat" value="<?= $data_psb->foto_scan_ket_sehat ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="wilayah" class="col-form-label">Wilayah</label>
                                                <select name="" id="wilayah" class="form-control select2">
                                                    <option selected>Pilih wilayah</option>
                                                    <?php foreach ($wilayah as $value) { ?>
                                                        <option value="<?= $value->id_wilayah ?>"><?= $value->nama_wilayah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="blok" class="col-form-label">Block</label>
                                                <select class="form-control select2" name="" id="blok">
                                                    <option>Pilih Block</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="kamar" class="col-form-label">Kamar</label>
                                                <select class="form-control select2" name="id_kamar" id="kamar">
                                                    <option>Pilih Kamar</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_penetapan" class="col-form-label">Tanggal Penetapan</label>
                                                <input type="date" class="form-control" name="tgl_penetapan" id="tgl_penetapan" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-default" onclick="menu_terima()">Keluar</button>
                <button type="submit" class="btn btn-sm btn-primary float-right" onclick="simpan_santri_baru();"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>

    </div>
</section>
<script>
    $(document).ready(function() {

        $('#wilayah').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Cterima/get_blok'); ?>",
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
                url: "<?php echo site_url('Cterima/get_kamar'); ?>",
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
    })
</script>

<script>
    function simpan_santri_baru() {
        $.ajax({
            url: "<?= site_url('Cterima/simpan_santri_baru') ?>",
            data: $('#form_simpan_santri').serialize(),
            type: 'POST',
            dataType: 'JSON',
            success: function(data, textStatus, jqXHR) {
                if (data.pesan === "sukses") {
                    alert('Berhasil Disimpan!!')
                    menu_terima()
                }
            }
        });
    }
</script>