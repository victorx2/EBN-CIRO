<?php
/* C:\xampp\htdocs\E.B.N BOLIVARIANA CIRO 2023\src\gradoyseccion.php */
    /* require_once "../../src/gradoyseccion.php"; */
    include_once '../../src/gradoyseccion.php';
    require_once "alumno/conexion.php";

    $GradoSeccion = new GradoSeccion;

    date_default_timezone_set("America/Caracas");

    require_once '../../src/periodo.class.php';
    $periodoEscolar = new periodoEscolar;

?>
<div id="alumno" class="ml-5 mr-5">
  <div id="formulario_alumno">

    <div class="card">
      <div class="card-body">
          <div class="col-sm-4">
            
          

        <h4 class="collapse-header"><sub><img src="../../img/estudiante1.png" width="70" height="70"><img
              src="../../img/estudiante2.png" width="70" height="70"></sub>Datos del Estudiante</h4>
        <br>
        <h5 class="collapse-header">Informacion Basica:</h5>
        
        <div class="col">
                <label for="fecha_insc_a">Fecha de inscripcion:</label>
                <br>
                <input type="text" name="fecha_insc_a" id="fecha_insc_a" value="<?php echo date("Y-m-d"); ?>"
                  class="form-control" readonly>
              </div>
            </div>
            
            <!-- <div class="form-check mb-3">
                <input id="" name="" type="checkbox" class="form-check-input" value="" />
                <label id="_label" class="form-check-label" for=""></label>
            </div> -->
            
            <!-- <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <div class="col-4">
                <div class="row-sm-12">
                  <div class="form-group col">
                    <div class="row">
                      <label for="genero_a">Género:</label>
                      <input type="checkbox" name="" id="">
                    </div>
                    <br>
                    <div class="row">
                      <label for="fecha_nac_a">Fecha de nacimiento:</label>
                      <input type="checkbox" name="fecha_nac_a" id="fecha_nac_a" class="form-control" >
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="col">
                <label for="lugar_nac_a">Lugar de nacimiento:</label>
                <input type = "checkbox" class="form-control" id="lugar_nac_a" name="lugar_nac_a"> 
              </div>
            </div>
          </div>
        </div> -->
            
        
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <div class="col">
                <label for="nombre_a">Nombre:</label>
                <input type="text" name="nombre_a" id="nombre_a" pattern="[a-zA-ZñÑ ]*" class="form-control" >
              </div>
              <br>
              <div class="col">
                <label for="apellido_a">Apellido:</label>
                <input type="text" name="apellido_a" id="apellido_a" pattern="[a-zA-ZñÑ ]*" class="form-control" >
              </div>
              <br>
              <div class="col">
                <label for="cedula_escolar_a">Cedula Escolar:</label>
                <input type="text" name="cedula_escolar_a" id="cedula_escolar_a" class="form-control" pattern="[0-9 ]*"
                  maxlength="11">
              </div>
              <br>
              <div id="col" class="col" style="display:none;">
                <label for="cedula_a">Cedula:</label>
                <input type="text" name="cedula_a" id="cedula_a" class="form-control" pattern="[0-9 ]*" maxlength="8">
              </div>

            </div>
          </div>
        </div>

        <label> El niño tiene Cedula ?
          <input type="radio" name="opcion5" value="si" onchange="mostrarFormulario5()"> Si
          <input type="radio" name="opcion5" value="no" onchange="mostrarFormulario5()"> No
        </label>
        <br>
        <br>
        
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <div class="col-4">
                <div class="row-sm-12">
                  <div class="form-group col">
                    <div class="row">
                      <label for="genero_a">Género:</label>
                      <select name="genero_a" id="genero_a" class="form-control" >
                        <option value="">Seleccione una opción</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                    </div>
                    <br>
                    <div class="row">
                      <label for="fecha_nac_a">Fecha de nacimiento:</label>
                      <input type="date" name="fecha_nac_a" id="fecha_nac_a" valu="<?php echo date("d/m/Y"); ?>" class="form-control" >
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="col">
                <label for="lugar_nac_a">Lugar de nacimiento:</label>
                <textarea class="form-control" id="lugar_nac_a" name="lugar_nac_a" rows="5" ></textarea>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <h5 class="collapse-header">Direccion de donde vive:</h5>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">
              <div class="col">
                <label>Estado</label>
                <select id='id_estado_a' name='id_estado_a' class='form-control'>
                  <option value='0'>Selecciona una estado</option>
                  <?php
                      $estados = new direccion;
                      $estado = $estados->estado();
                      while($row = $estado->fetch()){
                          echo '<option value=" ' . $row['id_estado'] . ' ">' . $row['estado'] . '</option>';
                      }
                  ?>
                </select>
              </div>
              <div class="col" id="ciudad_alumno"></div>
              <div class="col" id="municipio_alumno"></div>
              <div class="col" id="parroquia_alumno"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <label for="direccion_a">Dirección:</label>
          <input type="text" name="direccion_a" id="direccion_a" class="form-control" maxlength="100" >
        </div>
        <hr>
        <h5 class="collapse-header">Informacion Academica:</h5>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group row">

              <div class="col">
                <?php
                 
                    $GradoSeccion->setGrado(); 
                
                ?>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

  </div>


<script src="alumno/select_alumno.js"></script>
<script src="alumno/select_alumno2.js"></script>

<script>
const fechaNacimiento = document.getElementById("fecha_nac_a");
const fechaActual = new Date();
fechaNacimiento.value = fechaActual.toLocaleDateString("es-ES");

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