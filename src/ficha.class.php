<?php



class Ficha {

   
    public $basedata;

    //Trae la Informacion 
    public function __construct(){
      
        
        
        require_once("basedata2.php");
        $this->basedata = new baseData();
        $this->basedata->conexion();
        
        
        $sql= "SELECT * FROM prosecucion
        INNER JOIN familia ON familia.id_familia = prosecucion.id_familia
        LEFT JOIN alumno ON familia.id_a = alumno.id_a
        LEFT JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
        INNER JOIN estados ON estados.id_estado = alumno.id_estado_a
        INNER JOIN ciudades ON ciudades.id_ciudad = alumno.id_ciudad_a
        INNER JOIN municipios ON municipios.id_municipio = alumno.id_municipio_a
        INNER JOIN parroquias ON parroquias.id_parroquia = alumno.id_parroquia_a
        INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
        LEFT JOIN representante ON familia.id_r = representante.id_r";

  
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
    }

    
    public function guardarFicha($id_familia, $asistencia, $literal, $observacion, $plantel, $promocion, $seccion_ficha, $fecha_de_promocion, $doc_insc, $profesor, $cedula_profesor) {
      $sql = "INSERT INTO prosecucion (id_familia, obs_ficha, plantel_ficha, promocion_ficha, seccion_ficha, doc_insc_ficha, fecha_de_pro_ficha, profesor_ficha, cedula_profesor_ficha, asis_ficha, literal_ficha) 
      VALUES(:id_familia, :obs_ficha, :plantel_ficha, :promocion_ficha, :seccion_ficha, :doc_insc_ficha, :fecha_de_promocion_ficha, :profesor_ficha, :cedula_profesor_ficha, :asis_ficha, :literal_ficha)";         
      $stmt = $this->basedata->conexion()->prepare($sql);

      $stmt->bindParam(':id_familia', $id_familia);
      $stmt->bindParam(':obs_ficha', $observacion);
      $stmt->bindParam(':plantel_ficha', $plantel);
      $stmt->bindParam(':promocion_ficha', $promocion);
      $stmt->bindParam(':seccion_ficha', $seccion_ficha);
      $stmt->bindParam(':doc_insc_ficha', $doc_insc);
      $stmt->bindParam(':fecha_de_promocion_ficha', $fecha_de_promocion);
      $stmt->bindParam(':profesor_ficha', $profesor);
      $stmt->bindParam(':cedula_profesor_ficha', $cedula_profesor);
      $stmt->bindParam(':asis_ficha', $asistencia);
      $stmt->bindParam(':literal_ficha', $literal);

      if ($stmt->execute()) {

        return true;

      } else {

        return false;
      }   
  }

    public function getRegistro(){

        while ($row = $this->stmt->fetch()) {

            $nac = $row['fecha_nac_a'];

            // para la edad 
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            if ($row['genero_a'] == 'M'){

                $genero = 'Masculino';

              }else if ($row['genero_a'] == 'F'){
  
                $genero = 'Femenino'; 

              }
        
            // Imprimir los datos del alumno junto con los valores de estado, ciudad y municipio
            echo '<tr>';

            echo '<td>';

            echo '<div class="h5"><span class="fa fa-user"></span> Alumno: '. $row['nombre_a'] .' ' . $row['apellido_a'] .'</div> Cedula: V-' . $row['cedula_a'] . 
            ' / Genero: ' . $genero . ' / Edad: ' . $edad  .'<br>';
            echo ' Datos ';
            echo ' <span class="fa fa-calendar"></span> Fecha de Promoción: ' . $row['fecha_de_pro_ficha'] . '<br>';
            echo '  Periodo: ' . $row['periodo_escolar_a'] .'<br>';

            echo 'nota: '. $row['nota_ficha'] .' plantel: ' . $row['plantel_ficha'] . '<br> turno : ' . $row['turno_ficha'] . '<br>';
            echo 'promovido a ' . $row['numero'] . ' - ' . $row['literal'] . '<br>';

            echo '</td>';

            echo '<td>';

            $datos = array(
                "id" => $row['id_ficha'],
                "id_familia" => $row['id_familia'],
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "estado_a" => $row['estado'],
                "id_ciudad_a" => $row['id_ciudad_a'],
                "ciudad_a" => $row['ciudad'],
                "id_municipio_a" => $row['id_municipio_a'],
                "municipio_a" => $row['municipio'],
                "id_parroquia_a" => $row['id_parroquia_a'],
                "parroquia_a" => $row['parroquia'],
                "activo_a" => $row['activo_a'],
                "genero_a" => $genero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "literal" => $row['literal'],
                "id_literal" => $row['id_seccion'],
                "periodo_escolar_a" => $row['periodo'],
                "fecha_insc_a" => $row['fecha_insc_a'],
  
                //datos del representante
                "id_r" => $row['id_r'],
                "cedula_r" => $row['cedula_r'],
                "parentesco" => $row['parentesco_r'],
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

                //datos del Ficha 
                "id_ficha" => $row['id_ficha'],
                "nota_ficha" => $row['nota_ficha'],
                "fecha_de_pro_ficha" => $row['fecha_de_pro_ficha'],
                "plantel_ficha" => $row['plantel_ficha'],
                "doc_insc_ficha" => $row['doc_insc_ficha'],
              );

            echo $this->verDetalles($datos);
            echo '<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#verDetalles-'. $row['id_ficha'] .'">
            Ver Detalles  <span class="fa fa-eye"></span></button>';
      
            echo '<form action="../src/.php" method="post">
                    <input type="hidden" name="datos" value= "'. htmlentities(serialize($datos)) .'">
                    <button type="submit" class="btn btn-danger float-center ml-2">Generar PDF <span class="fa fa-file-pdf"></span></button>
                  </form> <br>';

            echo '<form action="form.php" method="post">
                    <input type="hidden" name="datos" value= "'. htmlentities(serialize($datos)) .'">
                    <button type="submit" class="btn btn-secondary">Ficha Acomulativa  <span class="fa fa-file"></button>
                  </form>';

            echo '</td>';

            echo '</tr>';

           
        }
    
    }   

      //Modal Ver Detalles

      public function verPdf($datos){

        $id_a = $datos['id_a'];
        
        $sql= "SELECT * FROM prosecucion
        INNER JOIN familia ON familia.id_familia = prosecucion.id_familia
        INNER JOIN representante ON representante.id_r = familia.id_r
        INNER JOIN alumno ON alumno.id_a = familia.id_a
        INNER JOIN periodo_alumno ON periodo_alumno.alumno = alumno.id_a
        INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
        WHERE  familia.id_a = $id_a";
    
        $stmt = $this->basedata->conexion()->query($sql);

        return $stmt;

      }

      //Mostrar Fichas
    public function consulta(){

      if(!empty($_POST)) {

          function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
            return ($string !== '' && $frase !== '')
              ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
              : $string;
          }
    
          $aKeyword = explode(" ", $_POST['buscar']);
      
          $sql = "SELECT * FROM prosecucion
          INNER JOIN familia ON familia.id_familia = prosecucion.id_familia
          INNER JOIN alumno ON alumno.id_a = familia.id_a
          INNER JOIN periodo_alumno ON periodo_alumno.alumno = alumno.id_a
          INNER JOIN estados ON estados.id_estado = alumno.id_estado_a
          INNER JOIN ciudades ON ciudades.id_ciudad = alumno.id_ciudad_a
          INNER JOIN municipios ON municipios.id_municipio = alumno.id_municipio_a
          INNER JOIN parroquias ON parroquias.id_parroquia = alumno.id_parroquia_a
          INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
          INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
          INNER JOIN representante ON familia.id_r = representante.id_r
          WHERE cedula_escolar_a LIKE :keyword
          OR nombre_a LIKE :keyword
          OR apellido_a LIKE :keyword";
    
          $stmt = $this->basedata->conexion()->prepare($sql);
    
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
    
          if( $numero > 0 AND $_POST['buscar'] != '') {
    
            echo "<br>Resultados encontrados:<b> ".$numero."</b>";
            echo "<br><br>";

            echo "<tr>";
            echo "<td> Estudiante </td>";
            echo "<td> Ficha </td>";
            echo "<td> Representante </td>";
            echo "<td> Accion </td>";

            echo "</tr>";
    
              foreach ($result as $i => $row){
                  echo "<tr>";
                  echo "<td>".resaltar_frase($row['nombre_a'] .' <br> '. $row['apellido_a'], $_POST['buscar'])."<br>".resaltar_frase($row['cedula_escolar_a'], $_POST['buscar'])."</td>";
                  
                  echo "<td>".$row['obs_ficha'] ." <br> ".$row['fecha_de_pro_ficha'];
                  echo "<br>".$row['plantel_ficha'] ." <br> ".$row['fecha_de_pro_ficha']." <br>";
                  echo "<br> ". $row['doc_insc_ficha']."</td>";

                  echo "<td>".$row['nombre_r'] ." ". $row['apellido_r']."<br>";
                  echo "V-".$row['cedula_r']."</td>";

                  $nac = $row['fecha_nac_a'];

                  // para la edad 
                  $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
                  $edad = date('Y') - date('Y', $row['fecha_nac_a']);
                  if (date('md') < date('md', $row['fecha_nac_a'])) {
                      $edad--;
                  }
      
                  if ($row['genero_a'] == 'M'){
      
                      $genero = 'Masculino';
      
                    }else if ($row['genero_a'] == 'F'){
        
                      $genero = 'Femenino'; 
      
                    }

                  $datos= 
                    array(
                      "id" => $row['id_ficha'],
                      "id_familia" => $row['id_familia'],
                      //datos del alumno
                      "id_a" => $row['id_a'],
                      "nombre_a" => $row['nombre_a'],
                      "apellido_a" => $row['apellido_a'],
                      "cedula_a" => $row['cedula_a'],
                      "estado_a" => $row['estado'],
                      "id_ciudad_a" => $row['id_ciudad_a'],
                      "ciudad_a" => $row['ciudad'],
                      "id_municipio_a" => $row['id_municipio_a'],
                      "municipio_a" => $row['municipio'],
                      "id_parroquia_a" => $row['id_parroquia_a'],
                      "parroquia_a" => $row['parroquia'],
                      "activo_a" => $row['activo_a'],
                      "genero_a" => $genero,
                      "edad" => $edad,
                      "nac" => $nac,
                      "lugar_nac_a" => $row['lugar_nac_a'],
                      "direccion_a" => $row['direccion_a'],
                      "numero" => $row['numero'],
                      "grado" => $row['grado'],
                      "id_numero" => $row['id_grado'],
                      "literal" => $row['literal'],
                      "id_literal" => $row['id_seccion'],
                      "fecha_insc_a" => $row['fecha_insc_a'],
                      "periodo_escolar_a" => $row['periodo'],

                      //datos del representante
                      "id_r" => $row['id_r'],
                      "cedula_r" => $row['cedula_r'],
                      "parentesco" => $row['parentesco_r'],
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

                      //datos del Ficha 
                      "id_ficha" => $row['id_ficha'],
                      "obs_ficha" => $row['obs_ficha'],
                      "fecha_de_pro_ficha" => $row['fecha_de_pro_ficha'],
                      "plantel_ficha" => $row['plantel_ficha'],
                      "doc_insc_ficha" => $row['doc_insc_ficha']);

                  echo '<td>';
                  echo $this->verDetalles($datos);
                  echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-'. $datos['id'] .'">
                  Ver Detalles  <span class="fa fa-eye"></span></button><br><br>';
            
                  echo '<form action="../../reportes/ficha.php" method="post">
                          <input type="hidden" name="datos" value= "'. htmlentities(serialize($datos)) .'">
                          <button type="submit" class="btn btn-danger float-center ml-2">Generar PDF <span class="fa fa-file-pdf"></span></button>
                        </form>';

                  echo '</td>';
                } 
                    
              echo "</table>";  
                    
        }      
      }
  }

  public function verDetalles($datos) { 
    echo '<div class="modal fade" id="verDetalles-'. $datos['id'] .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos de la Inscrpcion</h5>
          </div>
          <div class="modal-body">
            <p>Datos del estudiante:</p>
             <ul>
              Nombre y Apellido: ' . $datos['nombre_a'].' '. $datos['apellido_a'] . '<br>
              Cedula: V-' . $datos['cedula_a'] . ' / Genero: ' . $datos['genero_a']. '<br>
              ' . $datos['numero'] . ' grado Seccion ' . $datos['literal'] . '<br>
            </ul>
            <p>Datos del Representante:</p>
            <ul>
              Nombre y Apellido: ' . $datos['nombre_r'].' '. $datos['apellido_r'] . '<br>
              Cedula: V-' . $datos['cedula_r'] . ' / Genero: ' . $datos['parentesco']. '<br>
              Profesion: ' . $datos['profesion_r'] . '<br>
            </ul>
            <ul>
              Fecha de Promocion: ' . $datos['fecha_de_pro_ficha'] . '<br>
              Observacion: ' . $datos['obs_ficha']. '<br>
              Plantel: ' . $datos['plantel_ficha'] . ' <br>
              Documentos de la Inscripcion: ' . $datos['doc_insc_ficha'] . '<br>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>';
  }

  public function search(){

    if(!empty($_POST)) {

        function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
          return ($string !== '' && $frase !== '')
            ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
            : $string;
        }
  
        $aKeyword = explode(" ", $_POST['buscar']);
    
        $sql = "SELECT * FROM familia
        INNER JOIN alumno ON familia.id_a = alumno.id_a
        INNER JOIN periodo_alumno ON periodo_alumno.alumno = alumno.id_a
        INNER JOIN estados ON estados.id_estado = alumno.id_estado_a
        INNER JOIN ciudades ON ciudades.id_ciudad = alumno.id_ciudad_a
        INNER JOIN municipios ON municipios.id_municipio = alumno.id_municipio_a
        INNER JOIN parroquias ON parroquias.id_parroquia = alumno.id_parroquia_a
        INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
        INNER JOIN representante ON familia.id_r = representante.id_r
        WHERE id_grado_a != 7 AND id_grado_a != 5 AND (cedula_a LIKE :keyword
        OR nombre_a LIKE :keyword
        OR apellido_a LIKE :keyword)";
  
        $stmt = $this->basedata->conexion()->prepare($sql);
  
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
  
        if( $numero > 0 AND $_POST['buscar'] != '') {
  
          echo "<br>Resultados encontrados:<b> ".$numero."</b>";
          echo "<br><br>";

          echo "<tr>";
          echo "<td> Estudiante </td>";
          echo "<td> Cedula </td>";
          echo "<td> Representante </td>";
          echo "<td> Accion </td>";

          echo "</tr>";
  
            foreach ($result as $i => $row) {

                echo "<tr>";
                echo "<td>".resaltar_frase($row['nombre_a'] .' <br> '. $row['apellido_a'], $_POST['buscar'])."</td>";
                echo "<td>".resaltar_frase($row['cedula_a'], $_POST['buscar'])." </td>";
                echo "<td>". $row['nombre_r'] .' '. $row['apellido_r']."<br>";
                echo "CI V-".$row['cedula_r']."</td>";

                $nac = $row['fecha_nac_a'];

                // para la edad 
                $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
                $edad = date('Y') - date('Y', $row['fecha_nac_a']);
                if (date('md') < date('md', $row['fecha_nac_a'])) {
                    $edad--;
                }
    
                if ($row['genero_a'] == 'M'){
    
                    $genero = 'Masculino';
    
                  }else if ($row['genero_a'] == 'F'){
      
                    $genero = 'Femenino'; 
    
                  }

                $datos = array(
                  "id_familia" => $row['id_familia'],
                  //datos del alumno
                  "id_a" => $row['id_a'],
                  "nombre_a" => $row['nombre_a'],
                  "apellido_a" => $row['apellido_a'],
                  "cedula_a" => $row['cedula_a'],
                  "estado_a" => $row['estado'],
                  "id_ciudad_a" => $row['id_ciudad_a'],
                  "ciudad_a" => $row['ciudad'],
                  "id_municipio_a" => $row['id_municipio_a'],
                  "municipio_a" => $row['municipio'],
                  "id_parroquia_a" => $row['id_parroquia_a'],
                  "parroquia_a" => $row['parroquia'],
                  "activo_a" => $row['activo_a'],
                  "genero_a" => $genero,
                  "edad" => $edad,
                  "nac" => $nac,
                  "lugar_nac_a" => $row['lugar_nac_a'],
                  "direccion_a" => $row['direccion_a'],
                  "numero" => $row['numero'],
                  "grado" => $row['grado'],
                  "id_numero" => $row['id_grado'],
                  "literal" => $row['literal'],
                  "id_literal" => $row['id_seccion'],
                  "periodo_escolar_a" => $row['periodo'],
                  "fecha_insc_a" => $row['fecha_insc_a'],

                  //datos del representante
                  "id_r" => $row['id_r'],
                  "cedula_r" => $row['cedula_r'],
                  "parentesco" => $row['parentesco_r'],
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
                  "direccion_trabajo_r" => $row['direccion_trabajo_r']
                );

                echo '<td>';
          
                echo '<form action="form.php" method="post">
                        <input type="hidden" name="datos" value= "'. htmlentities(serialize($datos)) .'">
                        <button type="submit" class="btn btn-danger float-center ml-2">crear ficha Acomulativa <span class="fa fa-file-pdf"></span></button>
                      </form> <br>';

                echo '</td>';
            }      
            echo "</table>";     
        }      
    }
}

  
}