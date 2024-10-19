<?php

session_start();

  $usuario = $_SESSION['user'];


  if ($_SESSION['nivel'] == "A"){ 
    $nivel = "Diretor(a)";
  }else{
    $nivel = "Secretario(a)";
  }

include_once '../barralateral.php';
require_once '../../src/periodo.class.php';

$periodoEscolar = new periodoEscolar;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../img/retro.png">
  <title>Periodo Escolar</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="../../vendor/jquery/jquery-3.6.4.min.js"></script>


  <link href="../../vendor/sweetalert/sweetalert2.css" rel="stylesheet">

  <link rel="stylesheet" href="../../vendor/sweetalert/sweetalert2.min.css">
</head>

<body>

  <form action="periodo.inc.escolar.php" id='periodo' method="POST">
    <div class="VictorPro border-3">

      <div class="Victor card g-3 border-5 container d-flex justify-content-center mt-md-2 border-3">

        <div class="card-body">
          <h1 class="card-title text-center">PERIODO ESCOLAR</h1>

            <h5 class="card-subtitle mb-2 text-lg-left">
              <template></template>
              <?php if (!empty($usuario)) : ?>
                Nivel del Usuario : <?= $nivel ?>
              <?php endif; ?>
            </h5>

        <br>

              <?php
              $periodoEscolar->getPeriodo();
              ?>

          </div>
        
      </div>
    </div>
  </form>

  <section class="flex-shrink-0">
    <div class="container">
      <h1 class="mt-5"> </h1>
      <p class="lead"></p>
    </div>
  </section>

  <footer class="footer mt-auto py-3 bg-light sticky-footer">
    <div class="container-fluid text-center">
      <span class="text-muted">EBN BOLIVARIANA CIRO MALDONADO CERPA</span>
    </div>
  </footer>


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
    const form = document.getElementById("periodo");
    const btn_login = document.getElementById("periodo_escolar");

    form.addEventListener("submit", (event) => {
      event.preventDefault()
      const data = new FormData(form)
      const info = Object.fromEntries(data)
      console.log(info)
      if (info.periodo === "") {
        Swal.fire(
          'ERROR!',
          'debes ingresar todos los datos!',
          'error'
        )
      } else {
        /*registro\alumno\periodo.inc.escolar.php*/
        fetch('periodo.inc.escolar.php', {
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
                window.location.href = "periodoescolar.php"
              }, 1000);
            } else if (data.status === "invalid") {
              Swal.fire(
                'ERROR!',
                data.message,
                'error'
              )
            } else {
              Swal.fire(
                'ERROR!',
                data.message,
                'warning'
              )
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
      }


    })
  </script>

</body>

</html>