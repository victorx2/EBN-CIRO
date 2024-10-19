<?php
class periodoEscolar {

    private $basedata;

    public function __construct(){

      require_once 'basedata2.php';
      $this->basedata = new baseData;

      $this->basedata->conexion();
    }

    
  public function actual(){
    $sql = "SELECT * FROM periodo WHERE activo = 'si'";
    $stmt = $this->basedata->conexion()->query($sql);
    $stmt->execute();

    $resultados = $stmt->fetch();

    if ($stmt->rowCount() > 0) { 

      echo '
        <input type="text" name="periodo_escolar_a" id="periodo_escolar_a" value="'.$resultados['part1'] .' / '. $resultados['part2'] .'"
        class="form-control" readonly>';

    } else {

      echo'                
      Actualmente no hay un Año Escolar <b>Activo</b>, por favor registre un periodo para poder registrar niños en el sistema';
    }
     
  }


    public function agregar($part1, $part2, $activo){
 
      $sql = "SELECT * FROM periodo WHERE part1 = :part1 AND part2 = :part2";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':part1', $part1);
      $stmt->bindParam(':part2', $part2);
      $stmt->execute();
      
      $existe = $stmt->fetch();
      
      if ($existe > 0) {
          return false;
      } else {

          $sql = "INSERT INTO periodo (part1, part2, activo) VALUES (:part1, :part2, :activo)";
          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindParam(':part1',$part1);
          $stmt->bindParam(':part2',$part2);
          $stmt->bindParam(':activo',$activo);

          if ($stmt->execute()) {

            return true;
    
          } else {
    
            return false;
    
          } 
      }  

    }

    public function actualizar($id, $activo){
 
      $sql = "UPDATE periodo SET activo = :activo WHERE id = :id";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':activo', $activo);
      
      if ($stmt->execute()) {

        return true;

      } else {

        return false;

      }   

    }

  public function getPeriodo(){
    $sql = "SELECT * FROM periodo WHERE activo = 'si'";
    $stmt = $this->basedata->conexion()->query($sql);
    $stmt->execute();

    $resultados = $stmt->fetch();

    if ($stmt->rowCount() > 0) { 

      $part1= $resultados['part1']+1 ;
      $part2= $resultados['part2']+1 ;

      echo '<form action="">

      El Año Escolar actual es <b>'.$resultados['part1'] .' / '. $resultados['part2'] .'.</b><br><br>

      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="form-group row">

            <div class="col">
              <label for="termina">Periodo Escolar Actual:</label>
            </div>

            <input type="text" maxlength="4" pattern="[0-9]*" value="'. $resultados['part1'] .' / '. $resultados['part2'] .'" class="form-control" readonly>
            
          </div>
        </div>
      </div>
      
      <div class="row justify-content-center">
          <button type="button"  class="btn btn-danger"  data-toggle="modal" data-target="#verDetalles-">
            Cerrar
            <i class="fa fa-eraser"></i>
          </button>
        <input name="id" id="id" type="hidden" value="'. $resultados['id'] .'">
      </div>

      <div class="modal fade" id="verDetalles-" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> <b>Atención:</b></h5>
            </div>
            <div class="text-dark modal-body">

             Está a punto de cerrar permanentemente el periodo escolar actual. Esta acción es irreversible y tendrá las siguientes consecuencias:
            <ul>
              <br>
              
              <i class="fa fa-exclamation-circle"></i> No se podrá acceder a los Registros que tiene las siguientes opciones: de Alumno y Profesores de Aula o Especialista al cerrar el periodo escolar.
              
              <br>
              <br>
              
              <i class="fa fa-exclamation-circle"></i> No se podrá acceder a los Procesos que tiene las siguientes opciones: Inscripciones, Fichas Acomulativas, Re-inscripcion y Horario al cerrar el periodo escolar.
              
              <br>
              <br>
              
              <i class="fa fa-exclamation-circle"></i> No se podrá acceder a las Consultas que tiene las siguientes opciones: Alumno, Inscripciones, Fichas Acomulativas, Matricula, Profesor al cerrar el periodo escolar.
              

            </ul> 
            
            <hr>
            Antes de continuar, asegúrese de:
            <ul>
              <br>
            
              <i class="fa fa-folder"></i> Haber guardado todas las copias de seguridad de la base de datos.
              
              <br>
              <br>
              
              <i class="fa fa-sms"></i> Haber comunicado el cierre del periodo a los estudiantes, profesores y personal administrativo.
              
              <br>
              <br>

              
              <i class="fa fa-check"></i> Haber verificado que no hay información pendiente por registrar en el periodo escolar.
              
            </ul> 

            Si está seguro de querer cerrar el periodo escolar actual '. $resultados['part1'] .' / '. $resultados['part2'] .' , haga clic en "Confirmar".

            </div>

            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="cerrar" name="cerrar" class="btn btn-primary">Confirmar</button>
              <input type="hidden" maxlength="4" pattern="[0-9]*" value="'. $resultados['part2'] .'" class="form-control" id="termina_end" name="termina_end" readonly>
              <input type="hidden" maxlength="4" pattern="[0-9]*" value="'. $resultados['part1'] .'" class="form-control" id="comienza_end" name="comienza_end" readonly>
            </div>

          </div>
        </div>
      <div>

      </form>';

    } else {
      date_default_timezone_set("America/Caracas");
      $pa=date('Y')+1;

      echo'                
      <form action="">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="form-group row">

                  <div class="col">
                      <label for="comienza">Comienza:</label>
                      <input value="'.date('Y').'" type="text" pattern="[0-9]*" maxlength="4"class="form-control" id="comienza" name="comienza" required>
                  </div>

                  <div class="col">
                      <label for="termina">Termina:</label>
                      <input value="'.$pa.'" type="text" pattern="[0-9]*" maxlength="4" class="form-control" id="termina" name="termina" required>
                  </div>       
                  
              </div>
          </div>
      </div>

      <div class="row justify-content-center">
        <button type="periodo_escolar" id="periodo_escolar" class="btn btn-primary" name="submit">
          Crear
          <i class="fa fa-save"></i>
        </button>
      </div>

      </form>';
    }
     
  }

  public function echo2022(){
 
    $sql = "SELECT * FROM periodo WHERE activo = 'si'";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch();

    if ($resultado > 0) {

      return true;

    } else {

      return false;

    }

  }
      
  public function echo2023(){
 
    $sql = "SELECT * FROM periodo WHERE activo = 'si'";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch();
    $year = $resultado['periodo'];
    // Mostrar el año actual
    echo "El año escolar actual es: $year";
    $periodo = "";
    echo "Variable periodo: $periodo\n"; 

    return true;
  }
 

  }