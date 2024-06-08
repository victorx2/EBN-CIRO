<?php 

require "../../src/cambiarContrasena.class.php";
$classLogin = new Seguridad();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $id = $data["id"];
    $activo = $data["activo"];
    $pregunta1 = $data["pregunta1"];
    $pregunta2 = $data["pregunta2"];
    $pregunta3 = $data["pregunta3"];

    if($activo == "BLOQUEADO") {
        echo json_encode(array("status" => "invalid", "message" => "Usuario Bloqueado"));
        exit;
    }

    $data_dbVerificar = $classLogin->verificarpreguntas($id, $pregunta1, $pregunta2, $pregunta3);

        if($data_dbVerificar == true) {
            echo json_encode(array("status" => "success", "message" => "USUARIO ENCONTRADO EXITOSAMENTE"));

        } else if($data_dbVerificar == false) {
            echo json_encode(array("status" => "invalid", "message" => "SU USUARIO ESTA INCORRECTO"));

        } else {
            echo json_encode(array("status" => "not-fount", "message" => "USUARIO NO ENCONTRADO"));
        }                       
}
?>