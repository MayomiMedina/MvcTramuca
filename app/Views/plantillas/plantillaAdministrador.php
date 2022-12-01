<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        
        <script src="https://kit.fontawesome.com/2dc4d683dc.js" crossorigin="anonymous"></script>

        <link href="../build/bootstrap5/css/styles.css" rel="stylesheet" />
        <link href="../build/bootstrap5/css/bootstrap.css" rel="stylesheet" />    

        <!-- date-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
       <script src="https://code.highcharts.com/highcharts.js"></script>


       <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

<style>

body{
    display:grid;
    place-items: center;
    margin: 0;
    padding: 0 24px;
    /* background-image: url('<?= base_url(); ?>/Image/fondo_login.png');  */
    background-repeat: no-repeat;
    background-size: cover;    
    
}
</style>
    <?= $this->renderSection('css') ?? ''; ?>
</head>
    <body class="sb-nav-fixed">


    
    <!-- <script src="<?= base_url(); ?>/build/code/modules/series-label.js"></script>
    <script src="<?= base_url(); ?>/build/code/modules/exporting.js"></script>
    <script src="<?= base_url(); ?>/build/code/modules/export-data.js"></script>
    <script src="<?= base_url(); ?>/build/code/modules/accessibility.js"></script> -->

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url(); ?>/Admin">TRAMUCA</a>
            <!--<input type="submit" id="btninventario" class="navbar-brand ps-3" value="Inventario" style="color:dimgray">-->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <!-- USUARIO -->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="<?= base_url(); ?>/Home"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Detalles</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= base_url(); ?>/Home">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <!-- TERMINO DE USUARIO-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Menu</div>

                            <a class="nav-link" href="<?= base_url(); ?>/ClienteController">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Clientes
                            </a>

                            <a class="nav-link" href="<?= base_url(); ?>/ProductoController">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>/AlmacenController">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Almacen
                            </a>  
                            <a class="nav-link" href="<?= base_url(); ?>/ComprasController">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Compras
                            </a>                                           
                            <a class="nav-link" href="<?= base_url(); ?>/VentasController">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ventas
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?= $this->renderSection('contenido') ?? ''; ?>
                </main>
           </div>
        </div>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
   
               <!-- <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
        <script src="<?= base_url(); ?>/js/scripts.js" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>/js/Chart.min.js"></script>
        <!-- <script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <?= $this->renderSection('js') ?? ''; ?>
   </body>
</html>
   