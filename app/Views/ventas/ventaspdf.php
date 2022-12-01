<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>pdf</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



        <style>
          @page{
            margin: 0cm 0cm;
          }
          body{
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
          }
          header{
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            background-color: #03a9f1;
            color:aqua;
            text-align: center;
            line-height: 1.5cm;
          }
          footer{
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            background-color: #03a9f1;
            color:aqua;
            text-align: center;
            line-height: 1.5cm;
          }
        </style>

    </head>

    <body >
        <header>
          EMPRESA TRAMUCA 
        </header>

        <footer>
        <?php
                    date_default_timezone_set('America/lima');
                    echo date('l jS \of F Y h:i:s A');
                    
                    ?>
        </footer>

        <main>

    <center><h1>Reporte de ventas</h1></center>
    <div class="table-responsive">
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
               

        </main>
    </body>
</html>