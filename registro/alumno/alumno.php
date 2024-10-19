<?php

session_start();

include '../barra.form.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../img/retro.png">
  <title>Registro del Alumno</title>

   
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  >
  <link href="../../css/sb-admin-2.css" rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <script src="../../vendor/jquery/jquery-3.6.4.min.js"></script>


  <link href="../../vendor/sweetalert/sweetalert2.css" rel="stylesheet">

  <link rel="stylesheet" href="../../vendor/sweetalert/sweetalert2.min.css">


</head>

<body>
  <form id="myForm" method="post" action="alumno.inc.php">

    <h1 class="text-center mb-5">Registro del Alumno</h1>
    <div id="formTotal"></div>

    <br>
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary" id="submitBtn" name="submit">Guardar</button>
    </div>
    <br>
  </form>

  <script src="../../vendor/sweetalert/sweetalert2.all.js"></script>
  <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>

  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plu../gin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom s../cripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>


<script>
  const generalForm = document.getElementById("myForm");
  const generalBtnForm = document.getElementById("submitBtn");
  generalForm.addEventListener("submit", (event) => {
    event.preventDefault()
    const dataGeneralForm = new FormData(generalForm)
    const InfoGeneralForm = Object.fromEntries(dataGeneralForm)
    console.log(InfoGeneralForm)
    if (InfoGeneralForm.nombre_a == "" || InfoGeneralForm.apellido_a == "" || InfoGeneralForm.cedula_escolar_a == "") {
      Swal.fire(
        'ERROR!',
        'UNOS DE LOS 3 CAMPOS ESTÀS VACIOS DE: NOMBRE, APELLIDO O CEDULA',
        'error'
      )
    }else if (InfoGeneralForm.genero_a == "" || InfoGeneralForm.fecha_nac_a == "" || InfoGeneralForm.lugar_nac_a == "") {
      Swal.fire(
        'ERROR!',
        'UNOS DE LOS 3 CAMPOS ESTÀS VACIOS DE: SEXO, FECHA DE NACIMIENTO O LUGAR NACIMIENTO',
        'error'
      )
    }
    else if (InfoGeneralForm.direccion_a == "") {
      Swal.fire(
        'ERROR!',
        'DEBES INGRESAR EL CAMPO DIRECCION :',
        'error'
      )

    }else {
      fetch("alumno.inc.php", {
          method: 'POST',
          body: JSON.stringify(InfoGeneralForm)
        })

        .then(response => response.json())
        .then(dataGeneralForm => {

          console.log(dataGeneralForm);

          
          if (dataGeneralForm.status === "success") {
            Swal.fire(
              "EXITOSO!",
              dataGeneralForm.message,
              "success"
            )

            
            setTimeout(() => {
              window.location.href = "../../index.php"
            }, 1000);

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

          Swal.fire(
          'ERROR!',
          `Error la cedula escolar colocada ya es existente `,
          'error'
        );
        });
    }
  })
  </script>

  <script>
  $(document).ready(function() {
    cargarFormularioSincrono('formTotal', 'form.alumno.php');
  });

  function cargarFormularioSincrono(contenedor, archivo) {
    var response = $.ajax({
      url: archivo,
      async: false
    }).responseText;

    $('#' + contenedor).append(response);
  }
  </script>
</body>

</html>