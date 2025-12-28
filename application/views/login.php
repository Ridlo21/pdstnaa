<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/css/owl.carousel.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="<?= site_url() ?>plugin/asset/css/style.css">

    <title>PDST NAA</title>
    <style>
        #toggle {
            position: absolute;
            top: 30px;
            right: 10px;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background: url(plugin/dist/img/show.png);
            background-size: cover;
            cursor: pointer;
        }

        #toggle.hide {
            background: url(plugin/dist/img/hide.png);
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="<?= site_url() ?>plugin/asset/images/PDST.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3><strong>Selamat Datang</strong></h3>
                                <p class="mb-4">Di Pusat Data Santri Terpadu Pondok Pesantren Nurul Abror Al-Robbaniyin.</p>
                            </div>
                            <form id="formLogin">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                                    <div id="toggle" onclick="showHide();"></div>
                                </div>
                                <script>
                                    var password = document.getElementById('password');
                                    var toggle = document.getElementById('toggle');

                                    function showHide() {
                                        if (password.type === 'password') {
                                            password.setAttribute('type', 'text');
                                            toggle.classList.add('hide')
                                        } else {
                                            password.setAttribute('type', 'password');
                                            toggle.classList.remove('hide')
                                        }
                                    }
                                </script>
                                <input type="submit" value="Masuk" id="masuk" class="btn text-white btn-block btn-primary mt-5">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="<?= site_url() ?>plugin/asset/js/jquery-3.3.1.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset/js/popper.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= site_url() ?>plugin/asset/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $("#username").focus();
            $('#formLogin').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('Clogin/auth') ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(res) {
                        if (res.status == 'success') {
                            Swal.fire({
                                type: 'success',
                                title: 'Login Berhasil',
                                text: 'Selamat datang',
                            }).then(() => {
                                window.location.href = res.redirect;
                            });
                        } else if (res.status == 'expired') {
                            Swal.fire({
                                type: 'warning',
                                title: 'Akses Ditolak',
                                text: res.message
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Login Gagal',
                                text: res.message
                            });
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>