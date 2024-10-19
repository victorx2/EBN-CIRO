<?php

session_start();

    include '../../src/reinscripcion.class.php';
    $Alumno = new reinscripcion;

    include '../../src/representante.class.php';
    $Representante = new Representante;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

        //Alumno
        $id_a = $dataGeneralForm["cedula_escolar_a"];
        $nombre_a = $dataGeneralForm["nombre_a"];
        $cedula_escolar_a = $dataGeneralForm["cedula_escolar_a"];

        $cedula = $dataGeneralForm["cedula_a"];
        $direccion_a = $dataGeneralForm["direccion_a"];
        $periodo_escolar_a = $dataGeneralForm["periodo"];
        $id_grado = $dataGeneralForm["grado"];


        //Representante
        $id_r = $dataGeneralForm["cedula_representante"];
        $nombre_r = $dataGeneralForm["nombre_representante"];
        $apellido_r = $dataGeneralForm["apellido_representante"]; 
        $cedula_r = $dataGeneralForm["cedula_representante"];
        $profesion_r = $dataGeneralForm["profesion_representante"];
        $parentesco_r = $dataGeneralForm["parentesco_representante"];
        $direccion_trabajo_r = $dataGeneralForm["direccion_trabajo_r"];
        $telefono_r = $dataGeneralForm["telefono_representante"];
        $telefono_tra_r = $dataGeneralForm["telefono_tra_representante"];
        $vive_r = isset($dataGeneralForm["opcion4"]) ? $dataGeneralForm["opcion4"]: "";
        $correo_electronico_r = $dataGeneralForm["correo_electronico_representante"];
        $opcion_r = isset($dataGeneralForm["opcion3"]) ? $dataGeneralForm["opcion3"]: "";

        switch (true) {
        
            //en caso que sean 2 vacias 
            case $vive_r == "si" && $opcion_r == "no":

                $telefono_opc_r = "(vacio)";
                $direccion_r = $direccion_a;
                
            break;

            case $vive_r == "no" && $opcion_r == "si":

                $telefono_opc_r = $dataGeneralForm['telefono_opc_representante'];
                $direccion_r = $dataGeneralForm['direccion_representante'];

            break;

            case $vive_r == "no" && $opcion_r == "no":

                $telefono_opc_r = "(vacio)";
                $direccion_r = $dataGeneralForm['direccion_representante'];

            break;
        
            case $vive_r == "si" && $opcion_r == "si":

                $telefono_opc_r = $dataGeneralForm['telefono_opc_representante'];
                $direccion_r = $direccion_a;

            break;}


            if ( $vive_r === "") {
    
    
                echo json_encode(array("status" => "error", "message" => "Indique si el representante vive con el estudiante"));
                return false;
            }
    
            if ( $opcion_r === "") {
    
    
                echo json_encode(array("status" => "error", "message" => "Indique si el representante tiene numero de Telefno opcional"));
                return false;
            }

                
        //Alumno
        $Alumno1= 
            $Alumno->
                Ficha_a(
                    $id_a, 
                    $cedula,
                    $id_grado,
                    $periodo_escolar_a,
                    $direccion_a);

                $Alumno2= 
                    $Alumno->
                        Periodo(
                            $id_a, 
                            $periodo_escolar_a);

        //Representante
        $Representante1=
            $Representante-> 
                actualizarRepresentante(
                    $id_r,//id de representante
                    $nombre_r,
                    $apellido_r,
                    $cedula_r,
                    $profesion_r,
                    $parentesco_r,
                    $direccion_r,
                    $direccion_trabajo_r,
                    $telefono_r,
                    $telefono_tra_r,
                    $telefono_opc_r,
                    $vive_r ,
                    $correo_electronico_r, 
                    $opcion_r);


        if ( $Alumno1 == true && $Alumno2 == true && $Representante1 == true ){

            $inscripcion = "Realizo la Re-Inscripcion del niño(a) ". $nombre_a ." de la cedula escolar V-" . $cedula_escolar_a . ",";
            $_SESSION['inscripcion'] = $inscripcion;

            echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));

        }else{

            $inscripcion = "";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;

            echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }

    }

?>