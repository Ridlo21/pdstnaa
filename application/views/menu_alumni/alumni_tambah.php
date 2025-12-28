<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Alumni</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Alumni</h3>
            </div>
            <div class="card-body">
                <form id="tambah_alumni">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_pengajar">Pilih Nama Santri</label>
                                <input type="text" class="form-control" name="nama_pengajar" id="nama_santri" placeholder="nama">
                                <input type="hidden" name="idperson" id="idperson">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">NIUP</label>
                                <input type="text" class="form-control" name="alamat_lengkap" id="alamat" placeholder="0000000000000000" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="col-form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control" name="tgl_berhenti">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-default" onclick="alumni()">Keluar</button>
                <button class="btn btn-sm btn-primary float-right" onclick="simpan_alumni()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        UI_santri();
        $('#nama_santri').focus();

    });

    function UI_santri() {
        var options = {
            url: "<?= site_url('Calumni/otomatis_santri'); ?>",
            getValue: "nama",
            list: {
                match: {
                    enabled: true
                },
                onKeyEnterEvent: function() {
                    var id = $("#nama_santri").getSelectedItemData().id_person;
                    $("#idperson").val(id).trigger("change");
                    var alamat = $("#nama_santri").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                },
                onClickEvent: function() {
                    var id = $("#nama_santri").getSelectedItemData().id_person;
                    $("#idperson").val(id).trigger("change");
                    var alamat = $("#nama_santri").getSelectedItemData().niup;
                    $("#alamat").val(alamat).trigger("change");
                }
            }
        };
        $("#nama_santri").easyAutocomplete(options);
    }

    function simpan_alumni() {
        $.ajax({
            url: "<?= site_url('Calumni/simpan_alumni') ?>",
            data: $('#tambah_alumni').serialize(),
            type: 'POST',
            dataType: 'JSON',
            success: function(data) {
                if (data.pesan === "ya") {
                    swal.fire({
                        title: "PDST NAA",
                        text: data.sukses,
                        type: "success"
                    }).then(okay => {
                        if (okay) {
                            alumni()
                        }
                    })
                }
            }
        });
    }
</script>