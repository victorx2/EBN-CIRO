<?php

    require_once "src/login.class.php";
    $classLogin = new Login();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $usuario = $data["usuario"];
        $clave = $data["clave"];

        $data_db= 
            $classLogin->
                iniciarsesion(
                    $usuario, 
                    $clave);

        $request=json_decode($data_db, true);

       if($request["status"]==="success"){

        session_start();

        echo json_encode(array("status" => "success", "message" => "usuario encontrado con exito"));
        
        $_SESSION['array']= 
            array(
                //datos del alumno
                "id" => $request['userId'],
                "nivel" => $request['nivel'],
                "user" => $request['user'],
            );

        $_SESSION["session_id"]=$request["userId"];
        date_default_timezone_set('America/Caracas');
        $_SESSION["fecha"]= date('d/m/Y');
        $_SESSION["entrada"]= date('H:m:s');
        $_SESSION["user"]=$request["user"];
        $_SESSION["nivel"]=$request["nivel"];

       }else if($request["status"]==="invalid"){

        echo json_encode(array("status" => "invalid", "message" => "su clave esta incorrecta"));

       }else{

        return json_encode(array("status" => "not-fount", "message" => "usuario no encontrado"));
       }

    } 