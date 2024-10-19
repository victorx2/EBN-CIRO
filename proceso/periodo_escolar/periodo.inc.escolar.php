<?php

session_start();

    include '../../src/periodo.class.php';
    $periodoEscolar = new periodoEscolar;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

    if (!empty($dataGeneralForm["comienza"]) && !empty($dataGeneralForm["termina"])){

        $periodo = $dataGeneralForm["comienza"] .'/'. $dataGeneralForm["termina"];

        if ( $dataGeneralForm["comienza"] == $dataGeneralForm["termina"]) {


            echo json_encode(array("status" => "error", "message" => "las fecha de incio y cierre de periodo no pueden ser iguales"));
            return false;
        }

        $comienza = $dataGeneralForm["comienza"] + 1;
        if ( $comienza != $dataGeneralForm["termina"]) {

            echo json_encode(array("status" => "error", "message" => "las fecha de incio o cierre de periodo mal colocada"));
            return false;
        }

        $periodo1= 
        $periodoEscolar-> 
            agregar(
                $dataGeneralForm["comienza"],
                $dataGeneralForm["termina"], 
                "si");

                

                if ( $periodo1 == true ){

                    $inscripcion = "Realizo la Creacion del Periodo ". $periodo ." ,";
                    $_SESSION['inscripcion'] = $inscripcion;
        
                    echo json_encode(array("status" => "success", "message" => "Creacion del Periodo Exitoso"));
        
                }else{
        
                    echo json_encode(array("status" => "error", "message" => "Periodo ya existente"));
        
                }    

    } else if (!empty($dataGeneralForm["comienza_end"]) && !empty($dataGeneralForm["termina_end"])) {

        $periodo = $dataGeneralForm["comienza_end"] .'/'. $dataGeneralForm["termina_end"];

        $periodo2= 
        $periodoEscolar-> 
            actualizar(
                $dataGeneralForm["id"], 
                "no");

                if (  $periodo2 == true ){

                    $inscripcion = "Realizo el cierre del Periodo ". $periodo ." ,";
                    $_SESSION['inscripcion'] = $inscripcion;
        
                    echo json_encode(array("status" => "success", "message" => "Cierre del Periodo Exitoso"));
        
                }else{
        
                    $inscripcion = "";
                    $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;
        
                    echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));
        
                }

    }

}

?>