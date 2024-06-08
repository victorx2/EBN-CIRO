
    <div id="salud.trasnporte" class="ml-5 mr-5">

        
        <div class="card">
            <div class="card-body">
                
                
                <label>El niño o niña problema de salud ?
                    <input type="radio" name="opcion1" value="si" onchange="mostrarFormulario1()"> Si
                    <input type="radio" name="opcion1" value="no" onchange="mostrarFormulario1()"> No
                </label>
            <hr>   
            
<div id="formulario1" style="display:none;">

    <h4 class="collapse-header"><sub><img src="../../img/salud.png" width="60" height="60"></sub>Salud</h4>
    <!-- seccion de Salud -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">

                            <div class="col">
                                <label for="alergia_salud">Alergias:</label>
                                <input type="text" pattern="[a-zA-Z ]+" class="form-control" id="alergia_salud" name="alergia_salud">
                            </div>
<br>
                            <div class="col">
                                <label for="dieta_salud">Dietas:</label>
                                <input type="text" pattern="[a-zA-Z ]+" class="form-control" id="dieta_salud" name="dieta_salud">
                            </div>
<br>                    
                            <div class="col">
                                <label for="tratamiento_M_salud">Tratamientos Medicos:</label>
                                <input type="text" pattern="[a-zA-Z ]+" class="form-control" id="tratamiento_M_salud" name="tratamiento_M_salud">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">

                            <div class="col">
                                <label for="condicion_fisica_salud">Condicion Fisica:</label>
                                <textarea class="form-control" pattern="[a-zA-Z ]+" id="condicion_fisica_salud" name="condicion_fisica_salud" rows="2"></textarea>
                            </div>
<br>
                            <div class="col">
                                <label for="atencion_especial_salud">Atencion Especial:</label>
                                <textarea class="form-control" pattern="[a-zA-Z ]+" id="atencion_especial_salud" name="atencion_especial_salud" rows="2"></textarea>
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
<!-- seccion de transporte -->
<hr>
    <h4 class="collapse-header"><sub><img src="../../img/transporte.png" width="60" height="60"></sub>Transporte</h4>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">

                            <div class="col">
                                <label for="nombre_transporte">nombre:</label>
                                <input type="text" pattern="[a-zA-Z ]+" class="form-control" id="nombre_transporte" name="nombre_transporte">
                            </div>
<br>                    
                            <div class="col">
                                <label for="cedula_transporte">Cedula:</label>
                                <input type="text" pattern="[0-9 ]+" name="cedula_transporte" class="form-control" maxlength="20">
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">

                            <div class="col">
                                <label for="telefono_transporte">telefono:</label>
                                <input type="text" pattern="[0-9 ]+" class="form-control" id="telefono_transporte" name="telefono_transporte" >
                            </div>
<br>                    
                            <div class="col">
                                <label for="numero_telefonico_opcional_transporte">numero telefonico <small>(opcional)</small> :</label>
                                <input  type="text" pattern="[0-9 ]+" class="form-control" id="numero_telefonico_opcional_transporte" name="numero_telefonico_opcional_transporte">
                            </div>
<br>                    
                            <div class="col">
                                <label for="numero_de_placa_transporte">numero de placa:</label>
                                <input type="text" class="form-control" id="numero_de_placa_transporte" name="numero_de_placa_transporte">
                            </div>

                        </div>
                    </div>
                </div>
            
</div>
</div>
</div>


<script>
    function mostrarFormulario1() {
  var opcion = document.querySelector('input[name="opcion1"]:checked').value;
  var formulario = document.getElementById("formulario1");
  
  if (opcion === "si") {
    formulario.style.display = "block";
  } else {
    formulario.style.display = "none";
  }
}

function mostrarFormulario2() {
  var opcion = document.querySelector('input[name="opcion2"]:checked').value;
  var formulario = document.getElementById("formulario2");
  
  if (opcion === "si") {
    formulario.style.display = "block";
  } else {
    formulario.style.display = "none";
  }
}
</script>