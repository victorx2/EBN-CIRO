<?php
/* session_start(); */
require_once "../../src/cambiarContrasena.class.php";
$classLogin = new Seguridad();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    $id = $data["id"];
    $txtclaveactual = $data["txtclaveactual"];
    $txtclavenueva = $data["txtclavenueva"];
    $txtclavenuevaconfirm = $data["txtclavenuevaconfirm"];

    if($txtclavenueva != $txtclavenuevaconfirm) {
        echo json_encode(array("status" => "invalid", "message" => "Las contraseñas no coinciden."));
        exit;
    }

    if (strlen($txtclavenueva) < 8) {
        echo json_encode(array("status" => "invalid", "message" => "La nueva clave debe tener al menos 8 caracteres."));
        exit;
    }

    if (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^[a-zA-Z0-9]*$/', $txtclavenueva)) {
        echo json_encode(array("status" => "invalid", "message" => "La nueva clave debe contener al menos un Numero y una Letra Minúscula y una Mayuscula ."));
        exit;
    }

    if ($txtclavenueva == $txtclaveactual) {
        echo json_encode(array("status" => "invalid", "message" => "La nueva clave no puede ser la misma que la clave actual."));
        exit;
    } 

    $data_dbVerificar= 
        $classLogin->
            verificarPasswd($id, $txtclaveactual, $txtclavenueva);


    if($data_dbVerificar == true) {
        echo json_encode(array("status" => "success", "message" => "USUARIO ENCONTRADO EXITOSAMENTE"));

    } else if($data_dbVerificar == false) {
        echo json_encode(array("status" => "invalid", "message" => "SU CLAVE ESTA INCORRECTO"));

    } else {
        echo json_encode(array("status" => "not-fount", "message" => "USUARIO NO ENCONTRADO"));
    }                       
}

?>