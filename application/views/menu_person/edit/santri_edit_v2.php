<?php
$namaBulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
if (empty($ayah->tanggal_lahir)) {
    $waktu_a = "ko";
} else {
    $waktu_a =  explode("-", $ayah->tanggal_lahir);
}
if (empty($ibu->tanggal_lahir)) {
    $waktu_i = "ko";
} else {
    $waktu_i = explode("-", $ibu->tanggal_lahir);
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>Identitas Orang Tua dari <span class="text-danger"><?= $santri->nama ?></span></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="form_edit_santri_v2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK AYAH</label>
                                        <input type="number" name="nik_a" class="form-control" value="<?= empty($ayah->nik_m) ? "--" : $ayah->nik_m ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">NAMA AYAH</label>
                                        <input type="text" class="form-control" name="nm_a" value="<?= empty($ayah->nama_mahrom) ? "--" : $ayah->nama_mahrom ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL LAHIR AYAH</label>
                                        <select name="tanggal_lahir_a" id="" class="form-control">
                                            <option value="default">Pilih Tanggal</option>
                                            <?php
                                            for ($tg = 1; $tg < 32; $tg++) {
                                                if ($tg < 10) {
                                                    $tgl = "0" . $tg;
                                                } else {
                                                    $tgl = $tg;
                                                }
                                                if ($waktu_a[2] == $tg) {
                                            ?>
                                                    <option selected value="<?= $tg ?>"><?= $tg ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $tg ?>"><?= $tg ?></option>
                                            <?php
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BULAN LAHIR AYAH</label>
                                        <select name="bulan_lahir_a" id="" class="form-control">
                                            <option value="default">Pilih Bulan</option>
                                            <?php
                                            for ($bl = 1; $bl < 13; $bl++) {
                                                if ($bl < 10) {
                                                    $bulan = "0" . $bl;
                                                } else {
                                                    $bulan = $bl;
                                                }
                                                if ($waktu_a[1] == $bulan) {
                                            ?>
                                                    <option selected value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TAHUN LAHIR AYAH</label>
                                        <select name="tahun_lahir_a" id="" class="form-control">
                                            <option value="default">Pilih Tahun</option>
                                            <?php for ($th = 1900; $th < date("Y") + 5; $th++) {
                                                if ($waktu_a[0] == $th) {
                                            ?>
                                                    <option selected value="<?= $th ?>"><?= $th ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $th ?>"><?= $th ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PENDIDIKAN AYAH</label>
                                        <select class="form-control" name="pndkn_a" id="">
                                            <?php
                                            $pndkna1 = "";
                                            $pndkna2 = "";
                                            $pndkna3 = "";
                                            $pndkna4 = "";
                                            $pndkna5 = "";
                                            $pndkna6 = "";
                                            if ($santri->pndkn_a == "") {
                                                $pndkna1 = "selected";
                                                $pndkna2 = "";
                                                $pndkna3 = "";
                                                $pndkna4 = "";
                                                $pndkna5 = "";
                                                $pndkna6 = "";
                                            } elseif ($santri->pndkn_a == "SD") {
                                                $pndkna1 = "";
                                                $pndkna2 = "selected";
                                                $pndkna3 = "";
                                                $pndkna4 = "";
                                                $pndkna5 = "";
                                                $pndkna6 = "";
                                            } elseif ($santri->pndkn_a == "SLTP") {
                                                $pndkna1 = "";
                                                $pndkna2 = "";
                                                $pndkna3 = "selected";
                                                $pndkna4 = "";
                                                $pndkna5 = "";
                                                $pndkna6 = "";
                                            } elseif ($santri->pndkn_a == "SLTA") {
                                                $pndkna1 = "";
                                                $pndkna2 = "";
                                                $pndkna3 = "";
                                                $pndkna4 = "selected";
                                                $pndkna5 = "";
                                                $pndkna6 = "";
                                            } elseif ($santri->pndkn_a == "SARJANA") {
                                                $pndkna1 = "";
                                                $pndkna2 = "";
                                                $pndkna3 = "";
                                                $pndkna4 = "";
                                                $pndkna5 = "selected";
                                                $pndkna6 = "";
                                            } elseif ($santri->pndkn_a == "DLL") {
                                                $pndkna1 = "";
                                                $pndkna2 = "";
                                                $pndkna3 = "";
                                                $pndkna4 = "";
                                                $pndkna5 = "";
                                                $pndkna6 = "selected";
                                            }
                                            ?>
                                            <option <?= $pndkna1 ?> hidden value="default">-Pilih Pendidikan-</option>
                                            <option <?= $pndkna2 ?> value="SD">SD</option>
                                            <option <?= $pndkna3 ?> value="SLTP">SLTP</option>
                                            <option <?= $pndkna4 ?> value="SLTA">SLTA</option>
                                            <option <?= $pndkna5 ?> value="SARJANA">SARJANA</option>
                                            <option <?= $pndkna6 ?> value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP AYAH SESUAI KTP</label>
                                        <textarea name="alamat_a" id="" class="form-control"><?= empty($ayah->alamat_mahrom) ? "--" : $ayah->alamat_mahrom ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PEKERJAAN AYAH</label>
                                        <select class="form-control" name="pkrjn_a" id="">
                                            <?php
                                            if ($santri->pkrjn_a == "") {
                                                $pkrjna1 = "selected";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Petani") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "selected";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Wiraswasta") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "selected";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Nelayan") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "selected";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Guru") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "selected";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "PNS") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "selected";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "TNI") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "selected";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Polisi") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "selected";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Dokter") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "selected";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Buruh") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "selected";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Karyawan") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "selected";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "Pedagang") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "selected";
                                                $pkrjna13 = "";
                                            } elseif ($santri->pkrjn_a == "DLL") {
                                                $pkrjna1 = "";
                                                $pkrjna2 = "";
                                                $pkrjna3 = "";
                                                $pkrjna4 = "";
                                                $pkrjna5 = "";
                                                $pkrjna6 = "";
                                                $pkrjna7 = "";
                                                $pkrjna8 = "";
                                                $pkrjna9 = "";
                                                $pkrjna10 = "";
                                                $pkrjna11 = "";
                                                $pkrjna12 = "";
                                                $pkrjna13 = "selected";
                                            }
                                            ?>
                                            <option <?= $pkrjna1 ?> hidden value="default">-Pilih Pekerjaan-</option>
                                            <option <?= $pkrjna2 ?> value="Petani">Petani</option>
                                            <option <?= $pkrjna3 ?> value="Wiraswasta">Wiraswasta</option>
                                            <option <?= $pkrjna4 ?> value="Nelayan">Nelayan</option>
                                            <option <?= $pkrjna5 ?> value="Guru">Guru</option>
                                            <option <?= $pkrjna6 ?> value="PNS">PNS</option>
                                            <option <?= $pkrjna7 ?> value="TNI">TNI</option>
                                            <option <?= $pkrjna8 ?> value="Polisi">Polisi</option>
                                            <option <?= $pkrjna9 ?> value="Dokter">Dokter</option>
                                            <option <?= $pkrjna10 ?> value="Buruh">Buruh</option>
                                            <option <?= $pkrjna11 ?> value="Karyawan">Karyawan</option>
                                            <option <?= $pkrjna12 ?> value="Pedagang">Pedagang</option>
                                            <option <?= $pkrjna13 ?> value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIK IBU</label>
                                        <input type="number" name="nik_i" class="form-control" value="<?= empty($ibu->nik_m) ? "--" : $ibu->nik_m ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">NAMA IBU</label>
                                        <input type="text" class="form-control" name="nm_i" value="<?= empty($ibu->nama_mahrom) ? "--" : $ibu->nama_mahrom ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TANGGAL LAHIR IBU</label>
                                        <select name="tanggal_lahir_i" id="" class="form-control">
                                            <option value="default">Pilih Tanggal</option>
                                            <?php
                                            for ($tg = 1; $tg < 32; $tg++) {
                                                if ($tg < 10) {
                                                    $tgl = "0" . $tg;
                                                } else {
                                                    $tgl = $tg;
                                                }
                                                if ($waktu_i[2] == $tg) {
                                            ?>
                                                    <option selected value="<?= $tg ?>"><?= $tg ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $tg ?>"><?= $tg ?></option>
                                            <?php
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BULAN LAHIR IBU</label>
                                        <select name="bulan_lahir_i" id="" class="form-control">
                                            <option value="default">Pilih Bulan</option>
                                            <?php
                                            for ($bl = 1; $bl < 13; $bl++) {
                                                if ($bl < 10) {
                                                    $bulan = "0" . $bl;
                                                } else {
                                                    $bulan = $bl;
                                                }
                                                if ($waktu_i[1] == $bulan) {
                                            ?>
                                                    <option selected value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $bulan ?>"><?= $namaBulan[$bl] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TAHUN LAHIR IBU</label>
                                        <select name="tahun_lahir_i" id="" class="form-control">
                                            <option value="default">Pilih Tahun</option>
                                            <?php for ($th = 1900; $th < date("Y") + 5; $th++) {
                                                if ($waktu_i[0] == $th) {
                                            ?>
                                                    <option selected value="<?= $th ?>"><?= $th ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $th ?>"><?= $th ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PENDIDIKAN IBU</label>
                                        <select class="form-control" name="pndkn_i" id="">
                                            <?php
                                            $pndkni1 = "";
                                            $pndkni2 = "";
                                            $pndkni3 = "";
                                            $pndkni4 = "";
                                            $pndkni5 = "";
                                            $pndkni6 = "";
                                            if ($santri->pndkn_i == "") {
                                                $pndkni1 = "selected";
                                                $pndkni2 = "";
                                                $pndkni3 = "";
                                                $pndkni4 = "";
                                                $pndkni5 = "";
                                                $pndkni6 = "";
                                            } elseif ($santri->pndkn_i == "SD") {
                                                $pndkni1 = "";
                                                $pndkni2 = "selected";
                                                $pndkni3 = "";
                                                $pndkni4 = "";
                                                $pndkni5 = "";
                                                $pndkni6 = "";
                                            } elseif ($santri->pndkn_i == "SLTP") {
                                                $pndkni1 = "";
                                                $pndkni2 = "";
                                                $pndkni3 = "selected";
                                                $pndkni4 = "";
                                                $pndkni5 = "";
                                                $pndkni6 = "";
                                            } elseif ($santri->pndkn_i == "SLTA") {
                                                $pndkni1 = "";
                                                $pndkni2 = "";
                                                $pndkni3 = "";
                                                $pndkni4 = "selected";
                                                $pndkni5 = "";
                                                $pndkni6 = "";
                                            } elseif ($santri->pndkn_i == "SARJANA") {
                                                $pndkni1 = "";
                                                $pndkni2 = "";
                                                $pndkni3 = "";
                                                $pndkni4 = "";
                                                $pndkni5 = "selected";
                                                $pndkni6 = "";
                                            } elseif ($santri->pndkn_i == "DLL") {
                                                $pndkni1 = "";
                                                $pndkni2 = "";
                                                $pndkni3 = "";
                                                $pndkni4 = "";
                                                $pndkni5 = "";
                                                $pndkni6 = "selected";
                                            }
                                            ?>
                                            <option <?= $pndkni1 ?> hidden value="default">-Pilih Pendidikan-</option>
                                            <option <?= $pndkni2 ?> value="SD">SD</option>
                                            <option <?= $pndkni3 ?> value="SLTP">SLTP</option>
                                            <option <?= $pndkni4 ?> value="SLTA">SLTA</option>
                                            <option <?= $pndkni5 ?> value="SARJANA">SARJANA</option>
                                            <option <?= $pndkni6 ?> value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">ALAMAT LENGKAP IBU SESUAI KTP</label>
                                        <textarea name="alamat_i" class="form-control"><?= empty($ibu->alamat_mahrom) ? "--" : $ibu->alamat_mahrom ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PEKERJAAN IBU</label>
                                        <select class="form-control" name="pkrjn_i" id="">
                                            <?php
                                            $pkrjni1 = "";
                                            $pkrjni2 = "";
                                            $pkrjni3 = "";
                                            $pkrjni4 = "";
                                            $pkrjni5 = "";
                                            $pkrjni6 = "";
                                            $pkrjni7 = "";
                                            $pkrjni8 = "";
                                            $pkrjni9 = "";
                                            $pkrjni10 = "";
                                            $pkrjni11 = "";
                                            $pkrjni12 = "";
                                            $pkrjni13 = "";
                                            if ($santri->pkrjn_i == "") {
                                                $pkrjni1 = "selected";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Petani") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "selected";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Wiraswasta") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "selected";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Nelayan") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "selected";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Guru") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "selected";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "PNS") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "selected";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "TNI") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "selected";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Polisi") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "selected";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Dokter") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "selected";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Buruh") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "selected";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Karyawan") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "selected";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "Pedagang") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "selected";
                                                $pkrjni13 = "";
                                            } elseif ($santri->pkrjn_i == "DLL") {
                                                $pkrjni1 = "";
                                                $pkrjni2 = "";
                                                $pkrjni3 = "";
                                                $pkrjni4 = "";
                                                $pkrjni5 = "";
                                                $pkrjni6 = "";
                                                $pkrjni7 = "";
                                                $pkrjni8 = "";
                                                $pkrjni9 = "";
                                                $pkrjni10 = "";
                                                $pkrjni11 = "";
                                                $pkrjni12 = "";
                                                $pkrjni13 = "selected";
                                            }
                                            ?>
                                            <option <?= $pkrjni1 ?> value="default">-Pilih Pekerjaan-</option>
                                            <option <?= $pkrjni2 ?> value="Petani">Petani</option>
                                            <option <?= $pkrjni3 ?> value="Wiraswasta">Wiraswasta</option>
                                            <option <?= $pkrjni4 ?> value="Nelayan">Nelayan</option>
                                            <option <?= $pkrjni5 ?> value="Guru">Guru</option>
                                            <option <?= $pkrjni6 ?> value="PNS">PNS</option>
                                            <option <?= $pkrjni7 ?> value="TNI">TNI</option>
                                            <option <?= $pkrjni8 ?> value="Polisi">Polisi</option>
                                            <option <?= $pkrjni9 ?> value="Dokter">Dokter</option>
                                            <option <?= $pkrjni10 ?> value="Buruh">Buruh</option>
                                            <option <?= $pkrjni11 ?> value="Karyawan">Karyawan</option>
                                            <option <?= $pkrjni12 ?> value="Pedagang">Pedagang</option>
                                            <option <?= $pkrjni13 ?> value="DLL">DLL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="o" value="<?= $santri->id_person ?>">
                            <input type="hidden" name="a" value="<?= empty($ayah->id_mahrom) ? "0" : $ayah->id_mahrom ?>">
                            <input type="hidden" name="i" value="<?= empty($ibu->id_mahrom) ? "0" : $ibu->id_mahrom ?>">
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" onclick="menu_santri()"><i class="fas fa-reply"></i> Kembali Ke Data Santri</button>
                            <div class="float-right">
                                <button type="button" onclick="kembali_lun('<?= $santri->id_person ?>')" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</button>
                                <button class="btn btn-info">Simpan dan Lanjut <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function kembali_lun(id) {
        $.post('<?= site_url('Cperson/form_edit_santri') ?>', {
            o: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        })

    }

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");
    $("select").on("select2:close", function(e) {
        $(this).valid();
    });
    $('#form_edit_santri_v2').validate({
        rules: {
            nik_a: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nm_a: {
                required: true
            },
            tanggal_lahir_a: {
                valueNotEquals: "default"
            },
            bulan_lahir_a: {
                valueNotEquals: "default"
            },
            tahun_lahir_a: {
                valueNotEquals: "default"
            },
            pndkn_a: {
                valueNotEquals: "default"
            },
            pkrjn_a: {
                valueNotEquals: "default"
            },
            alamat_a: {
                required: true
            },
            nik_i: {
                required: true,
                maxlength: 16,
                minlength: 16
            },
            nm_i: {
                required: true
            },
            tanggal_lahir_i: {
                valueNotEquals: "default"
            },
            bulan_lahir_i: {
                valueNotEquals: "default"
            },
            tahun_lahir_i: {
                valueNotEquals: "default"
            },
            pndkn_i: {
                valueNotEquals: "default"
            },
            pkrjn_i: {
                valueNotEquals: "default"
            },
            alamat_i: {
                required: true
            }
        },
        messages: {
            nik_a: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nm_a: {
                required: "Tidak Boleh Kosong"
            },
            tanggal_lahir_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            bulan_lahir_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tahun_lahir_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pndkn_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pkrjn_a: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            alamat_a: {
                required: "Tidak Boleh Kosong"
            },
            nik_i: {
                required: "Tidak Boleh Kosong",
                maxlength: "NIK lebih dari 16 digit",
                minlength: "NIK kurang dari 16 digit"
            },
            nm_i: {
                required: "Tidak Boleh Kosong"
            },
            tanggal_lahir_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            bulan_lahir_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            tahun_lahir_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pndkn_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            pkrjn_i: {
                valueNotEquals: "Tidak Boleh Kosong"
            },
            alamat_i: {
                required: "Tidak Boleh Kosong"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        // highlight: function(element, errorClass, validClass) {
        //     $(element).addClass('is-invalid');
        // },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function() {
            $.ajax({
                url: "<?= site_url('Cperson/edit_santri_v2') ?>",
                data: $('#form_edit_santri_v2').serialize(),
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    var o = data.i;
                    $.post('<?= site_url('Cperson/form_edit_santri_3') ?>', {
                        o: o
                    }, function(Res) {

                        $('#ini_isinya').html(Res);
                    });
                }
            });
        }
    })
</script>