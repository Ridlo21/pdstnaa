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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDST NAA</title>
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <!-- <link rel="stylesheet" href="<?= site_url() ?>plugin/ekko-lightbox/ekko-lightbox.css"> -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/panah/style.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= site_url() ?>plugin/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/EasyAutocomplete/easy-autocomplete.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/EasyAutocomplete/easy-autocomplete.themes.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>plugin/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>plugin/Ionicons/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- <style>
		.main-sidebar,
		.main-sidebar::before {
			transition: margin-left .3s ease-in-out, width .3s ease-in-out;
			width: 200px;
		}

		body:not(.sidebar-mini-md) .content-wrapper,
		body:not(.sidebar-mini-md) .main-footer,
		body:not(.sidebar-mini-md) .main-header {
			transition: margin-left .3s ease-in-out;
			margin-left: 200px;
		}
	</style> -->

</head>

<body class="hold-transition sidebar-mini text-sm layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-teal elevation-1 border-bottom-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" style="color: #fff;"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="color: #fff;">
                        <h4>
                            <i class="fa fa-user-circle" style="margin-right: 5px;"></i>
							<span class="fa-pull-right" style="font-weight: bold; font-size: medium;"><?= $jabatan ?></span>
                        </h4>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-menu-left">
                        <span class="dropdown-item dropdown-header  ">
                            <h5>Profil</h5>
                        </span>
                        <div class="card-body pt-3 ">
                            <div class="row">
								<div class="col-7">
									<h3 class="lead"><b><?= $jabatan ?></b></h3>
									<!--<h6 class="widget-user-desc text-sm"><i class="small fas fa-lg fa-building"></i> <?= $alamat ?></h6>-->
									<!--<h6 class="widget-user-desc text-sm"><i class="small fas fa-lg fa-user"></i> <?= $jabatan ?></h6>-->
									<!-- <ul class="ml-4 mb-0 fa-ul text-muted ">
										<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> alamat</li><br>
										<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>ijnn</li>
									</ul> -->
								</div>
								<?php 
								    if ($foto == "") {
										$fotonya = "plugin/dist/img/person.png";
									}else{
									    $fotonya = $foto;
									}
								?>
								<div class="col-5 text-center circle">
									<img src="<?= $fotonya ?>" alt="" class="img-circle img-fluid elevation-1 " style="opacity: 2;">
								</div>
							</div>
                        </div>
                        <div class="card-footer">
                            <div class="text offset-4 ">
                                <a href="<?= site_url('clogin/logout') ?>" class="btn btn-sm bg-gradient-danger">
                                    <i class="fa fa-sign-out-alt"></i> Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
						<h4 class="widget-user-username txet-center"><?= $nama_user ?></h4>
						<h5 class="widget-user-desc">Ketua Umum</h5>
						<a href="<?= site_url('Clogin/logout') ?>" class="btn btn-danger btn-sm mt-4" style="margin-left: 90px;">Log-out</a>

					</div> -->
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-light-teal elevation-2">
            <a href="#" class="brand-link navbar-teal elevation-2 border-bottom-0" onclick="menu_halaman_utama()">
                <img src="<?= site_url() ?>plugin/dist/img/naa_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-4">
                <span class="brand-text" style="color: #fff;"><b>PDST NAA</b></span>
            </a>
            <div class="sidebar">
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link menu active" onclick="menu_halaman_utama()" style="color: #333;">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">DATA POKOK</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link menu" onclick="menu_santri()" style="color: #333;">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link menu" onclick="menu_kamar()" style="color: #333;">
                                <i class="nav-icon fas fa-person-booth"></i>
                                <p>
                                    Kamar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link menu" onclick="alumni()" style="color: #333;">
                                <i class="fas fa-walking nav-icon"></i>
                                <p>
                                    Alumni
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">LAPORAN DATA</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link menu" onclick="menu_grafik()" style="color: #333;">
                                <i class="fas fa-chart-pie nav-icon"></i>
                                <p>
                                    Grafik
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link menu" onclick="cetak_person()" style="color: #333;">
                                <i class="fas  fa-clipboard nav-icon"></i>
                                <p>
                                    Cetak Person
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper" id="ini_isinya">

        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= site_url() ?>plugin/jquery/jquery.min.js"></script>
    <script src="<?= site_url() ?>plugin/jquery/jQuery.print.min.js"></script>
    <script src="<?= site_url() ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Ekko Lightbox -->
    <!-- <script src="<?= site_url() ?>plugin/ekko-lightbox/ekko-lightbox.min.js"></script> -->
    <script src="<?= site_url() ?>plugin/dist/js/adminlte.min.js"></script>
    <script src="<?= site_url() ?>plugin/dist/js/demo.js"></script>
    <!-- date-range-picker -->
    <script src="<?= site_url() ?>plugin/moment/moment.min.js"></script>
    <script src="<?= site_url() ?>plugin/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?= site_url() ?>plugin/daterangepicker/daterangepicker.js"></script>

    <script src="<?= site_url() ?>plugin/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
    <script src="<?= site_url() ?>plugin/select2/js/select2.full.min.js"></script>
    <script src="<?= site_url() ?>plugin/chart.js/Chart.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= site_url() ?>plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= site_url() ?>plugin/jszip/jszip.min.js"></script>
    <script src="<?= site_url() ?>plugin/pdfmake/pdfmake.min.js"></script>
    <script src="<?= site_url() ?>plugin/pdfmake/vfs_fonts.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= site_url() ?>plugin/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= site_url() ?>plugin/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= site_url() ?>plugin/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= site_url() ?>plugin/jquery-validation/additional-methods.min.js"></script>
    <!-- sweetalert -->
    <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?= site_url() ?>plugin/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $(function() {
			menu_halaman_utama();
		});

		function menu_halaman_utama() {
			$.post('<?= site_url('halaman_utama') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}

		// Santri
		function menu_santri() {
			$.post('<?= site_url('santri') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End Santri
		// alumni
		function alumni() {
			$.post('<?= site_url('alumni') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// end alumni
		// Kamar
		function menu_kamar() {
			$.post('<?= site_url('kamar') ?>', function(Res) {
				$('#ini_isinya').html(Res);
			});
		}
		// End Kamar
        function menu_grafik() {
            $.post('<?= site_url('Cgrafik/grafik_wilayah') ?>', function(Res) {
                $('#ini_isinya').html(Res);
            });
        }

        function cetak_person() {
            $.post('<?= site_url('Cexport_pdf/cetak_person') ?>', function(Res) {
                $('#ini_isinya').html(Res);
            });
        }

        $(document).ready(function() {
            $('.menu').click(function() {
                // $('li').removeClass('menu-open');
                // $(this).addClass('menu-open');
                // if ($('ul li ').attr('class') === "menu-open") {
                // } else {
                // $('ul li ').addClass('');
                // }
                $('.menu').removeClass('active');
                $(this).addClass('active');
                $('ul').find('ul').css('display', 'none');
                $('ul').next('ul').css('display', 'block');
            });
        });
    </script>
</body>

</html>