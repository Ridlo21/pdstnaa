<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>KARTU PESANTREN</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 1cm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            margin: 0;
            color: #000;
            width: 29.7cm;
            height: 21cm;
            overflow: hidden;
        }

        table {
            border-collapse: collapse;
            page-break-inside: avoid;
        }

        .header {
            width: 100%;
        }

        .logo {
            width: 120px;
            text-align: center;
            vertical-align: middle;
        }

        .logo img {
            width: 120px;
        }

        .judul {
            text-align: center;
            padding-bottom: 10px;
            font-size: 15px;
        }

        .judul h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .niup {
            margin-top: 4px;
        }

        .data {
            width: 90%;
            margin: 0 auto;
        }

        .data td {
            padding: 4px 6px;
            /* jarak dalam kolom */
        }

        .label {
            width: 130px;
        }

        .separator {
            width: 10px;
        }

        .person {
            width: 100%;
            margin-top: 10px;
        }

        .tengah {
            padding: 6px 8px;
            text-align: center;
            vertical-align: middle;
        }

        .title {
            margin-top: 10px;
            margin-bottom: 4px;
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
    <table class="header">
        <tr>
            <td class="logo" rowspan="2">
                <img src="<?= site_url() ?>plugin/dist/img/logo_garis.png">
            </td>
            <td class="judul">
                <h2>KARTU PESANTREN</h2>
                <div class="niup">NIUP : <?= $data->niup; ?></div>
            </td>

        </tr>
        <tr>
            <!-- TABEL (DI BAWAH JUDUL, TETAP TENGAH HALAMAN) -->
            <td>
                <table class="data">
                    <tr>
                        <td class="label">NAMA WALI</td>
                        <td class="separator">:</td>
                        <td><?= $data->nm_w ?></td>
                        <td class="label">KECAMATAN</td>
                        <td class="separator">:</td>
                        <td><?= $data->nama_kecamatan ?></td>
                    </tr>
                    <tr>
                        <td class="label">ALAMAT</td>
                        <td class="separator">:</td>
                        <td><?= $data->almt_w ?></td>
                        <td class="label">KABUPATEN</td>
                        <td class="separator">:</td>
                        <td><?= $data->nama_kabupaten ?></td>
                    </tr>
                    <tr>
                        <td class="label">KODE POS</td>
                        <td class="separator">:</td>
                        <td><?= $data->pos_w ?></td>
                        <td class="label">PROVINSI</td>
                        <td class="separator">:</td>
                        <td><?= $data->nama_provinsi ?></td>
                    </tr>
                    <tr>
                        <td class="label">DESA/KELURAHAN</td>
                        <td class="separator">:</td>
                        <td><?= $data->nama_desa ?></td>

                    </tr>
                </table>
            </td>

        </tr>
    </table>

    <table class="person" border="1">
        <tr>
            <td class="tengah">NO</td>
            <td class="tengah">NAMA LENGKAP</td>
            <td class="tengah">NIK</td>
            <td class="tengah">TEMPAT LAHIR</td>
            <td class="tengah">TANGGAL LAHIR</td>
            <td class="tengah">DIVISI</td>
            <td class="tengah">LEMBAGA TUJUAN</td>
            <td class="tengah">ANAK KE</td>
            <td class="tengah">JUMLAH SDR</td>
            <td class="tengah">STATUS KELUARGA</td>
        </tr>
        <tr>
            <td class="tengah">1</td>
            <td><?= $data->nama ?></td>
            <td><?= $data->nik ?></td>
            <td><?= $data->tempat_lahir ?></td>
            <td class="tengah"><?= date('d/m/Y', strtotime($data->tanggal_lahir)) ?></td>
            <td><?= strtoupper($data_divisi->divisi) ?></td>
            <td><?= $data->pndkn ?></td>
            <td class="tengah"><?= $data->ank_ke ?></td>
            <td class="tengah"><?= $data->sdr ?></td>
            <td class="tengah"><?= strtoupper($data->dlm_klrg) ?></td>
        </tr>
    </table>

    <h4 class="title">DATA KELUARGA</h4>
    <table style="width: 50%;" border="1">
        <tr>
            <td class="tengah">NO</td>
            <td class="tengah">NAMA LENGKAP</td>
            <td class="tengah">PENDIDIKAN</td>
            <td class="tengah">PEKERJAAN</td>
            <td class="tengah">STATUS KELUARGA</td>
        </tr>
        <tr>
            <td class="tengah">1</td>
            <td><?= $data->nm_a ?></td>
            <td><?= strtoupper($data->pndkn_a) ?></td>
            <td><?= strtoupper($data->pkrjn_a) ?></td>
            <td>AYAH</td>
        </tr>
        <tr>
            <td class="tengah">2</td>
            <td><?= $data->nm_i ?></td>
            <td><?= strtoupper($data->pndkn_i) ?></td>
            <td><?= strtoupper($data->pkrjn_i) ?></td>
            <td>IBU</td>
        </tr>
    </table>

    <h4 class="title">DATA WALI</h4>
    <table style="width: 70%;" border="1">
        <tr>
            <td class="tengah" rowspan="2">NO</td>
            <td class="tengah" rowspan="2">NAMA LENGKAP</td>
            <td class="tengah" rowspan="2">PENDIDIKAN</td>
            <td class="tengah" rowspan="2">PEKERJAAN</td>
            <td class="tengah" rowspan="2">PENDAPATAN</td>
            <td class="tengah" colspan="2">NOMOR</td>
        </tr>
        <tr>
            <td class="tengah">WHATSAPP</td>
            <td class="tengah">TELEPON</td>
        </tr>
        <tr>
            <td class="tengah">1</td>
            <td><?= $data->nm_w ?></td>
            <td><?= strtoupper($data->pndkn_w) ?></td>
            <td><?= strtoupper($data->pkrjn_w) ?></td>
            <td><?= strtoupper($data->pndptn_w) ?></td>
            <td><?= $data->hp_w ?></td>
            <td><?= $data->telp_w ?></td>
        </tr>
    </table>

    <h4 class="title">DATA MAHROM</h4>
    <table style="width: 40%;" border="1">
        <tr>
            <td class="tengah">NO</td>
            <td class="tengah">NAMA LENGKAP</td>
            <td class="tengah">STATUS MAHROM</td>
        </tr>
        <?php
        $no = 1;
        foreach ($mahrom as $m) {
        ?>
            <tr>
                <td class="tengah"><?= $no++ ?></td>
                <td><?= strtoupper($m->nama_mahrom) ?></td>
                <td><?= strtoupper($m->hubungan) ?></td>
            </tr>
        <?php } ?>
    </table>

    <table style="margin-top: 10px; width: 30%;">
        <tr>
            <td>Dikeluarkan Tanggal&nbsp;:</td>
            <td>
                <div style="border: #000 solid 1px; width: 100%; height: 20px; display: flex; align-items: center; justify-content: center;">
                    <span><?= date('d/m/Y', strtotime($data->tgl_daftar)) ?></span>
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td class="tengah" style="width: 80%;"></td>
            <td>Alasbuluh, <?= tgl_indo(date('Y-m-d', strtotime($data->tgl_daftar))); ?>
            </td>
        </tr>
        <tr>
            <td class="tengah" style="width: 80%;">Wali Santri,</td>
            <td>Biro Kepesantrenan,</td>
        </tr>
        <tr>
            <td class="tengah" style="width: 80%;"></td>
            <td>
                <img src="<?= site_url() ?>plugin/dist/img/ttd.png" width="90" alt="">
            </td>
        </tr>
        <tr>
            <td class="tengah" style="width: 80%;"><b><?= $data->nm_w ?></b></td>
            <td>
                <span><u><b>K. MUHAMMAD, S.PD.</b></u></span>
                <br>
                <span><b>NIPY. 1983.15.08.2014.07</b></span>
            </td>
        </tr>
    </table>
</body>
<script>
    window.print();
    window.onfocus = setTimeout(function() {
        window.close();
    }, 1000);
</script>

</html>