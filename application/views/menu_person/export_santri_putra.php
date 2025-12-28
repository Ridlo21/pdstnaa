<?php 
header("Pragma: public");
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Data Santri Putra (export".date('d-m-Y').").xls")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" class="table table-bordered">
        <thead>
            <tr>
                <th>
                    NO
                </th>
                <th style="width: 300px;">
                    NIUP
                </th>
                <th>
                    NAMA
                </th>
                <th>
                    NIK
                </th>
                <th>
                    JENIS KELAMIN
                </th>
                <th>
                    TEMPAT LAHIR
                </th>
                <th>
                    TANGGAL LAHIR
                </th>
                <th>
                    ALAMAT
                </th>
                <th>
                    DESA
                </th>
                <th>
                    KECAMATAN
                </th>
                <th>
                    KABUPATEN
                </th>
                <th>
                    PROVINSI
                </th>
                <th>
                    KODE POS
                </th>
                <th>
                    SEKOLAH
                </th>
                <th>
                    NAMA AYAH
                </th>
                <th>
                    PENDIDIKAN AYAH
                </th>
                <th>
                    PEKERJAAN AYAH
                </th>
                <th>
                    NAMA IBU
                </th>
                <th>
                    PENDIDIKAN IBU
                </th>
                <th>
                    PEKERJAAN IBU
                </th>
                <th>
                    STATUS KELUARGA
                </th>
                <th>
                    ANAK KE
                </th>
                <th>
                    JUMLAH SAUDARA
                </th>
                <th>
                    NAMA WALI
                </th>
                <th>
                    PENDIDIKAN WALI
                </th>
                <th>
                    PEKERJAAN WALI
                </th>
                <th>
                    PENDAPATAN WALI
                </th>
                <th>
                    NO HANDPHONE WALI
                </th>
                <th>
                    NO TELEPHONE WALI
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($santri as $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->niup ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->nik ?></td>
                    <td><?= $value->jenis_kelamin ?></td>
                    <td><?= $value->tempat_lahir ?></td>
                    <td><?= date('d-M-Y', strtotime($value->tanggal_lahir)) ?></td>
                    <td><?= $value->alamat_lengkap ?></td>  
                    <td><?= $value->nama_desa ?></td>
                    <td><?= $value->nama_kecamatan ?></td>
                    <td><?= $value->nama_kabupaten ?></td>  
                    <td><?= $value->nama_provinsi ?></td>
                    <td><?= $value->pos ?></td>
                    <td><?= $value->pndkn ?></td>
                    <td><?= $value->nm_a ?></td>
                    <td><?= $value->pndkn_a ?></td>
                    <td><?= $value->pkrjn_a ?></td>
                    <td><?= $value->nm_i ?></td>
                    <td><?= $value->pndkn_i ?></td>
                    <td><?= $value->pkrjn_i ?></td>
                    <td><?= $value->dlm_klrg ?></td>
                    <td><?= $value->ank_ke ?></td>
                    <td><?= $value->sdr ?></td>
                    <td><?= $value->nm_w ?></td>
                    <td><?= $value->pndkn_w ?></td>
                    <td><?= $value->pkrjn_w ?></td>
                    <td><?= $value->pndptn_w ?></td>
                    <td><?= $value->hp_w ?></td>
                    <td><?= $value->telp_w ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>