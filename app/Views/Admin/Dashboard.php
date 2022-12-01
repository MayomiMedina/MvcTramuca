<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('contenido'); ?>
  <br>
  <br>

    <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
     
      <div class="card-body">
        <h5 class="card-title">Productos más vendidos</h5>

    </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="../Image/camion.jpg" class="card-img-top" alt="...">
      <div class="card-body">
    <!--  <h5 class="card-title">Card title</h5> -->
        <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
        <script>
        Highcharts.chart('container',{
            chart: {
                type: 'column'
             
            },
            title: {
               				
                align: 'center',
                text: 'Los productos más comprados'
               
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
                    condition: { maxWidth: 300 },
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
      </div>
    </div>
  </div>
  
</div>


<?php $this->endSection(); ?>


<?php $this->section('js'); ?>

    <script src="<?= base_url(); ?>/build/code/highcharts.js"></script>
 
   
<?php $this->endSection(); ?>
