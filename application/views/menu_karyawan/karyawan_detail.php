<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $nama ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Detail Karyawan
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-2 text-center">
                                <img src="https://ponpesnaa.net/gambar/foto/<?= $foto_warna_santri ?>" alt="user-avatar" class="img-bordered img-fluid ">
                            </div>
                            <div class="col-10">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><b>NAMA</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= $nama ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>INSTANSI</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= $instansi ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>TANGGAL DIANGKAT</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= date('d-F-Y', strtotime($tgl_diangkat)) ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>TANGGAL BERHENTI</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= date('d-F-Y', strtotime($tgl_berhenti)) ?></b></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $tgl1 = new DateTime($tgl_diangkat);
                                            $tgl2 = new DateTime($tgl_berhenti);
                                            $jarak = $tgl2->diff($tgl1);
                                            ?>
                                            <td><b>MASA BAKTI</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= date('d-F-Y', strtotime($tgl_diangkat)) ?> S/D <?= date('d-F-Y', strtotime($tgl_berhenti)) ?> Atau <?php echo $jarak->y;
                                                                                                                                                            echo " Tahun"; ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>STATUS</b></td>
                                            <td><b>&nbsp;:&nbsp;</b></td>
                                            <td><b><?= $status ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-danger" onclick="karyawan()">
                            <i class="fas fa-reply"></i> Kembali Ke Data Karyawan
                        </button>
                        <button class="btn btn-sm btn-primary float-right" onclick="bio_karyawan('<?= $id_person ?>')">
                            <i class="fas fa-user"></i> Lihat Bio
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function bio_karyawan(id) {
        $.post('<?= site_url('Ckaryawan/detail_santri') ?>', {
            idperson: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
</script>