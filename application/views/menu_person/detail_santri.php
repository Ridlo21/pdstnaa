<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <button onclick="menu_santri()" class="btn btn-danger btn-sm" style="color: #fff;"><i class="fas fa-reply"></i> Kembali</button>
                </div>
                <div class="card-body" style="font-size: 16px;">
                    <div class="row ">
                        <div class="col-12 mt-2">
                            <h3>Data Diri</h3>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <div class="row">
                        <div class="col-sm-7">
                            <table cellpadding="5">
                                <tr>
                                    <td>NIUP</td>
                                    <td>:</td>
                                    <td><?= $data->niup ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $data->nik ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $data->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $data->jenis_kelamin ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td><?= $data->tempat_lahir ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-5">
                            <table cellpadding="5">
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $data->tanggal_lahir ?></td>
                                </tr>
                                <tr>
                                    <td>Status Keluarga</td>
                                    <td>:</td>
                                    <td><?= $data->dlm_klrg ?></td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td>:</td>
                                    <td><?= $data->ank_ke ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara</td>
                                    <td>:</td>
                                    <td><?= $data->sdr ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Yang Ditempuh</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>Detail Alamat</h3>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <div class="row">
                        <div class="col-12">
                            <table cellpadding="5">
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $data->alamat_lengkap ?></td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>:</td>
                                    <td><?= $data->nama_desa ?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td><?= $data->nama_kecamatan ?></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten/Kota</td>
                                    <td>:</td>
                                    <td><?= $data->nama_kabupaten ?></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td><?= $data->nama_provinsi ?></td>
                                </tr>
                                <tr>
                                    <td>Kode Pos</td>
                                    <td>:</td>
                                    <td><?= $data->pos ?></td>
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
                        <div class="col-sm-7">
                            <table cellpadding="5">
                                <tr>
                                    <td>NIK Ayah</td>
                                    <td>:</td>
                                    <td><?= $data->nik_a ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td>:</td>
                                    <td><?= $data->nm_a ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir Ayah</td>
                                    <td>:</td>
                                    <td><?= $data->tgl_lahir_a ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Ayah</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn_a ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ayah</td>
                                    <td>:</td>
                                    <td><?= $data->pkrjn_a ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-5">
                            <table cellpadding="5">
                                <tr>
                                    <td>NIK Ibu</td>
                                    <td>:</td>
                                    <td><?= $data->nik_i ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>:</td>
                                    <td><?= $data->nm_i ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir Ibu</td>
                                    <td>:</td>
                                    <td><?= $data->tgl_lahir_i ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Ibu</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn_i ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ibu</td>
                                    <td>:</td>
                                    <td><?= $data->pkrjn_i ?></td>
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
                        <div class="col-sm-7">
                            <table cellpadding="5">
                                <tr>
                                    <td>NIK Wali</td>
                                    <td>:</td>
                                    <td><?= $data->nik_w ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Wali</td>
                                    <td>:</td>
                                    <td><?= $data->nm_w ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Wali</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn_w ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Wali</td>
                                    <td>:</td>
                                    <td><?= $data->pkrjn_w ?></td>
                                </tr>
                                <tr>
                                    <td>Pendapatan Wali</td>
                                    <td>:</td>
                                    <td><?= $data->pndptn_w ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Wali</td>
                                    <td>:</td>
                                    <td><?= $data->almt_w ?></td>
                                </tr>
                                <tr>
                                    <td>Desa Wali</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if (empty($data_alamat->nama_desa_w)) {
                                            echo "-----";
                                        } else {
                                            echo $data_alamat->nama_desa_w;
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-5">
                            <table cellpadding="5">
                                <tr>
                                    <td>Kecamatan Wali</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if (empty($data_alamat->nama_kec_w)) {
                                            echo "-----";
                                        } else {
                                            echo $data_alamat->nama_kec_w;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kabupaten Wali</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if (empty($data_alamat->nama_kab_w)) {
                                            echo "-----";
                                        } else {
                                            echo $data_alamat->nama_kab_w;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Provinsi Wali</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if (empty($data_alamat->nama_prov_w)) {
                                            echo "-----";
                                        } else {
                                            echo $data_alamat->nama_prov_w;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kode Pos Wali</td>
                                    <td>:</td>
                                    <td><?= $data->pos_w ?></td>
                                </tr>
                                <tr>
                                    <td>NO Handphone Wali</td>
                                    <td>:</td>
                                    <td><?= $data->hp_w ?> / <?= $data->telp_w ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="col-md-9 offset-1">
                        <button type="button" class="btn btn-sm btn-primary mb-2" onclick="aturKamar('<?= $data->id_person ?>')"><i class="fas fa-cog"></i> Atur kamar</button>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:1%">NO</th>
                                    <th>WILAYAH</th>
                                    <th>BLOCK</th>
                                    <th>KAMAR</th>
                                    <th>TANGGAL PENETAPAN</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($domisili as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->nama_wilayah ?></td>
                                        <td><?= $row->nama_blok ?></td>
                                        <td><?= $row->nama_kamar ?></td>
                                        <td><?= $row->tgl_penetapan ?></td>
                                        <?php
                                        if ($row->aktif == 'Ya') {
                                            $st = "Aktif";
                                        } else {
                                            $st = "Tidak Aktif";
                                        }
                                        ?>
                                        <td><?= $st ?></td>
                                    </tr>
                                <?php    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-12">
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
                                foreach ($mahrom as $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->hubungan ?></td>
                                        <td><?= $value->nama_mahrom ?></td>
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
        <div class="row" id="ok">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>SCAN FOTO SANTRI</strong><br><br>
                            <a class="btn btn-primary btn-sm" <?= $data->foto_warna_santri != "" ?  "href = Cperson/download_foto?nama=$data->foto_warna_santri" : "href='#' onclick ='ok()'" ?> style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_warna_santri ?>?text=1" class="img-fluid mb-2" alt="SCAN FOTO SANTRI" />
                            <!-- <a href="<?= site_url() ?>../gambar/foto/<?= $data->foto_warna_santri ?>?text=1"  data-title="SCAN FOTO SANTRI" >
                            </a> -->
                        </div>
                        <div class="col-sm-4">
                            <strong>SCAN FOTO WALI SANTRI</strong><br><br>
                            <a class="btn btn-primary btn-sm" <?= $data->foto_wali_santri_warna != "" ?  "href = Cperson/download_foto?nama=$data->foto_wali_santri_warna" : "href='#' onclick ='ok()'" ?> style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_wali_santri_warna ?>?text=2" class="img-fluid mb-2" alt="SCAN FOTO WALI SANTRI" />
                            <!-- <a href="<?= site_url() ?>../gambar/wali/<?= $data->foto_wali_santri_warna ?>?text=2"  data-title="SCAN FOTO WALI SANTRI" >
                            </a> -->
                        </div>
                        <div class="col-sm-4">
                            <strong>SCAN KARTU KELUARGA</strong><br><br>
                            <a class="btn btn-primary btn-sm" <?= $data->foto_scan_kk != "" ?  "href = Cperson/download_foto?nama=$data->foto_scan_kk" : "href='#' onclick ='ok()'" ?> style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_scan_kk ?>" class="img-fluid mb-2" alt="SCAN KARTU KELUARGA" />
                            <!-- <a href="<?= site_url() ?>../gambar/kk/<?= $data->foto_scan_kk ?>"  data-title="SCAN KARTU KELUARGA" >
                            </a> -->
                        </div>
                        <div class="col-sm-4">
                            <strong>SCAN AKTA KELAHIRAN</strong><br><br>
                            <a class="btn btn-primary btn-sm" <?= $data->foto_scan_akta != "" ?  "href = Cperson/download_foto?nama=$data->foto_scan_akta" : "href='#' onclick ='ok()'" ?> style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_scan_akta ?>" class="img-fluid mb-2" alt="SCAN AKTA KELAHIRAN" />
                            <!-- <a href="<?= site_url() ?>../gambar/akta/<?= $data->foto_scan_akta ?>"  data-title="SCAN AKTA KELAHIRAN" >
                            </a> -->
                        </div>
                        <div class="col-sm-4">
                            <strong>SCAN SKCK</strong><br><br>
                            <a class="btn btn-primary btn-sm" <?= $data->foto_scan_skck != "" ?  "href = Cperson/download_foto?nama=$data->foto_scan_skck" : "href='#' onclick ='ok()'" ?> style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_scan_skck ?>" class="img-fluid mb-2" alt="SCAN SKCK" />
                            <!-- <a href="<?= site_url() ?>../gambar/skck/<?= $data->foto_scan_skck ?>"  data-title="SCAN SKCK" >
                            </a> -->
                        </div>
                        <div class="col-sm-4">
                            <strong>SCAN KETERANGAN SEHAT</strong><br><br>
                            <a class="btn btn-primary btn-sm" <?= $data->foto_scan_ket_sehat != "" ?  "href = Cperson/download_foto?nama=$data->foto_scan_ket_sehat" : "href='#' onclick ='ok()'" ?> style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_scan_ket_sehat ?>" class="img-fluid mb-2" alt="SCAN KETERANGAN SEHAT" />
                            <!-- <a href="<?= site_url() ?>../gambar/sukes/<?= $data->foto_scan_ket_sehat ?>"  data-title="SCAN KETERANGAN SEHAT" >
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<script>
//     function aturKamarNya(id) {
        
//     }
    function aturKamar(id) {
        $("#loading").css("display", "block ");
        $.ajax({
            url : "<?= site_url('Chistory/aturKamar2')?>",
            type : "post",
            data : {
                id : id
            },
            dataType : "json",
            success : function (res) {
                if (res.hasil = "G") {
                    $("#loading").css("display", "none ");
                    $.post('<?= site_url('Chistory/aturKamar') ?>', {
                        id: id}, function(Res) {
			            $('#ini_isinya').html(Res);
		            });
                } else {
                    swal.fire({
                        title: 'PDST NAA',
			            text: res.message,
			            type: 'warning'
                    })
                }
                
            }
        })
	}
	
    function ok() {
        swal.fire({
            title: "Foto Tidak Ada",
            text: "Dibatalkan",
            type: "error"
        }).then(okay => {
            if (okay) {
                $('#id').focus();
            }
        });
    }
</script>