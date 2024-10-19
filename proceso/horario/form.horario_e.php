<?php

session_start();

require "../../src/horario.class.php";
$horario = new Horario();

if (isset($_POST['datos'])) {

  $datos = unserialize($_POST['datos']);
  $_SESSION['dato'] = serialize($datos);
  unset($_SESSION['j']);
  $_SESSION['j'] = 0;

} else if (!isset($_POST['datos'])) {
  $datos = "";

  if (!isset($_SESSION['dato'])) {
    $_SESSION['dato'] = serialize($datos);
    unset($_SESSION['j']);

  } else {
    $datos = unserialize($_SESSION['dato']);
    $_SESSION['j']++;
  }
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
    <title>HORARIO</title>
    <link rel="icon" href="../../img/Retro.png">

          <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<!-- Custom fonts for this template-->
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template-->
<link href="../../css/sb-admin-2.css" rel="stylesheet">

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="nav-link  btn btn-outline-secondary mr-4" href="registro.php">
          <span class="fa fa-arrow-left"></span> REGISTRO DE PROFESORES</a>
          
          <!-- Fecha Actual: 23 / 08 / 2023 -->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline text-gray-600 mediun">

                      <?php if (!empty($usuario)):?>
                                <?= $usuario ?><br>
                      <?php endif; ?>
                      </span>
                      <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                  </a>
                  
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="../../logout.php" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  </div>
              </li> 
          </ul>
      </nav>

<div id="horario" class="container mt-3">

  <h1 class="text-center">
    Generador de horarios</h1>
  <br>
  <p class="mb-2">Crear los horarios de la institucion,
    podra crear el PDF, editar o eliminarlo, este generador de horario crea por dia, para crear uno rellene el formulario y
    haga pulse el boton "agregar dia" mas abajo se mostrar el o los dias registrados y a su lado tendra las opciones
    para editar eliminar y para crear el PDF pulse el boton "Crear PDF".</p>

  <hr>
<!-- require "../../src/horario.class.php"; -->
    <form action="../../reportes/horario.php" method="post">
      <input type="hidden" name="id_p" value= "<?php echo $datos['id_p']; ?>">
      <input type="hidden" name="grado" value= "<?php echo $datos['grado']; ?>">
      <input type="hidden" name="seccion" value= "<?php echo $datos['seccion']; ?>">
      <input type="hidden" name="nombre" value= "<?php echo $datos['nombre']; ?>">
      <input type="hidden" name="apellido" value= "<?php echo $datos['apellido']; ?>">
      <input type="hidden" name="cedula" value= "<?php echo $datos['cedula']; ?>">
      <br>
      <br>
      <button type="submit" class="btn btn-danger">Generar PDF <span class="fa fa-file-pdf"></span></button>
    </form>
  
    <div class="col">
      <br>
      <label for="datos">
        Profesor: <?php echo $datos['nombre'] . ' ' . $datos['apellido']; ?>
        <br>
        Cedula: V- <?php echo $datos['cedula']; ?>
        <br>
        <?php echo 'Especialista en '. $datos['materia']; ?>
      </label>
    </div>

  <form action="horario.inic.php" method="post" id="FormHorario" >

    <input type="hidden" name="id_p" value="<?php echo $datos['id_p']; ?>">
    
    <input type="hidden" name="grado" value="<?php echo $datos['grado']; ?>">
    
    <input type="hidden" name="seccion" value="<?php echo $datos['seccion']; ?>">
    
    <input type="hidden" name="materia" value="<?php echo $datos['materia']; ?>">

          <hr>
          <br>
          
            <div class="col-sm-4">
              <label for="id_dias" class="form-label">Dias</label>
                        
              <?php
                $horario->getDias($_SESSION['j']);
              ?>

            </div>  

          <br>
    <h4><span class="fa fa-clock mr-2"> </span> Horas </h4>
    <br>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group row">

          <div class="col">
            <label for="hora1" class="form-label"> 7:00am a 7:45am </label>
            <select id="hora1" name="hora1" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>

              <?php

                $horario->getnivel();

              ?>

            </select>
          </div>

          <div class="col-4">
            <label for="hora2" class="form-label"> 7:50am a 8:35am </label>
            <select id="hora2" name="hora2" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>
                      
              <?php
      
               $horario->getnivel();
                      
              ?>
      
            </select>
          </div>

          <div class="col">
            <label for="hora3" class="form-label">
              8:40am a 9:25am </label>
            <select id="hora3" name="hora3" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>

              <?php

               $horario->getnivel();

              ?>

            </select>
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group row">

          <div class="col">
            <label for="hora4" class="form-label">
              10:35am a 11:20am </label>
            <select id="hora4" name="hora4" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>

              <?php

             $horario->getnivel();

              ?>

            </select>
          </div>

          <div class="col">
            <label for="hora5" class="form-label">
              11:25am a 12:10am </label>
            <select id="hora5" name="hora5" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>

              <?php

              $horario->getnivel();

              ?>

            </select>
          </div>

          <div class="col">
            <label for="hora6" class="form-label">
              1:20pm a 2:05pm </label>
            <select id="hora6" name="hora6" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>

              <?php

             $horario->getnivel();

              ?>

            </select>
          </div>

          <div class="col">
            <label for="hora7" class="form-label">
              2:10pm a 3:00pm </label>
            <select id="hora7" name="hora7" class="form-control" required>
              <option value="HORA NO IMPARTIDA">HORA NO IMPARTIDA</option>

              <?php

               $horario->getnivel();

              ?>

            </select>
          </div>

        </div>
      </div>
    </div>

    <input type="hidden" name="id_p" value="<?php echo $datos['id_p']; ?>">
    
    <input type="hidden" name="grado" value="<?php echo $datos['grado']; ?>">
    
    <input type="hidden" name="seccion" value="<?php echo $datos['seccion']; ?>">
    
    <input type="hidden" name="materia" value="<?php echo $datos['materia']; ?>">

    <input type="hidden" name="espe" value="si">

    <button type="submit" id="SubmitBtn" name="save" class="btn btn-primary "> ENVIAR <span class="fa fa-save"> </span></button>

  </form>


  <center>
    <div class="col">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>

              <tr>
                <th>HORA</th>
                <th>LUNES</th>
                <th>MARTES</th>
                <th>MIERCOLES</th>
                <th>JUEVES</th>
                <th>VIERNES</th>
              </tr>

            </thead>
            <tbody>

              <td>
                <center>
                  7:00am a 7:45am
                  <hr>
                  7:50am a 8:35am
                  <hr>
                  8:40am a 9:25am
                  <hr>
                  10:35am a 11:20am
                  <hr>
                  11:25am a 12:10am
                  <hr>
                  1:20pm a 2:05pm
                  <hr>
                  2:10pm a 3:00pm <br>
                </center>
              </td>

                    <?php
       
              $counter = $horario->getHorarioPro($datos['id_p']);

              if ($counter >= 5) {
  
                $hola = "<style> #FormHorario{ display: none; } </style> <br> <div class='alert alert-danger'>Ya has creado el máximo número de horarios (5).</div>";
              
              } else {
              
                $hola ="";
              
              }

              echo $hola;

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</center>

<br>
<br>

<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>

<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plu../gin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom s../cripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<script src="../../vendor/sweetalert/sweetalert2.js"></script>
<script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>

<script>

    const form_Horario = document.getElementById("FormHorario");
    const btn_Horario = document.getElementById("SubmitBtn");

    form_Horario.addEventListener("submit", (event) => {
      event.preventDefault();

      const dataHorario = new FormData(form_Horario);
      const infoHorario = Object.fromEntries(dataHorario);
      console.log(infoHorario);

      if (
        infoHorario.hora1 === "" || infoHorario.hora2 === "" ||

        infoHorario.hora3 === "" || infoHorario.hora4 === "" ||

        infoHorario.hora5 === "" || infoHorario.hora6 === "" ||

        infoHorario.hora7 === "" || infoHorario.id_dias === "" ) {

        Swal.fire(
          "ERROR!",
          "Debes ingresar todos los dataHorario!",
          "error" 
        );

      } else {

        fetch("horario.inic.php",{
            method: "POST",
            body: JSON.stringify(infoHorario),
            })
          .then((response) => response.json())
          .then((dataHorario) => {

            console.log(dataHorario);

            if (dataHorario.status === "success") {

              Swal.fire(
                "Exito",
                dataHorario.message,
                "success" 
              )
/* C:\xampp\htdocs\11\E.B.N BOLIVARIANA CIRO 2023\proceso\horario\form.horario_e.php */
              //Conteo de tiempo de alert
              setTimeout(()=>{
              window.location.href = "form.horario_e.php"
              },1000);

            } else if (dataHorario.status === "invalid") {

              Swal.fire(
                "ERROR",
                dataHorario.message,
                "error"
              );


            } 

          }).catch((error) => {
            console.error("Error:", error);
          });
      }
    });
</script>
<br>

    </div>
  </div>

</div>
<br>