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
    <title>SURAT PERNYATAAN WALI SANTRI</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
    <style>
        * {
            font-family: Arial;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div>
        <div style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">
            <h2>SURAT PERNYATAAN WALI SANTRI</h2><br>
            <p style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">Yang bertanda tangan di bawah ini, saya :</p><br>
            <table style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">
                <tr>
                    <td>Nama Lengkap </td>
                    <td>:</td>
                    <td><?= $data->nm_w ?></td>

                </tr>
                <tr>
                    <td>Alamat </td>
                    <td>:</td>
                    <td><?= $data->almt_w ?></td>
                </tr>
                <tr>
                    <td>Desa </td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_desa_w ?></td>
                </tr>
                <tr>
                    <td>Kecamatan </td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_kec_w ?></td>
                </tr>
                <tr>
                    <td>Kabupaten </td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_kab_w ?></td>
                </tr>
                <tr>
                    <td>Provinsi </td>
                    <td>:</td>
                    <td><?= $data_alamat->nama_prov_w ?></td>
                </tr>
                <tr>
                    <td>NO HP Wali </td>
                    <td>:</td>
                    <td><?= $data->hp_w ?></td>
                </tr>
                <tr>
                    <td>NO Telp </td>
                    <td>:</td>
                    <td><?= $data->telp_w ?></td>
                </tr>
            </table><br>
            <p style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">Menyatakan Dengan Sesungguhnya, Bahwa Saya : </p><br>

            <ul style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">
                <li>Memasrahkan sepenuhnya anak saya kepada pengasuh dan pengurus PPNAA</li>
                <li>Mendukung sepenuhnya seluruh program PPNAA untuk diikuti dan dipatuhi anak saya</li>
                <li>Mendukung sepenuhnya seluruh program MAKTAB NUBDZATUL BAYAN untuk diikuti dan dipatuhi anak saya</li>
                <li>Mendukung sepenuhnya seluruh program kegiatan Formal PPNAA untuk diikuti dan dipatuhi anak saya</li>
                <li>Sanggup melunasi berbagai kewajiban pembayaran keuangan</li>
                <li>Jika terjadi berbagai hal/peristiwa tentang anak saya, akan dikomunikasikan dengan pengurus PPNAA</li>
            </ul><br>
            <p style="font-size: 19px; font-family: 'Times New Roman', Times, serif; text-align: justify;">Demikian pernyataan ini saya buat dengan sadar, sungguh sungguh dan penuh tanggung jawab, jika kemudian hari ternyata saya tidak memenuhi pernyataan yang saya buat ini,
                maka saya bersedia dituntut sesuai dengan ketentuan yang berlaku.</p>
            <div class="float-right" style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">
                Banyuwangi, <?= tgl_indo(date('Y-m-d')); ?> <p>Yang Membuat pernyataan,</p> <br><br><br><br><br>
                <hr style="width: 200px;">
                <p>Orang Tua/Wali Santri</p>
            </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">Keterangan :</span>
            <ul style="font-size: 19px; font-family: 'Times New Roman', Times, serif;">
                <li>PPNAA : Pondok Pesantren Nurul Abror Al Robbaniyin.</li>
                <li>MAKTAB NUBDZATUL BAYAN : Program wajib untuk seluruh santri, yakni program akselerasi baca kitab kuning yang disingkat menjadi MAKTUBA.</li>
            </ul>
        </div>
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