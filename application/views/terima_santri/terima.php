<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Terima Santri Online</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card col-12">
                <div class="card-body p-1">
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>
                                    NO REGISTRASI
                                </th>
                                <th>
                                    NAMA
                                </th>
                                <th>
                                    AKSI
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($psb as $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->no_regristrasi ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td>
                                        <button class="btn bg-teal btn-sm" onclick="terima('<?= $value->token ?>')"><i class="fas fa-save"> Simpan</i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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

    function terima(id) {
        $.post('<?= site_url('Cterima/form_terima') ?>', {
            idpsb: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }
</script>