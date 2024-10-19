<?php

session_start();

if (isset($_SESSION['user'])) {
    header("location: index.php");
    exit();
}

require_once 'src/basedata2.php';
$basedata = new baseData();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Inicio de Sesion</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin-2.css" rel="stylesheet">
  
  <link href="vendor/sweetalert/sweetalert2.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/sweetalert/sweetalert2.min.css">

</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                  </div>
                  <form class="user" action="" method="POST" id="create-login" form-login="create-login">




                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input type="text" class="form-control form-control-user" id="usuario" name="usuario"
                        aria-describedby="emailHelp" placeholder="Ingrese su usuario..." autocomplete="on">
                    </div>

                    <div class="form-group">
                      <label for="clave">Contraseña:</label>
                      <input type="password" class="form-control form-control-user" name="clave" id="clave"
                        placeholder="Ingrese su contraseña..." autocomplete="on">
                    </div>

                    <br>

                    <div class="form-group">

                      <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_login"
                        name="submit">INICIAR SESION</button>
              
                    </div>
                    <a  href = "seguridad/password/cambiarUsuario.php" class = "btn btn-lg btn-primary btn-block" type="submit" id = "btn_cambiar" name "submit">CAMBIAR CONTRASEÑA</a>
                    <div id="error-message"></div>

                  </form>

                  <span></span>
                  <hr>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/sweetalert/sweetalert2.js"></script>
  <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>


  <script>
  const form = document.getElementById("create-login");
  const btn_login = document.getElementById("btn_login");

  form.addEventListener("submit", (event) => {
    event.preventDefault()
    const data = new FormData(form)
    const info = Object.fromEntries(data)
    console.log(info)
    if (info.clave === "" || info.usuario === "") {
      Swal.fire(
        'ERROR!',
        'debes ingresar todos los datos!',
        'error'
      )
    } else {
      fetch('login.inc.php', {
          method: 'POST',
          body: JSON.stringify(info)
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);

          if (data.status === "success") {
            Swal.fire(
              'EXITOSO!',
              data.message,
              'success'
            )
            setTimeout(() => {
              window.location.href = "index.php"
            }, 1000);
          } else if (data.status === "invalid") {
            Swal.fire(
              'ERROR!',
              data.message,
              'error'
            )
          } else {
            Swal.fire(
              'EXITOSO!',
              data.message,
              'warning'
            )
          }
        })
        .catch(error => {
          console.error('Error:', error);
          if(data.status === "error"){
             Swal.fire(
              'ERROR!',
              data.message,
              'error'
            )
          }else{
            
          }
          
        });
    }


  })
  </script>

</body>
</html>