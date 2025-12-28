<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $pengurus->nama ?></h1>
            </div>
        </div>
    </div>
</section>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Detail Pengurus
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-2 text-center">
                                <img src="https://ponpesnaa.net/gambar/foto/<?= $pengurus->foto_warna_santri ?>" alt="user-avatar" class="img-bordered img-fluid ">
                            </div>
                            <div class="col-10">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><b>NAMA</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= $pengurus->nama ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>JABATAN</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= $pengurus->nm_jabatan ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>TANGGAL DIANGKAT</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= date('d-F-Y', strtotime($pengurus->tanggal_diangkat)) ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>TANGGAL BERHENTI</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= date('d-F-Y', strtotime($pengurus->tanggal_berhenti)) ?></b></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $tgl1 = new DateTime($pengurus->tanggal_diangkat);
                                            $tgl2 = new DateTime($pengurus->tanggal_berhenti);
                                            $jarak = $tgl2->diff($tgl1);
                                            ?>
                                            <td><b>MASA BAKTI</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= date('d-F-Y', strtotime($pengurus->tanggal_diangkat)) ?> S/D <?= date('d-F-Y', strtotime($pengurus->tanggal_berhenti)) ?> Atau <?php echo $jarak->y;
                                                                                                                                                                                        echo " Tahun"; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>STATUS</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= $pengurus->status ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--<div class="card-footer">-->
                    <!--    <button class="btn btn-sm btn-danger" onclick="menu_koordinator()">-->
                    <!--        <i class="fas fa-reply"></i> Kembali Ke Data Pengurus-->
                    <!--    </button>-->
                    <!--    <button class="btn btn-sm btn-primary float-right" onclick="bio_koordinator('<?= $pengurus->id_person ?>')">-->
                    <!--        <i class="fas fa-user"></i> Lihat Bio-->
                    <!--    </button>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    
</script>