<?php 

  session_start();

  include "../barralateral.php";

  include "../../src/users.class.php";

  $index = new Users;

  $usuario = $_SESSION['user'];
  $nivel = $_SESSION['nivel'];

         
      if ($nivel == 'A'){
     
          $nivel = "Director(a)";
  
      }else{
  
          $nivel = "Secretario(a)";
  
      }
  
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

      <div class="card shadow m-4 p-5">
        <div class="card-body">
          <div class="table-responsive">
            <h3>TABLA DE USUARIOS <i class="fa fa-users" ></i></h3>
            <br>
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <thead>

                        <tr>
                            <th><center>Usuario</center></th>
                            <th><center>Accion</center></th>
                        </tr>
                        
                    </thead>
                 
                    <tbody>
                        
                    <?php
                    
                    $index->usuarios();
                        
                    ?>

                    </tbody>

                    <tfoot>

                      <tr>
                          <th>Usuario</th>
                          <th>Accion</th>
                      </tr>

                    </tfoot>

                  </table>
               </div>
              </div>
            </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <script src="../../vendor/jquery/jquery.slim.js"></script>


  <script src="../../vendor/sweetalert/sweetalert2.js"></script>
  <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>

    <script>
      function togglepassword() {
        var password = document.getElementById("clave");
        var new_password = document.getElementById("new_password");
        var confirm_password = document.getElementById("confirm_clave");
        if (password.type === "password") {
          password.type = "text";
          new_password.type = "text"
          confirm_password.type = "text"
        } else {
          confirm_password.type = "password"
          new_password.type = "password"
          password.type = "password";
        }
      }
    </script>

    <script>
      //id form general 5 tablas = id myForm
      const generalForm = document.getElementById("Form");
      //id = "submitBtn" button 
      const generalBtnForm = document.getElementById("save");

      //Efecto de sonido jeje, para determinar el evento del formulario
      generalForm.addEventListener("submit", (event) => {

        // EventoPredeterminado
        event.preventDefault()
        const dataGeneralForm = new FormData(generalForm)
        const InfoGeneralForm = Object.fromEntries(dataGeneralForm)

        console.log(InfoGeneralForm)


        if (InfoGeneralForm === "") {

          Swal.fire(
            'ERROR!',
            'debes ingresar todos los datos!',
            'error'
          )

        } else {
          fetch("signup.inc.php", {
              method: 'POST',
              body: JSON.stringify(InfoGeneralForm)
            })

            .then(response => response.json())
            .then(dataGeneralForm => {

              console.log(dataGeneralForm);

              // Respuesta de exitoso
              if (dataGeneralForm.status === "success") {
                Swal.fire(
                  "EXITOSO!",
                  dataGeneralForm.message,
                  "success"
                )

                //Conteo de tiempo de alert
                setTimeout(() => {
                  window.location.href = "login.php"
                }, 2000);

              } else if (dataGeneralForm.status === "invalid") {
                Swal.fire(
                  "ERROR!",
                  dataGeneralForm.message,
                  "error"
                )

              } else {
                Swal.fire(
                  "ERROR!",
                  dataGeneralForm.message,
                  "warning"
                )
              }

            }).catch(error => {
              console.error("Error", error);
            });
        }
      })
    </script>
</body>

</html>