<?php

session_start();

include '../../src/ficha.class.php';
$ficha = new Ficha;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Comprobar las respuestas del POST,sí se están enviando o no
    $jsonForm = file_get_contents('php://input');
    $dataGeneralForm = json_decode($jsonForm,true);

    $ficha1= 
        $ficha-> 
          guardarFicha(
            $dataGeneralForm["id_familia"],
            $dataGeneralForm["asistencia"],
            $dataGeneralForm["literal"],
            $dataGeneralForm["observacion"],
            $dataGeneralForm["plantel"],
            $dataGeneralForm["promocion"],
            $dataGeneralForm["seccion_pro"],
            $dataGeneralForm["fecha_pro_alumno"],
            $dataGeneralForm["doc_insc"],
            $dataGeneralForm["profesor"],
            $dataGeneralForm["cedula_profesor"]);

    if ($ficha1 === true){

      $ficha_acomulativa = "Realizo una Ficha acomulativa del niño(a) de la cedula V-" . $dataGeneralForm["id_a"] . ",";
      $_SESSION['ficha_acomulativa'] = $_SESSION['ficha_acomulativa'] . $ficha_acomulativa;

      echo json_encode(array("status" => "success", "message" => "Ficha Realizado"));

    }else if ($ficha1 === false){

      $ficha_acomulativa = "Error al guardar datos";
      $_SESSION['ficha_acomulativa'] = $_SESSION['ficha_acomulativa'] . $ficha_acomulativa;

      echo json_encode(array("status" => "invalid", "message" => "Hubo un problema, revise y envie Nuevamente"));
    } 

    }
?>