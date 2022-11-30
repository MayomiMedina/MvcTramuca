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
  <h2 class="text-center pt-2">VENTAS</h2>
  <div class="col-md-12">

    <div class="row">


      <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
        <div class="row">

          <div class="col-md-4 d-grid gap-1 pt-1">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
            data-bs-target="#modalalmacen"> Registrar ventas</button>

          </div>
       

          <div class="col-md-4 d-grid gap-1 pt-1">
            <a  class="btn btn-info" href="../pdf/ventaspdf.php"> Imprimir </a>
          </div>
          <p></p>
          <table class="table table-striped">          
            <thead class="thead-dark">
              <tr class="table-bordered">
                <th>Comprobante</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>RUC</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
              </tr>
            </thead>
            <?php foreach($s as $pro):?>
                <tr>
                  <td><?=$pro['comprobante']; ?></td>
                  <td><?=$pro['producto']; ?></td>
                  <td><?=$pro['nombre']; ?></td>
                  <td><?=$pro['fecha']; ?></td>
                  <td><?=$pro['RUC']; ?></td>
                  <td><?=$pro['descripcion']; ?></td>
                  <td><?=$pro['cantidad']; ?></td>
                  <td><?=$pro['precio']; ?></td>
                  <td><?=$pro['total']; ?></td>
                  <td><button type="button" title="editar" class="btn" data-bs-toggle="modal" 
                  data-bs-target="#updateventas"
                    data-bs-id="<?=$pro['id_boleta']; ?>"
                    data-bs-com="<?=$pro['comprobante']; ?>"
                    data-bs-pro="<?=$pro['producto']; ?>"
                    data-bs-nom="<?=$pro['nombre']; ?>"
                    data-bs-fec="<?=$pro['fecha']; ?>"
                    data-bs-ruc="<?=$pro['RUC']; ?>"
                    data-bs-desc="<?=$pro['descripcion']; ?>"
                    data-bs-can="<?=$pro['cantidad']; ?>"
                    data-bs-pre="<?=$pro['precio']; ?>"
                    data-bs-tot="<?=$pro['total']; ?>"
                    >
                      <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                    </button>
                    <button type="button" title="eliminar" class="btn" data-bs-toggle="modal" 
                    data-bs-target="#eliminaralmacen"
                     data-bs-id="<?=$pro['id_boleta']; ?>" 
                     data-bs-cod="<?=$pro['producto']; ?>"
                     >
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

<div class="modal fade" id="eliminaralmacen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url();?>/VentasController/borrar"?>

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

<div class="modal fade" id="updateventas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url();?>/VentasController/editar"?>

        <input type="hidden" class="form-control" id="idcompra" name="idcompra">

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
            <label for="recipient-name" class="col-form-label">RUC:</label>
            <input type="text" class="form-control" id="ruc" name="ruc" autocomplete="off" maxlength="11" pattern="[0-9]+" pattern="[0-9]+">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descipcion:</label>
            <input type="text" class="form-control" id="des" name="des" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Comprobante:</label>
            <input type="text" class="form-control" id="com" name="com" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Clientess</label>
            <select class="form-select" id="cli" name="cli" required>
               <?php
             $consul = "SELECT * from tb_cliente";
              $resul = mysqli_query($conexion, $consul);
              while ($row = mysqli_fetch_assoc($resul)) {
                echo '<option value="' . $row['id_cliente'] . '">' . $row['nombre'] . '</option>';
              }
              ?> 
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Producto</label>
            <select class="form-select" id="pro" name="pro" require>
               <?php
              $consul = "SELECT tb_almacen.id_producto,tb_producto.producto 
                from tb_almacen
                 inner join tb_producto on tb_almacen.id_producto=tb_producto.id_producto";
            $resul = mysqli_query($conexion, $consul);
             while ($row = mysqli_fetch_assoc($resul)) {
               echo '<option value="' . $row['id_producto'] . '">' . $row['producto'] . '</option>';
              }
              ?> 
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="text" class="form-control" id="can" name="can" autocomplete="off" pattern="[0-9]+" required>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" id="pre" name="pre" autocomplete="off" pattern="[0-9]+" required>
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
  var exampleModal = document.getElementById('updateventas')
  exampleModal.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-id')
    var com = button.getAttribute('data-bs-com')
    var pro = button.getAttribute('data-bs-pro')
    var nom = button.getAttribute('data-bs-nom')
    var fec = button.getAttribute('data-bs-fec')
    var ruc = button.getAttribute('data-bs-ruc')
    var desc = button.getAttribute('data-bs-desc')
    var can = button.getAttribute('data-bs-can')
    var pre = button.getAttribute('data-bs-pre')
    var tot = button.getAttribute('data-bs-tot')


    var modalBodyInput = exampleModal.querySelector('#idcompra')
    var coma = exampleModal.querySelector('#com')
    var prob = exampleModal.querySelector('#pro')
    var nomc = exampleModal.querySelector('#cli')
    var fecd = exampleModal.querySelector('#fec')
    var ruce = exampleModal.querySelector('#ruc')
    var descf = exampleModal.querySelector('#des')
    var cang = exampleModal.querySelector('#can')
    var pre1 = exampleModal.querySelector('#pre')
    var tot2 = exampleModal.querySelector('#secc')


    modalBodyInput.value = recipient;
    coma.value = com;
    prob.value = pro;
    nomc.value = nom;
    fecd.value = fec;
    ruce.value = ruc;
    descf.value = desc;
    cang.value = can;
    pre1.value = pre;
    tot2.value = tot;

  })

  var elimip = document.getElementById('eliminaralmacen')
  elimip.addEventListener('show.bs.modal', function(event) {

    var button = event.relatedTarget

    var recipient = button.getAttribute('data-bs-id')
    var cod = button.getAttribute('data-bs-cod')

    var modalBodyInput = elimip.querySelector('#id')
    var codigo = elimip.querySelector('#cod')
    var tituli = elimip.querySelector('.modal-title')

    tituli.textContent = '¿Seguro de eliminar el producto: ' + cod + '?'
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
        <form method="POST" action="<?=base_url();?>/VentasController/guardar"?>

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
            <label for="recipient-name" class="col-form-label">RUC:</label>
            <input type="text" class="form-control" id="ruc" name="ruc" autocomplete="off" maxlength="11" pattern="[0-9]+" pattern="[0-9]+">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Descipcion:</label>
            <input type="text" class="form-control" id="des" name="des" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Comprobante:</label>
            <input type="text" class="form-control" id="com" name="com" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" require>
               <?php
             $consul = "SELECT * from tb_cliente";
             $resul = mysqli_query($conexion, $consul);
              while ($row = mysqli_fetch_assoc($resul)) {
                echo '<option value="' . $row['id_cliente'] . '">' . $row['nombre'] . '</option>';
              }
              ?> 
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Producto</label>
            <select class="form-select" id="pro" name="pro" require>
               <?php
              $consul = "SELECT tb_almacen.id_producto,tb_producto.producto 
              from tb_almacen
             inner join tb_producto on tb_almacen.id_producto=tb_producto.id_producto";
              $resul = mysqli_query($conexion, $consul);
              while ($row = mysqli_fetch_assoc($resul)) {
                echo '<option value="' . $row['id_producto'] . '">' . $row['producto'] . '</option>';
              }
              ?> 
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="text" class="form-control" id="can" name="can" autocomplete="off" pattern="[0-9]+" required>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" id="pre" name="pre" autocomplete="off" pattern="[0-9]+" required>
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
