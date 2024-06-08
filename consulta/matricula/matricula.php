<?php
session_start();

include "../../src/matricula.class.php";
$index = new Matricula;

if (isset($_SESSION["users"])) {
}

$nivel = $_SESSION['nivel'];



if ($nivel == 'A') {

  $nivel = "DIRECTOR(A)";
} else {

  $nivel = "Secretario(a)";
}
/*include "../barralateral.php";*/
/*include "../barralateral.php"*/
include "../barralateral.php";
/*include "../../Vista/parte.superior.php";*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MATRICULA</title>
  <link rel="icon" href="../../img/Retro.png">

  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
<style>
.filtro{
  display: none;
}

</style>
</head>

<body>

  <div class="alert alert-primary  container-sm text-lg-center border-5 mb-5 h3" role="alert"><strong>REGISTRAR ALUMNO</strong><a href="../../registro/alumno/alumno.php" class="alert-link h3" style="text-decoration: none; color:#ff0000"><br>AQUI!</a></div>

  <div class="card g-3 border-5 container d-flex justify-content-center mt-md-2">
    <div class="card-body">
      <h1 class="card-title text-center"><img src="../../img/estudiante1.png" width="60" height="60">
    MATRICULA <img src="../../img/estudiante2.png" width="60" height="60"></h1>
      <p class="card-text text-lg-center container-xxl border-3 h2 mb-3" style="color:#2c3e50">GRADOS-ALUMNOS</p>

      <br><br>

      <div class="container-fluid">
        <div class="row">

          <div class="col">
            <button class="btn" style="background:#F97F51; color:#ffffff;" name="grado1" id="grado1Principal" value="Mostrar" onclick="MostrarGrado1()">PRIMER GRADO
              <i class="fa fa-users ml-2 mr-2"></i>
            </button>
          </div>

          <div class="col">
            <button class="btn" style="background:#1B9CFC; color:#ffffff" id="grado2Principal" name="grado2" value="Mostrar" onclick="MostrarGrado2()">SEGUNDO GRADO
              <i class="fa fa-users ml-2 mr-2"></i>
            </button>
          </div>

          <div class="col">
            <button class="btn" style="background:#55E6C1; color:#ffffff" id="grado3Principal" name="grado3" value="Mostrar" onclick="MostrarGrado3()">TERCER GRADO
              <i class="fa fa-users ml-2 mr-2"></i>
            </button>
          </div>

          <div class="col">
            <button class="btn" style="background:#58B19F; color:#ffffff"  id="grado4Principal" name="grado4" value="Mostrar" onclick="MostrarGrado4()">CUARTO GRADO
              <i class="fa fa-users ml-2 mr-2"></i>
            </button>
          </div>

          <div class="col">
            <button class="btn" style="background:#FD7272; color:#ffffff" id="grado5Principal" name="grado5" value="Mostrar" onclick="MostrarGrado5()">QUINTO GRADO
              <i class="fa fa-users ml-2 mr-2"></i>
            </button>
          </div>

          <div class="col">
            <button class="btn" style="background:#6D214F; color:#ffffff" id="grado6Principal" name="grado6" value="Mostrar" onclick="MostrarGrado6()">SEXTO GRADO
              <i class="fa fa-users ml-2 mr-2"></i>
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <br>
  <br>

  <div class="container-fluid">
    <div class="row">

      <div class="container-fluid  card shadow mb-4" id="grado1Abajo" style="display:none;">
        <div class="card-body m-5">
          <div class="table">
            <label class="form-label">
              <span>Introduzca El <b>Nombre</b> o El <b>Apellido</b> o La <b>Cedula Escolar</b> del Alumno :</span>
            <input type="search" class="buscador form-control mb-3" id="buscador1grado" name ="buscador"> 
          </label>
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $index->get1();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      
        <div class="container-fluid  card shadow mb-4" id="grado2Abajo" style="display:none;">
          <div class="card-body m-5">
            <div class="table">
            <label class="form-label">
              <span>Introduzca El <b>Nombre</b> o El <b>Apellido</b> o La <b>Cedula Escolar</b> del Alumno :</span>
            <input type="search" class="buscador form-control mb-3" id="buscador2grado" name ="buscador"> 
          </label>  
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $index->get2();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="container-fluid  card shadow mb-4" id="grado3Abajo" style="display:none;">
          <div class="card-body m-5">
            <div class="table">
            <label class="form-label">
              <span>Introduzca El <b>Nombre</b> o El <b>Apellido</b> o La <b>Cedula Escolar</b> del Alumno :</span>
            <input type="search" class="buscador form-control mb-3" id="buscador3grado" name ="buscador"> 
          </label>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $index->get3();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="container-fluid  card shadow mb-4" id="grado4Abajo" style="display:none;">
          <div class="card-body m-5">
            <div class="table">
            <label class="form-label">
              <span>Introduzca El <b>Nombre</b> o La <b>Cedula</b> o La <b>Cedula Escolar</b> del Alumno :</span>
            <input type="search" class="buscador form-control mb-3" id="buscador4grado" name ="buscador"> 
          </label>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $index->get4();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="container-fluid  card shadow mb-4" id="grado5Abajo" style="display:none;">
          <div class="card-body m-5">
            <div class="table">
            <label class="form-label">
              <span>Introduzca El <b>Nombre</b> o La <b>Cedula</b> o La <b>Cedula Escolar</b> del Alumno :</span>
            <input type="search" class="buscador form-control mb-3" id="buscador5grado" name ="buscador"> 
          </label>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $index->get5();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="container-fluid  card shadow mb-4" id="grado6Abajo" style="display:none;">
          <div class="card-body m-5">
            <div class="table">
            <label class="form-label">
              <span>Introduzca El <b>Nombre</b> o La <b>Cedula</b> o La <b>Cedula Escolar</b> del Alumno :</span>
            <input type="search" class="buscador form-control mb-3" id="buscador6grado" name ="buscador"> 
          </label>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $index->get6();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="container-fluid row">
          <div class="col-sm-12">
            <div class="form-group row">

              <div class="col">
                <label for="genero_a">Género:</label>
                  <select name="genero_a" id="buscador11grado" class="form-control">
                    <option value="">Seleccione una opción</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                  </select>
                </label>
              </div>

              <div class="col">
                <label for="genero_a">¿Posee Cedula?:</label>
                  <select name="genero_a" id="buscador12grado" class="form-control">
                    <option value="">Seleccione una opción</option>
                    <option value="si">si</option>
                    <option value="no">no</option>
                  </select>
                </label>
                </div>

                
              <div class="col">
                <label for="genero_a">Periodos:</label>
                  <select name="genero_a" id="buscador12grado" class="form-control">
                    <option value="">Seleccione una opción</option>
                    <?php 
                              $index->getPeriodo();
                    ?>
                  </select>
                </label>
                </div>

                <div class="col">
                <label for="genero_a">Fecha de Inscripcion:</label>
                  <input type="text" class="buscador form-control mb-3" id="buscadorFecha" name ="buscador"> 
                </label>
                </div>

            </div>
          </div>
        </div>

        <div class="container-fluid  card shadow mb-4" id="">
          <div class="card-body m-5">
            <div class="table table-hover border-radius">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="thead">
                  <tr>
                  <th>N°</th>
                  <th>Alumno</th>
                  <th>¿Posee Cedula?</th>
                  <th>Cedula</th>
                  <th>Cedula Escolar</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Periodo Escolar</th>
                  <th>Fecha de Inscripcion</th>
                  <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $index->getFull();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <script src="../../vendor/jquery/jquery.min.js"></script>
      <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="../../js/sb-admin-2.min.js"></script>
      <script src="../../js/demo/datatables-demo.js"></script>
      <script src="../../vendor/sweetalert/sweetalert2.all.js"></script>
      <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>

      <script>
        function MostrarGrado1() {
          let grado1Principal = document.getElementById("grado1Principal");
          let grado1Abajo = document.getElementById("grado1Abajo");

          if (grado1Abajo.style.display == "none") {

            grado1Abajo.style.display = "block";
            grado1Principal.value = "Ocultar";


            if (grado2Abajo.style.display == "block" || grado3Abajo.style.display == "block" || grado4Abajo.style.display == "block" || grado5Abajo.style.display == "block" || grado6Abajo.style.display == "block") {

              grado2Abajo.style.display = "none";
              grado2Principal.value = "Ocultar";
              
              grado3Abajo.style.display = "none";
              grado3Principal.value = "Ocultar";
              
              grado4Abajo.style.display = "none";
              grado4Principal.value = "Ocultar";
              
              grado5Abajo.style.display = "none";
              grado5Principal.value = "Ocultar";
              
              grado6Abajo.style.display = "none";
              grado6Principal.value = "Ocultar";

            } 
        
          } else {
            grado1Abajo.style.display = "none";
            grado1Principal.value = "Mostrar";

            /* Swal.fire(
              'Good job!',
              'You clicked the button!',
              'success'
            ) */
          }
        }
      </script>

      <script>
        function MostrarGrado2() {
          let grado2Principal = document.getElementById("grado2Principal");
          let grado2Abajo = document.getElementById("grado2Abajo");

          if (grado2Abajo.style.display == "none") {
            grado2Abajo.style.display = "block";
            grado2Principal.value = "Ocultar";

            if (grado1Abajo.style.display == "block" || grado3Abajo.style.display == "block" || grado4Abajo.style.display == "block" || grado5Abajo.style.display == "block" || grado6Abajo.style.display == "block") {

              grado1Abajo.style.display = "none";
              grado1Principal.value = "Ocultar";

              grado3Abajo.style.display = "none";
              grado3Principal.value = "Ocultar";

              grado4Abajo.style.display = "none";
              grado4Principal.value = "Ocultar";

              grado5Abajo.style.display = "none";
              grado5Principal.value = "Ocultar";

              grado6Abajo.style.display = "none";
              grado6Principal.value = "Ocultar";

              } 
          } else {
            grado2Abajo.style.display = "none";
            grado2Principal.value = "Mostrar";
          }
        }
      </script>


      <script>
        function MostrarGrado3() {
          let grado3Principal = document.getElementById("grado3Principal");
          let grado3Abajo = document.getElementById("grado3Abajo");

          if (grado3Abajo.style.display == "none") {

            grado3Abajo.style.display = "block";
            grado3Principal.value = "Ocultar";

            if (grado1Abajo.style.display == "block" || grado2Abajo.style.display == "block" || grado4Abajo.style.display == "block" || grado5Abajo.style.display == "block" || grado6Abajo.style.display == "block") {

              grado1Abajo.style.display = "none";
              grado1Principal.value = "Ocultar";

              grado2Abajo.style.display = "none";
              grado2Principal.value = "Ocultar";

              grado4Abajo.style.display = "none";
              grado4Principal.value = "Ocultar";

              grado5Abajo.style.display = "none";
              grado5Principal.value = "Ocultar";

              grado6Abajo.style.display = "none";
              grado6Principal.value = "Ocultar";

              }

          } else {
            grado3Abajo.style.display = "none";
            grado3Principal.value = "Mostrar";

          }
        }
      </script>

      <script>
        function MostrarGrado4() {
          let grado4Principal = document.getElementById("grado4Principal");
          let grado4Abajo = document.getElementById("grado4Abajo");

          if (grado4Abajo.style.display == "none") {

            grado4Abajo.style.display = "block";
            grado4Principal.value = "Ocultar";

            if (grado1Abajo.style.display == "block" || grado2Abajo.style.display == "block" || grado3Abajo.style.display == "block" || grado5Abajo.style.display == "block" || grado6Abajo.style.display == "block") {

              grado1Abajo.style.display = "none";
              grado1Principal.value = "Ocultar";

              grado2Abajo.style.display = "none";
              grado2Principal.value = "Ocultar";

              grado3Abajo.style.display = "none";
              grado3Principal.value = "Ocultar";

              grado5Abajo.style.display = "none";
              grado5Principal.value = "Ocultar";

              grado6Abajo.style.display = "none";
              grado6Principal.value = "Ocultar";

              }
          } else {
            grado4Abajo.style.display = "none";
            grado4Principal.value = "Mostrar";

          }
        }
      </script>

      <script>
        function MostrarGrado5() {
          let grado5Principal = document.getElementById("grado5Principal");
          let grado5Abajo = document.getElementById("grado5Abajo");

          if (grado5Abajo.style.display == "none") {

            grado5Abajo.style.display = "block";
            grado5Principal.value = "Ocultar";

            if (grado1Abajo.style.display == "block" || grado2Abajo.style.display == "block" || grado3Abajo.style.display == "block" || grado4Abajo.style.display == "block" || grado6Abajo.style.display == "block") {

              grado1Abajo.style.display = "none";
              grado1Principal.value = "Ocultar";

              grado2Abajo.style.display = "none";
              grado2Principal.value = "Ocultar";

              grado3Abajo.style.display = "none";
              grado3Principal.value = "Ocultar";

              grado4Abajo.style.display = "none";
              grado4Principal.value = "Ocultar";

              grado6Abajo.style.display = "none";
              grado6Principal.value = "Ocultar";

              }

          } else {
            grado5Abajo.style.display = "none";
            grado5Principal.value = "Mostrar";

            /* Swal.fire(
              'Good job!',
              'You clicked the button!',
              'success'
            ) */
          }
        }
      </script>

      <script>
        function MostrarGrado6() {
          let grado6Principal = document.getElementById("grado6Principal");
          let grado6Abajo = document.getElementById("grado6Abajo");

          if (grado6Abajo.style.display == "none") {

            grado6Abajo.style.display = "block";
            grado6Principal.value = "Ocultar";

            if (grado1Abajo.style.display == "block" || grado2Abajo.style.display == "block" || grado3Abajo.style.display == "block" || grado4Abajo.style.display == "block" || grado5Abajo.style.display == "block") {
                          
              grado1Abajo.style.display = "none";
              grado1Principal.value = "Ocultar";
                          
              grado2Abajo.style.display = "none";
              grado2Principal.value = "Ocultar";
                          
              grado3Abajo.style.display = "none";
              grado3Principal.value = "Ocultar";
                          
              grado4Abajo.style.display = "none";
              grado4Principal.value = "Ocultar";
                          
              grado5Abajo.style.display = "none";
              grado5Principal.value = "Ocultar";
                          
              }
          } else {
            grado6Abajo.style.display = "none";
            grado6Principal.value = "Mostrar";

            /* Swal.fire(
              'Good job!',
              'You clicked the button!',
              'success'
            ) */
          }
        }
      </script>

    <script>
    document.addEventListener('change', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador11grado')) {
            document.querySelectorAll('.articulosFull').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>

<script>
    document.addEventListener('change', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador12grado')) {
            document.querySelectorAll('.articulosFull').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>

  <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscadorFecha')) {
            document.querySelectorAll('.articulosFull').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
  </script>
    
    <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador1grado')) {
            document.querySelectorAll('.articulos1').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>
    <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador2grado')) {
            document.querySelectorAll('.articulos2').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>
    <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador3grado')) {
            document.querySelectorAll('.articulos3').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>
    <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador4grado')) {
            document.querySelectorAll('.articulos4').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>
    <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador5grado')) {
            document.querySelectorAll('.articulos5').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>
    <script>
    document.addEventListener('keyup', e => {
        console.log(e.target.value);
        if (e.target.matches('#buscador6grado')) {
            document.querySelectorAll('.articulos6').forEach(fruta =>{
                fruta.textContent.toLowerCase().includes(e.target.value)
                ? fruta.classList.remove('filtro')
                :fruta.classList.add('filtro');
            })
        }
    })
    </script>
</body>

</html>