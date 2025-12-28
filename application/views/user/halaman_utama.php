<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon bg-primary elevation-2"><i class="fas fa-graduation-cap"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri</span>
                        <span class="info-box-number"><?= $santri ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon bg-secondary elevation-2"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Putra</span>
                        <span class="info-box-number"><?= $putra ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon bg-purple elevation-2"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Santri Putri</span>
                        <span class="info-box-number"><?= $putri ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon bg-indigo elevation-2"><i class="fas fa-user-graduate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengurus</span>
                        <span class="info-box-number"><?= $pengurus ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
foreach ($kamar as $jc) {
    $nama[] = $jc->nama_wilayah;
    $jmlsantri[] = $jc->jml;
}
?>
<script>
    $(function() {
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Pengurus',
                'Karyawan',
                'Pengajar'
            ],
            datasets: [{
                data: [<?= $pengurus ?>, <?= $karyawan ?>, <?= $pengajar ?>],
                backgroundColor: ['#4dc3ff', '#0099e6', '#1affff'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    })

    $(function() {
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var areaChartData = {
            labels: <?php echo json_encode($nama); ?>,
            datasets: [{
                label: 'Santri',
                backgroundColor: 'rgb(0, 153, 255)',
                borderColor: 'rgb(255, 255, 255)',
                pointRadius: true,
                pointColor: '#0099ff',
                pointStrokeColor: 'rgb(0, 153, 255)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(0, 153, 255)',
                data: <?php echo json_encode($jmlsantri); ?>
            }]
        }

        var barChartData = jQuery.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        barChartData.datasets[0] = temp0;
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: true,
            datasetFill: true
        };
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    });
</script>