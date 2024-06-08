<?php

session_start();

    require_once("../../src/horario.class.php");
    $horario = new Horario();

  

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataHorario = json_decode($jsonForm,true);

    if (!isset($dataHorario) || empty($dataHorario)) {
  echo "La variable dataHorario está vacía";
  return false;
}
    $id_p = $dataHorario["id_p"];
    $espe = $dataHorario["espe"];
    $id_dias = $dataHorario["id_dias"];
    $hora1 = $dataHorario["hora1"];
    $hora2 = $dataHorario["hora2"];
    $hora3 = $dataHorario["hora3"];
    $hora4 = $dataHorario["hora4"];
    $hora5 = $dataHorario["hora5"];
    $hora6 = $dataHorario["hora6"];
    $hora7 = $dataHorario["hora7"];

    $database = 
        $horario->
            crearHorarios(
                $id_p,
                $id_dias, 
                $hora1, 
                $hora2, 
                $hora3, 
                $hora4, 
                $hora5, 
                $hora6, 
                $hora7,
                $espe);
        

$profesor = "";   

if (true){
$profesor = "Realizo el registro de horario del profesor(a) ". $id_p .",";
$_SESSION['profesor'] = $profesor;
echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));
 }else{
         $profesor = "";
   $_SESSION['profesor'] = $_SESSION['profesor'] . $profesor;
     echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }

    }

?>