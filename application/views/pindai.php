<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <title>PDST NAA | Detail Dokumen</title>

    <!-- Bootstrap 5 -->
    <link href="<?= site_url() ?>plugin/asset_pindai/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="<?= site_url() ?>plugin/asset_pindai/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: url('<?= site_url() ?>plugin/asset_pindai/img/naa.jpg') center/cover no-repeat fixed;
        }

        /* Navbar transparan */
        .navbar-transparent {
            background-color: rgba(0, 0, 0, 0);
            transition: background-color .3s ease;
        }

        .navbar-scrolled {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .overlay {
            background: rgba(0, 0, 0, .45);
            min-height: 100vh;
            padding: 120px 0 40px;
            /* ditambah supaya konten tidak ketutup navbar */
        }

        .card-doc {
            border-radius: 14px;
        }

        .check-circle {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: #1abc9c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 42px;
            margin: -70px auto 10px;
            border: 6px solid #fff;
        }

        .label {
            font-size: .8rem;
            color: #6c757d;
            text-transform: uppercase;
        }

        .value {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-transparent">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="<?= site_url() ?>plugin/asset_pindai/img/logo.png" alt="Logo" height="40" class="me-2">
            </a>
        </div>
    </nav>
    <div class="overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card card-doc shadow position-relative">
                        <div class="card-body pt-5">
                            <div class="position-absolute top-0 start-0 p-3">
                                <span class="badge bg-success">KARTU PESANTREN</span>
                                <span class="text-muted small">Pindai Dokumen • Terpusat</span>
                            </div>

                            <div class="check-circle mt-2">
                                <i class="bi bi-check-lg"></i>
                            </div>

                            <hr>

                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="label">Status Dokumen</div>
                                    <div class="value text-success"><?= strtoupper($santri->status) ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">NIUP</div>
                                    <div class="value"><?= $santri->niup ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Nama Santri</div>
                                    <div class="value"><?= strtoupper($santri->nama) ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Nama Ayah</div>
                                    <div class="value"><?= strtoupper($santri->nm_a) ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Nama Ibu</div>
                                    <div class="value"><?= strtoupper($santri->nm_i) ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Nama Wali</div>
                                    <div class="value"><?= strtoupper($santri->nm_w) ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Divisi</div>
                                    <div class="value"><?= strtoupper($santri->divisi) ?></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Penandatangan</div>
                                    <div class="value">K. MUHAMMAD, S.Pd</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="label">Tgl. Penandatanganan</div>
                                    <div class="value">
                                        <i class="bi bi-calendar"></i>
                                        <?= date('d-m-Y', strtotime($santri->tgl_daftar)) ?>
                                        &nbsp;
                                        <i class="bi bi-clock"></i>
                                        <?= date('H:i:s', strtotime($santri->tgl_daftar)) ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="small text-muted mb-0">
                                Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik
                                yang diterbitkan oleh Badan Administrasi Pondok Pesantren Nurul Abror Al-Robbaniyin –
                                PPNAA.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= site_url() ?>plugin/asset_pindai/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        document.addEventListener('contextmenu', e => e.preventDefault());

        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && (e.key === 'u' || e.key === 'U')) {
                e.preventDefault();
            }
            if (e.key === 'F12') {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>