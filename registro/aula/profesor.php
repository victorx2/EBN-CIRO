<?php

session_start();

$usuario = $_SESSION['user'];

require '../../src/profesor.class.php';
$profesor = new profesor;

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registro de Profesores</title>
  <link rel="icon" href="../../img/Retro.png">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 mediun">

                  <?php if (!empty($usuario)) : ?>
                  <?= $usuario ?><br>
                  <?php endif; ?>
                </span>
                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="../../logout.php">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Cerrar Sesion
                  </a>
                  <div class="dropdown-divider"></div>
              </div>
            </li>
          </ul>
        </nav>

        <div class="container">


          <!-- AQUI SELECCIONAREMOS TODOS EL FORM PARA HACER PETICIONES DE DATOS  -->

          <form action="profesor.inic.php" id="Form" method="post" >
            <h1 class="text-center mb-5">REGISTRO DE PROFESOR DE AULA</h1>

            <br>

            <div class="card">
              <div class="card-body mr-5 ml-5">
                <div class="form-group row">

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group row">

                        <!-- AQUI EMPIEZAS LAS RECOLECCIÓN DE LA ID DE LOS PROFESORES -->

                        <div class="col">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" id="nombre" pattern="[a-zA-Z]*" name="nombre">
                        </div>

                        <div class="col">
                          <label for="apellido">Apellido</label>
                          <input type="text" class="form-control" id="apellido" pattern="[a-zA-Z]*" name="apellido">
                        </div>

                        <div class="col">
                          <label for="cedula">Cedula</label>
                          <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]*" minlength="8" maxlength="9" require>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group row">

                        <div class="col">
                          <label for="codigo"> Codigo de Dependencia</label>
                          <input type="text" class="form-control uppercase" id="codigo"
                            name="codigo">
                        </div>
                        <br>
                        <div class="col">
                          <label for="correo">Correo</label>
                          <input type="email" class="form-control" id="correo" name="correo">
                        </div>
                        <br>
                        <div class="col">
                          <label for="direccion">Direccion</label>
                          <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group row">

                        <div class="col">
                          <label for="ano">Año de servicio</label>
                          <input type="text" class="form-control" id="ano" name="ano" pattern="[0-9]*" maxlength="2">
                        </div>

                        <div class="col">
                          <label for="telefono">Telefono</label>
                          <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]*" minlength="10" maxlength="11">
                        </div>
                        
                      </div>
                    </div>
                  </div>

                  <input type="hidden" class="form-control" id="materia" name="materia" value="8">
                  
                  <div class="col">
                    <label for="grado" class="form-label">Grado</label>
                    <select id="grado" name="grado" class="form-control" require>
                      <option value="0">seleccione un Grado</option>

                      <?php

                      $profesor->getGrado();

                      ?>

                    </select>
                  </div>

                  <div class="col">
                    <label for="seccion" class="form-label">Seccion</label>
                    <select id="seccion" name="seccion" class="form-control" require>
                      <option value="0">seleccione un Seccion</option>

                      <?php

                      $profesor->getSeccion();

                      ?>

                    </select>
                  </div>
                  <hr>

                  <div class="col">
                    <button type="submit" id="submitBtn" class="btn btn-primary" name="submit">GUARDAR
                      <i class="fa fa-save"></i>
                    </button>
                  </div>

                  <hr>
                  
                </div>
              </div>
            </div>
          </div>
          
        </form>
        
        <br>
        <br>
        <br>
        <br>
        
      </div>
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
        <scrip src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>

      <script>
        let campoTexto = document.getElementById("codigo");
        campoTexto.addEventListener("input", function() {
          this.value = this.value.toUpperCase();
        });
        //id form general 5 tablas = id myForm
        const generalForm = document.getElementById("Form");
        //id = "submitBtn" button 
        const generalBtnForm = document.getElementById("submitBtn");

        let profesorEspecialBtn = document.getElementById("submitBtnEspecial");

        //Efecto de sonido jeje , para determinar el evento del formulario
        generalForm.addEventListener("submit", (event) => {

          // EventoPredeterminado

          event.preventDefault()
          const dataGeneralForm = new FormData(generalForm)
          const InfoGeneralForm = Object.fromEntries(dataGeneralForm)
          console.log(InfoGeneralForm)


          if (InfoGeneralForm.nombre == "" || InfoGeneralForm.apellido == "") {
            Swal.fire(
              'ERROR!',
              'debes ingresar  los datos de nombre o apellido !',
              'error'
            )
            

          }else if (InfoGeneralForm.cedula == "") {
          Swal.fire(
          'ERROR!',
          'Debes ingresar las cedula :',
            'error'
          ) 

          }else if (InfoGeneralForm.codigo == "" || InfoGeneralForm.ano == "") {
          Swal.fire(
          'ERROR!',
          'Debes ingresar el campo código de dependencia o los años de servicios :',
            'error'
          ) 
          
          } else {
            fetch("profesor.inic.php", {
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

                  //Conteo de tiempo de alert
                  setTimeout(() => {
                    window.location.href = "../../index.php"
                  }, 3000);

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

</body>

</html>