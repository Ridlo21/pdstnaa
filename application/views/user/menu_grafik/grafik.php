<div class="content-header">
    <div class="container">
        <div class="row mt-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Grafik
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Santri Sesuai Blok</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
foreach ($kamar as $jc) {
    $nama[] = $jc->nama_kamar;
    $jmlkunjungan[] = $jc->jml;
}
?>

<script>
    $(function() {
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var areaChartData = {
            labels: <?php echo json_encode($nama); ?>,
            datasets: [{
                label: 'Orang',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: <?php echo json_encode($jmlkunjungan); ?>
            }]
        }

        var barChartData = jQuery.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0];
        barChartData.datasets[0] = temp0;
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        };
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    });
</script>