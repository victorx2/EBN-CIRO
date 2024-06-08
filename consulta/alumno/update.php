
<?php

session_start();


include '../barralateral.php';
include "../../src/gradoyseccion.php";
include "alumno/conexion.php";

$GradoSeccion = new GradoSeccion;


$datos = unserialize($_POST['datos']);

date_default_timezone_set("America/Caracas");

$P2 = date("Y");
$P3 = date("Y") + 1 ;

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

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
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

    <h1 class="text-center mb-5">Modo Edicion</h1>
    
    <div id="alumno" class="ml-5 mr-5">
  <div id="formulario_alumno">

    <div class="card">

      <div class="card-body">

  <form method="post" id="myForm" action="inscripcion.update.php"> 
       
          <h4 class="collapse-header"><sub><img src="../../img/estudiante1.png" width="60" height="60">
          <img src="../../img/estudiante2.png" width="60" height="60"></sub> Datos del Estudiante</h4>
    
      <br>
            <h5 class="collapse-header">Informacion Basica:</h5>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <input type="hidden" name="id_a" value="<?php echo $datos['id_a']; ?>">
            
                  <div class="col">
                      <label for="nombre_a">Nombre:</label>
                      <input type="text" name="nombre_a" id="nombre_a" class="form-control" pattern="[a-zA-Z ]*" value="<?php echo $datos['nombre_a']; ?>">
                  </div>
      <br>                      
                  <div class="col">
                      <label for="apellido_a">Apellido:</label>
                      <input type="text" name="apellido_a" id="apellido_a" class="form-control" pattern="[a-zA-Z ]*" value="<?php echo $datos['apellido_a']; ?>">
                  </div>
    
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <div class="col">
                    <label for="cedula_escolar_a">Cedula Escolar:</label>
                    <input type="text" name="cedula_escolar_a" id="cedula_escolar_a" class="form-control" pattern="[0-9]*" value="<?php echo $datos['cedula_escolar_a']; ?>" maxlength="11">
                  </div>
      <br> 
                  <div id="col" class="col" style="display:none;">
                      <label for="cedula_a">Cedula:</label>
                      <input type="text" name="cedula_a" id="cedula_a" class="form-control" pattern="[0-9]*" placeholder="<?php echo $datos['cedula_a']; ?>" value="<?php $datos['cedula_a']; ?>" maxlength="8">
                  </div>
    
                </div>
              </div>
            </div>
    
        <label> El niño tiene Cedula ?
            <input type="radio" name="opcion5" value="si" onchange="mostrarFormulario5()"> Si
            <input type="radio" name="opcion5" value="no" onchange="mostrarFormulario5()"> No
        </label>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <div class="col-4">
                    <div class="row-sm-12">
                      <div class="form-group col">
    
                        <div class="row">
                            <label for="genero_a">Género:</label>
                                <select name="genero_a" id="genero_a" class="form-control">
                                    <option value="<?php echo $datos['idgenero_a'] ?>"><?php echo $datos['genero_a'] ?></option>
                                    <option value="<?php echo $datos['idgenero2'] ?>"><?php echo $datos['genero2'] ?></option>
                                </select>
                        </div>
      <br>                       
                        <div class="row">
                            <label for="fecha_nac_a">Fecha de nacimiento:</label>
                            <input type="date" name="fecha_nac_a" id="fecha_nac_a" class="form-control" value="<?php echo $datos['nac']; ?>">
                        </div>
    
                      </div>
                    </div>
                  </div>
      <br>                                             
                  <div class="col">
                      <label for="lugar_nac_a">Lugar de nacimiento:</label>
                      <textarea class="form-control" id="lugar_nac_a" name="lugar_nac_a" rows="5"><?php echo $datos['lugar_nac_a']; ?></textarea>
                  </div>
    
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <div class="col">
                    <label>Estado</label> 
                      <select id="id_estado_a" name="id_estado_a" class="form-control">
                        <option value="<?php echo $datos['id_estado_a']; ?>"><?php echo $datos['estado_a']; ?></option>
                          <?php 
                            $estados = new direccion;
                            $estado = $estados->estado();
                            while($row = $estado->fetch()){
                                echo '<option value=" '. $row['id_estado'] .' ">'.$row['estado'].'</option>';
                            } 
                          ?>
                      </select>
                  </div>
                        
                  <div class="col">
                    <label>ciudades</label>
                      <select id="id_ciudad_a" name="id_ciudad_a" class="form-control">
                        <option value="<?php echo $datos['id_ciudad_a']; ?>"><?php echo $datos['ciudad_a']; ?></option>
                      </select>
                  </div>
                        
                  <div class="col">
                    <label>municipios</label>
                      <select id="id_municipio_a" name="id_municipio_a" class="form-control">
                        <option value="<?php echo $datos['id_municipio_a']; ?>"><?php echo $datos['municipio_a']; ?></option>
                      </select>
                  </div>
                        
                  <div class="col">
                    <label>parroquia</label>
                      <select id="id_parroquia_a" name="id_parroquia_a" class="form-control">
                        <option value="<?php echo$datos['id_parroquia_a']; ?>"><?php echo $datos['parroquia_a']; ?></option>
                      </select>
                  </div>
                        
                </div>
              </div>
            </div>
                        
            <div class="col-sm-12">
                <label for="direccion_a">Dirección:</label>
                <input type="text" name="direccion_a" id="direccion_a" class="form-control" maxlength="100" value="<?php echo $datos['direccion_a']; ?>">
              </div>
              <br> 
              
              <input type="hidden" name="update" id="update" class="form-control" maxlength="10" value="si">
    <br>

    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary" id="submitBtn" name="update">Guardar</button>
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

  <script src="alumno/select_alumno.js"></script>
  <script src="alumno/select_alumno2.js"></script>
  <script>
  function mostrarFormulario5() {
    var opcion = document.querySelector('input[name="opcion5"]:checked').value;
    var formulario = document.getElementById("col");

    if (opcion === "si") {
      formulario.style.display = "block";
    } else {
      formulario.style.display = "none";
    }
  }
  </script>

  <script>
  //id form general 5 tablas = id myForm
  const generalForm = document.getElementById("myForm");
  //id = "submitBtn" button 
  const generalBtnForm = document.getElementById("submitBtn");

  //Efecto de sonido jeje , para determinar el evento del formulario
  generalForm.addEventListener("submit", (event) => {

    // EventoPredeterminado

    event.preventDefault()
    const dataGeneralForm = new FormData(generalForm)
    const InfoGeneralForm = Object.fromEntries(dataGeneralForm)
    console.log(InfoGeneralForm)

    if (InfoGeneralForm.alumno === "") {
      Swal.fire(
        'ERROR!',
        'debes ingresar todos los datos!',
        'error'
      )

    } else {
      fetch("alumno.inc.php", {
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