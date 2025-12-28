<?php 
header("Pragma: public");
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Dewan Pengasuh Putri(export".date('d-m-Y').").xls")
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
                    NAMA AYAH
                </th>
                <th>
                    NAMA IBU
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
                                <td><?= $value->alamat_lengkap ?></td>  
                                <td><?= $value->nama_desa ?></td>
                                <td><?= $value->nama_kecamatan ?></td>
                                <td><?= $value->nama_kabupaten ?></td>  
                                <td><?= $value->nama_provinsi ?></td>
                                <td><?= $value->pos ?></td>
                                <td><?= $value->nm_a ?></td>  
                                <td><?= $value->nm_i ?></td>
                            </tr>
                        <?php } ?>
        </tbody>
    </table>
</body>
</html>

