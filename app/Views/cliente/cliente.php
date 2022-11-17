<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<link href="<?= base_url(); ?>/css/estilomodals.css" rel="stylesheet" type="text/css">
<?php $this->endSection(); ?>

<?php $this->section('contenido'); ?>
    
<div class="container-md-6 mx-3 bg-white shadow border">
    <h2 class="text-center pt-2">Lista de clientes</h2>
    <hr>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                    <div class="mb-3 col-md-2 d-grid gap-1 pt-1">
                        <button type="button" onclick="toggleModal()" data-bs-toggle="modal" data-bs-target="#modalcliente"><b>Registrar Cliente</b></button>
                    </div>
                    <div
                      class="modal-background"
                      onclick="toggleModal()"
                      >
                    </div>
                    <div class="mb-3 col-md-2 d-grid gap-1 pt-1">
                        <span class="btn btn-info " onclick="window.print()"><b>Imprimir</b></span>
                    </div>
                        
                    <div class="mb-3 col-md-2">
                    </div>
                    <div class="mb-3 col-md-2">
                    </div>
                    <div class="mb-3 col-md-2 d-grid gap-1 pt-1" data-a-target="tray-search-input">

                    <form  action="../buscar/buscar_cliente.php" class="btn_new" class="form_search">
                    <input type="number" class="d-flex p-2 form-control" name="busqueda" id="busqueda" required="Ingrese un DNI" pattern="[0-9]{8}"  placeholder="DNI" >
                    
                    </div>
                    <div class="mb-3 col-md-2 d-grid gap-1 pt-1">                    
                    <input type="submit" value="Buscar cliente" class="btn btn-outline-success btn_search" >                    
                    </div>
                    </form>
                    
                    <hr> 
                    <p></p>
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                                                
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>DNI</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                      </tr>
                      </thead>
                      <tbody>
   <!--                    <?php 
                //        $consul="SELECT *from tb_cliente";
                 //       $resul=mysqli_query($conexion,$consul);
                 //       while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>
                            <td><?php //echo $row['nombre'];?></td>
                          <td><?php //echo $row['apellido'];?></td>
                           <td><?php //echo $row['celular'];?></td>  
                           <td><?php //echo $row['DNI'];?></td>
                            <td><?php //echo $row['direccion'];?></td>                
                            <td><button type="button" class="btn" title="Editar" data-bs-toggle="modal" 
                            data-bs-target="#modalclienteupdate"
                                 data-bs-id="<?php // echo $row['id_cliente'];?>"
                                 data-bs-nom="<?php ///echo $row['nombre'];?>"
                                 data-bs-ape="<?php //echo $row['apellido'];?>"
                                 data-bs-cel="<?php //echo $row['celular'];?>"
                                 data-bs-DNI="<?php //echo $row['DNI'];?>"
                                 data-bs-dir="<?php //echo $row['direccion'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                            <button type="button" class="btn" title="Eliminar" data-bs-toggle="modal" 
                              data-bs-target="#eliminarclientes"
                            data-bs-id="
                            <?php //echo $row['id_cliente'];?>"
                            data-bs-nom="<?php //echo $row['nombre'];?>">
                              <i class="fa-solid fa-trash fa-2x"></i>                            
                              </button>
                            </td>
                        </tr>
                    <?php
                   // }
                    ?> -->
                      </tbody>
                    </table>
              
                
                </div>
            </div>
          </div>
        </div>

    </div>    
</div>


<div class="modal fade" id="eliminarclientes" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/clienteelimi.php">          
              <input type="hidden" class="form-control" id="idclientess" name="idclientess">
              
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atrás</button>
                 <input type="submit" class="btn btn-primary" value="Eliminar">
            </div>            
        </form>
      </div>     
      
    </div>
  </div>
</div>


<div class="modal" id="modalclienteupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/clienteupdate.php">

        <input type="hidden" class="form-control" id="idcliente" name="idcliente">
        <div class="row">            
         <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nom" name="nom">
          </div>
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Apellido:</label>
            <input type="text" class="form-control" id="ape" name="ape">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Celular:</label>
            <input type="text" class="form-control" id="cel" name="cel">
          </div>
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">DNI:</label>
            <input type="text" class="form-control" id="DNI" name="DNI">
          </div>
        </div>        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Direccion</label>
            <input type="text" class="form-control" id="dir" name="dir">
          </div>
         
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>            
        </form>
      </div>    
      
    </div>
  </div>
</div>


<!-- <script>
    var exampleModalas = document.getElementById('modalclienteupdate')
    exampleModalas.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var nom = button.getAttribute('data-bs-nom')
      var ape = button.getAttribute('data-bs-ape')
      var cel = button.getAttribute('data-bs-cel')
      var dni = button.getAttribute('data-bs-dni')
      var dir = button.getAttribute('data-bs-dir')

      var modalBodyInput = exampleModalas.querySelector('#idcliente')
      var nombre = exampleModalas.querySelector('#nom')
      var apelli = exampleModalas.querySelector('#ape')
      var cell = exampleModalas.querySelector('#cel')
      var dnis = exampleModalas.querySelector('#DNI')
      var direcc = exampleModalas.querySelector('#dir')

      modalBodyInput.value = recipient;
      nombre.value=nom;
      apelli.value=ape;
      cell.value=cel;
      dnis.value=dni;
      direcc.value=dir;
    })

    var elimi = document.getElementById('eliminarclientes')
    elimi.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
           // Extract info from data-bs-* attributes
           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-nom')

           var modalBodyInput = elimi.querySelector('#idclientess')
           var codigo = elimi.querySelector('#cod')
           var tituli =elimi.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar al cliente: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script> -->


<div class="modal fade" id="modalcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/clientereg.php">
          <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-6 form-group">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" id="nom" name="nom" required="" pattern="[a-zA-Z]+" >
            </div>
            <div class="col-xs-6 col-sm-3 col-md-6 form-group">
             <label for="recipient-name" class="col-form-label">Apellidos:</label>
              <input type="text" class="form-control" id="ape" name="ape" required="" pattern="[a-zA-Z]+" >
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-6 form-group">
              <label for="recipient-name" class="col-form-label">Celular:</label>
              <input type="text" class="form-control" id="cel" name="cel" pattern="[0-9]+">
            </div>
            <div class="col-xs-6 col-sm-3 col-md-6 form-group">
              <label for="recipient-name" class="col-form-label">DNI:</label>
              <input type="text" class="form-control" id="DNI" name="DNI" pattern="[0-9]+" maxlength="8" required="">
            </div>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Dirección</label>
            <input type="text" class="form-control" id="dir" name="dir">
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

<script>





<?php $this->endSection(); ?>


<?php $this->section('js'); ?>
<?php $this->endSection(); ?>