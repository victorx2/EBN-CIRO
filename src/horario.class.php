<?php         require 'basedata2.php';

  class Horario extends baseData {
      private $conexion;
      public $plus = 0;
      public $plus1;
  
    public function __construct() {

        $this->conexion = new baseData();
    }

    public function getnivel(){
        $sql = "SELECT * FROM grado WHERE numero != 'Nuevo Ingreso'";
        $stmt = $this->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value="' . $row['grado'] . ' Grado">' . $row['grado'] . ' Grado </option>';
        }
    }

    //Dias de la Semana
    public function getDias($plus) {
      $did = $plus+1; 
      $sql = "SELECT * FROM dia WHERE id_dia = $did";
      $stmt = $this->conexion()->query($sql);

      $row = $stmt->fetch();

        echo '<input type="text" class="form-control" value="'. $row["dia"] .'" readonly>'; 
        echo '<input type="hidden" id="id_dias" name="id_dias" class="form-control" value="'. $row["id_dia"] .'" readonly>';

    }
        
    //Materias del Profesor
    public function getMateria() {
      $sql1 = "SELECT * FROM materia WHERE id != 8 AND espe != 'especial' ";
      $stmt1 = $this->conexion()->query($sql1);

      while($row = $stmt1->fetch()){
          echo '<option value="' . $row['materia'] . '">' . $row['materia'] . '</option>';
      }

    }

  
    public function getHorasOcupadas($grado) {

      $sql = "SELECT * FROM horarios
      INNER JOIN profesor ON profesor.id_p = horarios.id_p
      INNER JOIN dia ON  dia.id_dia = horarios.id_dias
      INNER JOIN materia ON  materia.id = profesor.id_materia
      WHERE id_materia != 8 AND especial = 'si'
      ORDER BY dia";
      $stmt = $this->conexion->conexion()->query($sql);
  
      $valor = $grado . " Grado";
  
      $stmt->execute();

      while ($row = $stmt->fetch()) {
  
      switch (true) {
        //en caso que sean todas vacias 
          case !empty($row["hora1"]) && $row["hora1"] == $valor :
            $hora = '7:00am a 7:45am';
            $materia = $row["materia"];
            break;
  
        //en caso que sean 2 vacias 
          case !empty($row["hora2"]) && $row["hora2"] == $valor:
            $hora = '7:50am a 8:35am';
            $materia = $row["materia"];
            break;
  
          case !empty($row["hora3"]) && $row["hora3"] == $valor:
            $hora = '8:40am a 9:25am';
            $materia = $row["materia"];
            break;
  
          case !empty($row["hora4"]) && $row["hora4"] == $valor:
            $hora = '10:35am a 11:20am';
            $materia = $row["materia"];
            break;
            
        //en caso que sean 1 vacias 
          case !empty($row["hora5"]) && $row["hora5"] == $valor:
            $hora = '11:25am a 12:10am';
            $materia = $row["materia"];
            break;
  
          case !empty($row["hora6"]) && $row["hora6"] == $valor:
            $hora = '1:20pm a 2:05pm';
            $materia = $row["materia"];
            break;
            
          case !empty($row["hora7"]) && $row["hora7"] == $valor:
            $hora = '2:10pm a 3:00pm';
            $materia = $row["materia"];
            break;
  
          default:
          $hora = 'No Hay Horas Ocupadas';
          $materia = 'No Hay Materias Ocupadas';
            break;
  
        }
  
          echo '
          <div class="col">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>HORAS</th>
                  <th>'. $row["dia"] .'</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    '.$hora.'
                  </td>
                  <td>
                    '.$materia.'
                  </td>
                </tr>
              </tbody>
            </table>
          </div>';
      }
    }

  public function crearHorarios($id_p,$id_dias,$hora1, $hora2, $hora3, $hora4, $hora5, $hora6, $hora7, $espe) {

    if (empty($horas_ocupadas)) {
      $sql = "INSERT INTO horarios (id_p,id_dias, hora1, hora2, hora3, hora4, hora5, hora6, hora7, especial) 
        VALUES (:id_p,:id_dias, :hora1, :hora2, :hora3, :hora4, :hora5, :hora6, :hora7, :especial)";
      $stmt = $this->conexion()->prepare($sql);
      $stmt->bindParam(':id_p', $id_p);
      $stmt->bindParam(':id_dias', $id_dias);
      $stmt->bindParam(':hora1', $hora1);
      $stmt->bindParam(':hora2', $hora2);
      $stmt->bindParam(':hora3', $hora3);
      $stmt->bindParam(':hora4', $hora4);
      $stmt->bindParam(':hora5', $hora5);
      $stmt->bindParam(':hora6', $hora6);
      $stmt->bindParam(':hora7', $hora7);
      $stmt->bindParam(':especial', $espe);
      $stmt->execute();
    } else {
      /* echo "LA HORAS YA ASIGNADAS"; */
      echo json_encode(array("status" => "error", "message" => "DATOS YA ASIGNADO"));
    }
    return true;
  }

//! 2 COLUMNAS NUEVAS QUÉ TOMEN LOS VALORES DE ID_GRADO Y ID_SECCION
  //Eliminar Horario
  public function eliminarHorario($id) {

    $sql = "DELETE FROM horarios WHERE id = :id";
    $stmt = $this->conexion()->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {

      $horario_eliminar = "Se elimino el dia del horario con el id (" . $id . ") ,";
      $_SESSION['horario'] = $_SESSION['horario'] . $horario_eliminar;
      header("location: form.horario.php");
      exit();

    } else {
      
      $horario_eliminar = "";
      $_SESSION['horario'] = $_SESSION['horario'] . $horario_eliminar;
      return "Error al actualizar el horario: " . $stmt->errorInfo()[2];

    }
    
  }     
    
    public function verHorario($datos){
        
      $sql= "SELECT * FROM horarios
      LEFT JOIN profesor ON horarios.id_p = profesor.id_p
      INNER JOIN dias ON horarios.id_dias = dias.id

      WHERE  horarios.id_p = ".$datos['id_p']."";
  
      $stmt = $this->conexion()->query($sql);
      
      return $stmt;

    }

    //Crear PDF
    public function pdfHorarios($datos, $pdf) {
      $sql = "SELECT * FROM horarios 
      WHERE id_p = ". $datos . " LIMIT 5";
      $stmt = $this->conexion()->query($sql);

      $x= 45;
      $y= 43;

      while($row = $stmt->fetch()){

        $pdf->SetXY($x, $y);
        $pdf->MultiCell(45, 5, 
        "\n".$row['hora1'] ." ".
        "________________\n".
        "\n".$row['hora2'] ." ".
         "________________\n".
        "\n".$row['hora3'] ." ".
         "________________\n".
        "\n RECESO ".
         "________________\n".
        "\n".$row['hora4'] ." ".
         "________________\n".
        "\n".$row['hora5'] ." ".
         "________________\n".
        "\n RECESO ".
         "________________\n".
        "\n".$row['hora6'] ." ".
         "________________\n".
        "\n".$row['hora7'] ."\n\n"
        , 1, "C");

        $x = $x + 45; 

       }

    }

    //Mostrar Horario
  function getHorario($datos) {
  $id_p = intval($datos);  
  $sql = "SELECT * FROM horarios WHERE id_p = $id_p LIMIT 5";
  $stmt = $this->conexion()->query($sql);

  while ($row = $stmt->fetch()) {
    echo '<td> <center>';
    echo $row['hora1'] . '<hr>';
    echo $row['hora2'] . '<hr>';
    echo $row['hora3'] . '<hr>';
    echo $row['hora4'] . '<hr>';
    echo $row['hora5'] . '<hr>';
    echo $row['hora6'] . '<hr>';
    echo $row['hora7'] . '<br>';
    echo '</center> </td>';

    $this->plus++;
  }

  return $this->plus;
}

  function getHorarioPro($datos) {
  $id_p = intval($datos);  
  $sql = "SELECT * FROM horarios WHERE id_p = $id_p LIMIT 5";
  $stmt = $this->conexion()->query($sql);

  $this->plus1 = 0;

  while ($row = $stmt->fetch()) {
    
    echo '<td> <center>';
    echo $row['hora1'] . '<hr>';
    echo $row['hora2'] . '<hr>';
    echo $row['hora3'] . '<hr>';
    echo $row['hora4'] . '<hr>';
    echo $row['hora5'] . '<hr>';
    echo $row['hora6'] . '<hr>';
    echo $row['hora7'] . '<br>';
    echo '</center> </td>';

    $this->plus1++;
  }

  return $this->plus1;
}

    public function search(){

      if(!empty($_POST)) {

          function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
            return ($string !== '' && $frase !== '')
              ? preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga.'\\1'.$tagb, $string)
              : $string;
          }

          $aKeyword = explode(" ", $_POST['buscar']);
    
          $sql = "SELECT * FROM profesor
            INNER JOIN materia ON profesor.id_materia = materia.id
            INNER JOIN grado ON profesor.id_grado = grado.id_grado
            INNER JOIN seccion ON profesor.id_seccion = seccion.id_seccion
            WHERE nombre LIKE :keyword
            OR apellido LIKE :keyword
            OR cedula LIKE :keyword";
      
            $stmt = $this->conexion()->prepare($sql);
      
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

                        <th>Profesor</th>
                        <th>Accion</th>

                    </tr>

                </thead>

                <tbody>";
  
        foreach ($result as $i => $row) {

          if ($row['activo_p'] == 'si'){

            $activo_a = "Activo";
            
          }else{

            $activo_a = "Inactivo";

          }

          $datos= 
            array(
                "id_p"=> $row['id_p'],
                "nombre" => $row['nombre'],
                "apellido" => $row['apellido'],
                "cedula" => $row['cedula'],
                "codigo" => $row['codigo'],
                "correo" => $row['correo'],
                "direccion" => $row['direccion'],
                "año" => $row['ano'],
                "telefono" => $row['telefono'],
                "id_materia" => $row['id'],
                "materia" => $row['materia'],
                "id_grado" => $row['id_grado'],
                "grado" => $row['grado'],
                "id_seccion" => $row['id_seccion'],
                "seccion" => $row['literal']);


          if ($row['id_materia'] == 8){
            
            $espe = "<b>Docente de Aula de ". $row['grado'] ." grado seccion " . $row['literal'] ."</b><br>";
            $cargo = "<br>". $row['grado'] ." grado seccion " . $row['literal'] ." <br>";

            $form = '<form action="form.horario_p.php" method="post">
                          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
                          <button type="submit" class="btn btn-info">Horario <span class="fa fa-calendar-plus"></span></button>
                        </form><br>';
        
          }else{
          
              $espe = "<b>Docente de Especialista en ". $row['materia'] ."</b> <br>";
              $cargo = "<br> Especialista ". $row['materia'] ." <br>";

            $form = '<form action="form.horario_e.php" method="post">
                      <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
                      <button type="submit" class="btn btn-info">Horario <span class="fa fa-calendar-plus"></span></button>
                    </form><br>';
          }

                echo "<tr>";

                echo "<td> ". $espe ."Estado: " . $activo_a . "<br>"; 
                echo 'nombre: '.resaltar_frase($row['nombre'], $_POST['buscar']).' '.resaltar_frase($row['apellido'], $_POST['buscar']).'<br> 
                cedula : '.resaltar_frase($row['cedula'], $_POST['buscar']).'<br>';
                echo 'codigo de dependencia ' . $row['codigo'] . ' - ' . $row['correo'] .  
                '<br> direccion : ' . $row['direccion']  . '<br> telefono : ' . $row['telefono'] . 
                '<br> año de servicio : ' . $row['ano'] .'<br>'; 

                echo '</td><td>'. $form;

                echo "</td> </tr>";

                }  
                
                echo "
                </tbody>

                <tfoot>
                
                    <tr>
                        <th>Profesor</th>
                        <th>Accion</th>
                    </tr>
                    
                </tfoot>";
    
            }      
          }

    }
}