<?php

class reinscripcion {

    private $basedata;
    public $periodo;

    public function __construct(){
        
      require_once 'basedata2.php';
      $this->basedata = new baseData;

      $this->basedata->conexion();

    }


  public function Periodo($id,$periodo_a) {
    $sql = "INSERT INTO periodo_alumno (alumno,periodo) VALUES(:alumno,:periodo)";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(':alumno', $id);
    $stmt->bindParam(':periodo', $periodo_a);

    if ($stmt->execute()) {

      return true;

    } else {

      return false;
    }   
  }

    public function Ficha_a($id, $cedula_a, $id_grado, $periodo_a, $direccion_a) {
      $sql = "UPDATE alumno SET cedula_a=:cedula_a, id_grado_a=:id_grado_a, direccion_a=:direccion_a WHERE id_a=:id_a";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id_a', $id);
      $stmt->bindParam(':cedula_a', $cedula_a);
      $stmt->bindParam(':id_grado_a', $id_grado);
      $stmt->bindParam(':direccion_a', $direccion_a);

      if ($stmt->execute()) {

        return true;

      } else {

        return false;
      }   
    }
     
  
  public function proceso(){

    $sql = "SELECT * FROM periodo WHERE activo = 'si'";
    $stmt = $this->basedata->conexion()->query($sql);
    $stmt->execute();

    $resultados = $stmt->fetch();

    if ($stmt->rowCount() > 0) { 

      $resultados1 = $resultados['part1'] - 1;
      $resultados2 = $resultados['part2'] - 1;
      $periodoAntiguo = $resultados1 .' / '. $resultados2;
      $periodo = $resultados['part1'] .' / '. $resultados['part2'];

    } else {

      echo'                
      Actualmente no hay un Año Escolar <b>Activo</b>, por favor registre un periodo para poder registrar niños en el sistema';
    }

    if(!empty($_POST)) {

          function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
            return ($string !== '' && $frase !== '')
              ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
              : $string;
          }
        
          $aKeyword = explode(" ", $_POST['buscar']);
        
          $sql = "SELECT * FROM inscripcion
          INNER JOIN alumno ON inscripcion.id_a = alumno.id_a
          INNER JOIN familia ON familia.id_a = alumno.id_a
          INNER JOIN prosecucion ON prosecucion.id_familia = familia.id_familia
          INNER JOIN estados ON estados.id_estado = alumno.id_estado_a
          INNER JOIN ciudades ON ciudades.id_ciudad = alumno.id_ciudad_a
          INNER JOIN municipios ON municipios.id_municipio = alumno.id_municipio_a
          INNER JOIN parroquias ON parroquias.id_parroquia = alumno.id_parroquia_a
          INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
          INNER JOIN grado ON grado.id_grado = alumno.id_grado_a  
          INNER JOIN representante ON inscripcion.id_r = representante.id_r 
          INNER JOIN salud ON inscripcion.id_s = salud.id_s
          INNER JOIN transporte ON inscripcion.id_t = transporte.id_t
          INNER JOIN procedencia ON inscripcion.id_p = procedencia.id_p
          INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
          WHERE periodo_alumno.periodo = :periodo AND id_grado_a != '7'
          AND (nombre_a LIKE :keyword
          OR cedula_a LIKE :keyword
          OR apellido_a LIKE :keyword
          OR cedula_escolar_a LIKE :keyword)
          ORDER BY alumno.cedula_escolar_a DESC";

          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindValue(':periodo', $periodoAntiguo);
        
          $stmt->bindValue(':keyword', '%' . $aKeyword[0] . '%', PDO::PARAM_STR);
        
          for($i = 1; $i < count($aKeyword); $i++) {
            if(!empty($aKeyword[$i])) {
              $stmt->bindValue(':keyword', '%' . $aKeyword[$i] . '%', PDO::PARAM_STR); 
            }
          }
        
          $stmt->execute();
        
          $result = $stmt->fetchAll();
          $numero = count($result);
        
          if (!isset($_POST['buscar'])){
            echo "Has buscado :<b> ". $_POST['buscar']."</b>";
          }
        
          if( $numero > 0 && $_POST['buscar'] != '') {
          
            echo "<br>Resultados encontrados:<b> ".$numero."</b>";

            echo "
              <thead>

                  <tr>

                      <th>Alumno</th>
                      <th>Accion</th>

                  </tr>

              </thead>

              <tbody>";

      foreach ($result as $i => $row) {

        $nac = $row['fecha_nac_a'];
        // para la edad 
        $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
        $edad = date('Y') - date('Y', $row['fecha_nac_a']);
        if (date('md') < date('md', $row['fecha_nac_a'])) {
            $edad--;
        }
        // para el genero 
        if ($row['genero_a'] == 'M'){

          $genero = 'Masculino';
          $idgenero = 'M';
          $genero2 = 'Femenino';
          $idgenero2 = 'F';

        }else if ($row['genero_a'] == 'F'){

          $genero = 'Femenino';
          $idgenero = 'F';
          $genero2 = 'Masculino';
          $idgenero2 = 'M';

        }

      if ($row['activo_a'] == 'si'){

        $estado = "Cursando";
      
      }else{
      
        $estado = "No Cursando";
      
      }

      if ($row['cedula_a'] == '(vacio)'){

        $cedula_a = "No tiene cedula";
      
      }else{
      
        $cedula_a = " Cedula:  V-".$row['cedula_a'];
      
      }

      if ($row['numero'] == 'Nuevo Ingreso'){

        $a = $row['numero'] .'<br>';
      
      }else{
      
        $a = $row['grado'] .' grado Seccion '.$row['literal'].'<br>';
      
      }

// para el parentesco 
      if ($row['parentesco_r'] == 'Padre'){

        $parentesco = 'Padre';
        $parentesco2 = 'Madre';
        $parentesco3 = 'Otros';

      }else if ($row['parentesco_r'] == 'Madre'){

        $parentesco = 'Madre';
        $parentesco2 = 'Padre';
        $parentesco3 = 'Otros';

      }else if ($row['parentesco_r'] == 'Otros'){

        $parentesco = 'Otros';
        $parentesco2 = 'Padre';
        $parentesco3 = 'Madre';

      }

      $datos = array( 
        
      //datos del alumno
      "id_a" => $row['id_a'],
      "nombre_a" => $row['nombre_a'],
      "apellido_a" => $row['apellido_a'],
      "cedula_a" => $row['cedula_a'],
      "cedula_escolar_a" => $row['cedula_escolar_a'],
      "id_estado_a" => $row['id_estado_a'],
      "estado_a" => $row['estado'],
      "id_ciudad_a" => $row['id_ciudad_a'],
      "ciudad_a" => $row['ciudad'],
      "id_municipio_a" => $row['id_municipio_a'],
      "municipio_a" => $row['municipio'],
      "id_parroquia_a" => $row['id_parroquia_a'],
      "parroquia_a" => $row['parroquia'],
      "activo_a" => $row['activo_a'],
      "genero_a" => $genero,
      "idgenero_a" => $idgenero,
      "genero2" => $genero2,
      "idgenero2" => $idgenero2,
      "edad" => $edad,
      "nac" => $nac,
      "lugar_nac_a" => $row['lugar_nac_a'],
      "direccion_a" => $row['direccion_a'],
      "numero" => $row['numero'],
      "grado" => $row['grado'],
      "id_numero" => $row['id_grado'],
      "literal" => $row['literal'],
      "id_literal" => $row['id_seccion'],
      "periodo" => $row['periodo'],
      "fecha_insc_a" => $row['fecha_insc_a'],
      "tiene_cedula" => $row['tiene_a'],

      //datos del representante
      "id_r" => $row['id_r'],
      "cedula_r" => $row['cedula_r'],
      "parentesco" => $parentesco,
      "parentesco2" => $parentesco2,
      "parentesco3" => $parentesco3,
      "nombre_r" => $row['nombre_r'],
      "apellido_r" => $row['apellido_r'],
      "correo_electronico_r" => $row['correo_electronico_r'],
      "telefono_r" => $row['telefono_r'],
      "telefono_opcional_r" => $row['telefono_opcional_r'],
      "tiene_opc" => $row['tiene_opc'],
      "vive_r" => $row['vive_r'],
      "direccion_r" => $row['direccion_r'],
      "profesion_r" => $row['profesion_r'],
      "telefono_trabajo_r" => $row['telefono_trabajo_r'],
      "direccion_trabajo_r" => $row['direccion_trabajo_r'],


      //datos del procedencia
      "periodo" => $periodo,

      );

    echo "<tr>";

    echo "<td> Estado: ". $estado ."<br>";
    echo "Alumno(a) " .resaltar_frase($row['nombre_a'], $_POST['buscar'])." ".resaltar_frase($row['apellido_a'], $_POST['buscar']);
    echo ' Apellido: ' . $row['apellido_a'] . ' <br> Edad: ' . $edad . '<br>';
    echo "<br>".resaltar_frase($cedula_a, $_POST['buscar'])."<br> Cedula Escolar: Nº".resaltar_frase($row['cedula_escolar_a'], $_POST['buscar'])."<br>";
    echo 'Genero: ' . $genero . '<br>';
    echo  $a;
    echo '</td>';

    echo '<td>';

    echo '<form action="reinscripcion.php" method="post">
            <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
            <button type="submit" class="btn btn-success">Re-Inscribir <span class="fa fa-file-repeat"></span></button>
          </form><br>';

    echo "</td> </tr>";
    }  

    echo "
    </tbody>

    <tfoot>

        <tr>
          <th>Alumno</th>
          <th>Accion</th>
        </tr>

    </tfoot>";

          }      
      }

  }

  public function promo($id, $id_grado, $grado){

    $sql = "SELECT * FROM alumno 
    INNER JOIN familia ON familia.id_a = alumno.id_a
    INNER JOIN prosecucion ON prosecucion.id_familia = familia.id_familia
    WHERE cedula_escolar_a = $id ";
    $stmt = $this->basedata->conexion()->query($sql);
    $stmt->execute();

    $resultados = $stmt->fetch();

    if ($resultados['asis_ficha'] == "75%" || $resultados['asis_ficha'] == "100%") { 

      $id_grado = $id_grado+1;

      $sql = "SELECT * FROM grado WHERE id_grado = $id_grado";
      $stmt = $this->basedata->conexion()->query($sql);
      $stmt->execute();
  
      $promo = $stmt->fetch();

      echo '  <div class="col-2">
                <label for="grado" class="form-label">Asistencia del Alumno</label>
                <input type="text" class="form-control" value="'.$resultados['asis_ficha'].'" readonly>
              </div>
      
              <div class="col">
                <label for="grado" class="form-label">Grado Actual</label>
                <input type="text" class="form-control" value="'.$grado.'" readonly>
              </div>

              <div class="col">
                <label for="grado" class="form-label">Grado a Promoveer</label>
                <input type="text"  class="form-control" value="'.$promo['grado'].'" readonly>
                <input type="hidden" id="grado" name="grado" class="form-control" value="'.$promo['id_grado'].'" readonly>
              </div>
              
              <div class="col">
                <label for="grado" class="form-label">Observacion</label>
                <input type="text" class="form-control" value="El estudiante fue promovido exitosamente" readonly>
              </div>';

    } else {

      echo '  <div class="col-4">
                <label for="grado" class="form-label">Grado</label>
                <input type="text" id="grado" name="grado" class="form-control" value="'. $grado .' grado" readonly>
              </div>
              
              <div class="col">
                <label for="grado" class="form-label">Observacion</label>
                <input type="text" class="form-control" value="El estudiante reprobo por '. $resultados['asis_ficha'].' inasistencias" readonly>
              </div>';
    }
     
  }


}