<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('contenido'); ?>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
<?php $this->endSection(); ?>


<?php $this->section('js'); ?>
    <script src="<?= base_url(); ?>/build/code/highcharts.js"></script>
    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Los productos mas comprados'
            },
            subtitle: { text: '' },
            accessibility: {
                announceNewData: { enabled: true  }
            },
            yAxis: {
                title: {
                    text: 'Cantidad'
                }
            },

            xAxis: {
                categories:[<?= implode(', ', array_map(function ($p) : string  { return "'".($p->producto ?? '')."'"; }, $productosVendidos)); ?>]
            },

            legend: {
                enabled: false
            },

            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: { enabled: true, format: '' }
                }
            },

            series: [{
                name: 'productos',
                data: [<?= implode(', ', array_map(function ($p) : int { return ((int) ($p->suma ?? 0)); }, $productosVendidos)); ?> ]
            }],

            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
<?php $this->endSection(); ?>
