<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <title>Iniciar sesión</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url(); ?>/build/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/css/estilos.css" rel="stylesheet" type="text/css">

  
  
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <form style="background-color:white" id="frm" class="border shadow p-5 rounded-2" style="width: 500px;" action="<?= base_url(); ?>/Home/LogIn" method="post">
           
            <h2 class="text-center pt-2">INICIAR SESION</h2>
            <hr>
            <br>
            <div class="input"> 
                <input type="text"  id="usuario" placeholder="Ingresar usuario" name="usuario">
            </div>
            <br>
            <div class="input">
                <input type="password"  id="contrase" placeholder="Ingresar contraseña" name="contrase">
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><b>INGRESAR</b></button>            
            <a href="<?= base_url(); ?>/RecuLoginController">olvidaste contraseña?</a>
           
       
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
