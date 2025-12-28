
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dewan Pengasuh</h1>
            </div><div class="col-sm-5">
                <div class="float-right">
                    <div class="btn-group">
                        <a type="button" class="btn dropdown-icon btn-sm bg-teal" data-toggle="dropdown">Pdf
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?= site_url('Cexport/semua_pengasuh_pdf') ?>">Semua Dewan Pengasuh</a>
                                <a class="dropdown-item" href="<?= site_url('Cexport/pdf_pengasuh_putra') ?>">Dewan Pengasuh Putra</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url('Cexport/pdf_pengasuh_putri') ?>">Dewan Pengasuh Putri</a>
                            </div>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a type="button" class="btn btn-sm bg-teal dropdown-icon" data-toggle="dropdown">Excel
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?= site_url('export_dewan_pengasuh') ?>">Dewan Pengasuh</a>
                                <a class="dropdown-item" href="<?= site_url('Cdewan/dewan_pengasuh_putra') ?>">Dewan Pengasuh Putra</a>
                                <a class="dropdown-item" href="<?= site_url('Cdewan/dewan_pengasuh_putri') ?>">Dewan Pengasuh Putri</a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="contianer-fluid">
        <div class="card">
            <div class="card-body p-1">
                <h3 class="card-title"><a class="btn btn-block btn-sm bg-teal" href="#" onclick="tambah_dewan_pengasuh()"><i class="fas fa-plus "></i> Tambah Data</a></h3>
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                NAMA
                            </th>
                            <th>
                                ALAMAT
                            </th>
                            <th>
                                AKSI
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($santri as $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->alamat_lengkap ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm bg-teal dropdown-toggle dropdown-icon" data-toggle="dropdown">Aksi
                                            <span class="sr-only">Toggle Dropdown</span>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" onclick="detail_pengasuh('<?= $value->id_person ?>')">Detail</a>
                                                <a class="dropdown-item" href="#" onclick="form_edit_pengasuh('<?= $value->id_person ?>')">Edit</a>
                                            </div>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": false,
            "searching": true,
            "info": false,
            "autoWidth": true,
        });
        $('#example2').DataTable();
    });

    function tambah_dewan_pengasuh() {
        $.post('<?= site_url('tambah_dewan_pengasuh') ?>', function(Res) {
            $('#ini_isinya').html(Res);
        });
    }

    function form_edit_pengasuh(id) {
        $.post('<?= site_url('Cdewan/form_edit_pengasuh') ?>', {
            idperson: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
</script>