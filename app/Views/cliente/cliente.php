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

                <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalproducto"> Registrar Cliente</button>

                    </div>
             

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <span class="btn btn-info " onclick="window.print()"> Imprimir</span>
                    </div>
                                                               
                    <hr> 
                    <p></p>                    
                    <table class="table table-striped table-bordered" id="tablapro">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                                                
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>DNI</th>
                        <th>Direccion</th>  
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach($s as $pro):?>
                        <tr>
                            <td><?=$pro['nombre'];?></td>
                            <td><?=$pro['apellido'];?></td>
                            <td><?=$pro['celular'];?></td>                   
                            <td><?=$pro['DNI'];?></td> 
                            <td><?=$pro['direccion'];?></td> 
                            <td><button type="button" class="btn" title="Editar" data-bs-toggle="modal" 
                            data-bs-target="#modalclienteupdate"
                                 data-bs-id="<?= $pro['id_cliente'];?>"
                                 data-bs-nom="<?= $pro ['nombre'];?>"
                                 data-bs-ape="<?= $pro ['apellido'];?>"
                                 data-bs-cel="<?= $pro ['celular'];?>"
                                 data-bs-DNI="<?= $pro ['DNI'];?>"
                                 data-bs-dir="<?= $pro ['direccion'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                              <?php //AQUI ESTA EL BOTON BORRAR LUEGO VAS A LA LINEA 90?>                              
                              <button type="button" class="btn" title="Eliminar" data-bs-toggle="modal" 
                              data-bs-target="#eliminarclientes"
                              data-bs-id="<?= $pro['id_cliente'];?>"
                              data-bs-nom="<<?= $pro['nombre'];?>">
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

<?PHP /*OKEY SIGUIENDO CON EL RECORRIDO ESTE ES EL MODAL HASTA LA LINEA 110 FIJATE EL FORM Y LA ACTION A DONDE
 LO MANDA AL CLIENTECONTROLLER A LA FUNCION BORRAR
 PERO PRIMERO VE A LA LINEA 162  PARA QUE ENTIENDAS EL MODAL*/?>
<div class="modal fade" id="eliminarclientes" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url(); ?>/ClienteController/borrar"?>">          
              <input type="text" class="form-control" id="idclientess" name="idclientess">
              
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
        
        <form method="POST" action="<?= base_url(); ?>/ClienteController/editar"?>">

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

<?PHP /*OKEY YA ESTAS AQUI? CREO QUE SI  VETE A LA LINEA 191 ANALIZA BIEN TODA ESAS LINEA ES BIEN FACIL
 DE ENTENDER, SOBRAO LO ENTIENDES c:

 si entendiste el borrar entenderas el modificar es lo mismo empieza en la linea 166 hasta el 191 todo eso 
 es editat*/?>
 <script>
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
  </script> 


<div class="modal fade" id="modalcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url(); ?>/ClienteController/guardar"?>">
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







<?php $this->endSection(); ?>


<?php $this->section('js'); ?>
<?php $this->endSection(); ?>