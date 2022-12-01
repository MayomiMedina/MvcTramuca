<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>
<?php
$servidor="localhost";
$user="root";
$pass="";
$bd="autopartes_calidad";

$conexion= new mysqli($servidor,$user,$pass,$bd);

if($conexion->connect_errno){
    die("error al conectar".$conexion->connect_errno);
}

?>

<?php $this->section('contenido'); ?>
<div class="container-md-6 mx-3 bg-white shadow border">
    <h2 class="text-center pt-2">ALMACEN</h2>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalalmacen"> Registrar Almacen</button>

                    </div>


                    <div class="col-md-4 d-grid gap-1 pt-1">
                    <a  class="btn btn-info" href="<?=base_url();?>/AlmacenController/pdf"> Imprimir </a>
                    </div>
                    <p></p>                  
                    <table class="table table-striped table-bordered" id="tablapro">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>Fecha</th>
                        <th>Seccion</th>
                        <th>Producto</th>
                        <th>Codigo</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                      </tr>                      
                      </thead>
                      <tbody>
                        
                      <?php foreach($z as $pro):?>
                        <tr>
                            <td><?=$pro['fecha'];?></td>
                            <td><?=$pro['seccion'];?></td>
                            <td><?=$pro['producto'];?></td>                   
                            <td><?=$pro['codigo'];?></td> 
                            <td><?=$pro['stock'];?></td> 
                            <td><?=$pro['categoria'];?></td> 
                            <td><?=$pro['marca'];?></td> 
                            <td>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalalmacensupdate"
                                 data-bs-id="<?=$pro['id_almacen'];?>"
                                 data-bs-pro="<?=$pro['fecha'];?>"
                                 data-bs-sec="<?=$pro['seccion'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminaralmacen"
                              data-bs-id="<?=$pro['id_almacen'];?>"
                              data-bs-cod="<?=$pro['producto'];?>">
                              <i class="fa-solid fa-trash fa-2x"></i>                            
                              </button>                            
                          
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                    </table>
              
                
                </div>
            </div>
          </div>
        </div>

    </div>    
</div>

<script>
var tabla=document.querySelector("#tablapro");
var datatable=new DataTable(tabla);
</script> 

<div class="modal fade" id="eliminaralmacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url();?>/AlmacenController/borrar"?>

        <input type="hidden" class="form-control" id="id" name="id">

        

          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Eliminar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>

<div class="modal fade" id="modalalmacensupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url();?>/AlmacenController/editar"?>

        <input type="text" class="form-control" id="id" name="id">


        <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control date" id="fec" name="fec" autocomplete="off">
            <script type="text/javascript">
                        $(".date").datepicker({
                            format: "yyyy/mm/dd",
                        });
                    </script>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Seccion:</label>
            <input type="text" class="form-control" id="secc" name="secc" autocomplete="off">
          </div>

          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Producto</label>
            <select class="form-select" id="pro" name="pro" require >
            <?php 
              $consul="SELECT tb_compra.id_producto,tb_producto.producto 
              from tb_compra
              inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto
              group by tb_producto.producto";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
              }
            ?>                
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" id="pre" name="pre" autocomplete="off">
          </div>

          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>

<script>

    var exampleModal = document.getElementById('modalalmacensupdate')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var pro = button.getAttribute('data-bs-pro')
      var sec = button.getAttribute('data-bs-sec')


      var modalBodyInput = exampleModal.querySelector('#id')
      var nombre = exampleModal.querySelector('#fec')
      var secc = exampleModal.querySelector('#secc')


      modalBodyInput.value = recipient;
      secc.value=sec;
      nombre.value=pro;      

    })

    var elimip = document.getElementById('eliminaralmacen')
    elimip.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget

           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-cod')

           var modalBodyInput = elimip.querySelector('#id')
           var codigo = elimip.querySelector('#cod')
           var tituli =elimip.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar el codigo: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script>


<div class="modal fade" id="modalalmacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url();?>/AlmacenController/guardar"?>

        <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control date" id="fec" name="fec" autocomplete="off">
            <script type="text/javascript">
                        $(".date").datepicker({
                            format: "yyyy/mm/dd",
                        });
                    </script>
          </div>


          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Producto</label>
            <select class="form-select" id="pro" name="pro" require>   
            <?php 
              $consul="SELECT tb_compra.id_producto,tb_producto.producto 
              from tb_compra
              inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto
              group by tb_producto.producto";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
              }
            ?>              
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" id="pre" name="pre" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Seccion:</label>
            <input type="text" class="form-control" id="sec" name="sec" autocomplete="off">
          </div>

          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>
<?php $this->endSection(); ?>


<?php $this->section('js'); ?>
<?php $this->endSection(); ?>
