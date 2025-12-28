<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <title>Kamar <?= $data_kamar->nama_kamar ?> <?= date('M')?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
    <style>
        * {
            font-family: Arial;
            font-size: 14px;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <table cellpadding="8" border="1">
            <thead>
                <tr>
                    <td colspan="4">
                        <h3><?= $data_kamar->nama_kamar ?></h3>
                    </td>
                </tr>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>NO HP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($p_kamar as $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td style="text-align:left"><?= $value->nama ?></td>
                        <?php
								$desa = $this->db->from('desa')
                                ->where('id', $value->desa)
                                ->get()
                                ->row();
                                
                                $kec = $this->db->from('kecamatan')
                                ->where('id', $value->kec)
                                ->get()
                                ->row();
                                
                                $kab = $this->db->from('kabupaten')
                                ->where('id', $value->kab)
                                ->get()
                                ->row();
								?>
                        <td><?= $value->alamat_lengkap ?> <?= $desa->name ?> <?= $kec->name ?> <?= $kab->name ?></td>
                        <td><?= $value->hp_w ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>

    <!-- jQuery -->
    <script src="<?= site_url() ?>plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= site_url() ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= site_url() ?>plugin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= site_url() ?>plugin/dist/js/demo.js"></script>
    <script>
        window.print();
        window.onfocus = setTimeout(function() {
            window.close();
        }, 1000);
    </script>
</body>

</html>