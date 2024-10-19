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

    include '../../src/inscripcion.class.php';
    $Inscripcion = new inscripcion;
    
    include '../../src/procedencia.class.php';
    $Procedencia = new Procedencia;

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
        $jsonForm = file_get_contents('php://input');
        $dataGeneralForm = json_decode($jsonForm,true);

        //Alumno
        $id_a = $dataGeneralForm["cedula_escolar_a"];
        $nombre_a = $dataGeneralForm["nombre_a"];
        $cedula_escolar_a = $dataGeneralForm["cedula_escolar_a"];
        $direccion_a = $dataGeneralForm["direccion_a"];
        $periodo_escolar_a = $dataGeneralForm["periodo_escolar_a"];
        $id_grado_a = isset($dataGeneralForm["grado"]) ? $dataGeneralForm["grado"]: "0";
        $id_seccion_a = isset($dataGeneralForm["seccion"]) ? $dataGeneralForm["seccion"]: "0";
        $activo_a = "si";

        //Representante
        $id_r = $dataGeneralForm["cedula_representante"];
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

            break;
        
            default:

                $telefono_opc_r = "(vacio)";
                $direccion_r = "(vacio)";

            break;
        }

        //Salud
        $opcion_s = isset($dataGeneralForm["opcion1"]) ? $dataGeneralForm["opcion1"]: "";
        $copia_cedula = isset($dataGeneralForm["copia_cedula"]) ? $dataGeneralForm["copia_cedula"]: "";
        $copia_partida = isset($dataGeneralForm["copia_partida"]) ? $dataGeneralForm["copia_partida"]: "";

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

        if ( $id_grado_a === "0") {

            echo json_encode(array("status" => "error", "message" => "Debe Colocar el Grado a Inscribir"));
            return false;
        }

        if ($id_seccion_a === "0") {

            echo json_encode(array("status" => "error", "message" => "Debe Colocar la Seccion a Inscribir"));
            return false;
        }

        if ( $vive_r === "") {


            echo json_encode(array("status" => "error", "message" => "Indique si el representante vive con el estudiante"));
            return false;
        }

        if ( $opcion_t === "") {


            echo json_encode(array("status" => "error", "message" => "Incique si el estudiante tiene transporte"));
            return false;
        }

        if ($opcion_s === "") {


            echo json_encode(array("status" => "error", "message" => "Incique si el estudiante tiene una condicion de salud"));
            return false;
        }

        if ( $opcion_r === "") {


            echo json_encode(array("status" => "error", "message" => "Indique si el representante tiene numero de Telefno opcional"));
            return false;
        }

        if ( $copia_cedula === "") {


            echo json_encode(array("status" => "error", "message" => "se necesita confirmacion si se entrego la copia de la cedula del representante"));
            return false;
        }

        if ( $copia_partida === "") {


            echo json_encode(array("status" => "error", "message" => "se necesita confirmacion si se entrego la copia de la partida de nacimiento del estudiante"));
            return false;
        }
                
        //Alumno
        $Alumno1= 
            $Alumno-> 
                actualizarIns(
                    $id_a, 
                    $id_grado_a, 
                    $id_seccion_a);
                    
               $Alumno2= 
                    $Alumno->
                        Periodo(
                            $id_a, 
                            $periodo_escolar_a);

        //Representante
        $Representante1=
            $Representante-> 
                guardarRepresentante(
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

        //Familia
        $Extras1=
            $Inscripcion-> 
                guardarFamilia(
                $id_a,//id de alumno
                $id_r//id de representante
                );


        //Salud
        $Salud1=
            $Salud-> 
                guardarSalud(
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
                guardarTransporte(
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
                guardarProcedencia(
                    $id_p,//id de procedencia
                    $de_donde_proviene_p,
                    $motivo_p,
                    $direccion_p);

        //Inscripcion
        $Inscripcion1=
            $Inscripcion-> 
                guardarDatos (
                    $id_a,//id de alumno
                    $id_r,//id de representante
                    $id_s,//id de salud
                    $id_t,//id de transporte
                    $id_p//id de procedencia
                );

        if ( $Inscripcion1 == true && $Alumno1 == true && $Salud1 == true && $Transporte1 == true && $Procedencia1 == true){

            $inscripcion = "Realizo Inscripcion del niño(a) ". $nombre_a ." de la cedula escolar V-" . $cedula_escolar_a . ",";
            $_SESSION['inscripcion'] = $inscripcion;

            echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));

        }else{

            $inscripcion = "";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $inscripcion;

            echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }

    }

?>