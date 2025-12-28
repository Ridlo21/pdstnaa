<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
} else {
    header("location:log-in");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">

    <title>PDST NAA</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
    <!-- datatable -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- select2 -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- icheck -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition layout-top-nav text-sm">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light navbar-teal p-0 elevation-3 border-bottom-0">
            <div class="container">
                <a href="#" onclick="menu_halaman_utama()" class="navbar-brand text-white">
                    <img src="<?= site_url() ?>plugin/dist/img/naa_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text">PDST NAA</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link text-center text-white" onclick="menu_halaman_utama()">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link text-center text-white" onclick="menu_santri()">
                                <i class="fas fa-user-graduate"></i>
                                <p>Data Santri</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#" style="color: #fff;">
                                <i class="far fa-user"></i> <b><?= $nama_members ?></b>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-2">
                                <div class="widget-user-header text-dark text-center">
                                    <h5 class="widget-user-desc text-center-block"><?= $nama_members ?></h5>
                                    <a href="<?= site_url('Clogin/logout') ?>" class="btn btn-danger btn-sm mt-4 text-center-block">Log-out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content-wrapper" id="ini_isinya">

        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= site_url() ?>plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= site_url() ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= site_url() ?>plugin/dist/js/adminlte.min.js"></script>
    <!-- select2 -->
    <script src="<?= site_url() ?>plugin/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables/jquery.dataTables.js"></script>
    <script src="<?= site_url() ?>plugin/select2/js/select2.full.min.js"></script>
    <script src="<?= site_url() ?>plugin/chart.js/Chart.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= site_url() ?>plugin/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(function() {
            menu_santri();
        });

        function menu_halaman_utama() {
            $.post('<?= site_url('Cmembers/halaman_utama') ?>', function(Res) {
                $('#ini_isinya').html(Res);
            });
        };

        function menu_santri() {
            $.post('<?= site_url('Cmembers/halaman_santri') ?>', function(Res) {
                $('#ini_isinya').html(Res);
            });
        }
    </script>

</body>

</html>