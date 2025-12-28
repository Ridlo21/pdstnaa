<style type="text/css">
    .ui-autocomplete {
        z-index:1100 !important;
        position: absolute;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Divisi Madin </h1>
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <div class="container-fluid">
        <div class="container-fluid" >
            <form id="simpan_data_santri">
                <input type="hidden" name="tb" value="tb_divisimadin">
                <input type="hidden" name="divisi" value="madin">
                <div class="card">
                    <div class="body" style="padding:30px 25px;margin-bottom:-15px;margin-top: -10px" id="">
                        <div class="row clearfix">
                            <div class="col-md-2" >
                                <div class="form-line" style="margin-bottom:8px;">
                                    <span style=" font-size: 20px"> Cari Santri</span>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-line" style="margin-bottom:8px;">
                                    <input type="text" class="form-control search_santri" name="search_santri" id="search_santri" placeholder="Nama Santri Madin" autocomplete="off">
                                    <input type="hidden"id="nomor_urut_santri" name="nomor_urut_santri" value="0">
                                </div>
                            </div>
                            <div class="col-md-2" ></div>
                            <div class="col-md-4 " >
                                <div class="col "style="margin-bottom:7px;">
                                    <button type="button" class="btn btn-info waves-effect btn-sm" onclick="simpan_data();" ><i class="fa fa-save"></i>&nbsp;&nbsp; Simpan Data </button>
                                    <button type="button" class="btn btn-warning waves-effect btn-sm" onclick="refresh();"><i class="fas fa-sync"></i>&nbsp;&nbsp;  Refresh Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom:6px;">
                    <div class="body" style="padding:15px 25px;height:340px;overflow:auto;">
                        <table class="table table-sm table-hover" >
                            <thead class="">
                                <tr class="text-center">
                                    <th style="width: 15%;">Niup</th>                        
                                    <th style="width: 20%;">Nama Santri</th>
                                    <th > Alamat</th>
                                    <th >Tanggal Masuk</th>
                                </tr>
                            </thead >
                            <tbody id="data_santri">
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
$(function() {

        $('#search_santri').focus();
        $('#search_santri').on('input', function() {
            ui_data();
            $("#alamat").val("");
        });
    });

    $('#data_santri').on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#' + button_id + '').remove();
            var r = parseInt($('#nomor_urut_santri').val());
            var u = Math.round(r - 1);
            $("#nomor_urut_santri").val(u);
            $('#search_santri').focus();
    });

    function refresh() {
        $('#data_santri').html('');
        $('#nomor_urut_santri').val('0');
        $('#search_santri').focus();
    }

    function ui_data() {
        var row_no = parseInt($('#nomor_urut_santri').val());
        var id_nya =  Math.round(row_no + 1);

        $('#search_santri').autocomplete({
            minLength: 1,
            autoFocus: true,
            source: function(req, res) {
                $.ajax({
                    url: "<?= site_url('Cdivisi/ui_data') ?>",
                    data: {
                        cari: $('#search_santri').val()
                    },
                    dataType: 'json',
                    type: "POST",
                    success: function(data) {
                        res(data);
                    }
                });
            },
            select: function(event, ui) {
                var idb = $("input[name='id_person[]']").map(function () {
                    return $(this).val();
                }).get();
                if (idb.includes( ui.item.id_person ) === true) {
                    swal.fire({
							title: "Data Sudah Ada",
							type: "warning"
						}).then(okay => {
							if (okay) {
								$('#search_santri').focus();
							}
					});
                } else {
                    if (ui.item.sukses === true) {
                        if (id_nya > 10 ) {
                            swal.fire({
							title: "Baris Lebih Dari 10",
							type: "warning"
                                }).then(okay => {
                                    if (okay) {
                                        $('#search_santri').focus();
                                    }
                            });
                        } else {
                            $('#data_santri').append(
                                                '<tr class="text-center" id="' + id_nya + '">\n\
                                                <td><input readonly type="text" class="form-control form-control-sm barang"  value="' + ui.item.niup + '"></td>\n\
                                                <td><input readonly type="text" class="form-control form-control-sm barang"  value="' + ui.item.nama + '"></td>\n\
                                                <td><input readonly type="text" class="form-control form-control-sm barang" value="' + ui.item.alamat + '"></td>\n\
                                                <td><input  type="date" class="form-control form-control-sm date" name="tgl_mulai[]" id="brg' + id_nya + '" ></td>\n\
                                                <td ><button type="button" class="btn btn-danger  btn_remove btn-sm" id="' + id_nya + '"><i class="fa fa-times"></i> </button></td>\n\
                                                <input type="hidden" name="id_person[]" id="idb' + id_nya + '" value="' + ui.item.id_person + '" >\n\
                                                </tr>');
                            $("#search_santri").val('');
                            $("#nomor_urut_santri").val(id_nya);
                            return false;
                        }
                    }
                    return false;
                }
            },
            create: function() {
                $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
                    return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append("<a class='nav-link active'><strong>" + item.nama + "</strong> <br/><small>Niup : " + item.niup + "</small><br/><small>Alamat : " + item.alamat + "</small></a>")
                        .appendTo(ul);
                };
            }
        });
    }

    function simpan_data() {
            $.ajax({
                url: '<?= site_url('Cdivisi/simpan_data') ?>',
                type: 'POST',
                data: $('#simpan_data_santri').serialize(),
                dataType: "JSON",
                success: function (data) {
                    if (data.status === 1) {
                        swal.fire({
							title: data.pesan,
							type: "warning"
                                }).then(okay => {
                                    if (okay) {
                                        $('#search_santri').focus();
                                    }
                            });
                    } else if (data.status === 2) {
                        swal.fire({
							title: data.pesan,
							type: "success"
                                }).then(okay => {
                                    if (okay) {
                                        madin();
                                    }
                            });
                    } else {
                        swal.fire({
							title: data.pesan,
							type: "warning"
                                }).then(okay => {
                                    if (okay) {
                                    }
                            });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert(errorThrown);
                }
            });
    }

</script>