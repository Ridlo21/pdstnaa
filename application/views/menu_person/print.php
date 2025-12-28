<section class="content-header"></section>
<section class="content">
    <div class="container-fluid">
        <div class="row  mt-5">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4 class="text-danger"><b><?= $data->nama ?></b></h4>
                            <h4>[<?= $data->niup ?>]</h4>
                        </div>
                        <div class="card-tools">
                            <button onclick= "menu_santri()" class="btn bg-danger"> <i class="fa fa-reply"> </i> Kembali </button>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <div class="row">
                                    <a href="Cperson/cetak?id=<?= $data->id_person ?>" target="_blank" class="btn btn-sm btn-info col-12"><i class="fas fa-print"></i> PRINT FORMULIR PENDAFTARAN</a>
                                </div>
                                <div class="row mt-1">
                                    <a href="Cperson/cetak_p?id=<?= $data->id_person ?>" target="_blank" class="btn btn-sm btn-primary col-12"><i class="fas fa-print"></i> PRINT PERNYATAAN SANTRI</a>
                                </div>
                                <div class="row mt-1">
                                    <a href="Cperson/cetak_ws?id=<?= $data->id_person ?>" target="_blank" class="btn btn-sm btn-success col-12"><i class="fas fa-print"></i> PRINT PERNYATAAN ORANG TUA</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>