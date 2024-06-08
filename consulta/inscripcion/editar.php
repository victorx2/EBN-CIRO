<?php
  
  session_start();

  require '../../src/gradoyseccion.php';
  $GradoSeccion = new GradoSeccion;

  require 'alumno/conexion.php';

  $datos = unserialize($_POST['datos']);
  
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
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <a class="nav-link  btn btn-outline-secondary mr-4" href="registro.php">
                    <span class="fa fa-arrow-left"></span> Regresar</a>
                    
                    Fecha Actual: <?php $P1 = date("d / m / Y"); echo $P1;?>
                
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../logout.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

  <div class="card" class="ml-5 mr-5">
                        
    <div class="card-body">

      <form method="post" id="myForm" action="update.php">
        
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
    
              <div class="col">
                  <label>
                  Fecha de inscripcion:
                  <input type="text" name="fecha_insc_a" class="form-control"  value="<?php echo $datos['fecha_insc_a']; ?>" readonly>
              </div>

              <div class="col-6"></div>
              
              <div class="col">
                  Periodo Escolar:
                  <input type="text" name="periodo_escolar_a" class="form-control"  value="<?php echo $datos['periodo_escolar_a']; ?>" readonly>
                  </label>
              </div>

            </div>
          </div>
        </div>
    
      <hr>
    
          <h4 class="collapse-header"><sub><img src="../../img/estudiante1.png" width="60" height="60">
          <img src="../../img/estudiante2.png" width="60" height="60"></sub> Datos del Estudiante</h4>
    
      <br>
            <h5 class="collapse-header">Informacion Basica:</h5>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <input type="hidden" name="id_a" value="<?php echo $datos['id_a']; ?>">
                  <input type="hidden" name="fecha_insc_a" value="<?php echo $datos['fecha_insc_a']; ?>">
                  <input type="hidden" name="periodo_escolar_a" value="<?php echo $datos['periodo']; ?>">
            
                  <div class="col">
                      <label for="nombre_a">Nombre:</label>
                      <input type="text" name="nombre_a" id="nombre_a" class="form-control" value="<?php echo $datos['nombre_a']; ?>" readonly>
                  </div>
      <br>                      
                  <div class="col">
                      <label for="apellido_a">Apellido:</label>
                      <input type="text" name="apellido_a" id="apellido_a" class="form-control" value="<?php echo $datos['apellido_a']; ?>" readonly>
                  </div>
    
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">
    
                  <div class="col">
                    <label for="cedula_escolar_a">Cedula Escolar:</label>
                    <input type="text" name="cedula_escolar_a" id="cedula_escolar_a" class="form-control" value="<?php echo $datos['cedula_escolar_a']; ?>" maxlength="11" readonly>
                  </div>
      <br> 
                  <div class="col">
                      <label for="cedula_a">Cedula:</label>
                      <input type="text" name="cedula_a" id="cedula_a" class="form-control" value="<?php echo $datos['cedula_a']; ?>" maxlength="8" readonly>
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
                            <label for="genero_a">Género:</label>
                            <input type="text" name="genero_a" id="genero_a" class="form-control" value="<?php echo $datos['genero_a']; ?>" readonly>
                        </div>
      <br>                       
                        <div class="row">
                          <label for="fecha_nac_a">Fecha de nacimiento:</label>
                          <input type="text" name="fecha_nac_a" id="fecha_nac_a" class="form-control" value="<?php echo $datos['nac']; ?>" readonly>
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
                    <label>Estado</label>           
                    <input type="text" name="id_estado_a" class="form-control"  value="<?php echo $datos['estado_a']; ?>" readonly>
                  </div>

                  <div class="col">
                    <label>Ciudad</label>           
                    <input type="text" name="id_ciudad_a" class="form-control"  value="<?php echo $datos['ciudad_a']; ?>" readonly>
                  </div>

                  <div class="col">
                    <label>Municipio</label>           
                    <input type="text" name="id_municipio_a" class="form-control"  value="<?php echo $datos['municipio_a']; ?>" readonly>
                  </div>

                  <div class="col">
                    <label>Parroquia</label>           
                    <input type="text" name="id_parroquia_a" class="form-control"  value="<?php echo $datos['parroquia_a']; ?>" readonly>
                  </div>
                        
                </div>
              </div>
            </div>
                        
            <div class="col-sm-12">
                <label for="direccion_a">Dirección:</label>
                <input type="text" name="direccion_a" id="direccion_a" class="form-control" maxlength="100" value="<?php echo $datos['direccion_a']; ?>" readonly>
            </div>
      <br>  
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        
                      <div class="col">
                          <label for="grado_a">Grado:</label>
                            <select name="id_grado_a" id="grado_a" class="form-control">
                              <option value="<?php echo $datos['id_numero']; ?>"><?php echo $datos['numero']; ?></option>';
                              <?php $GradoSeccion->getGrado($datos['id_numero']); ?>  
                            </select>
                      </div>
      <br>                        
                      <div class="col">
                        <label for="seccion_a">Sección:</label>
                            <select name="id_seccion_a" id="seccion_a" class="form-control">
                              <option value="<?php echo $datos['id_literal']; ?>"><?php echo $datos['literal']; ?></option>';
                              <?php $GradoSeccion->getSeccion($datos['literal']); ?>
                        </select>
                      </div>
                        
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
                          <input type="text" name="nombre_representante" class="form-control" maxlength="20" pattern="[a-zA-Z]*" value="<?php echo $datos['nombre_r']; ?>">
                      </div>
      <br>        
                      <div class="col">
                          <label for="apellido_representante">Apellido:</label>
                          <input type="text" name="apellido_representante" class="form-control" maxlength="20" pattern="[a-zA-Z]*" value="<?php echo $datos['apellido_r']; ?>" >
                      </div>
                        
                </div>
              </div>
            </div>
                        
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group row">    
                      <div class="col">
                          <label for="cedula_representante">Cedula:</label>
                          <input type="text" name="cedula_representante" class="form-control" pattern="[0-9]*" maxlength="8" value="<?php echo $datos['cedula_r']; ?>">
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
                            <input type="tel" name="telefono_representante" class="form-control" maxlength="11" value="<?php echo $datos['telefono_r']; ?>" >                          
                        </div>
      <br>                         
                        <div id="opcional" class="col" style="display:block;">
                            <label for="telefono_opc_representante">Telefono 2:</label>
                            <input type="text" name="telefono_opc_representante" class="form-control" maxlength="11" value="<?php echo $datos['telefono_opcional_r']; ?>" >
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
                          <input type="text" name="direccion_representante" class="form-control"  maxlength="100" value="<?php echo $datos['direccion_r']; ?>">
                      </div>
            </div>      
                        
      <hr>
                <h6 class="collapse-header">Informacion del Trabajo:</h6>
                        
            <div class="col-sm-12">
                    <label for="profesion_representante">Profesión:</label>
                    <input type="text" name="profesion_representante" class="form-control" pattern="[a-zA-Z]*"  maxlength="100" value="<?php echo $datos['profesion_r']; ?>" >
            </div>
      <br> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        
                        <div class="col">
                            <label for="direccion_tra_representante">Dirección del Trabajo:</label>
                            <input type="text" name="direccion_tra_representante" class="form-control" maxlength="100" value="<?php echo $datos['direccion_trabajo_r']; ?>" >
                        </div>
      <br>                      
                        <div class="col">
                            <label for="telefono_tra_representante">Telefono del Trabajo:</label>
                            <input type="text" name="telefono_tra_representante" class="form-control" value="<?php echo $datos['telefono_trabajo_r']; ?>">
                        </div>  
                        
                    </div>  
                </div>  
            </div>
      <hr>   
            <h4 class="collapse-header"><sub><img src="../../img/procedencia.png" width="60" height="60"></sub>Procedencia</h4>
                        
            <input type="hidden" name="id_procedencia" class="form-control" value="<?php echo $datos['id_p']; ?>">
                        
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        
                        <div class="col">
                            <label for="de_donde_proviene_procedencia">De donde proviene:</label>
                            <textarea class="form-control" id="de_donde_proviene_procedencia" name="de_donde_proviene_procedencia" rows="2"><?php echo $datos['de_donde_proviene_p']; ?></textarea>
                        </div>
      <br>      
                        <div class="col">
                            <label for="motivo_procedencia">Motivo del cambio:</label>
                            <textarea class="form-control" id="motivo_procedencia" name="motivo_procedencia" rows="2"><?php echo $datos['motivo_p']; ?></textarea>
                        </div>
                        
                    </div>
                </div>
            </div>
                        
            <div class="col-sm-12">
                <label for="direccion_procedencia">Dirección:</label>
                <input type="text" class="form-control" id="direccion_procedencia" name="direccion_procedencia" value="<?php echo $datos['direccion_p']; ?>">
            </div>
                        
      <hr> 
                        
          <label>El niño o niña problema de salud ?
            <input type="radio" name="opcion1" value="si" onchange="mostrarFormulario1()"> Si
            <input type="radio" name="opcion1" value="no" onchange="mostrarFormulario1()"> No
          </label>
                        
      <br>   
                        
            <div id="formulario1" style="display:none;">
                        
              <h4 class="collapse-header"><sub><img src="../../img/salud.png" width="60" height="60"></sub>Salud</h4>
              <!-- seccion de Salud -->
                        
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group row">
                        
                      <input type="hidden" name="id_salud" class="form-control" placeholder="<?php echo $datos['id_s']; ?>">
                        
                      <div class="col">
                          <label for="alergia_salud">Alergias:</label>
                          <input type="text" class="form-control" id="alergia_salud" name="alergia_salud" placeholder="<?php echo $datos['alergia_s']; ?>">
                      </div>
      <br>
                      <div class="col">
                          <label for="dieta_salud">Dietas:</label>
                          <input type="text" class="form-control" id="dieta_salud" name="dieta_salud" placeholder="<?php echo $datos['dieta_s']; ?>">
                      </div>
      <br>                   
                      <div class="col">
                          <label for="tratamiento_M_salud">Tratamientos Medicos:</label>
                          <input type="text" class="form-control" id="tratamiento_M_salud" name="tratamiento_M_salud" placeholder="<?php echo $datos['tratamiento_M_s']; ?>">
                      </div>
                        
                    </div>
                  </div>
                </div>
                        
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group row">
                        
                      <div class="col">
                          <label for="condicion_fisica_salud">Condicion Fisica:</label>
                          <textarea class="form-control" id="condicion_fisica_salud" name="condicion_fisica_salud" rows="2"><?php echo $datos['condicion_fisica_s']; ?></textarea>
                      </div>
      <br>
                      <div class="col">
                          <label for="atencion_especial_salud">Atencion Especial:</label>
                          <textarea class="form-control" id="atencion_especial_salud" name="atencion_especial_salud" rows="2"><?php echo $datos['atencion_especial_s']; ?></textarea>
                      </div>
                        
                    </div>
                  </div>
                </div>
                        
            </div>
                        
            <label>El niño o niña tiene transporte ?
              <input type="radio" name="opcion2" value="si" onchange="mostrarFormulario2()"> Si
              <input type="radio" name="opcion2" value="no" onchange="mostrarFormulario2()"> No
            </label>
                        
      <br>   
            <div id="formulario2" style="display:none;">
      <hr>
                <h4 class="collapse-header"><sub><img src="../../img/transporte.png" width="60" height="60"></sub>Transporte</h4>
                        
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group row">
                        
                    <input type="hidden" name="id_transporte" class="form-control" value="<?php echo $datos['id_t']; ?>">
                        
                    <div class="col">
                        <label for="nombre_transporte">nombre:</label>
                        <input type="text" class="form-control" id="nombre_transporte" name="nombre_transporte" value="<?php echo $datos['nombre_t']; ?>">
                    </div>
      <br>                               
                    <div class="col">
                        <label for="cedula_transporte">Cedula:</label>
                        <input type="text" name="cedula_transporte" class="form-control" maxlength="20" value="<?php echo $datos['cedula_t']; ?>">
                    </div>
                        
                  </div>
                </div>
              </div>
                        
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group row">
                        
                    <div class="col">
                        <label for="telefono_transporte">telefono:</label>
                        <input type="text" class="form-control" id="telefono_transporte" name="telefono_transporte" value="<?php echo $datos['telefono_t']; ?>">
                    </div>
      <br>                                
                    <div class="col">
                        <label for="numero_telefonico_opcional_transporte">telefonico 2:</label>
                        <input  type="text" class="form-control" id="numero_telefonico_opcional_transporte" name="numero_telefonico_opcional_transporte" value="<?php echo $datos['numero_telefonico_opcional_t']; ?>">
                    </div>
      <br>                                
                    <div class="col">
                        <label for="numero_de_placa_transporte">numero de placa:</label>
                        <input type="text" class="form-control" id="numero_de_placa_transporte" name="numero_de_placa_transporte" value="<?php echo $datos['numero_de_placa_t']; ?>">
                    </div>
                        
                  </div>
                </div>
              </div>
                        
            </div>


      <button type="submit" name="editar" id="submitBtn" class="btn btn-success">Guardar <span class="fa fa-check"></span></button>
                        
    </form>

  </div>

</div>

  <script src = "../../vendor/sweetalert/sweetalert2.all.js"></script>
  <script src = "../../vendor/sweetalert/sweetalert2.all.min.js"></script>

  <script src="togle.js"></script>

  <script src="alumno/select_alumno.js"></script>
  <script src="alumno/select_alumno2.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery-3.6.4.min.js"></script>

    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
    <!-- Core plu../gin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        
    <!-- Custom s../cripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>


    <script>
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
/* 
        if (InfoGeneralForm.alumno === "") {
          Swal.fire(
                'ERROR!',
                 'debes ingresar todos los datos!',
                'error'
          ) */
        if (InfoGeneralForm.si.checked) {
          Swal.fire(
                'ERROR!',
                 'SI HAY SELECCIONLECIONADOdebes ingresar todos los datos!',
                'error'
          )
        }else if (InfoGeneralForm.no.checked) {
          Swal.fire(
                'ERROR!',
                 'DEBE SELECCIONAR AL MENOS UN CHECKOBOX ingresar todos los datos!',
                'warning'
          )

        }else{
            fetch ("update.php",{
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
                    window.location.href = "../../index.php"
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
</body>
</html>