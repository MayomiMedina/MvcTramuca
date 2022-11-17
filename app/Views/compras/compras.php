<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('contenido'); ?>
<div class="container-md-6 mx-3 bg-white shadow border">
    <h2 class="text-center pt-2">Lista de compras</h2>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalcompras"> Registrar Compra</button>

                    </div>

             

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <a  class="btn btn-info" href="../pdf/compraspdf.php"> Imprimir </a>
                    </div>
                    <p></p>
                    <table  class="table table-striped" >
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>Código</th>
                        <th>Nombre del producto</th>
                        <th>Num_comprobante</th>
                        <th>Cliente </th>
                        <th>Fecha de compra</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                  <!--     <?php 
                      //  $consul="SELECT tb_compra.idcompra,tb_producto.producto,tb_producto.codigo,
                      //  tb_compra.numcomproban,tb_compra.fecha,tb_compra.cantidad,tb_compra.precio,tb_compra.total,
                      //  tb_cliente.nombre
                       // from ((tb_compra
                       // inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto)
                       // inner join tb_cliente on tb_compra.id_cliente=tb_cliente.id_cliente)";
                       // $resul=mysqli_query($conexion,$consul);
                       // while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>
                            <td><?php //echo $row['codigo'];?></td>
                            <td><?php //echo $row['producto'];?></td>
                            <td><?php //echo $row['numcomproban'];?></td> 
                            <td><?php //echo $row['nombre'];?></td>
                            <td><?php //echo $row['fecha'];?></td>
                            <td><?php //echo $row['cantidad'];?></td>
                            <td><?php //echo $row['precio'];?></td>
                            <td><?php // echo ($row['precio']*$row['cantidad']);?></td>                                                    
                            <td><button type="button" title="Editar" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalcomprasupdate"
                                 data-bs-id="<?php //echo $row['idcompra'];?>"
                                 data-bs-cod="<?php //echo $row['codigo'];?>"
                                 data-bs-pro="<?php //echo $row['producto'];?>"
                                 data-bs-num="<?php //echo $row['numcomproban'];?>"
                                 data-bs-fec="<?php //echo $row['fecha'];?>"
                                 data-bs-can="<?php //echo $row['cantidad'];?>"
                                 data-bs-cli="<?php //echo $row['nombre'];?>"
                                 data-bs-pre="<?php //echo $row['precio'];?>"
                                 data-bs-tot="<?php //echo ($row['precio']*$row['cantidad']);?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>
                                 
                              </button>
                            <button type="button" title="Eliminar" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminar"
                              data-bs-id="<?php //echo $row['idcompra'];?>"
                              data-bs-cod="<?php //echo $row['codigo'];?>">
                              <i class="fa-solid fa-trash fa-2x"></i>                            
                              </button>
                            </td>
                        </tr>
                    <?php
                  //  }
                    ?> -->
                      </tbody>
                    </table>
              
                
                </div>
            </div>
          </div>
        </div>

    </div>    
</div>


<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/compraelimi.php">          
              <input type="hidden" class="form-control" id="idcompra" name="idcompra">
              
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>            
        </form>
      </div>   
      </div>
  </div>
</div>


<div class="modal fade" id="modalcomprasupdate" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/compraupdate.php">
          
            <input type="hidden" class="form-control" id="idcompra" name="idcompra">
        <div class="row">            
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="cod" name="cod" autocomplete="off">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <select class="form-select" id="Nom" name="Nom" required="" autocomplete="off">
          <!--   <?php 
             // $consul="SELECT * from tb_producto";
             // $resul=mysqli_query($conexion,$consul);
             // while($row=mysqli_fetch_assoc($resul)){
             //   echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
             // }
            ?> -->
            </select>
           </div>
        </div>
        
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" required="">
          <!--   <?php 
             // $consul="SELECT * from tb_cliente";
             // $resul=mysqli_query($conexion,$consul);
             // while($row=mysqli_fetch_assoc($resul)){
             //   echo '<option value="'.$row['id_cliente'].'">' .$row['nombre']. '</option>';
            //  }
            ?>  -->           
            </select>
          </div>
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Num_comprobante:</label>
            <input type="text" class="form-control" id="num" name="num" autocomplete="off">
          </div>

          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control date" id="fec" name="fec" autocomplete="off">
            <script type="text/javascript">
                        $(".date").datepicker({
                            format: "yyyy/mm/dd",
                        });
                    </script>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-4 form-group">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="number" class="form-control" id="can" name="can" autocomplete="off">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-4 form-group">
            <label for="recipient-name" class="col-form-label">Precio x Unidad:</label>
            <input type="number" class="form-control" id="peu" name="peu" autocomplete="off">
          </div>
          <div class="mb-3 col-xs-6 col-sm-3 col-md-4 form-group">
            <label for="recipient-name" class="col-form-label">Total:</label>
            <input type="number" class="form-control" id="tot" name="tot" readonly autocomplete="off">
        
          </div>
        </div>
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>

<script>

    var exampleModal = document.getElementById('modalcomprasupdate')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var cod = button.getAttribute('data-bs-cod')
      var num = button.getAttribute('data-bs-num')
      var fec = button.getAttribute('data-bs-fec')
      var can = button.getAttribute('data-bs-can')
      var pre = button.getAttribute('data-bs-pre')
      var tot = button.getAttribute('data-bs-tot')
      var pro = button.getAttribute('data-bs-pro')
      var cli = button.getAttribute('data-bs-cli')



      var modalBodyInput = exampleModal.querySelector('#idcompra')
      var codigo = exampleModal.querySelector('#cod')
      var nume = exampleModal.querySelector('#num')
      var fecha = exampleModal.querySelector('#fec')
      var cant = exampleModal.querySelector('#can')
      var prec = exampleModal.querySelector('#peu')
      var total = exampleModal.querySelector('#tot')
      var prod = exampleModal.querySelector('#Nom')
      var clie = exampleModal.querySelector('#cli')



      modalBodyInput.value = recipient;
      codigo.value=cod;
      nume.value=num;
      fecha.value=fec;
      cant.value=can;
      prec.value=pre;
      total.value=tot;
      prod.value=pro;
      clie.value=cli;
 

    })

    var elimi = document.getElementById('eliminar')
    elimi.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
           // Extract info from data-bs-* attributes
           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-cod')

           var modalBodyInput = elimi.querySelector('#idcompra')
           var codigo = elimi.querySelector('#cod')
           var tituli =elimi.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar el codigo: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script>


<div class="modal fade" id="modalcompras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/comprareg.php">
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Código:</label>
            <input type="text" class="form-control" id="cod" name="cod" required autocomplete="off">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <select class="form-select" id="Nom" name="Nom" require>
          <!--   <?php 
             // $consul="SELECT * from tb_producto";
              //$resul=mysqli_query($conexion,$consul);
              //while($row=mysqli_fetch_assoc($resul)){
                //echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
             // }
            ?> -->
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
          <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" require>
           <!--  <?php 
             // $consul="SELECT * from tb_cliente";
             // $resul=mysqli_query($conexion,$consul);
             // while($row=mysqli_fetch_assoc($resul)){
             //   echo '<option value="'.$row['id_cliente'].'">' .$row['nombre']. '</option>';
            //  }
            ?> -->            
            </select>
          </div>
         
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Num_comprobante:</label>
            <input type="text" class="form-control" id="num" name="num" autocomplete="off">
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-5 form-group">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control date" id="fec" name="fec" autocomplete="off">
            <script type="text/javascript">
                        $(".date").datepicker({
                            format: "yyyy/mm/dd",
                        });
                    </script>
          </div>      
          <div class="col-xs-6 col-sm-3 col-md-2 form-group">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="number" class="form-control" id="can" name="can" autocomplete="off">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-5 form-group">
            <label for="recipient-name" class="col-form-label">Precio Unidad:</label>
            <input type="number" class="form-control" id="peu" name="peu" autocomplete="off">
          </div>
        </div>

          <div class="mb-3 col-md-4">
            <label for="recipient-name" class="col-form-label">Total:</label>
            <input type="number" class="form-control" id="tot" name="tot" readonly autocomplete="off">
          </div>
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
