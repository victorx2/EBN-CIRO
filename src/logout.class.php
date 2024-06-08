<?php

class Logout {

    private $basedata;

    public function __construct() {

        require_once ("basedata2.php");
        $this->basedata = new baseData;

        $this->basedata->conexion();
    }

    public function cerrarSesion($usuario, $nivel, $fecha, $entrada, $accion, $salida) {

        $sql = "INSERT INTO auditoria (id_usuario, nivel, fecha, entrada, acciones, salida)
        VALUE(:id_usuario, :nivel, :fecha, :entrada, :acciones, :salida)";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_usuario', $usuario);
        $stmt->bindParam(':nivel', $nivel);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':entrada', $entrada);
        $stmt->bindParam(':acciones', $accion);
        $stmt->bindParam(':salida', $salida);

        if ($stmt->execute()) {

            session_unset();
  
            session_destroy();
            
            header("Location: login.php");
            exit();

          } else {
            return "Error al guardar los datos del alumno: " . $stmt->errorInfo()[2];
          }   
      }
}

?>