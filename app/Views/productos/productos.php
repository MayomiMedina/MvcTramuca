<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<link href="<?= base_url(); ?>/css/estilomodals.css" rel="stylesheet" type="text/css">

<?php $this->endSection(); ?>

<?php $this->section('contenido'); ?>
<div class="container-md-6 mx-3 bg-white shadow border">
    <h2 class="text-center pt-2">Productos</h2>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalproducto"> Registrar Producto</button>
                    </div>
             
                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <a  class="btn btn-info" href="<?=base_url();?>/ProductoController/pdf"> Imprimir </a>
                    </div>

                    <hr>
                    <p></p>                  
                    <table class="table table-striped table-bordered" id="tablapro">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>Producto</th>
                        <th>Codigo</th>
                        <th>Categoria</th>
                        <th>Marca</th>                        

                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach($s as $pro):?>
                        <tr>
                        <td><?=$pro['producto'];?></td>
                            <td><?=$pro['codigo'];?></td>
                            <td><?=$pro['categoria'];?></td>
                            <td><?=$pro['marca'];?></td>   

                            <td><button type="button" class="btn" title="Editar" data-bs-toggle="modal" 
                            data-bs-target="#modalproductosupdate"
                                 data-bs-id="<?= $pro['id_producto'];?>"
                                 data-bs-pro="<?= $pro['producto'];?>"
                                 data-bs-cod="<?= $pro['codigo'];?>"                                 
                                 data-bs-cat="<?= $pro['categoria'];?>"
                                 data-bs-mar="<?= $pro['marca'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>
                            </button>
                          
                          <button type="button" class="btn" data-bs-toggle="modal" 
                          data-bs-target="#eliminarproduc"
                          data-bs-id="<?= $pro['id_producto'];?>"
                          data-bs-cod="<?= $pro['codigo'];?>"
                          data-bs-nom="<<?= $pro['producto'];?>">
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

<div class="modal fade" id="eliminarproduc" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url(); ?>/ProductoController/borrar"?">          
              <input type="hidden" class="form-control" id="idproductos" name="idproductos">
              
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-primary" value="Eliminar">
            </div>    
        </form>     
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="modalproductosupdate" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url(); ?>/ProductoController/editar"?">
          
            <input type="hidden" class="form-control" id="idproducto" name="idproducto">
          <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-6 form-group">
              <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
              <input type="text" class="form-control" id="NomU" name="NomU" >
            </div>                                 
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-6 form-group">
              <label for="recipient-name" class="col-form-label">Categoría:</label>
              <input type="text" class="form-control" id="cat" name="cat">
            </div>
            <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
              <label for="recipient-name" class="col-form-label">Marca:</label>
              <input type="text" class="form-control" id="mar" name="mar">
            </div>
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

<script>

    var exampleModal = document.getElementById('modalproductosupdate')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var pro = button.getAttribute('data-bs-pro')
            
      var cat = button.getAttribute('data-bs-cat')
      var mar = button.getAttribute('data-bs-mar')


      var modalBodyInput = exampleModal.querySelector('#idproducto')
      
      var nombre = exampleModal.querySelector('#NomU')    
      var cate = exampleModal.querySelector('#cat')
      var marc = exampleModal.querySelector('#mar')


      modalBodyInput.value = recipient;
      nombre.value=pro;
            
      cate.value=cat;
      marc.value=mar;

    })

    var elimip = document.getElementById('eliminarproduc')
    elimip.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget

           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-cod')

           var modalBodyInput = elimip.querySelector('#idproductos')
           var codigo = elimip.querySelector('#cod')
           var tituli =elimip.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar el codigo: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script>


<div class="modal fade" id="modalproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url(); ?>/ProductoController/guardar"?">
        <div class="row">

          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <input type="text" class="form-control" id="nomb" name="nomb">
          </div>
        </div>        
      
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Categoría:</label>
            <input type="text" class="form-control" id="cat" name="cat">
          
        </div>
          <div class="mb-3 col-xs-6 col-sm-3 col-md-6 form-group">
            <label for="recipient-name" class="col-form-label">Marca:</label>
            <input type="text" class="form-control" id="mar" name="mar">
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
