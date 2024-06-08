<?php 

  class Alumno {
  
  private $basedata;
  private $ida; 
  
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
  
    public function guardarAlumno($id_a, $nombre_a, $apellido_a, $cedula_a, $cedula_escolar_a, $genero_a, $fecha_nac_a, $lugar_nac_a, $fecha_insc_a, $direccion_a,  $id_estado_a, $id_ciudad_a, $id_municipio_a, $id_parroquia_a, $activo_a, $id_grado_a, $id_seccion_a, $tiene_a){
   
       $sql = "INSERT INTO alumno (id_a, nombre_a, apellido_a, cedula_a, cedula_escolar_a, genero_a, fecha_nac_a, lugar_nac_a, fecha_insc_a, direccion_a, id_estado_a, id_ciudad_a, id_municipio_a, id_parroquia_a, activo_a, id_grado_a, id_seccion_a, tiene_a) 
            VALUES(:id_a, :nombre_a, :apellido_a, :cedula_a, :cedula_escolar_a, :genero_a, :fecha_nac_a, :lugar_nac_a, :fecha_insc_a, :direccion_a, :id_estado_a, :id_ciudad_a, :id_municipio_a, :id_parroquia_a, :activo_a, :id_grado_a, :id_seccion_a, :tiene_a)";

          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindParam(':id_a', $id_a);
          $stmt->bindParam(':nombre_a', $nombre_a);
          $stmt->bindParam(':apellido_a', $apellido_a);
          $stmt->bindParam(':cedula_a', $cedula_a);
          $stmt->bindParam(':cedula_escolar_a', $cedula_escolar_a);
          $stmt->bindParam(':genero_a', $genero_a);
          $stmt->bindParam(':fecha_nac_a', $fecha_nac_a);
          $stmt->bindParam(':lugar_nac_a', $lugar_nac_a);
          $stmt->bindParam(':fecha_insc_a', $fecha_insc_a);
          $stmt->bindParam(':direccion_a', $direccion_a);
          $stmt->bindParam(':id_estado_a', $id_estado_a);
          $stmt->bindParam(':id_ciudad_a', $id_ciudad_a);
          $stmt->bindParam(':id_municipio_a', $id_municipio_a);
          $stmt->bindParam(':id_parroquia_a', $id_parroquia_a);
          $stmt->bindParam(':activo_a', $activo_a);
          $stmt->bindParam(':id_grado_a', $id_grado_a);
          $stmt->bindParam(':id_seccion_a', $id_seccion_a);
          $stmt->bindParam(':tiene_a', $tiene_a);
    
          if ($stmt->execute()) {

            return true;
            
            } else {

              return false;
              
            }   
        }

        public function actualizarIns($id, $id_grado, $id_seccion) {
          $sql = "UPDATE alumno SET id_grado_a=:id_grado_a, id_seccion_a=:id_seccion_a WHERE id_a=:id_a";
          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindParam(':id_a', $id);
          $stmt->bindParam(':id_seccion_a', $id_seccion);
          $stmt->bindParam(':id_grado_a', $id_grado);
          
          if ($stmt->execute()) {
          
            return true;

          } else {
            
            return false;

          }
        }
      
        public function actualizarAlumno($id, $nombre, $apellido, $cedula_escolar, $cedula, $genero, $fecha_nac, $lugar_nac, $direccion, $id_estado_a, $id_ciudad_a, $id_municipio_a, $id_parroquia_a, $tiene_a) {
          $sql = "UPDATE alumno SET nombre_a=:nombre_a, apellido_a=:apellido_a, cedula_a=:cedula_a, cedula_escolar_a=:cedula_escolar_a, 
          genero_a=:genero_a, fecha_nac_a=:fecha_nac_a, lugar_nac_a=:lugar_nac_a, direccion_a=:direccion_a, 
          id_estado_a=:id_estado_a, id_ciudad_a=:id_ciudad_a, id_municipio_a=:id_municipio_a, id_parroquia_a=:id_parroquia_a, tiene_a=:tiene_a WHERE id_a=:id_a";
          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindParam(':id_a', $id);
          $stmt->bindParam(':nombre_a', $nombre);
          $stmt->bindParam(':apellido_a', $apellido);
          $stmt->bindParam(':cedula_a', $cedula);
          $stmt->bindParam(':cedula_escolar_a', $cedula_escolar);
          $stmt->bindParam(':genero_a', $genero);
          $stmt->bindParam(':fecha_nac_a', $fecha_nac);
          $stmt->bindParam(':lugar_nac_a', $lugar_nac);
          $stmt->bindParam(':direccion_a', $direccion);
          $stmt->bindParam(':id_estado_a', $id_estado_a);
          $stmt->bindParam(':id_ciudad_a', $id_ciudad_a);
          $stmt->bindParam(':id_municipio_a', $id_municipio_a);
          $stmt->bindParam(':id_parroquia_a', $id_parroquia_a);
          $stmt->bindParam(':tiene_a',  $tiene_a);
          
          if ($stmt->execute()) {
          
            return true;

          } else {
            
            return false;

          }
        }

        public function Estado($id, $valor) {
          $sql = "UPDATE alumno SET activo_a=:activo_a WHERE id_a=:id_a";
          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindParam(':id_a', $id);
          $stmt->bindParam(':activo_a', $valor);
          
          if ($stmt->execute()) {

            header("Location: alumno.php");
    
          } else {
    
            return "Error al actualizar los datos del alumno: " . $stmt->errorInfo()[2];
            
          }
        }
        
        public function Ficha_a($id, $periodo_escolar, $id_grado, $id_seccion) {
          $sql = "UPDATE alumno SET periodo_escolar_a=:periodo_escolar_a, id_grado_a=:id_grado_a, id_seccion_a=:id_seccion_a WHERE id_a=:id_a";
          $stmt = $this->basedata->conexion()->prepare($sql);
          $stmt->bindParam(':id_a', $id);
          $stmt->bindParam(':periodo_escolar_a', $periodo_escolar);
          $stmt->bindParam(':id_grado_a', $id_grado);
          $stmt->bindParam(':id_seccion_a', $id_seccion);
          
          if ($stmt->execute()) {
            return "Alumno guardado exitosamente";
          } else {
            return "Error al actualizar los datos del alumno: " . $stmt->errorInfo()[2];
          }
        }

        public function search(){

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
              INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
              INNER JOIN seccion ON seccion.id_seccion = alumno.id_seccion_a
              WHERE nombre_a LIKE :keyword
              OR cedula_a LIKE :keyword
              OR apellido_a LIKE :keyword
              OR cedula_escolar_a LIKE :keyword";
        
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

              $activo_a = "Cursando";
            
              $block = '
              <form id="change1" action="alumno.inc.php" method="post">
                <input type="hidden" name="id_a" value="'.$row['id_a'].'">
                <input type="hidden" name="Lock" value="no">
                <button type="submit" name="BtnLock" id="BtnLock" class="btn btn-danger">Desabilitar <span class="fa fa-exclamation-triangle"></span></button>
              </form><br>';
              
          }else{
                
                $activo_a = "No esta cursando";

                $block = '
                <form id="change2" action="alumno.inc.php"" method="post">
                    <input type="hidden" name="id_a" value="'.$row['id_a'].'">
                    <input type="hidden" name="Unlock" value="si">
                    <button type="submit" name="BtnUnlock" id="BtnUnlock" class="btn btn-primary">Habilitar <span class="fa fa-check"></span></button>
                </form><br>
                ';
            
            }

            if ($row['cedula_a'] == '(vacio)'){
              
              $cedula_a = "vacio";
          
          }else{
          
              $cedula_a = "V-".$row['cedula_a'];
          
          }
  
                  $datos= 
                      array(
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
                          "activo_a" => $activo_a,
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
                          "tiene_cedula" => $row['tiene_a']);
  
  
                  echo "<tr>";
                  
                  echo "<td> Estado: " . $activo_a . "<br>";

                  echo "Alumno(a) " .resaltar_frase($row['nombre_a'], $_POST['buscar'])." "
                  .resaltar_frase($row['apellido_a'], $_POST['buscar']);

                  echo "<br> Cedula: ".resaltar_frase($cedula_a, $_POST['buscar']).
                  "<br> Cedula Escolar: Nº".resaltar_frase($row['cedula_escolar_a'], $_POST['buscar']);
                  
                 /*  $row['fecha_nac_a'] */
                 echo "<br> Sexo: ".$genero;
                 echo "<br> Fecha de nacimiento: ".$nac."</td>";

                  echo $this->verDetalles($datos);
                  echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-'. $row['id_a'] .'">
                          Ver Detalles  <span class="fa fa-eye"></span></button><br><br>';

                  echo '<form action="update.php" method="post">
                          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
                          <button type="submit" class="btn btn-success">Editar <span class="fa fa-edit"></span></button>
                        </form><br>';

                  echo $block;
  
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

      public function verDetalles($datos) { 

        echo '<div class="modal fade" id="verDetalles-'. $datos['id_a'] .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos de la Inscrpcion</h5>
              </div>
              <div class="modal-body">
                <p>Nº de inscripcion: ' . $datos['id_a'] . '</p>
                <p>Fecha de inscripcion: ' . $datos['fecha_insc_a'] . '</p>
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
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>';
      }
  }
?>