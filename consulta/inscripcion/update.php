<?php

session_start();

    include '../../src/alumno.class.php';
    $Alumno = new Alumno;

    include '../../src/representante.class.php';
    $Representante = new Representante;

    include '../../src/salud.class.php';
    $Salud = new Salud;

    include '../../src/transporte.class.php';
    $Transporte = new Transporte;
    
    include '../../src/procedencia.class.php';
    $Procedencia = new Procedencia;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

        
        // Validar datos
        if (!is_numeric($dataGeneralForm['telefono_representante'])) {
            echo json_encode(array("status" => "invalid", "message" => "El telefono debe ser números"));
            return;
        }

        if (!filter_var($dataGeneralForm['correo_representante'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array("status" => "invalid", "message" => "El correo electrónico no es válido"));
            return;
        }

        //Alumno
        $id_a = $dataGeneralForm["id_a"];
        $nombre_a = $dataGeneralForm["nombre_a"]; 
        $cedula_escolar_a = $dataGeneralForm["cedula_escolar_a"];
        $id_grado_a = $dataGeneralForm["id_grado_a"];
        $id_seccion_a = $dataGeneralForm["id_seccion_a"];
        $direccion_a = $dataGeneralForm['direccion_a'];

        //Representante
        $id_r = $dataGeneralForm["id_representante"];
        $nombre_r = $dataGeneralForm["nombre_representante"];
        $apellido_r = $dataGeneralForm["apellido_representante"]; 
        $cedula_r = $dataGeneralForm["cedula_representante"];
        $profesion_r = $dataGeneralForm["profesion_representante"];
        $parentesco_r = $dataGeneralForm["parentesco_representante"];
        $direccion_tra_r = $dataGeneralForm["direccion_tra_representante"];
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

        //Salud
        $opcion_s = isset($dataGeneralForm["opcion1"]) ? $dataGeneralForm["opcion1"]: "";

        switch (true) {
    
            //en caso que sean 2 vacias 
              case $opcion_s = "no":

                $alergia_s = "(vacio)";
                $dieta_s = "(vacio)";
                $tratamiento_M_s = "(vacio)";
                $condicion_fisica_s = "(vacio)";
                $atencion_especial_s = "(vacio)";

            break;

            case $opcion_s = "si":

                $alergia_s = $dataGeneralForm['alergia_salud'];
                $dieta_s = $dataGeneralForm['dieta_salud'];
                $tratamiento_M_s = $dataGeneralForm['tratamiento_M_salud'];
                $condicion_fisica_s = $dataGeneralForm['condicion_fisica_salud'];
                $atencion_especial_s = $dataGeneralForm['atencion_especial_salud'];

            break;}

        //Transporte
        $opcion_t = isset($dataGeneralForm["opcion2"]) ? $dataGeneralForm["opcion2"]: "";

        switch (true) {
        
            case $opcion_t = "no":

                $nombre_t = "(vacio)";
                $telefono_t = "(vacio)";
                $cedula_t = "(vacio)";
                $numero_de_placa_t = "(vacio)";
                $numero_telefonico_opcional_t = "(vacio)";

            break;

            case $opcion_t = "si":

                $nombre_t = $dataGeneralForm['nombre_transporte'];
                $telefono_t = $dataGeneralForm['telefono_transporte'];
                $cedula_t = $dataGeneralForm['cedula_transporte'];
                $numero_de_placa_t = $dataGeneralForm['numero_de_placa_transporte'];
                $numero_telefonico_opcional_t = $dataGeneralForm['numero_telefonico_opcional_transporte'];

            break;}

        //Procedencia
        $de_donde_proviene_p = $dataGeneralForm['de_donde_proviene_procedencia'];
        $motivo_p = $dataGeneralForm['motivo_procedencia'];
        $direccion_p = $dataGeneralForm['direccion_procedencia']; 

        //Inscripcion
        $id_s = $dataGeneralForm["cedula_escolar_a"];
        $id_t = $dataGeneralForm["cedula_escolar_a"];
        $id_p = $dataGeneralForm["cedula_escolar_a"];

        if ( $vive_r === "" || $opcion_t === "" || $opcion_s === "" || $opcion_r === "") {


            echo json_encode(array("status" => "error", "message" => "checbox o checkbox's sin seleccionar"));
            return false;
        }
                
        //Alumno
        $Alumno1= 
            $Alumno-> 
                actualizarIns(
                    $id_a,  
                    $id_grado_a, 
                    $id_seccion_a);

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
                    $direccion_tra_r,
                    $telefono_r,
                    $telefono_tra_r,
                    $telefono_opc_r,
                    $vive_r ,
                    $correo_electronico_r, 
                    $opcion_r);

        //Salud
        $Salud1=
            $Salud-> 
                actualizarSalud(
                    $id_s,//id de salud
                    $opcion_s,
                    $alergia_s,
                    $dieta_s,
                    $tratamiento_M_s,
                    $condicion_fisica_s,
                    $atencion_especial_s);


        //Transporte
        $Transporte1=
            $Transporte-> 
                actualizarTransporte(
                    $id_t,//id de transporte
                    $opcion_t,
                    $nombre_t,
                    $telefono_t,
                    $cedula_t,
                    $numero_de_placa_t,
                    $numero_telefonico_opcional_t);
                

        //Procedencia 
        $Procedencia1=
            $Procedencia-> 
                actualizarProcedencia(
                    $id_p,//id de procedencia
                    $de_donde_proviene_p,
                    $motivo_p,
                    $direccion_p);

        if ( $Alumno1 == true && $Representante1 == true){

            $actualizar_alumno = "Realizo la Actualizacion a los datos del niño(a) " . $nombre_a . ",de la cedula" . $cedula_escolar_a . ",";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $actualizar_alumno ;

            echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));

        }else{

            $actualizar_alumno = "";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $actualizar_alumno ;

            echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }
    }

?>