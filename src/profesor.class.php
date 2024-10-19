<?php

class profesor{

    private $baseData;
    public function __construct(){
        require "basedata2.php";
        $this->baseData = new baseData;
        $this->baseData->conexion();
    }

    public function getMateria(){
        $sql = "SELECT * FROM materia WHERE espe = 'especial'";
        $stmt = $this->baseData->conexion()->query($sql);
        while ($row = $stmt->fetch()) {
          echo '<option value=" ' . $row['id'] . ' ">' . $row['materia'] . '</option>';
        }
    }

    public function getSeccion(){

        $sql = "SELECT * FROM seccion WHERE literal != 'Nuevo Ingreso'";
        $stmt = $this->baseData->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value="' . $row['id_seccion'] . '">' . $row['literal'] . '</option>';
        }
    }

    public function getGrado(){

        $sql = "SELECT * FROM grado WHERE numero != 'Nuevo Ingreso' ORDER BY id_grado DESC";
        $stmt = $this->baseData->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value="' . $row['id_grado'] . '">' . $row['grado'] . '</option>';
        }
    }

    public function agregaProfesor($id, $nombre, $apellido, $cedula, $codigo, $correo, $direccion, $ano, $telefono, $grado, $seccion, $materia){
        $sql = "INSERT INTO profesor(id_p, nombre, apellido, cedula, direccion, codigo, correo, telefono, ano, id_grado, id_seccion, id_materia)
        VALUES (:id_p, :nombre, :apellido, :cedula, :direccion, :codigo, :correo, :telefono, :ano, :id_grado, :id_seccion, :id_materia)";
        $stmt = $this->baseData->conexion()->prepare($sql);
        $stmt->bindParam(':id_p', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':id_grado', $grado);
        $stmt->bindParam(':id_seccion', $seccion);
        $stmt->bindParam(':id_materia', $materia);

        if ($stmt->execute()) {

            return true;

        } else {

            return false;
            
        }
    }

    public function eliminarProfesor($var){
      if ($var == "si"){
        $sql = "DELETE FROM horarios";
        $stmt = $this->baseData->conexion()->query($sql);
    
      } 
    }

    public function Estado($id, $valor) {
        $sql = "UPDATE profesor SET activo_p=:activo_p WHERE id_p=:id_p";
        $stmt = $this->baseData->conexion()->prepare($sql);
        $stmt->bindParam(':id_p', $id);
        $stmt->bindParam(':activo_p', $valor);
        
        if ($stmt->execute()) {

          header("Location: profesor.php");
  
        } else {
  
          return "Error al actualizar los datos del alumno: " . $stmt->errorInfo()[2];
          
        }
      }

    public function editarProfesor($id, $nombre, $apellido, $cedula, $codigo, $correo, $direccion, $ano, $telefono, $grado, $seccion, $materia){
        $sql = "UPDATE profesor SET nombre=:nombre, apellido=:apellido, cedula=:cedula, codigo=:codigo, correo=:correo, direccion=:direccion, 
        telefono=:telefono, ano=:ano, id_grado=:id_grado, id_seccion=:id_seccion, id_materia=:id_materia WHERE id_p=:id_p";
        $stmt = $this->baseData->conexion()->prepare($sql);
        $stmt->bindParam(':id_p', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':id_grado', $grado);
        $stmt->bindParam(':id_seccion', $seccion);
        $stmt->bindParam(':id_materia', $materia);

        if ($stmt->execute()) {

            return true;

        } else {

            return false;

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
        
            $sql = "SELECT * FROM profesor
            INNER JOIN materia ON profesor.id_materia = materia.id
            INNER JOIN grado ON profesor.id_grado = grado.id_grado
            INNER JOIN seccion ON profesor.id_seccion = seccion.id_seccion
            WHERE nombre LIKE :keyword
            OR apellido LIKE :keyword
            OR cedula LIKE :keyword";
      
            $stmt = $this->baseData->conexion()->prepare($sql);
      
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
          
            $block = '
            <form id="change1" action="profesor.inic.php" method="post">
              <input type="hidden" name="id_p" value="'.$row['id_p'].'">
              <input type="hidden" name="Lock" value="no">
              <button type="submit" name="BtnLock" id="BtnLock" class="btn btn-danger">Desabilitar <span class="fa fa-exclamation-triangle"></span></button>
            </form><br>';
            
        }else{
              
              $activo_a = "Inactivo";

              $block = '
              <form id="change2" action="profesor.inic.php"" method="post">
                  <input type="hidden" name="id_p" value="'.$row['id_p'].'">
                  <input type="hidden" name="Unlock" value="si">
                  <button type="submit" name="BtnUnlock" id="BtnUnlock" class="btn btn-primary">Habilitar <span class="fa fa-check"></span></button>
              </form><br>
              ';
          
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
            
            $cargo = "<br>". $row['grado'] ." grado seccion " . $row['literal'] ." <br>";

            $editar = '<form action="update_p.php" method="post">
                          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
                          <button type="submit" class="btn btn-success">Editar <span class="fa fa-edit"></span></button>
                        </form><br>';
        
        }else{
        
            $cargo = "<br> Especialista ". $row['materia'] ." <br>";

            $editar = '<form action="update_e.php" method="post">
                          <input type="hidden" name="datos" value="'. htmlentities(serialize($datos)) .'">
                          <button type="submit" class="btn btn-success">Editar <span class="fa fa-edit"></span></button>
                        </form><br>';
        
        }

                echo "<tr>";

                echo "<td> Estado: " . $activo_a . "<br>";

                echo 'nombre: '.resaltar_frase($row['nombre'], $_POST['buscar']).' '.resaltar_frase($row['apellido'], $_POST['buscar']).'<br> 
                cedula : '.resaltar_frase($row['cedula'], $_POST['buscar']).'<br>';
                echo 'codigo de dependencia ' . $row['codigo'] . ' - ' . $row['correo'] .  
                '<br> direccion : ' . $row['direccion']  . '<br> telefono : ' . $row['telefono'] . 
                '<br> año de servicio : ' . $row['ano'] .'<br>';

                echo $cargo;

                echo $this->verDetalles($datos);
                echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-'. $row['id_p'] .'">
                        Ver Detalles  <span class="fa fa-eye"></span></button><br><br>';
                
                echo $editar;

                echo $block;

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
}
?>