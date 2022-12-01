<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <title>Restauracion</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url(); ?>/build/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/2dc4d683dc.js" crossorigin="anonymous"></script>
     <link href="<?= base_url(); ?>/build/bootstrap5/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/build/bootstrap5/css/bootstrap.css" rel="stylesheet" />    

    <link href="<?= base_url(); ?>/css/estilos.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>/css/estilo.css" rel="stylesheet" type="text/css">

  
  
  
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <form style="background-color:white" class="border shadow p-5 rounded-2" style="width: 500px;" 
        action="<?= base_url(); ?>/RecuLoginController/nuevo" method="POST">
            
            <h2 class="text-center pt-2">NUEVA CONTRASEÑA</h2>
            <hr>
            <br>
            <div class="input">
               
                <input type="text" class="form-control" id="usuario" placeholder="Ingresar usuario" name="usuario" required>
            </div>
            <br>
            <div class="input">
                
                <input type="password" class="form-control" id="contrase" placeholder="Ingresar contraseña" name="contrase">
            </div>
            <br>
            <div class="input">
                
                <input type="password" class="form-control" id="contrase2" placeholder="Ingresar contraseña" name="contrase2">
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><b>Recuperar</b></button>      
            
            <a class="btn btn-success" href="<?= base_url(); ?>/Home"><b>Regresar</b></a>     
        </form>
        
         
    </div>
    

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
            open source licence.</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }


    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById('frm').addEventListener('submit', function (ev) {
            ev.preventDefault();
            axios.post(ev.target.action, new FormData(ev.target)).then(function (response) {
                alert(response.data.msg)
                if (response.data.estado === 'success') {
                    window.location.href = response.data.ruta;
                }
            }).catch(function (e) {
                console.error(e);
            })
        })
    })
</script>

<!-- -->

</body>

</html>
