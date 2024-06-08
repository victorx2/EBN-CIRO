<?php

session_start();

$usuario = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>COPIA DE SEGURIDAD - E.B.N BOLIVARIANA</title>
  <link rel="icon" href="../../img/Retro.png">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <a class="nav-link  btn btn-outline-secondary mr-4" href="../../index.php">
            <span class="fa fa-arrow-left"></span> MENU PRINCIPAL</a>

          Fecha Actual: 23 / 08 / 2023
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="../../logout.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 mediun">
                  <!-- <span>!EXITOSO¡</span> -->
                  <?php if (!empty($usuario)) : ?>
                    <?= $usuario ?><br>
                  <?php endif; ?>
                </span>

                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <div class="container">


          <!-- AQUI SELECCIONAREMOS TODOS EL FORM PARA HACER PETICIONES DE DATOS  -->

          <form action="profesor.inic.php" id="Form" method="post">
            <h1 class="text-center mb-3">COPIAS DE SEGURIDAD <span class="badge bg-secondary" style="color:white;">ADMIN</span></h1>

            <br>

            <div class="card-group mb-5">
              <div class="card-body  mr-5 ml-5">
                <div class="form-group row">

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group row">

                        <!-- AQUI EMPIEZAS LAS RECOLECCIÓN DE LA ID DE LOS PROFESORES -->

                        <div class="col">
                          <label for="nombre_admin">Usuario</label>
                          <input type="text" class="form-control" id="nombre_admin" name="nombre_admin" value="<?php echo $_SESSION['user']; ?>" readonly>
                        </div>

                        <div class="col">
                          <label for="passwd_admin">CONTRASEÑA</label>
                          <input type="password" class="form-control" id="passwd_admin" name="passwd_admin" required>
                        </div>

                      </div>
                    </div>
                  </div>
            
                  </div>
              </div>
            </div>

                  <!-- BOTONES -->
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group row">

                        <button type="submit" id="submitBtn" class="btn btn-warning col-lg-12 opacity-70" name="submitBtn">GUARDAR</button>

                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>

        </div>

        </form>


        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../js/demo/datatables-demo.js"></script>

        <script src="../../vendor/sweetalert/sweetalert2.all.js"></script>
        <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>

        <script>
          //id form general 5 tablas = id myForm

          const generalForm = document.getElementById("Form");
          const generalBtnForm = document.getElementById("submitBtn");

          //Efecto de sonido jeje , para determinar el evento del formulario

          generalForm.addEventListener("submit", (event) => {

            // EventoPredeterminado

            event.preventDefault()
            const dataGeneralForm = new FormData(generalForm)
            const InfoGeneralForm = Object.fromEntries(dataGeneralForm)
            console.log(InfoGeneralForm)

            if (InfoGeneralForm.nombre_admin == "" && InfoGeneralForm.passwd_admin == "") {
              Swal.fire(
                'ERROR!',
                'debes ingresar todos los datos!',
                'error'
              )

            } else {
              fetch("respaldo.inic.php", {
                  method: 'POST',
                  body: JSON.stringify(InfoGeneralForm)
                })

                .then(response => response.json())
                .then(dataGeneralForm => {

                  console.log(dataGeneralForm);

                  // Respuesta de exitoso
                  if (dataGeneralForm.status == "success") {
                    Swal.fire(
                      "EXITOSO!",
                      dataGeneralForm.message,
                      "success"
                    )

                    //Conteo de tiempo de alert

                    setTimeout(() => {
                      window.location.href = "respaldo.bd.php"
                    }, 3000);


                  } else if (dataGeneralForm.status == "invalid") {
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