<?php 

?>
    <div id="repre" class="ml-5 mr-5">
        <div id="formulario_representante">

            <div class="card">

                <div class="card-body">

                    <hr>
                    <h4 class="collapse-header"><sub><img src="../../img/representante.png" width="70" height="70"></sub>Datos del Representante</h4>
<br>    
                    <h6 class="collapse-header">Informacion Basica:</h6>
<br>    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">

                                <div class="col">
                                    <label for="nombre_representante">Nombre:</label>
                                    <input type="text" pattern="[a-zA-Z ]+" name="nombre_representante" class="form-control" maxlength="20" required>
                                </div>
<br>    
                                <div class="col">
                                    <label for="apellido_representante">Apellido:</label>
                                    <input type="text" pattern="[a-zA-Z ]+" name="apellido_representante" class="form-control" maxlength="20" required>
                                </div>
<br>    
                                <div class="col">
                                    <label for="cedula_representante">Cedula:</label>
                                    <input type="text" pattern="[0-9 ]+" name="cedula_representante" class="form-control" maxlength="8" required>
                                </div>
                                
                                <div class="col">
                                    <label for="parentesco_representante">Parentesco:</label>
                                        <?php $opcion_seleccionada = "Madre" ?>
                                            <select name="parentesco_representante" class="form-control" required>
                                            <option value="Padre">Padre</option>
                                            <option value="Madre" <?php if ($opcion_seleccionada == "Madre") echo "selected"; ?>>Madre (seleccionada por defecto)</option>
                                            <option value="Otros">Otros</option>
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
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico..." name="correo_electronico_representante">
                                </div>
<br>    
                                <div class="col">
                                    <label for="telefono_representante">Telefono:</label>
                                    <input type="tel" pattern="[0-9 ]+" name="telefono_representante" class="form-control" maxlength="11" required>

                                    <label> tiene un telefono opcional ?
                                        <input type="radio" name="opcion3" value="si" onchange="mostrarFormulario3()"> Si
                                        <input type="radio" name="opcion3" value="no" onchange="mostrarFormulario3()"> No
                                    </label>
                                    
                                </div>
<br>               
                                <div id="opcional" class="col" style="display:none;">
                                    <label for="telefono_opc_representante">Telefono 2 <small>(opcional)</small> :</label>
                                    <input type="text" pattern="[0-9 ]+" name="telefono_opc_representante" class="form-control" maxlength="11">
                                </div>

                            </div>
                        </div>
                    </div>

                <label> Vive con el niño ?
                    <input type="radio" name="opcion4" value="si" onchange="mostrarFormulario4()"> Si
                    <input type="radio" name="opcion4" value="no" onchange="mostrarFormulario4()"> No
                </label>

        <div id="row" style="display:none;">
                    <hr>
                    <h6 class="collapse-header">Direccion de donde vive:</h6>  
                     
                    <div class="col-sm-12">
                        <label for="direccion_representante">Dirección:</label>
                        <input type="text" name="direccion_representante" class="form-control" maxlength="100">
                    </div>
        </div>

                        <hr>
                            <h6 class="collapse-header">Informacion del Trabajo:</h6>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">

                                <div class="col">
                                    <label for="profesion_representante">Profesión:</label>
                                    <input type="text" pattern="[a-zA-Z ]+" name="profesion_representante" class="form-control" maxlength="100" required>
                                </div>
<br>    
                                <div class="col">
                                    <label for="direccion_tra_representante">Dirección del Trabajo:</label>
                                    <input type="text" name="direccion_tra_representante" class="form-control" maxlength="100" required>
                                </div>
<br>                
                                <div class="col">
                                    <label for="telefono_tra_representante">Telefono del Trabajo:</label>
                                    <input type="text" pattern="[0-9 ]+" name="telefono_tra_representante" class="form-control" maxlength="11" required>
                                </div>  

                            </div>  
                        </div>  
                    </div>  

                </div>
            </div>
        </div> 
    </div> 

<script>
    function mostrarFormulario3() {
      var opcion = document.querySelector('input[name="opcion3"]:checked').value;
      var formulario = document.getElementById("opcional");
    
      if (opcion === "si") {
        formulario.style.display = "block";
      } else {
        formulario.style.display = "none";
      }
    }

    function mostrarFormulario4() {
      var opcion = document.querySelector('input[name="opcion4"]:checked').value;
      var formulario = document.getElementById("row");
    
      if (opcion === "no") {
        formulario.style.display = "block";
      } else {
        formulario.style.display = "none";
      }
    }
</script>