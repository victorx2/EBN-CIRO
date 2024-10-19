<?php
class Users {

    private $basedata;

    public function __construct() {

        require "basedata2.php";
        $this->basedata = new baseData;

    }

    public function usuarios(){

      $sql = "SELECT * FROM users
      INNER JOIN pregunta_seguridad ON pregunta_seguridad.id_users = users.id";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->execute();

      while ($row = $stmt->fetch()) {
        
          if ($row['nivel'] == 'A'){
          
              $nivel = "Director(a)";        
              
          }else{
              
              $nivel = "Secretario(a)";
          
          }

          $datos = array(  
              //datos del alumno
              "id" => $row['id'],
              "usuario" => $row['usuario'],
              "nivel" => $nivel,
              "activo" => $row['activo'],
              "color_favorito" => $row['color_favorito'],
              "mascota_fovorita" => $row['mascota_fovorita'],
              "hijo_favorito" => $row['hijo_favorito'],
            );

          if ($row['activo'] == 'si'){
          
              $block = '
              <form action="src/users.delete.php" method="post">
                  <input type="hidden" name="id" value="'.$row['id'].'">
                  <input type="hidden" name="datos" value="no">
                  <button type="submit" name="Lock" id="Lock" class="btn btn-danger">Bloquear usuario <span class="fa fa-lock"></span></button>
              </form><br>';
              
          }else{
              
              $block = '
              <form action="src/users.delete.php" method="post">
                  <input type="hidden" name="id" value="'.$row['id'].'">
                  <input type="hidden" name="datos" value="si">
                  <button type="submit" name="Unlock" id="Unlock" class="btn btn-success">Desbloquear usuario <span class="fa fa-unlock"></span></button>
              </form><br>';
          
          }
         
          echo '<tr><td><i class="fa fa-user" ></i> '.$nivel.' '.$row['usuario'] . '</td>';

          echo '<td>'.$block.'</td></tr>';

      }
  }

    public function delete($id){

      $sql = "DELETE FROM users WHERE id=:id";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id', $id);
      
      if ($stmt->execute()) {

        header("Location: ../perfil.php");

      } else {

          return false;
          
      } 

    }

    public function Estado($valor, $id) {
      $sql = "UPDATE users SET estado=:estado WHERE id=:id";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':estado', $valor);
      
      if ($stmt->execute()) {

        header("Location: ../perfil.php");

      } else {

        return "Error al actualizar los datos del alumno: " . $stmt->errorInfo()[2];
        
      }
    }


    public function actualizar($datos) { 

      $sql = "SELECT * FROM auditoria
      INNER JOIN users ON users.id = auditoria.id_usuario
      WHERE id_usuario LIKE :keyword
      OR entrada LIKE :keyword
      OR acciones LIKE :keyword
      OR salida LIKE :keyword";

    }
}
?>