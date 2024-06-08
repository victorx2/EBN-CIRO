<?php
  
  session_start();

  include '../barralateral.php';
  include "formularios/grado y seccion.php";
  $dato = new GradoSeccion;

  $datos = unserialize($_POST['datos']);

  date_default_timezone_set("America/Caracas");

  require_once '../../src/reinscripcion.class.php';
  $reinscripcion = new reinscripcion;

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
    <title>Inscripcio</title>

          <!-- Custom fonts for this template-->
          <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
          <!-- Custom styles for this template-->
          <link href="../../css/sb-admin-2.css" rel="stylesheet">
    
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

          <script src="../../vendor/jquery/jquery-3.6.4.min.js"></script>


          <link href="../../vendor/sweetalert/sweetalert2.css" rel="stylesheet">

          <link rel="stylesheet" href="../../vendor/sweetalert/sweetalert2.min.css">
 

</head>

<body>
  <form id="myForm" method="post" action="inscripcion.inc.php">

    <h1 class="text-center mb-5">Re-Inscripcion del Alumno</h1>

  <div id="alumno" class="ml-5 mr-5">
    <div id="formulario_alumno">
      <div class="card">
        <div class="card-body">

    <h4 class="collapse-header"><sub><img src="../../img/estudiante1.png" width="60" height="60">
          <img src="../../img/estudiante2.png" width="60" height="60"></sub> Datos del Estudiante</h4>
    
      <br>
            <h5 class="collapse-header">Informacion Basica:</h5>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <input type="hidden" id="id_a" value="<?php echo $datos['id_a']; ?>">
                  <input type="hidden" id="seccion" value="<?php echo $datos['literal']; ?>">

                  <div class="col-3">
                      <label>Periodo Cursado:</label>
                      <input type="text" class="form-control" value="<?php echo $datos['periodo']; ?>" readonly>
                  </div>

                  <div class="col-6">
                  </div>

                  <div class="col-3">
                      <label for="periodo">Periodo a Cursar:</label>
                      <input type="text" name="periodo" id="periodo" class="form-control" value="<?php echo $datos['periodo']; ?>" readonly>
                  </div>

                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
            
                  <div class="col">
                      <label for="nombre_a">Nombre:</label>
                      <input type="text" name="nombre_a" id="nombre_a" class="form-control" pattern="[a-zA-Z ]+"  value="<?php echo $datos['nombre_a']; ?>" readonly>
                  </div>
      <br>                      
                  <div class="col">
                      <label for="apellido_a">Apellido:</label>
                      <input type="text" name="apellido_a" id="apellido_a" class="form-control" pattern="[a-zA-Z ]+"  value="<?php echo $datos['apellido_a']; ?>" readonly>
                  </div>
    
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <div class="col">
                    <label for="cedula_escolar_a">Cedula Escolar:</label>
                    <input type="text" name="cedula_escolar_a" id="cedula_escolar_a" class="form-control" pattern="[0-9]+"   value="<?php echo $datos['cedula_escolar_a']; ?>" maxlength="11" readonly>
                  </div>
      <br> 
                  <div class="col">
                      <label for="cedula_a">Cedula:</label>
                      <input type="text" name="cedula_a" id="cedula_a" class="form-control" value="<?php echo $datos['cedula_a']; ?>" maxlength="8">
                  </div>
    
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <div class="col-4">
                    <div class="row-sm-12">
                      <div class="form-group col">

                        <div class="row">
                            <label for="genero_a">Genero</label>
                            <input type="text" name="genero_a" id="genero_a" class="form-control" pattern="[a-zA-Z ]+"  value="<?php echo $datos['genero_a']; ?>" readonly>
                        </div>
    
      <br>                       
                        <div class="row">
                            <label for="fecha_nac_a">Fecha de nacimiento:</label>
                            <input type="text" name="fecha_nac_a" id="fecha_nac_a" class="form-control"  value="<?php echo $datos['nac']; ?>" readonly>
                        </div>
    
                      </div>
                    </div>
                  </div>
      <br>                                             
                  <div class="col">
                      <label for="lugar_nac_a">Lugar de nacimiento:</label>
                      <textarea class="form-control" id="lugar_nac_a" name="lugar_nac_a" rows="5" readonly><?php echo $datos['lugar_nac_a']; ?></textarea>
                  </div>
    
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">

                  <div class="col">
                    <label for="id_estado_a">Estado</label>
                    <input type="text" name="id_estado_a" id="id_estado_a" class="form-control" value="<?php echo $datos['estado_a']; ?>" readonly>
                  </div>

                  <div class="col">
                    <label for="id_ciudad_a">Ciudad</label>
                    <input type="text" name="id_ciudad_a" id="id_ciudad_a" class="form-control" value="<?php echo $datos['ciudad_a']; ?>" readonly>
                  </div>

                  <div class="col">
                    <label for="id_municipio_a">Municipio</label>
                    <input type="text" name="id_municipio_a" id="id_municipio_a" class="form-control" value="<?php echo $datos['municipio_a']; ?>" readonly>
                  </div>

                  <div class="col">
                    <label for="id_parroquia_a">Parroquia</label>
                    <input type="text" name="id_parroquia_a" id="id_parroquia_a" class="form-control" value="<?php echo $datos['parroquia_a']; ?>" readonly>
                  </div>
                        
                </div>
              </div>
            </div>

                  <div class="col-sm-12">
                    <label for="direccion_a">Dirección:</label>
                    <input type="text" name="direccion_a" id="direccion_a" class="form-control" maxlength="100" value="<?php echo $datos['direccion_a']; ?>">
                  </div>
                    <br> 
                    
                    <input type="hidden" name="update" id="update" class="form-control" pattern="[a-zA-Z ]+" maxlength="10" value="si">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">

                  <?php $reinscripcion->promo($datos['id_a'], $datos['id_numero'], $datos['grado']); ?>

                </div>
              </div>
            </div>

      <hr>
            <h4 class="collapse-header"><sub><img src="../../img/representante.png" width="60" height="60"></sub>Datos del Representante</h4>
      <br>    
            <h5 class="collapse-header">Informacion Basica:</h5>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group row">
                        
                  <input type="hidden" name="id_representante" class="form-control" value="<?php echo $datos['id_r']; ?>">
                        
                      <div class="col">
                          <label for="nombre_representante">Nombre:</label>
                          <input type="text" name="nombre_representante" class="form-control" maxlength="20" pattern="[a-zA-Z ]+" value="<?php echo $datos['nombre_r']; ?>">
                      </div>
      <br>        
                      <div class="col">
                          <label for="apellido_representante">Apellido:</label>
                          <input type="text" name="apellido_representante" class="form-control" maxlength="20" pattern="[a-zA-Z ]+" value="<?php echo $datos['apellido_r']; ?>" >
                      </div>
                        
                </div>
              </div>
            </div>
                        
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">    
                      <div class="col">
                          <label for="cedula_representante">Cedula:</label>
                          <input type="text" name="cedula_representante" class="form-control" pattern="[0-9]+" maxlength="8" value="<?php echo $datos['cedula_r']; ?>">
                      </div>
                        
                      <div class="col">
                          <label for="parentesco_representante">Parentesco:</label>
                                  <select name="parentesco_representante" class="form-control" required>
                                  <option value="<?php echo $datos['parentesco'] ?>"><?php echo $datos['parentesco']?></option>
                                  <option value="<?php echo $datos['parentesco2'] ?>"><?php echo $datos['parentesco2'] ?></option>
                                  <option value="<?php echo $datos['parentesco3'] ?>"><?php echo $datos['parentesco3'] ?></option>
                              </select>
                      </div>
                        
                </div>
              </div>
            </div>
                        
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        
                        <div class="col">
                            <label for="correo_electronico_representante">Correo Electronico</label>
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $datos['correo_electronico_r']; ?>" name="correo_electronico_representante">
                        </div>
      <br>              
                        <div class="col">
                            <label for="telefono_representante">Telefono:</label>
                            <input type="tel" name="telefono_representante" class="form-control" pattern="[0-9]+"  maxlength="11" value="<?php echo $datos['telefono_r']; ?>" >                          
                        </div>
      <br>                         
                        <div id="opcional" class="col" style="display:block;">
                            <label for="telefono_opc_representante">Telefono 2:</label>
                            <input type="text" name="telefono_opc_representante" class="form-control"  maxlength="11" value="<?php echo $datos['telefono_opcional_r']; ?>" >
                        </div>
                        
                    </div>
                </div>
            </div>
                        
            <label> Tiene un telefono opcional ?
              <input type="radio" name="opcion4" value="si" onchange="mostrarFormulario4()"> Si
              <input type="radio" name="opcion4" value="no" onchange="mostrarFormulario4()"> No
            </label>
        <br> 
            <label> Vive con el Niño ?
              <input type="radio" name="opcion3" value="si" onchange="mostrarFormulario3()"> Si
              <input type="radio" name="opcion3" value="no" onchange="mostrarFormulario3()"> No
            </label>
                        
            <div id="row" style="display:block;">
      <hr>
                      <h6 class="collapse-header">Direccion de donde vive:</h6> 
                        
                      <div class="col-sm-12">
                          <label for="direccion_representante">Dirección:</label>
                          <input type="text" name="direccion_representante" 
                          id="direccion_representante"class="form-control"   maxlength="100" value="<?php echo $datos['direccion_r']; ?>">
                      </div>
            </div>      
                        
      <hr>
                <h6 class="collapse-header">Informacion del Trabajo:</h6>
                        
            <div class="col-sm-12">
                    <label for="profesion_representante">Profesión:</label>
                    <input type="text" name="profesion_representante" id="profesion_representante" class="form-control" pattern="[a-zA-Z ]+"  maxlength="100" value="<?php echo $datos['profesion_r']; ?>" >
            </div>
      <br> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        
                        <div class="col">
                            <label for="direccion_trabajo_r">Dirección del Trabajo:</label>
                            <input type="text" name="direccion_trabajo_r" id="direccion_trabajo_r"class="form-control" maxlength="100" value="<?php echo $datos['direccion_trabajo_r']; ?>" >
                        </div>
      <br>                      
                        <div class="col">
                            <label for="telefono_tra_representante">Telefono del Trabajo:</label>
                            <input type="text" name="telefono_tra_representante" class="form-control" pattern="[0-9]+" value="<?php echo $datos['telefono_trabajo_r']; ?>">
                        </div>  
                        
                    </div>  
                </div>  
            </div>

            </div>
          </div>
        </div>
      </div>

<br>
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" id="submitBtn" name="submit">Guardar</button>
      </div>
<br>
  </form>

  <script src = "../../vendor/sweetalert/sweetalert2.all.js"></script>
  <script src = "../../vendor/sweetalert/sweetalert2.all.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
    <!-- Core plu../gin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        
    <!-- Custom s../cripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>


    <script>

    function mostrarFormularioX() {
      var opcion = document.querySelector('input[name="opcionX"]:checked').value;
      var formulario = document.getElementById("repre");
    
      if (opcion === "si") {
        formulario.style.display = "block";
      } else {
        formulario.style.display = "none";
      }
    }

         
       //id form general 5 tablas = id myForm
       const generalForm = document.getElementById("myForm");
       //id = "submitBtn" button 
       const generalBtnForm = document.getElementById("submitBtn");

    //Efecto de sonido jeje , para determinar el evento del formulario
    generalForm.addEventListener("submit", (event)=> {

        // EventoPredeterminado

        event.preventDefault()
        const dataGeneralForm = new FormData(generalForm)
        const InfoGeneralForm = Object.fromEntries(dataGeneralForm)
        console.log(InfoGeneralForm)

        if (InfoGeneralForm.alumno === "" || InfoGeneralForm.repre === "" || InfoGeneralForm.pro === "") {
          Swal.fire(
                'ERROR!',
                 'debes ingresar todos los datos!',
                'error'
          )

        }else{
            fetch ("reinscripcion.inc.php",{
              method: 'POST',
              body: JSON.stringify(InfoGeneralForm)
            })

            .then(response => response.json())
            .then(dataGeneralForm =>{

              console.log(dataGeneralForm);
    
              // Respuesta de exitoso
            if(dataGeneralForm.status === "success"){
                Swal.fire(
                  "EXITOSO!",
                  dataGeneralForm.message,
                  "success"
                )

                //Conteo de tiempo de alert
                    setTimeout(()=>{
                    window.location.href = "registro.php"
                    },3000);

            }else if (dataGeneralForm.status === "invalid") {
              Swal.fire(
                "ERROR!",
                dataGeneralForm.message,
                "error"
              )

            }else{
              Swal.fire(
                "ERROR!",
                dataGeneralForm.message,
                "warning"
              )
            }

            }).catch(error =>{
              console.error("Error",error);
            });     
        }
    })
    
    </script>

    <script>
      $(document).ready(function() {
        cargarFormularioSincrono('formTotal', 'formularios/editar.php');
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