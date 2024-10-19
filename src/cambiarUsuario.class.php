<?php
class SeguridadNivelUsuario
{
    private $basedata;
    public function __construct()
    {
        require_once("basedata2.php");
        $this->basedata = new baseData();
        $this->basedata->conexion();
    }
public function verificarusuario($txtusuarioactual){
    $sql = "SELECT usuario FROM users WHERE usuario=:usuario";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(":usuario", $txtusuarioactual);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        if($txtusuarioactual === $txtusuarioactual)  {
            return true;
    }
            }else{
            return false;
        }
}
}