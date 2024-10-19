<?php
class copiaYSeguridadClass{
  
  private $baseDataRespaldoA;
  private $basedata;

  public function __construct(){
    
    require_once '../../src/basedata2.php';
    $this->basedata = new baseData;
  
    $this->basedata->conexion();

    require_once "index.php";
  }

  public function CompararDatosDelUserConRespaldo($usuario, $passwd){

    $sql = "SELECT * FROM users WHERE usuario = :usuario";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($passwd, $result['passwd'])) {

        // Datos del usuario encontrados en la tabla users
        $this->baseDataRespaldoA = new baseDataRespaldo();
        $this->baseDataRespaldoA->conexionRespaldo();

        return true;

    } else {
      // Usuario no encontrado
      return false;

    }
  }
}