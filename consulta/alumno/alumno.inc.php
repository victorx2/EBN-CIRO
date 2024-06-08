<?php

session_start();

    include '../../src/alumno.class.php';
    $Alumno = new Alumno;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

    if (isset($dataGeneralForm["update"])) { 

            //Alumno
            $id_a = $dataGeneralForm["id_a"];
            $nombre_a = $dataGeneralForm["nombre_a"];
            $apellido_a = $dataGeneralForm["apellido_a"]; 
            $cedula_escolar_a = $dataGeneralForm["cedula_escolar_a"];
            $genero_a = $dataGeneralForm["genero_a"];
            $fecha_nac_a = $dataGeneralForm["fecha_nac_a"];
            $lugar_nac_a = $dataGeneralForm["lugar_nac_a"];
            $direccion_a = $dataGeneralForm["direccion_a"];
            $id_estado_a = $dataGeneralForm["id_estado_a"];
            $id_ciudad_a = $dataGeneralForm["id_ciudad_a"];
            $id_municipio_a = $dataGeneralForm["id_municipio_a"];
            $id_parroquia_a = $dataGeneralForm["id_parroquia_a"];

            $tiene_a = isset($dataGeneralForm["opcion5"]) ? $dataGeneralForm["opcion5"] : "";

            if($tiene_a === ""){
        
                echo json_encode(array("status" =>
                "error",
                "message" =>
                "Por favor indicar si el alumno posee cedula"));
        
                return false;
        
            }
    
           
        switch (true) {
        
            //en caso que sean 2 vacias 
            case $tiene_a == "no":
    
                $cedula_a = "(vacio)";
    
            break;
    
            default:
    
                $cedula_a = $dataGeneralForm["cedula_a"];
    
            break;}
                    
        //Alumno
        $Alumno1= 
            $Alumno-> 
                actualizarAlumno(
                    $id_a, 
                    $nombre_a, 
                    $apellido_a, 
                    $cedula_escolar_a, 
                    $cedula_a, 
                    $genero_a, 
                    $fecha_nac_a, 
                    $lugar_nac_a, 
                    $direccion_a,
                    $id_estado_a, 
                    $id_ciudad_a, 
                    $id_municipio_a, 
                    $id_parroquia_a, 
                    $tiene_a);

                if ($Alumno1 == true){
                    $inscripcion = "Realizo Inscripcion del niño(a) ". $nombre_a ." de la cedula V-" . $id_a . ",";
                    $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;
        
                    echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));
        
                }else{
        
                    $inscripcion = "";
                    $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;
        
                    echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));
        
                }

    }

    else if (isset($_POST["Unlock"]) || isset($_POST["Lock"])) { 

            //Alumno
            $id_a = $_POST["id_a"];

            switch (true) {
        
                //en caso que sean 2 vacias 
                case isset($_POST["Unlock"]):
        
                    $tiene_a = $_POST["Unlock"];
        
                break;
        
                default:
        
                    $tiene_a = $_POST["Lock"];
        
                break;}
                    
        //Alumno
        $Alumno2= 
            $Alumno-> 
                Estado(
                    $id_a, 
                    $tiene_a);


    }

}

?>