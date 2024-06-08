<?php

session_start();

    include 'src/auditoria.class.php';
    $Alumno = new Alumno;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

        //Alumno
        $valor1 = $dataGeneralForm["valor1"];
        $valor2 = $dataGeneralForm["valor2"];

        //Alumno
        $Alumno1= 
            $Alumno-> 
                guardarAlumno(
                    $valor1, 
                    $valor2 
                    );

        $inscripcion = "";
        
        if ($Alumno1 == true){

            echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));

        }else if ($Alumno1 == false){

            echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }else{

            echo json_encode(array("status" => "error", "message" => "Ocurrió un error ya existe un estudiante con esta Cedula Escolar: ". $cedula_escolar_a."."));

        }
    }

?>