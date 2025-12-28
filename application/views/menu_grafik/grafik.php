<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Grafik</h1>

            </div>
            <div class="col-sm-6"><button class="float-right btn bg-teal" onclick="grafik_wilayah()"><i class="fas fa-columns"></i> Grafik Wilayah</button></div>
        </div>
    </div>
</section>
<section class="content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row float-right">
                                    <div class="row">
                                        <!-- <div class="col-8">
                                            <select name="" id="tahun" class="form-control  col-12">
                                                <?php
                                                for ($i = 2021; $i <= date("Y") + 10; $i++) { ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div> -->
                                        <div class="col-4">
                                            <button id="btn_print" onclick="printCanvas()" class="btn bg-teal float-right">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6> <span class="offset-5 text-bold span" style="color:dimgrey"> </span> </h6>
                                <div class="chart" id="graph-container">
                                    <canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(function() {
        grafik_tahun();

    })

    function grafik_wilayah() {
        $.post('<?= site_url('Cgrafik/grafik_wilayah') ?>', function(Res) {
            $('#ini_isinya').html(Res);
        });
    }




    function grafik_tahun() {
        $.ajax({
            url: "<?= site_url('Cgrafik/grafik_tahun') ?>",
            dataType: "json",
            success: function(data) {
                if (data.tahun == "kosong" && data.jml == "harap") {
                    alert('data kosong');
                } else {
                    grafik(data.tahun, data.jml);
                    $(".span").html('GRAFIK SANTRI PERTAHUN ANGKATAN');
                }
            }
        })
    }

    function grafik(tahun, jml) {
        var areaChartData = {
            labels: tahun,
            datasets: [{
                label: 'Total Santri',
                backgroundColor: '#1daf83',
                borderColor: 'rgba(115, 115, 115 , 0.9)',
                pointRadius: true,
                hoverBackgroundColor : '#65e6bf',
                pointStrokeColor: 'rgba(115, 115, 115 , 0.9)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(115, 115, 115 , 0.9)',
                data: jml
            }]
        };
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
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
    };


    function printCanvas() {
        var dataUrl = document.getElementById('barChart').toDataURL(); //attempt to save base64 string to server using this var  
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>'
        windowContent += '<head><title>Print</title></head>';
        windowContent += '<body>'
        windowContent += '<img src="' + dataUrl + '">';
        windowContent += '</body>';
        windowContent += '</html>';
        var printWin = window.open('_blank', 'width=340,height=260');
        printWin.document.open();
        printWin.document.write(windowContent);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
    }
</script>