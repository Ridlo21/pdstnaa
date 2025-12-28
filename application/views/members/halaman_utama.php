<div class="content-header">
    <div class="container">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Dashboard
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Baru <?= date('Y') ?></span>
                        <span class="info-box-number">
                            <?= $santriBaru ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Baru Putra <?= date('Y') ?></span>
                        <span class="info-box-number"><?= $putra ?></span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Baru Putri <?= date('Y') ?></span>
                        <span class="info-box-number"><?= $putri ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pendaftar Online <?= date('Y') ?></span>
                        <span class="info-box-number"><?= $psb ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>