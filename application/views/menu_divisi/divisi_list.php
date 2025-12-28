<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Divisi</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-body table-responsive p-1">
            <table id="example" class="table table-hover text-nowrap ">
                <h3 class="card-title">
                    <button class="btn btn-sm btn-block bg-teal" id="btn-tambah">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </h3>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Divisi</th>
                        <th>Divisi</th>
                        <th>Penanggung Jawab</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="formDivisi" data-parsley-validate>
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="divisi">Divisi</label>
                            <input type="text" class="form-control" name="divisi" id="divisi" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penjab">Penanggung Jawab</label>
                            <input type="text" class="form-control" name="penjab" id="penjab" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                        Keluar</button>
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var table;

    function divisi() {
        table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ordering: false,
            info: false,
            lengthChange: false,
            ajax: {
                url: "<?= site_url('Cdivisi/get_data_divisi') ?>",
                type: "POST"
            },

            columnDefs: [{
                    targets: 0, // nomor urut
                    orderable: false
                },
                {
                    targets: -1, // tombol aksi
                    orderable: false
                }
            ]
        });
    }

    function infoDivisi(id) {
        $.post('<?= site_url('Cdivisi/info_divisi') ?>', {
            id: id
        }, function(Res) {
            $('#ini_isinya').html(Res);
        });
    }

    $(document).ready(function() {
        divisi();
        $("#btn-tambah").on('click', function() {
            $('#modal').modal('show');
            $('#formDivisi')[0].reset();
            $('#modalTitle').text('Tambah Divisi');
            $('#id').val('');
        });

        $('#example').on('click', '#bt-edit', function() {
            var id = $(this).attr('data');

            $.ajax({
                url: "<?= site_url('Cdivisi/getById') ?>",
                type: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(res) {

                    // isi form
                    $('#id').val(res.id_divisi);
                    $('#divisi').val(res.divisi);
                    $('#penjab').val(res.penjab);

                    // reset parsley
                    $('#formDivisi').parsley().reset();

                    // ubah judul modal
                    $('#modalTitle').text("EDIT DIVISI");

                    // buka modal
                    $('#modal').modal('show');
                }
            });
        });

        $('#formDivisi').parsley();
        $('#formDivisi').on('submit', function(e) {
            e.preventDefault();

            if (!$(this).parsley().isValid()) {
                return;
            }

            let id = $('#id').val();
            let url = id ? "<?= site_url('Cdivisi/edit_divisi') ?>" : "<?= site_url('Cdivisi/create_divisi') ?>";

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.status == 'success') {
                        $('#modal').modal('hide');
                        Swal.fire({
                            type: 'success',
                            title: response.pesan,
                            text: response.sukses,
                        }).then(okay => {
                            if (okay) {
                                menu_divisi()
                            }
                        })
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: response.pesan,
                            text: response.sukses,
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan pada server.',
                    });
                }
            });
        });

    })
</script>