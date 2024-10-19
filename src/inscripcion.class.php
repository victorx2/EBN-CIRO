<?php

class inscripcion {

    private $basedata;

    public function __construct(){
        
      require_once 'basedata2.php';
      $this->basedata = new baseData;

      $this->basedata->conexion();

    }

  public function guardarDatos($id_a, $id_r, $id_s, $id_t, $id_p){

      $sql = "INSERT INTO inscripcion (id_a, id_r, id_s, id_t, id_p) VALUES(:id_a, :id_r, :id_s, :id_t, :id_p)";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_a', $id_a);
        $stmt->bindParam(':id_r', $id_r);
        $stmt->bindParam(':id_s', $id_s);
        $stmt->bindParam(':id_t', $id_t);
        $stmt->bindParam(':id_p', $id_p);

         if ($stmt->execute()) {

          return true;

        } else {

          return false;

        } 
  }
  
  public function guardarFamilia($id_a, $id_r){
  
    $sql = "INSERT INTO familia (id_a, id_r) VALUES (:id_a, :id_r)";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(':id_a', $id_a);
    $stmt->bindParam(':id_r', $id_r);
    
      if ($stmt->execute()) {

        return true;

      } else {

        return false;

      }   
  }

  public function proceso(){

    if(!empty($_POST)) {

          function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
            return ($string !== '' && $frase !== '')
              ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
              : $string;
          }
        
          $aKeyword = explode(" ", $_POST['buscar']);
        
          $sql = "SELECT * FROM alumno
          INNER JOIN estados ON estados.id_estado = alumno.id_estado_a
          INNER JOIN ciudades ON ciudades.id_ciudad = alumno.id_ciudad_a
          INNER JOIN municipios ON municipios.id_municipio = alumno.id_municipio_a
          INNER JOIN parroquias ON parroquias.id_parroquia = alumno.id_parroquia_a
          INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
          INNER JOIN grado ON grado.id_grado = alumno.id_grado_a  
          WHERE id_grado_a = 7 AND id_seccion_a = 5
          AND (nombre_a LIKE :keyword
          OR cedula_a LIKE :keyword
          OR apellido_a LIKE :keyword
          OR cedula_escolar_a LIKE :keyword)
          ORDER BY alumno.cedula_escolar_a DESC";

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
        "fecha_insc_a" => $row['fecha_insc_a'],
        "tiene_cedula" => $row['tiene_a'],  
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

    echo '<form action="inscripcion.php" method="post">
            <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
            <button type="submit" class="btn btn-success">Inscribir <span class="fa fa-file-repeat"></span></button>
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

  public function consulta(){

    if(!empty($_POST)) {

        function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
          return ($string !== '' && $frase !== '')
            ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
            : $string;
        }
  
        $aKeyword = explode(" ", $_POST['buscar']);
    
        $sql = "SELECT * FROM inscripcion
        INNER JOIN alumno ON inscripcion.id_a = alumno.id_a
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
        INNER JOIN periodo_alumno ON inscripcion.id_p = periodo_alumno.alumno
        WHERE alumno.activo_a = 'si' 
        AND nombre_a LIKE :keyword
        OR cedula_a LIKE :keyword
        OR apellido_a LIKE :keyword
        OR cedula_escolar_a LIKE :keyword
        GROUP BY inscripcion.id
        ORDER BY alumno.fecha_insc_a DESC ";
  
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
  
        if( $numero > 0 && $_POST['buscar'] != '') {
  
          echo "<br>Resultados encontrados:<b> ".$numero."</b>";

          echo "
            <thead>

                <tr>

                    <th>Alumno</th>
                    <th>Representante</th>
                    <th>Extra</th>
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

      if ($row['activo_a'] == 'si'){
        
        $estado = "Cursando";
      
      }else{
      
        $estado = "No Cursando";
      
      }

    if ($row['cedula_a'] == '(vacio)'){
        
      $cedula_a = "vacio";
    
    }else{
    
      $cedula_a = "V-".$row['cedula_a'];
    
    }

    $datos = array(
      "id" => $row['id'],
      
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
      "fecha_insc_a" => $row['fecha_insc_a'],
      "periodo_escolar_a" => $row['periodo'],
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

     //datos del salud
      "id_s" => $row['id_s'],
      "tiene_s" => $row['tiene_s'],
      "alergia_s" => $row['alergia_s'],
      "dieta_s" => $row['dieta_s'],
      "tratamiento_M_s" => $row['tratamiento_M_s'],
      "condicion_fisica_s" => $row['condicion_fisica_s'],
      "atencion_especial_s" => $row['atencion_especial_s'],

      //datos del transporte
      "id_t" => $row['id_t'],
      "tiene_t" => $row['tiene_t'],
      "nombre_t" => $row['nombre_t'],
      "cedula_t" => $row['cedula_t'],
      "telefono_t" => $row['telefono_t'],
      "numero_telefonico_opcional_t" => $row['numero_telefonico_opcional_t'],
      "numero_de_placa_t" => $row['numero_de_placa_t'],

      //datos del procedencia
      "id_p" => $row['id_p'],
      "motivo_p" => $row['motivo_p'],
      "de_donde_proviene_p" => $row['de_donde_proviene_p'],
      "direccion_p" => $row['direccion_p'] 
    );
    
  echo "<tr>";

  echo "<td> Estado: ". $estado ."<br>";
  echo "Alumno(a) " .resaltar_frase($row['nombre_a'], $_POST['buscar'])." ".resaltar_frase($row['apellido_a'], $_POST['buscar']);
  echo ' Apellido: ' . $row['apellido_a'] . ' <br> Edad: ' . $edad . '<br>';
  echo "<br> Cedula: ".resaltar_frase($cedula_a, $_POST['buscar'])."<br> Cedula Escolar: Nº".resaltar_frase($row['cedula_escolar_a'], $_POST['buscar'])."<br>";
  echo 'Genero: ' . $genero . '<br>';
  echo  $row['grado'] . ' grado Seccion '.$row['literal'].'<br>';
  echo '</td>';

  echo '<td>';
  echo 'Representante: ' . $row['nombre_r'] . '<br>'; 
  echo 'CI: ' . $row['cedula_r'] . '<br>';
  echo 'Teléfono: ' . $row['telefono_r'] . '<br>';
  echo 'Parentesco: ' . $row['parentesco_r'];
  echo '</td>';

  echo '<td>'; 
  echo 'Fecha de inscripcion: ' . $row['fecha_insc_a'] . '<br>';
  echo 'Periodo escolar: ' . $row['periodo'] . '<br>';
  echo '</td><td>';
  
  //Ver Detalles
  echo $this->verDetalles($datos);
  echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-'. $row['id'] .'">
  Ver Detalles  <span class="fa fa-eye"></span></button><br><br>';

  echo '<form action="editar.php" method="post">
          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
          <button type="submit" class="btn btn-success">Editar <span class="fa fa-edit"></span></button>
        </form><br>';

         //PDF
  echo '<form action="../../reportes/planilla.php" method="post">
          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
          <button type="submit" class="btn btn-danger">Planilla de Inscripcion <span class="fa fa-file-pdf"></span></button>
        </form><br>';
    
      //PDF
  echo '<form class="mr-5" action="../../reportes/constancia.php" method="post">
          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
          <button type="submit" class="btn btn-danger">Constacia de Estudio <span class="fa fa-file-pdf"></span></button>
        </form>';

  echo "</td> </tr>";
  }  
  
  echo "
  </tbody>

  <tfoot>
  
      <tr>
        <th>Alumno</th>
        <th>Representante</th>
        <th>Extra</th>
        <th>Accion</th>
      </tr>
      
  </tfoot>";

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
          <p>Nº de inscripcion: ' . $datos['id'] . '</p>
          <p>Fecha de inscripcion: ' . $datos['fecha_insc_a'] . '</p>
          <p>Periodo escolar: ' . $datos['periodo_escolar_a'] . '</p>
          <p>Datos del estudiante:</p>
          <ul>
            Estudiante: ' . $datos['nombre_a'].' '. $datos['apellido_a'] . ', Edad: ' . $datos['edad'] .'<br>
            Cedula escolar: ' . $datos['cedula_escolar_a'] . '<br>
            Cedula: ' . $datos['cedula_a'] . ',
            Genero: ' . $datos['genero_a']. '<br>
            Fecha de nacimiento: ' . $datos['nac'] . '<br>
            Lugar de nacimiento: ' . $datos['lugar_nac_a'] . '<br>
            ' . $datos['numero'] . ' Grado Seccion ' . $datos['literal'] . '<br><br>

            <ul>
              Ubicacion: <br> Estado: ' . $datos['estado_a'] . ', 
              Ciudad: ' . $datos['ciudad_a'] . '<br>
              Municipio: ' . $datos['municipio_a'] . ', 
              Parroquia: ' . $datos['parroquia_a'] . '<br>
              Vive: ' . $datos['direccion_a'] .'<br>
            </ul>
            
          </ul>
          <p>Datos del Representante:</p>
          <ul>
            ' . $datos['parentesco']. ': ' . $datos['nombre_r'].' '. $datos['apellido_r'] . '<br>
            Cedula: ' . $datos['cedula_r'] . ', Profesion: ' . $datos['profesion_r'] . '<br>
            Correo Electronico: ' . $datos['correo_electronico_r'] . '<br>
            Direccion De Trabajo: ' . $datos['direccion_trabajo_r'] . '<br><br>
            <ul>
            Numero: <br> Telefono: ' . $datos['telefono_r'] . '<br> 
            Telefono del Trabajo: ' . $datos['telefono_trabajo_r'] . '<br>
            Telefono Opcional: ' . $datos['telefono_opcional_r'] . '<br>
            </ul>
          </ul>
          <p>Salud:</p>
          <ul>
            Alergia: ' . $datos['alergia_s'] . '<br>
            Dieta: ' . $datos['dieta_s'] . '<br>
            Tratamiento Medico: ' . $datos['tratamiento_M_s'] . '<br>
            Condicion Fisica: ' . $datos['condicion_fisica_s'] . '<br>
            Atencion Especial: ' . $datos['atencion_especial_s'] . '<br>
          </ul>
          <p>Transporte:</p>
          <ul>
            Nombre Completo: ' . $datos['nombre_t'] . '<br>
            Cedula: ' . $datos['cedula_t'] . ' / Numero de Placa: ' . $datos['numero_de_placa_t'] . '<br>
            Telefono: ' . $datos['telefono_t'] . ' / Telefono Opcional: ' . $datos['numero_telefonico_opcional_t'] . '<br>
          </ul>
          <p>Procedencia:</p>
          <ul>
            Motivo: ' . $datos['motivo_p'] . '<br>
            De donde provienen: ' . $datos['de_donde_proviene_p'] . '<br>
          </ul>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>';
}

}