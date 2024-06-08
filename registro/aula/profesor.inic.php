<?php

    session_start();

    require '../../src/profesor.class.php';
    $Profesor = new profesor;

 if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $jsonForm = file_get_contents('php://input');
    $dataGeneralForm = json_decode($jsonForm, true);

    $grado = isset($dataGeneralForm["grado"]) ?$dataGeneralForm["grado"] : "";
        if ($grado == "") {

        echo json_encode(array("status" =>
        "error",
        "message" =>
        "NO SE HA SELECCIONADO UNA GRADO"));
                return false;
    }

    $seccion = isset($dataGeneralForm["seccion"]) ?$dataGeneralForm["seccion"] : "";
        if ($seccion == "") {

        echo json_encode(array("status" =>
        "error",
        "message" =>
        "NO SE HA SELECCIONADO UNA SECCION"));
                return false;
    }
     
    if (!is_numeric($dataGeneralForm['cedula']) || !is_numeric($dataGeneralForm['telefono'])) {
        echo json_encode(array("status" => "invalid", "message" => "La cédula debe ser números"));
        return false;
    }

     
    if (!is_numeric($dataGeneralForm['telefono'])) {
        echo json_encode(array("status" => "invalid", "message" => "El telefono debe ser números"));
        return false;
    }

    if (!filter_var($dataGeneralForm['correo'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array("status" => "invalid", "message" => "El correo electrónico no es válido"));
        return false;
    }

    
   $Profesor1=
        $Profesor->
            agregaProfesor(
                $dataGeneralForm['cedula'],
                $dataGeneralForm['nombre'],
                $dataGeneralForm['apellido'],
                $dataGeneralForm['cedula'],
                $dataGeneralForm['codigo'],
                $dataGeneralForm['correo'],
                $dataGeneralForm['direccion'],
                $dataGeneralForm['ano'],
                $dataGeneralForm['telefono'],
                $dataGeneralForm['grado'],
                $dataGeneralForm['seccion'],
                $dataGeneralForm['materia']);
                
        $horario = "Realizo el registro del profesor(a) " . $dataGeneralForm['nombre'] . " de la cedula V-" . $dataGeneralForm['cedula'] . ",";
        
    if ($Profesor1 == true) {
            
            $_SESSION['horario'] = $_SESSION['horario'] . $horario;
        echo json_encode(array("status" => "success", "message" => "Accion Realizada"));
        
    } else {
        
        echo json_encode(array("status" => "error", "message" => "Hubo un Error Intentelo Otra vez"));
        
    }
}
?>