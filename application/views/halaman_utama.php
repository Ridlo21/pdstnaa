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
                    <span class="info-box-icon text-white elevation-2" style="background-color:#20c997;"><i class="fas fa-graduation-cap"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><?= $santri ?></span>
                        <span class="info-box-text">Santri Aktif</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon text-white elevation-2" style="background-color:#20c997;"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><?= $putra ?></span>
                        <span class="info-box-text">Santri Putra</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon text-white elevation-2" style="background-color:#20c997;"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><?= $putri ?></span>
                        <span class="info-box-text">Santri Putri</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                    <span class="info-box-icon text-white elevation-2" style="background-color:#20c997;"><i class="fas fa-user-graduate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number"><?= $pengurus ?></span>
                        <span class="info-box-text">Pengurus</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Santri Setiap Divisi</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="huhu" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        // var dataPHP = <?= json_encode($grafik_tahun_kelamin) ?>;
        // var tahun = dataPHP.map(d => d.tahun);
        // var pria = dataPHP.map(d => parseInt(d.laki));
        // var wanita = dataPHP.map(d => parseInt(d.perempuan));
        // var barChartCanvas = $('#barChart').get(0).getContext('2d');

        // var areaChartData = {
        //     labels: tahun,
        //     datasets: [{
        //             label: "Laki-Laki",
        //             backgroundColor: "rgba(54, 162, 235, 0.7)",
        //             data: pria
        //         },
        //         {
        //             label: "Perempuan",
        //             backgroundColor: "rgba(255, 99, 132, 0.7)",
        //             data: wanita
        //         }
        //     ]
        // }
        // var barChartData = jQuery.extend(true, {}, areaChartData);
        // var temp0 = areaChartData.datasets[0];
        // barChartData.datasets[0] = temp0;
        // var barChartOptions = {
        //     responsive: true,
        //     maintainAspectRatio: true,
        //     datasetFill: true,
        //     legend: {
        //         display: false
        //     }
        // };
        // var barChart = new Chart(barChartCanvas, {
        //     type: 'bar',
        //     data: barChartData,
        //     options: barChartOptions
        // });

        var dataServer = <?= json_encode($grafik_divisi_gender); ?>;
        var labels = dataServer.map(d => d.divisi);
        var laki = dataServer.map(d => d.laki);
        var perempuan = dataServer.map(d => d.perempuan);
        var areaChartData = {
            labels: labels,
            datasets: [{
                    label: 'Laki-Laki',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: laki
                },
                {
                    label: 'Perempuan',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: perempuan
                },
            ]
        }

        var barChartCanvas = $('#huhu').get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: true,
            datasetFill: false,
            legend: {
                display: false
            }
        };
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    })
</script>