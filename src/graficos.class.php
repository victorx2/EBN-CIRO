<?php
class graficos {

    private $basedata;

    public function __construct() {

        require "basedata2.php";
        $this->basedata = new baseData;

    }

    public function generos(){
      $sql = "SELECT genero_a FROM alumno";
      $stmt = $this->basedata->conexion()->query($sql);

      $cantidad = $stmt->fetchAll(PDO::FETCH_NUM);

      echo json_encode($cantidad);
    }

    public function verDetalles($datos) { 

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