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
    <h2 class="text-center pt-2">Lista de compras</h2>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalcompras"> Registrar Compra</button>

                    </div>
          
                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <a  class="btn btn-info" href="<?=base_url();?>/ComprasController/pdf"> Imprimir </a>
                    </div>
                    <p></p>
                    <table id="tablaproa" class="display" style="width:100%" >
                      <thead class="thead-dark">
                      <tr class="table-bordered">                         
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
                      <?php foreach($s as $pro):?>
                        <tr>
                            <td><?=$pro['producto'];?></td>
                            <td><?=$pro['numcomproban'];?></td>
                            <td><?=$pro['nombre'];?></td>                   
                            <td><?=$pro['fecha'];?></td> 
                            <td><?=$pro['cantidad'];?></td> 
                            <td><?=$pro['precio'];?></td> 
                            <td><?=$pro['precio']*$pro['cantidad'];?></td> 
                            <td>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalcomprasupdate"
                                 data-bs-id="<?=$pro['idcompra'];?>"
                                 data-bs-cod="<?=$pro['codigo'];?>"
                                 data-bs-pro="<?=$pro['producto'];?>"
                                 data-bs-num="<?=$pro['numcomproban'];?>"
                                 data-bs-nom="<?=$pro['nombre'];?>"
                                 data-bs-fec="<?=$pro['fecha'];?>"
                                 data-bs-can="<?=$pro['cantidad'];?>"
                                 data-bs-pre="<?=$pro['precio'];?>"
                                 data-bs-tot="<?=$pro['precio']*$pro['cantidad'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminar"
                                 data-bs-id="<?=$pro['idcompra'];?>"
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
var tabla=document.querySelector("#tablaproa");
var datatable=new DataTable(tabla);

</script> 

<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url();?>/ComprasController/borrar"?>          
              <input type="text" class="form-control" id="idcompra" name="idcompra">
              
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
        <form method="POST" action="<?=base_url();?>/ComprasController/editar"?>
          
            <input type="text" class="form-control" id="idcompra" name="idcompra">
        <div class="row">            
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="cod" name="cod" autocomplete="off">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <select class="form-select" id="pro" name="pro" required="" autocomplete="off">
             <?php 
              $consul="SELECT * from tb_producto";
             $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
              }
            ?> 
            </select>
           </div>
        </div>
        
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" required="">
             <?php 
              $consul="SELECT * from tb_cliente";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_cliente'].'">' .$row['nombre']. '</option>';
              }
            ?>            
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

           tituli.textContent='¿Seguro de eliminar el producto: '+ cod+'?'
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
        <form method="POST" action="<?=base_url();?>/ComprasController/guardar"?>
        <div class="row">          
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <select class="form-select" id="pro" name="pro" require>
             <?php 
              $consul="SELECT * from tb_producto";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
              echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
              }
            ?> 
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
          <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" require>
             <?php 
              $consul="SELECT * from tb_cliente";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_cliente'].'">' .$row['nombre']. '</option>';
              }
            ?>            
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
