<?php

session_start();

include '../barralateral.php';

$message = '';

if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../img/Retro.png">
  <title>Registro de Alumno</title>

  
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  
  <div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><img src="../../img/estudiante3.png" width="60" height="60">CONSULTAS DE LOS ALUMNO
    <img src="../../img/estudiante4.png" width="60" height="60"></h1>
    <br>
    <p class="mb-4">Consulta de los Estudiantes registrado en el sistema, Puede buscar al o los Estudiantes con su
       <b>Nombre</b>, <b>Apellido</b> o <b>Cedular</b> o <b>Cedular Escolar</b>, tambien
      podra editar o desabilitar y habilitar segun sea el caso, para realizar el proceso de inscribir vaya a
      <a target="_blank" href="../../proceso/inscripcion/registro.php">Inscribir</a> o si quiere ver la(s) ficha(s) acomulativa(s) de los estudiantes vaya a
      <a target="_blank" href="../ficha/ficha.php">Ficha acomulativa</a>.
    </p>

   
    <div class="card shadow mb-4">

      <form method="POST" action="alumno.php" class="m-3">

        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">

              <div class="col">
                <label class="form-label">
                  <span>Introduzca un dato :</span>
                  <input type="text" class="form-control" id="buscar" name="buscar"
                    value="<?php echo $_POST['buscar']; ?>">
                </label>
                <button type="text" class="btn btn-primary">Buscar <span class="fa fa-search"></span></button>

              </div>
            </div>
          </div>

      </form>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">


            <?php

              require_once '../../src/alumno.class.php';
              
              $data = new Alumno;

              $data->search();
              
            ?>

          </table>
        </div>
      </div>
    </div>

  </div>
   

  </div>
   
 
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <?php
            include "../../Vista/parte_inferior.php";
            ?>
    </div>
  </footer>
   

  </div>
   

  </div>
  
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  
  <script src="../../js/sb-admin-2.min.js"></script>

   
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

 
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>