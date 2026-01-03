<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Boyong</title>

    <style>
        img {
            display: block;
            margin-bottom: 5px;
        }

        .judul {
            text-decoration: underline;
            font-family: "Times New Roman", Times, serif;
            font-size: 19px;
            font-weight: bold;
        }

        .nomor {
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
        }

        .isi {
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
            line-height: 1.15;
            text-align: justify;
        }

        .biodata {
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
            width: 100%;
        }
    </style>
</head>

<body>
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
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
    <img src="<?= site_url() ?>plugin/dist/img/kop.JPG" width="100%" alt="Kop">

    <div style="text-align: center; margin-bottom: 5px;">
        <span class="judul">SURAT KETERANGAN BERHENTI</span><br>
        <span class="nomor">No : YNAA-10/001/SK/<?= $data_boyong->id_alumni ?>/<?= date('m-Y', strtotime($data_boyong->tgl_berhenti)) ?></span>
    </div>

    <div>
        <p class="isi">Yang bertanda tangan di bawah ini, kami Pengurus Pondok Pesantren Nurul Abror Al-Robbaniyin. Menerangkan bahwa :</p>
        <table class="biodata">
            <tr>
                <td style="height: 30px; width: 20%;">NIUP</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= $data->niup ?></td>
            </tr>
            <tr>
                <td style="height: 30px; width: 20%;">Nama</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= strtoupper($data->nama) ?></td>
            </tr>
            <tr>
                <td style="height: 30px; width: 20%;">Tempat Tanggal Lahir</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= strtoupper($data->tempat_lahir) ?>, <?= tgl_indo(date('Y-m-d', strtotime($data->tanggal_lahir))) ?></td>
            </tr>
            <tr>
                <td style="height: 30px; width: 20%;">Pendidikan Terakhir</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= strtoupper($data->pndkn) ?></td>
            </tr>
            <tr>
                <td style="height: 30px; width: 20%;">Divisi/Kamar</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= (!empty($data_divisi->divisi)) ? $data_divisi->divisi : '-' ?></td>
            </tr>
            <tr>
                <td style="height: 30px; width: 20%;">Orang Tua/Wali</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= strtoupper($data->nm_w) ?></td>
            </tr>
            <tr>
                <td style="height: 30px; width: 20%;">Alamat</td>
                <td style="height: 30px; width: 2%;">:</td>
                <td style="height: 30px; width: 68%;"><?= $data_alamat->nama_desa_w . ' ' . $data_alamat->nama_kec_w . ' ' . $data_alamat->nama_kab_w ?></td>
            </tr>
        </table>
        <p class="isi">Sejak tanggal <?= tgl_indo(date('Y-m-d', strtotime($data_boyong->tgl_berhenti))); ?> berhenti atau keluar dari Pondok Pesantren Nurul Abror Al-Robbaniyin Alasbuluh Wongsorejo Banyuwangi.</p>
        <p class="isi">Demikian Surat Keterangan ini dibuat dengan sebenarnya dan digunakan sebagaimana mestinya.</p>
        <table style="width: 100%;">
            <tr>
                <td style="width: 40%;"></td>
                <td style="width: 20%;"></td>
                <td style="width: 40%;">Alasbuluh, <?= tgl_indo(date('Y-m-d', strtotime($data_boyong->tgl_berhenti))); ?></td>
            </tr>
            <?php
            if (!empty($data_divisi->divisi)) {
                if ($data_divisi->id_divisi == 1) {
                    $penanggung = 'K. MUHAMMAD, S.Pd.';
                    $nip_penanggung = 'NIPY. 1983.15.08.2014.07';
                } elseif ($data_divisi->id_divisi == 2) {
                    $penanggung = 'KH. ABDUL MAJID';
                    $nip_penanggung = 'NIPY. 1978.26.03.2010.02';
                } elseif ($data_divisi->id_divisi == 3) {
                    $penanggung = 'KH. INDI AUNULLAH, SS, S.Fil.';
                    $nip_penanggung = 'NIPY. 1981.26.03.2010.03';
                } else {
                    $penanggung = 'K. ACHMAD ERFAN, S.Pd.';
                    $nip_penanggung = 'NIPY. 1983.10.05.2010.12';
                }
            }
            ?>
            <?= (!empty($data_divisi->divisi)) ? '
            <tr>
                <td style="width: 40%;">Ketua Umum,</td>
                <td style="width: 20%;"></td>
                <td style="width: 40%;">Penanggung Jawab Divisi,</td>
            </tr>
            <tr>
                <td style="width: 40%; height: 100px; vertical-align: bottom;"><span><b><u>MOHAMMAD MUHLIS, S. Kom.</u></b><br>NIUP. 0111160619990009</span></td>
                <td style="width: 20%; height: 100px; vertical-align: bottom;"></td>
                <td style="width: 40%; height: 100px; vertical-align: bottom;"><span><b><u>' . $penanggung . '</u></b><br>' . $nip_penanggung . '</span></td>
            </tr>
            <tr>
                <td colspan="3" style="width: 20%; text-align: center;">Mengetahui,</td>
            </tr>
            <tr>
                <td style="width: 40%;">Biro Kepesantrenan,</td>
                <td style="width: 20%; text-align: center;"></td>
                <td style="width: 40%;">Pengasuh,</td>
            </tr>
            <tr>
                <td style="width: 40%; height: 100px; vertical-align: bottom;"><span><b><u>K. MUHAMMAD, S.Pd.</u></b><br>NIPY. 1983.15.08.2014.07</span></td>
                <td style="width: 20%; height: 100px; vertical-align: bottom;"></td>
                <td style="width: 40%; height: 100px; vertical-align: bottom;"><span><b><u>KH. FADLURRAHMAN ZAINI, BA.</u></b><br>NIPY. 1939.25.04.2010.01</span></td>
            </tr>
            ' : '<tr>
                <td style="width: 40%;">Ketua Umum,</td>
                <td style="width: 20%;"></td>
                <td style="width: 40%;">Biro Kepesantrenan,</td>
            </tr>
            <tr>
                <td style="width: 40%; height: 100px; vertical-align: bottom;"><span><b><u>MOHAMMAD MUHLIS, S. Kom.</u></b><br>NIUP. 0111160619990009</span></td>
                <td style="width: 20%; height: 100px; vertical-align: bottom;"></td>
                <td style="width: 40%; height: 100px; vertical-align: bottom;"><span><b><u>K. MUHAMMAD, S.Pd.</u></b><br>NIPY. 1983.15.08.2014.07</span></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Mengetahui,</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">Pengasuh,</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; height: 100px; vertical-align: bottom;"><span><b><u>KH. FADLURRAHMAN ZAINI, BA.</u></b><br>NIPY. 1939.25.04.2010.01</span></td>
            </tr>' ?>

        </table>
    </div>

    <script>
        window.print();
        window.onfocus = setTimeout(function() {
            window.close();
        }, 1000);
    </script>
</body>

</html>