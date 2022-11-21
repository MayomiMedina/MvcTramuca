

<link href="<?= base_url(); ?>/css/estiloUsu.css" rel="stylesheet" type="text/css">
<link href="<?= base_url(); ?>/build/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container" >
    <div class="center-block mb-5">           
            <h2 class="text-center pt-2"><p style="color: white">Usuarios</p></h2>
                    <div class="col-md-4   " >
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalusuar"><b> Registrar Usuario</b></button>
                    
                  
                        <a class="btn btn-success" href="../index.html" ><b>Regresar</b></a> 
                    </div>
            <p></p>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr class="table-bordered">
                        <th>N°</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Usuario</th>
                        <th>Área</th>
                        <th>Estado</th>
                        <th>Cargo</th>    
                        <th>Opciones</th>                    
                    </tr>
                </thead>
                <tbody>
              <!--   <?php 
              //  $consul="SELECT usuario.idusu,usuario.nombre,usuario.apellidos,usuario.usuario,
              //  usuario.contra,usuario.area,usuario.estado,cargo.cargo 
             //   from usuario
             //   inner join cargo on usuario.idcargo=cargo.idcago";
             //   $resul=mysqli_query($conexion,$consul);
             //   while($row=mysqli_fetch_assoc($resul)){
                    ?>
                        <tr>
                            <td><?php //echo $row['idusu'];?></td>
                            <td><?php //echo $row['nombre'];?></td>
                            <td><?php //echo $row['apellidos'];?></td>
                            <td><?php //echo $row['usuario'];?></td>
                            <td><?php //echo $row['area'];?></td>
                            <td><?php //echo $row['estado'];?></td>
                            <td><?php //echo $row['cargo'];?></td>
                            <td><button type="button" class="btn" title="Editar" data-bs-toggle="modal" 
                            data-bs-target="#usuupdate"
                                 data-bs-id="<?php //echo $row['idusu'];?>"
                                 data-bs-nom="<?php //echo $row['nombre'];?>"
                                 data-bs-ape="<?php //echo $row['apellidos'];?>"
                                 data-bs-usu="<?php //echo $row['usuario'];?>"
                                 data-bs-are="<?php //echo $row['area'];?>"
                                 data-bs-est="<?php //echo $row['estado'];?>"
                                 data-bs-car="<?php //echo $row['cargo'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>
                                 
                              </button>
                            <button type="button" class="btn" title="Eliminar" data-bs-toggle="modal" 
                              data-bs-target="#eliminar"
                              data-bs-id="<?php //echo $row['idusu'];?>"
                              data-bs-nom="<?php //echo $row['nombre'];?>">
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

<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/usuelimi.php">

        <input type="hidden" class="form-control" id="idusu" name="idusu">

        
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-danger" value="Eliminar">
          </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>


<div class="modal fade" id="usuupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/usuupdate.php">
        <input type="hidden" class="form-control" id="idusu" name="idusu">
        
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nom" name="nom">
          </div>          
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Apellido:</label>
            <input type="text" class="form-control" id="ape" name="ape">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Usuario:</label>
            <input type="text" class="form-control" id="usu" name="usu">
          </div>            
        </div>
                
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Area :</label>
            <input type="text" class="form-control" id="are" name="are">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="estados" class="col-form-label">Estado:</label>
            <select class="form-select" id="est" name="est" required="">
            <option value="Activo">Activo</option>
            <option value="Desactivado">Desactivado</option>
            </select>
          </div>
        </div>
        
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Cargo:</label>
            <select class="form-select" id="car" name="car" required="">
              
          <!--  <?php 
             // $consul="SELECT * from cargo";
             // $resul=mysqli_query($conexion,$consul);
            //  while($row=mysqli_fetch_assoc($resul)){
            //    echo '<option value="'.$row['idcago'].'">' .$row['cargo']. '</option>';
           //   }
            ?> -->
            </select>
          </div>
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-primary" onclick="actualizaCorrecto()" value="Actualizar">
            </div>
            
        </form>
      </div>    
      
    </div>
  </div>
</div>
<script>

    var exampleModal = document.getElementById('usuupdate')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var nom = button.getAttribute('data-bs-nom')
      var ape = button.getAttribute('data-bs-ape')
      var usu = button.getAttribute('data-bs-usu')
      var are = button.getAttribute('data-bs-are')
      var est = button.getAttribute('data-bs-est')
      var car = button.getAttribute('data-bs-car')



      var modalBodyInput = exampleModal.querySelector('#idusu')
      var codigo = exampleModal.querySelector('#nom')
      var nume = exampleModal.querySelector('#ape')
      var fecha = exampleModal.querySelector('#usu')
      var prec = exampleModal.querySelector('#are')
      var total = exampleModal.querySelector('#est')
      var carg = exampleModal.querySelector('#car')



      modalBodyInput.value = recipient;
      codigo.value=nom;
      nume.value=ape;
      fecha.value=usu;
      prec.value=are;
      total.value=est;
      carg.value=car;


    })

    var elimi = document.getElementById('eliminar')
    elimi.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
           // Extract info from data-bs-* attributes
           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-nom')

           var modalBodyInput = elimi.querySelector('#idusu')
           var codigo = elimi.querySelector('#cod')
           var tituli =elimi.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar a: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script>

<div class="modal fade" id="modalusuar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/usureg.php">
        <div class="row">
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombres:</label>
            <input type="text" class="form-control" id="nom" name="nom">
          </div>          
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" id="ape" name="ape">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Usuario:</label>
            <input type="text" class="form-control" id="usu" name="usu">
          </div>      
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Contraseña:</label>
            <input type="text" class="form-control" id="con" name="con">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Área :</label>
            <input type="text" class="form-control" id="are" name="are">
          </div>
          <div class="col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="estados" class="col-form-label">Estado:</label>
            <select class="form-select" id="est" name="est" required="">
            <option value="Activo">Activo</option>
            <option value="Desactivado">Desactivado</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Cargo:</label>
            <select class="form-select" id="car" name="car" required="">
           <!--  <?php 
           //   $consul="SELECT * from cargo";
           //   $resul=mysqli_query($conexion,$consul);
           //   while($row=mysqli_fetch_assoc($resul)){
           //     echo '<option value="'.$row['idcago'].'">' .$row['cargo']. '</option>';
            //  }
            ?> -->
            </select>
          </div>
        </div>  
        <div class="row">
        </div>
        
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
              
          </div>
        </form>

      </div>     
      
    </div>
  </div>
</div>
   
<script src="https://kit.fontawesome.com/2dc4d683dc.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

