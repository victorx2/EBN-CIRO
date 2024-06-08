<?php 

require "../../src/cambiarContrasena.class.php";
$classLogin = new Seguridad();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
$txtusuarioactual = $data["txtusuarioactual"];
$data_dbVerificar = $classLogin->verificarusuario($txtusuarioactual);

        if($data_dbVerificar == true) {
            echo json_encode(array("status" => "success", "message" => "USUARIO ENCONTRADO EXITOSAMENTE"));

        } else if($data_dbVerificar == false) {
            echo json_encode(array("status" => "invalid", "message" => "SU USUARIO ESTA INCORRECTO"));

        } else {
            echo json_encode(array("status" => "not-fount", "message" => "USUARIO NO ENCONTRADO"));
        }                       
}
?>