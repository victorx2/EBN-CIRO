<?php

session_start();

    include '../../src/alumno.class.php';
    $Alumno = new Alumno;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

        //Alumno
        $id_a = $dataGeneralForm["cedula_escolar_a"];
        $nombre_a = $dataGeneralForm["nombre_a"];
        $apellido_a = $dataGeneralForm["apellido_a"]; 
        $cedula_escolar_a = $dataGeneralForm["cedula_escolar_a"];
        $genero_a = $dataGeneralForm["genero_a"];
        $fecha_nac_a = $dataGeneralForm["fecha_nac_a"];
        $lugar_nac_a = $dataGeneralForm["lugar_nac_a"];
        $fecha_insc_a = $dataGeneralForm["fecha_insc_a"];
        $direccion_a = $dataGeneralForm["direccion_a"];

        /* $id_estado_a = $dataGeneralForm["id_estado_a"]; */

        $id_estado_a = isset($dataGeneralForm["id_estado_a"]) ?$dataGeneralForm["id_estado_a"] : "";
        if ($id_estado_a === "") {

        echo json_encode(array("status" =>
        "error",
        "message" =>
        "NO SE HA SELECCIONADO UNA CIUDAD"));
                return false;
        }

        $id_ciudad_a = isset($dataGeneralForm["id_ciudad_a"]) ?$dataGeneralForm["id_ciudad_a"] : "";
        if ($id_ciudad_a === "") {

        echo json_encode(array("status" =>
        "error",
        "message" =>
        "NO SE HA SELECCIONADO UNA CIUDAD"));
                return false;
        }

        $id_municipio_a = isset($dataGeneralForm["id_municipio_a"]) ?$dataGeneralForm["id_municipio_a"] : "";
        if ($id_municipio_a === "") {
    
        echo json_encode(array("status" =>
        "error",
        "message" =>
        "NO SE HA SELECCIONADO MUNICIPIO"));
                return false;
        }
        
        $id_parroquia_a = isset($dataGeneralForm["id_parroquia_a"]) ?$dataGeneralForm["id_parroquia_a"] : "";
        if ($id_parroquia_a === "") {
    
        echo json_encode(array("status" =>
        "error",
        "message" =>
        "NO SE HAN SELECCIONADO PARROQUIA"));
                return false;
        }


    /*  $id_ciudad_a = $dataGeneralForm["id_ciudad_a"];
        $id_municipio_a = $dataGeneralForm["id_municipio_a"];
        $id_parroquia_a = $dataGeneralForm["id_parroquia_a"];   */
        $id_grado_a = 7;
        $id_seccion_a = 5;
        /* $tiene_a = $dataGeneralForm["opcion5"]; */

        $tiene_a = isset($dataGeneralForm["opcion5"]) ? $dataGeneralForm["opcion5"] : "";

        if($tiene_a === ""){
    
            echo json_encode(array("status" =>
            "error",
            "message" =>
            "Por favor indicar si el alumno posee cedula"));
    
            return false;
    
        }

        $activo_a = "si";     
     
        switch (true) {
    
            //en caso que sean 2 vacias 
              case $tiene_a = "no":

                $cedula_a = "(vacio)";

            break;

            case $tiene_a = "si":

                $cedula_a = $dataGeneralForm["cedula_a"];

            break;}
                
        //Alumno
        $Alumno1= 
            $Alumno-> 
                guardarAlumno(
                    $id_a, 
                    $nombre_a, 
                    $apellido_a, 
                    $cedula_a, 
                    $cedula_escolar_a, 
                    $genero_a, 
                    $fecha_nac_a, 
                    $lugar_nac_a, 
                    $fecha_insc_a, 
                    $direccion_a,
                    $id_estado_a, 
                    $id_ciudad_a, 
                    $id_municipio_a, 
                    $id_parroquia_a, 
                    $activo_a, 
                    $id_grado_a, 
                    $id_seccion_a,
                    $tiene_a);

        $inscripcion = "";
        
        if ($Alumno1 == true){

            $inscripcion = "Realizo Inscripcion del niño(a) ". $nombre_a ." de la cedula V-" . $cedula_escolar_a . ",";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;

            echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));

        }else if ($Alumno1 == false){

            $inscripcion = "";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;

            echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }else{

            echo json_encode(array("status" => "error", "message" => "Ocurrió un error ya existe un estudiante con esta Cedula Escolar: ". $cedula_escolar_a."."));

        }

    }

?>