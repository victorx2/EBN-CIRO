<?php

class profesorProceso {
    private $baseData;
    public function __construct(){
        require_once "../../basedata/basedata2.php";
        $this->baseData = new baseData;
        $this->baseData->conexion(); 
    
        
}

public function getGrado() {
  $sql = "SELECT * FROM grado";
  $stmt = $this->baseData->conexion()->query($sql);

  while($row = $stmt->fetch()){
      echo '<option value=" ' . $row['id_grado'] . ' ">' . $row['grado'] . '</option>';
  }

}

public function getSeccion() {
  $sql = "SELECT * FROM seccion";
  $stmt = $this->baseData->conexion()->query($sql);

  while($row = $stmt->fetch()){
      echo '<option value=" ' . $row['id_seccion'] . ' ">' . $row['literal'] . '</option>';
  }

}

public function registroProfesor(){
    $sql = "SELECT * FROM profesor
    INNER JOIN grado ON profesor.id_g = grado.id_grado
    INNER JOIN seccion ON profesor.id_s = seccion.id_seccion";
    $stmt = $this->baseData->conexion()->query($sql);

    while($row= $stmt->fetch()){
        echo '<tr>';

        echo '<td>';
        
        echo 'nombre: '. $row['nombre_p'] .' apellido : ' . $row['apellido_P'] . '<br> cedula : ' . $row['cedula_p'] . '<br>';
        echo 'codigo de dependencia ' . $row['codigo_de_dependencia'] . ' - ' . $row['correo_p'] .  
        '<br> direccion : ' . $row['direccion_p']  . '<br> telefono : ' . $row['telefono_p'] . 
        '<br> año de servicio : ' . $row['year_de_servicio'] .'<br>' .
        '<br> ' . $row['grado'] .' grado seccion ' . $row['literal'] .' <br>';

        $datos = array (
            "id_p"=> $row['id_p'],
            "nombre" => $row['nombre_p'],
            "apellido" => $row['apellido_P'],
            "cedula" => $row['cedula_p'],
            "codigo" => $row['codigo_de_dependencia'],
            "correo" => $row['correo_p'],
            "direccion" => $row['direccion_p'],
            "año" => $row['year_de_servicio'],
            "telefono" => $row['telefono_p'],
            "grado" => $row['grado'],
            "seccion" => $row['literal'],

        );
    
        echo '</td>';

        echo '<td>';
        $this->verDetalles($datos);
        echo '<button type="submit" class="btn btn-primary mr-3" id="submitBtn" name="detalles" data-toggle="modal" data-target="#verDetalles-'. $row['id_p'] .'"> 
        Ver Detalles <span class="fa fa-user"></span></button>';

        echo '<br>';
        echo '<br>';
      
        echo '<form action="../admin/form.horario.php" method="post">
        <input type="hidden" name="datos" value= "'. htmlentities(serialize($datos)) .'">
        <button type="submit" class="btn btn-info" id="submitBtn" name="ficha" values">
        Horario  <span class="fa fa-file"></span> </button> </form>';

        echo '<br>';

        $this->eliminarProfesor($datos);
        echo '<button type="submit" class="btn btn-danger" id="submitBtn" name="boto" data-toggle="modal" data-target="#confirm-delete-'. $datos['id_p'] .'"> 
        Eliminar <span class="fa fa-trash"></span></button>';
 
      echo '</td>';
    echo '</tr>';
    }

}

public function verDetalles($datos) { 

    echo '<div class="modal fade" id="verDetalles-'. $datos['id_p'] .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos de la Inscrpcion</h5>
          </div>
          <div class="modal-body">
            <p>Datos del profesor:</p>
            <ul>
              <li>Nombrey Apellido: ' . $datos['nombre'].' '. $datos['apellido'] . '</li>
              <li>Cedula: ' . $datos['cedula'] . ' / Codigo de Dependencia: ' . $datos['codigo']. '</li>
              <li>Correo electronico: ' . $datos['correo'] . '</li>
              <li>Direccion : ' . $datos['direccion'] . '</li>
              <li>año: ' . $datos['año'] . '</li>
              <li>telefono: ' . $datos['telefono'] . '</li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>';
  }

private function eliminarProfesor($datos) {

    echo ' <div class="modal fade" id="confirm-delete-'. $datos['id_p'] .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Eliminar Horario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                ¿Desea eliminar al Docente "'. $datos['nombre'] .'" del sistema?
                            </div>

                            <div class="modal-footer">
                    <form id="FormDelete'. $datos['id_p'] .'" action="profesor.delete.php" method="post" style="display:inline">
                      <input type="hidden" name="nombre_p" id="nombre_p" value="' . $datos['nombre'] . '">
                      <input type="hidden" name="id" id="id" value="' . $datos['id_p'] . '">
                      <button type="submit" name="eliminar" id="submitBtnDelete'. $datos['id_p'] .'" class="btn btn-danger">Confirmar <span class="fa fa-trash"></span></button>
                    </form>
                          </div>
                      </div>
                  </div>
              </div>
              
            <script>
                 const generalFormDelete'. $datos['id_p'] .' = document.getElementById("FormDelete'. $datos['id_p'] .'"); 
                 const generalBtnFormDelete'. $datos['id_p'] .' = document.getElementById("submitBtnDelete'. $datos['id_p'] .'");
          
              generalFormDelete'. $datos['id_p'] .'.addEventListener("submit", (event)=> {
              
                  // EventoPredeterminado
              
              event.preventDefault()
              const dataGeneralFormDelete'. $datos['id_p'] .' = new FormData(generalFormDelete'. $datos['id_p'] .')
              const InfoGeneralFormDelete'. $datos['id_p'] .' = Object.fromEntries(dataGeneralFormDelete'. $datos['id_p'] .')
              console.log(InfoGeneralFormDelete'. $datos['id_p'] .')
              
                      fetch ("profesor.delete.php",{
                        method: "POST",
                        body: JSON.stringify(InfoGeneralFormDelete'. $datos['id_p'] .')
                      })
                    
                      .then(response => response.json())
                      .then(dataGeneralFormDelete'. $datos['id_p'] .' =>{
                      
                        console.log(dataGeneralFormDelete'. $datos['id_p'] .');
                      
                        // Respuesta de exitoso
                      if(dataGeneralFormDelete'. $datos['id_p'] .'.status === "success"){
                          Swal.fire(
                            "EXITOSO!",
                            dataGeneralFormDelete'. $datos['id_p'] .'.message,
                            "success"
                          )
                          
                          //Conteo de tiempo de alert
                              setTimeout(()=>{
                              window.location.href = "profesor.php"
                              },2500);
                            
                      }else if (dataGeneralFormDelete'. $datos['id_p'] .'.status === "invalid") {
                        Swal.fire(
                          "ERROR!",
                          dataGeneralFormDelete'. $datos['id_p'] .'.message,
                          "error"
                        )
                        
                      }else{
                        Swal.fire(
                          "ERROR!",
                          dataGeneralFormDelete'. $datos['id_p'] .'.message,
                          "warning"
                        )
                      }
                    
                      }).catch(error =>{
                        console.error("Error",error);
                      });     
                  
              })
              
              </script>
                ';
  }

}

?>

<script src = "../../vendor/sweetalert/sweetalert2.all.js"></script>
<script src = "../../vendor/sweetalert/sweetalert2.all.min.js"></script>