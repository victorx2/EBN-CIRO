<?php

session_start();

require "copiaYSeguridadClass.php";
$respaldoB = new copiaYSeguridadClass();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $jsonForm = file_get_contents('php://input');
    $dataGeneralForm = json_decode($jsonForm, true);
    
    // Guardar
    $respaldoA=
        $respaldoB->
            CompararDatosDelUserConRespaldo(
                $dataGeneralForm['nombre_admin'],
                $dataGeneralForm['passwd_admin'],
            );
            
    if ($respaldoA == true) {

        $respaldoA = "Realizo el respaldo el admin(a) " . $dataGeneralForm['nombre_admin'] . " de la cedula V-" . $dataGeneralForm['passwd_admin'] . ",";
    
        echo json_encode(array("status" => "success", "message" => "Accion Realizada"));

    } else if($respaldoA == false) {

        echo json_encode(array("status" => "invalid", "message" => "Hubo un Error Intentelo Otra vez"));

    }else{

        return json_encode(array("status" => "not-fount", "message" => "usuario no coincide"));
    }
}