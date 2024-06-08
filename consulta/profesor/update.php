<?php

    session_start();

    require '../../src/profesor.class.php';
    $Profesor = new profesor;

 if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $jsonForm = file_get_contents('php://input');
    $dataGeneralForm = json_decode($jsonForm, true);

    // Validar datos
    if (!is_numeric($dataGeneralForm['cedula']) || !is_numeric($dataGeneralForm['telefono'])) {
        echo json_encode(array("status" => "invalid", "message" => "La cédula debe ser números"));
        return;
    }

    // Validar datos
    if (!is_numeric($dataGeneralForm['telefono'])) {
        echo json_encode(array("status" => "invalid", "message" => "El telefono debe ser números"));
        return;
    }

    if (!filter_var($dataGeneralForm['correo'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array("status" => "invalid", "message" => "El correo electrónico no es válido"));
        return;
    }
  
    // Guardar
   $Profesor1=
        $Profesor->
            editarProfesor(
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
                
    $horario = ""; 

    if ($Profesor1 == true) {
        
        $horario = "Realizo el registro del profesor(a) " . $dataGeneralForm['nombre'] . " de la cedula V-" . $dataGeneralForm['cedula'] . ",";
        $_SESSION['horario'] = $_SESSION['horario'] . $horario;
    
        echo json_encode(array("status" => "success", "message" => "Accion Realizada"));
        
    } else {
        
        echo json_encode(array("status" => "error", "message" => "Hubo un Error Intentelo Otra vez"));
        
    }

    

}
?>