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
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <?= $divisi->divisi ?>
                            <small class="float-right">Tanggal: <?= date('d/m/Y') ?></small>
                        </h4>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <address>
                        </address>
                    </div>
                    <div class="col-sm-2 invoice-col">
                        <address>
                            <strong>Penanggung Jawab</strong><br>
                            <?= $divisi->penjab ?>
                        </address>
                    </div>
                    <div class="col-sm-2 invoice-col">
                        <address>
                            <strong>Seluruh Santri</strong><br>
                            <?= $total_person ?> Santri
                        </address>
                    </div>
                    <div class="col-sm-2 invoice-col">
                        <address>
                            <strong>Santri Putra</strong><br>
                            <?= $laki ?> Santri
                        </address>
                    </div>
                    <div class="col-sm-2 invoice-col">
                        <address>
                            <strong>Santri Putri</strong><br>
                            <?= $perempuan ?> Santri
                        </address>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div id="accordion">
                            <a class="btn btn-sm bg-teal mb-2" data-toggle="collapse" href="#collapseOne">
                                <i class="fas fa-plus"></i> Tambah Anggota
                            </a>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <form id="formDivisi" data-parsley-validate>
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label>Santri</label>
                                            <div class="input-group date">
                                                <input type="text" class="form-control datetimepicker-input" name="cari" id="cari" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                                                </div>
                                                <input type="hidden" id="nomor_urut_santri" name="nomor_urut_santri" value="0">
                                                <input type="hidden" name="id_divisi" value="<?= $divisi->id_divisi ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>NIUP</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data_santri">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a data-toggle="collapse" href="#collapseOne" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Tutup</a>
                                            <button type="button" class="btn btn-success btn-sm float-right" id="btnSimpan"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table id="table-santri" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIUP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row no-print mt-3">
                    <div class="col-12">
                        <button class="btn btn-danger" onclick="menu_divisi()"><i class="fas fa-reply"></i> Kembali</button>
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-success btn-flat"><i class="far fa-file-excel"></i> Export</button>
                            <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item export" data="Laki-Laki" style="cursor: pointer;">Laki-Laki</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item export" data="Perempuan" style="cursor: pointer;">Perempuan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="formHistoryDivisi" data-parsley-validate>
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="id_person" name="id_person">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama">Nama</label>
                            <input type="text" readonly class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="divisi">Divisi Tujuan</label>
                            <select class="form-control" name="divisi" id="divisi" required>
                                <option value="">Pilih Divisi</option>
                                <?php foreach ($divall as $value) { ?>
                                    <option value="<?= $value->id_divisi ?>"><?= $value->divisi ?></option>
                                <?php } ?>
                            </select>
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
    function santri() {
        $('#table-santri').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            info: false,
            lengthChange: false,
            order: [],
            ajax: {
                url: "<?= site_url('Cdivisi/getSantriData') ?>",
                type: "POST",
                data: {
                    id_divisi: "<?= $divisi->id_divisi ?>"
                }
            }
        });
    }

    function initAutocomplete() {
        // pastikan autocomplete lama dihancurkan
        if ($("#cari").data("ui-autocomplete")) {
            $("#cari").autocomplete("destroy");
        }

        $('#cari').autocomplete({
            minLength: 1,
            autoFocus: true,

            source: function(req, res) {
                $.ajax({
                    url: "<?= site_url('Cdivisi/ui_data') ?>",
                    type: "POST",
                    data: {
                        cari: $('#cari').val()
                    },
                    dataType: "json",
                    success: function(data) {
                        res(data);
                    }
                });
            },

            select: function(event, ui) {

                // Ambil semua id_person yang sudah ada
                const existing = $("input[name='id_person[]']")
                    .map(function() {
                        return $(this).val();
                    })
                    .get();

                // Cek duplikasi
                if (existing.includes(ui.item.id_person)) {
                    swal.fire({
                        title: "Data Sudah Ada",
                        type: "warning"
                    });
                    return false;
                }

                // Nomor baris
                let row_no = parseInt($('#nomor_urut_santri').val());
                let next_no = row_no + 1;

                if (next_no > 10) {
                    swal.fire({
                        title: "Baris Lebih Dari 10",
                        type: "warning"
                    });
                    return false;
                }

                if (ui.item.sukses === true) {
                    $("#data_santri").append(`
                    <tr class="text-center" id="${next_no}">
                        <td><input readonly type="text" class="form-control form-control-sm" value="${ui.item.niup}"></td>
                        <td><input readonly type="text" class="form-control form-control-sm" value="${ui.item.nama}"></td>
                        <td><input readonly type="text" class="form-control form-control-sm" value="${ui.item.alamat}"></td>
                        <td><input readonly type="date" name="tgl_mulai[]" class="form-control form-control-sm" value="${ui.item.tgl}"></td>
                        <td>
                            <button type="button" class="btn btn-danger btn_remove btn-sm" data-id="${next_no}">
                                <i class="fa fa-times"></i>
                            </button>
                            <input type="hidden" name="id_person[]" value="${ui.item.id_person}">
                        </td>
                    </tr>
                `);

                    $("#cari").val('');
                    $("#nomor_urut_santri").val(next_no);
                }

                return false;
            },

            create: function() {
                $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
                    return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append(
                            `<a class="nav-link active">
                            <strong>${item.nama}</strong><br>
                            <small>Niup : ${item.niup}</small><br>
                            <small>Alamat : ${item.alamat}</small>
                        </a>`
                        )
                        .appendTo(ul);
                };
            }
        });
    }

    function simpanData() {
        let formData = $("#formDivisi").serialize();

        $.ajax({
            url: "<?= site_url('Cdivisi/simpanHistoryDivisi') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(res) {

                if (res.status === true) {
                    Swal.fire({
                        type: "success",
                        title: "Berhasil",
                        text: "Data berhasil disimpan!"
                    }).then(() => {
                        $('#table-santri').DataTable().ajax.reload();
                    });

                    $("#data_santri").html('');
                    $("#nomor_urut_santri").val(0);

                } else {
                    Swal.fire({
                        type: "error",
                        title: "Gagal",
                        text: res.message
                    });
                }
            }
        });
    }

    $(document).ready(function() {

        // init table + autocomplete
        santri();
        initAutocomplete();

        $('#data_santri').on('click', '.btn_remove', function() {
            const id = $(this).data("id");
            $("#" + id).remove();

            let r = parseInt($('#nomor_urut_santri').val());
            $("#nomor_urut_santri").val(r - 1);
        });

        $("#btnSimpan").off().on("click", function() {
            simpanData();
        });

        $('#table-santri').on('click', '#bt-pindah', function() {
            let id = $(this).attr('data');

            $.ajax({
                url: "<?= site_url('Cdivisi/getHistoryById') ?>",
                type: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(res) {
                    $('#id').val(res.id);
                    $('#id_person').val(res.id_person);
                    $('#nama').val(res.nama);

                    $('#formHistoryDivisi').parsley().reset();
                    $('#modalTitle').text("PINDAH DIVISI");
                    $('#modal').modal('show');
                }
            });
        });

        $('#formHistoryDivisi').parsley();
        $('#formHistoryDivisi').on('submit', function(e) {
            e.preventDefault();

            if (!$(this).parsley().isValid()) return;

            $.ajax({
                url: "<?= site_url('Cdivisi/pindah_divisi') ?>",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(r) {
                    if (r.status === "success") {
                        $('#modal').modal('hide');
                        Swal.fire({
                            type: 'success',
                            title: r.pesan,
                            text: r.sukses,
                        }).then(() => {
                            $('#table-santri').DataTable().ajax.reload();
                        });

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: r.pesan,
                            text: r.sukses,
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

        $('.export').on('click', function() {
            let gender = $(this).attr('data');
            let divisi = "<?= $divisi->id_divisi ?>"
            let url = "<?= site_url('Cdivisi/cek_export') ?>"
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    gender: gender,
                    divisi: divisi
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = "<?= site_url('/') ?>";
                        window.open("Cdivisi/export_divisi?gender=" + gender + "&divisi=" + divisi, '_self');
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: "Gagal",
                            text: response.pesan,
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

    });
</script>