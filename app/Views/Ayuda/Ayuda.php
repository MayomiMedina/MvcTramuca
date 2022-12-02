<?= $this->extend('plantillas/plantillaAdministrador.php') ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('contenido'); ?>
    <br><br>
    <h1>Manuales</h1>
    <div class="row no-gutters bg-light position-relative">
  <div class="col-md-6 mb-md-0 p-md-4">
    <img src="<?= base_url(); ?>/Image/camion.jpg" class="w-100" alt="">
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
    <h5 class="mt-0">Estimado usuario</h5>
    <p>Dar click en los links adjuntos para visualizar los manuales de videos,donde manera interactiva se va enseñar el funcionamiento de las secciones del sistema.</p>
    <a href="https://drive.google.com/file/d/1dvZn42ABiaIKftaYrYvox0rrbeH5c2jJ/view?usp=sharing" class="stretched-link">Login</a><br>
    <a href="https://drive.google.com/file/d/19wTWtbtpXYXzXFjfOA9EftiJMUc6PLvP/view?usp=sharing" class="stretched-link">Recuperar Contraseña</a><br>
    <a href="https://drive.google.com/file/d/1RRBw_m-MUeMbusspRPp_l9FkCXarf8VD/view?usp=sharing" class="stretched-link">Poner Producto a Almacen</a><br>
    <a href="https://drive.google.com/file/d/1QRbgrXMIok_AZSjVm6l1pXmE1ZiJsGOs/view?usp=sharing" class="stretched-link">Realizar Venta</a><br>
  </div>
</div>
<?php $this->endSection(); ?>


<?php $this->section('js'); ?>
<?php $this->endSection(); ?>
