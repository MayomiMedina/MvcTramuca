<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

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
                    <a  class="btn btn-info" href="../pdf/almacen.php"> Imprimir </a>
                    </div>
                    <p></p>                  
                    <table class="table table-striped table-bordered">
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
                     <!--  <?php 
                      //  $consul="SELECT tb_almacen.id_almacen,
                      //  tb_almacen.id_producto,tb_almacen.fecha,tb_almacen.seccion,
                     //   tb_producto.producto,
                     //   tb_producto.stock,
                      //  tb_producto.categoria,tb_producto.marca,tb_producto.codigo
                      //  from tb_almacen
                     ////   inner join tb_producto on tb_almacen.id_producto=tb_producto.id_producto";
                     //   $resul=mysqli_query($conexion,$consul);
                     //   while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>                            
                            <td><?php //echo $row['fecha'];?></td>
                            <td><?php //echo $row['seccion'];?></td>
                            <td><?php //echo $row['producto'];?></td>  
                            <td><?php //echo $row['codigo'];?></td>
                            <td><?php // echo $row['stock'];?></td>
                            <td><?php //echo $row['categoria'];?></td>
                            <td><?php //echo $row['marca'];?></td>
                            <td><button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalalmacensupdate"
                                 data-bs-id="<?php //echo $row['id_almacen'];?>"
                                 data-bs-pro="<?php //echo $row['fecha'];?>"
                                 data-bs-sec="<?php // echo $row['seccion'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminaralmacen"
                              data-bs-id="<?php //echo $row['id_almacen'];?>"
                              data-bs-cod="<?php //echo $row['producto'];?>">
                              <i class="fa-solid fa-trash fa-2x"></i>                            
                              </button>
                            </td>
                        </tr>
                    <?php
                    //}
                    ?> -->
                      </tbody>
                    </table>
              
                
                </div>
            </div>
          </div>
        </div>

    </div>    
</div>

<div class="modal fade" id="eliminaralmacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/almacenelimi.php">

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
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/almacenupdate.php">

        <input type="hidden" class="form-control" id="id" name="id">


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
           <!--  <?php 
            //  $consul="SELECT tb_compra.id_producto,tb_producto.producto 
           //   from tb_compra
           //   inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto";
           //   $resul=mysqli_query($conexion,$consul);
          //    while($row=mysqli_fetch_assoc($resul)){
           //     echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
            //  }
            ?> -->            
            </select>
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
      nombre.value=pro;
      secc.value=sec;

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
        <form method="POST" action="../codigos/almacenreg.php">

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
       <!--      <?php 
           //   $consul="SELECT tb_compra.id_producto,tb_producto.producto 
           //   from tb_compra
            //  inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto
            //  group by tb_producto.producto";
            //  $resul=mysqli_query($conexion,$consul);
            //  while($row=mysqli_fetch_assoc($resul)){
            //    echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
            //  }
            ?>  -->           
            </select>
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
