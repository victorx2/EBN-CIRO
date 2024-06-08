<?php

    session_start();
    
    $P1 = date("Y-m-d");

    date_default_timezone_set("America/Caracas");

    include '../barralateral.php';
    require '../../src/gradoyseccion.php';
   
    $datos = unserialize($_POST['datos']);
    
    $GradoSeccion = new GradoSeccion;
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ficha Acomulativa</title>

     
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.css" rel="stylesheet">

    <link href="../../vendor/sweetalert/sweetalert2.css" rel="stylesheet">

    <link href="../../vendor/sweetalert/sweetalert2.min.css" rel="stylesheet">

    <script src="../../vendor/jquery/jquery-3.6.4.min.js"></script>

</head>

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card m-5 p-2">
                <div class="card-body">

                    <form id="FormFicha" action="ficha.inc.php" method="post">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">

                                    <div class="col">
                                        <label for="turno">Alumno(a)
                                            <br>
                                            Nombre: <?php echo $datos['nombre_a']; ?>
                                            <br>
                                            Apellido: <?php echo $datos['apellido_a']; ?>
                                            <br>
                                            C.I: V-<?php echo $datos['cedula_a']; ?>, Sexo: <?php echo $datos['genero_a']; ?>
                                        </label>
                                    </div>

                                    <input type="hidden" name="id_familia" id="id_familia" class="form-control" value="<?php echo $datos['id_familia']; ?>">
                                    <input type="hidden" name="id_a" id="id_a" class="form-control" value="<?php echo $datos['id_a']; ?>">

                                    <div class="col">
                                        <label for="grado">Grado:</label>
                                        <input type="text" class="form-control" pattern="[a-zA-Z]*" value="<?php echo $datos['grado']; ?>" readonly>
                                    </div>

                                    <div class="col">
                                        <label for="seccion">Seccion:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['literal']; ?>"  readonly>
                                    </div>


                                    <div class="col">
                                        <label for="periodo">Periodo:</label>
                                        <input type="text" class="form-control" value="<?php echo $datos['periodo_escolar_a']; ?>">
                                    </div>

                                </div>
                            </div>
                        </div>
             
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">

                                  <div class="col">
                                      <label for="plantel">Plantel:</label>
                                      <textarea class="form-control" id="plantel" name="plantel" rows="2" required></textarea>
                                  </div>    

                                  <div class="col">
                                      <label for="doc_insc">Documento de Inscripcion:</label>
                                      <textarea class="form-control" id="doc_insc" name="doc_insc" rows="2" required></textarea>
                                  </div>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group row">

                                    <div class="col-2">
                                      <label for="fecha_insc_alumno">Fecha de inscripcion:</label>
                                      <input type="date" class="form-control" value="<?php echo $datos['fecha_insc_a']; ?>">
                                    </div>

                                    <div class="col-2">
                                        <label for="promocion">Promovido(a) al Grado:</label>
                                        <select name="promocion" id="promocion" class="form-control" required>
                                            <option value="">Seleccione una opción</option>
                                              <?php
                                                  $GradoSeccion->getNivel(); 
                                              ?>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="seccion_pro">Promovido(a) a Seccion:</label>
                                        <select name="seccion_pro" id="seccion_pro" class="form-control" required>
                                            <option value="">Seleccione una opción</option>
                                              <?php
                                                  $GradoSeccion->getSeccion(); 
                                              ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-2">
                                      <label for="fecha_pro_alumno">Fecha de la Promosion:</label>
                                      <input type="date" name="fecha_pro_alumno" id="fecha_pro_alumno" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">

                                <div class="col">
                                        <label for="turno">Representante
                                            <br>
                                            Nombre: <?php echo $datos['nombre_r']; ?>
                                            <br>
                                            Apellido: <?php echo $datos['apellido_r']; ?>
                                            <br>
                                            C.I: V-<?php echo $datos['cedula_r']; ?>, Parentesco: <?php echo $datos['parentesco']; ?>
                                        </label>
                                    </div> 

                                    <div class="col">
                                        <label for="profesor">Nombre del Profesor:</label>
                                        <br>
                                        <input type="text" name="profesor" id="profesor"  pattern="[a-zA-Z ]*" class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label for="cedula_profesor">Cedula del Profesor:</label>
                                        <br>
                                        <input type="text" name="cedula_profesor" id="cedula_profesor" class="form-control" pattern="[0-9]*" maxlength="8" required>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">

                                    <div class="col-2">   
                                        <label for="asistencia">Asistencia del Alumno:</label>
                                        <select name="asistencia" id="asistencia" class="form-control" required>
                                            <option value="100%" rows="2">100%</option>
                                            <option value="75%">75%</option>
                                            <option value="50%">50%</option>
                                            <option value="25%">25%</option>
                                            <option value="0%">0%</option>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="literal">literal:</label>
                                        <select name="literal" id="literal" class="form-control" rows="2" required>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
              
                                        </select>
                                    </div>
            
                                    <div class="col-6">
                                        <label for="observacion">Observacion:</label>
                                        <textarea class="form-control" id="observacion" name="observacion" rows="2" required></textarea>
                                    </div>
                <br>            
                                    <div class="col float-right mt-5">
                                      <button type="submit" class="btn btn-primary" id="save" name="save">Guardar <span class="fa fa-save"></span></button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

                        <div class="float-right mr-5">
                          <form action="ficha.php">
                          <button type="submit" class="btn btn-danger" id="submitBtn" name="pdf" 
                          values="pdf"><span class="fa fa-share"></span> Cancelar y regresar</button>
                          </form>
                        </div>

        </div>
                <br>
                <br>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <?php
                        include "../../Vista/parte_inferior.php";
                    ?>
                </div>
            </footer>
            <!-- End of Footer -->

   
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
               

         //id form general 5 tablas = id myForm
    const generalForm = document.getElementById("FormFicha");
       //id = "submitBtn" button 
    const generalBtnForm = document.getElementById("save");

    //Efecto de sonido jeje, para determinar el evento del formulario
    generalForm.addEventListener("submit", (event)=> {

        // EventoPredeterminado
        event.preventDefault()
        const dataGeneralForm = new FormData(generalForm)
        const InfoGeneralForm=Object.fromEntries(dataGeneralForm)
        
        console.log(InfoGeneralForm)


        if (InfoGeneralForm === ""){

          Swal.fire(
            'ERROR!',
            'debes ingresar todos los datos!',
            'error'
            )

        }else{
            fetch ("ficha.inc.php",{
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
                },2000);

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
                )}

            }).catch(error =>{
              console.error("Error",error);
            }); 
        }
    })
    </script>

</body>
</html>