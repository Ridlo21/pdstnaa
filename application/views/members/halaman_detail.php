<section class="content-header">
    <div class="container">
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

<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'JANUARI',
		'FEBRUARI',
		'MARET',
		'APRIL',
		'MEI',
		'JUNI',
		'JULI',
		'AGUSTUS',
		'SEPTEMBER',
		'OKTOBER',
		'NOVEMBER',
		'DESEMBER'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>


<section class="content">
    <input type="hidden" value="<?= $data->id_person ?>">
    <div class="container">
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
                                    <td><?= strtoupper($data->nama) ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->jenis_kelamin) ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->tempat_lahir) ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-5">
                            <table cellpadding="5">
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($data->tanggal_lahir) ?></td>
                                </tr>
                                <tr>
                                    <td>Status Keluarga</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->dlm_klrg) ?></td>
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
                                    <td><?= strtoupper($data->pndkn) ?></td>
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
                                    <td><?= strtoupper($data->alamat_lengkap) ?></td>
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
                                    <td><?= strtoupper($data->nm_a) ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir Ayah</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($data->tgl_lahir_a) ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Ayah</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn_a ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ayah</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->pkrjn_a) ?></td>
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
                                    <td><?= strtoupper($data->nm_i) ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir Ibu</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($data->tgl_lahir_i) ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Ibu</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn_i ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ibu</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->pkrjn_i) ?></td>
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
                                    <td><?= strtoupper($data->nm_w) ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Wali</td>
                                    <td>:</td>
                                    <td><?= $data->pndkn_w ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Wali</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->pkrjn_w) ?></td>
                                </tr>
                                <tr>
                                    <td>Pendapatan Wali</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->pndptn_w) ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Wali</td>
                                    <td>:</td>
                                    <td><?= strtoupper($data->almt_w) ?></td>
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
                    <div class="col">
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
                                        <td><?= strtoupper($value->hubungan) ?></td>
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
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>SCAN FOTO SANTRI</strong><br><br>
                            <a class="btn btn-primary btn-sm" href="Cmembers/download_foto?file=<?= $data->foto_warna_santri ?> &nama=Foto_Diri_<?= str_replace(' ', '_', $data->nama) ?>" style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_warna_santri ?>?text=1" class="img-fluid mb-2" alt="SCAN FOTO SANTRI" style="" />
                        </div>
                        <div class="col-sm-4">
                            <strong>SCAN FOTO WALI SANTRI</strong><br><br>
                            <a class="btn btn-primary btn-sm" href="Cmembers/download_foto?file=<?= $data->foto_wali_santri_warna ?>&nama=Wali_<?= str_replace(' ', '_', $data->nama) ?>" style="width: 100%;"><i class="fas fa-arrow-circle-down"></i> Download</a><br><br>
                            <img src="<?= $data->foto_wali_santri_warna ?>?text=2" class="img-fluid mb-2" alt="SCAN FOTO WALI SANTRI" />
                        </div>
                        <div class="col-sm-4">
                            <strong>QRCODE</strong><br><br>

                            <a href="Cmembers/download?qr=<?= $data->qr_code ?>&nama=<?= $data->nama ?> " id="img_download" download="" class="btn btn-primary btn-sm" style="width: 100%;">
                                <i class="fas fa-download"></i> Download
                            </a><br><br>
                            <img src="https://ponpesnaa.net/gambar/qr_code/<?= $data->qr_code ?>" class="img-fluid mb-2" alt="QRCODE" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
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