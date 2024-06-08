 <?php

    require_once 'src/signup.class.php';
    $signup = new Signup();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $json = file_get_contents('php://input');
        $dataGeneralForm = json_decode($json, true);


        $usuario = $dataGeneralForm["usuario"];
        $cedula = $dataGeneralForm["cedula"];
        $clave = $dataGeneralForm["clave"];
        $confirm_clave = $dataGeneralForm["confirm_clave"];
        $nivel = $dataGeneralForm["nivel"];

        //Alumno
        $nombre1 = $dataGeneralForm["nombre1"];
        $nombre2 = $dataGeneralForm["nombre2"];
        $apellido1 = $dataGeneralForm["apellido1"]; 
        $apellido2 = $dataGeneralForm["apellido2"];

        $pregunta1 = $dataGeneralForm["pregunta1"];
        $pregunta2 = $dataGeneralForm["pregunta2"];
        $pregunta3 = $dataGeneralForm["pregunta3"];

        if ($dataGeneralForm["nivel"] = "A") {
            $nivel = "A";
        } elseif ($dataGeneralForm["nivel"]= "I") {
            $nivel = "I";
        } else {
            echo json_encode(array("status" => "invalid", "message" => "NO SE HAN SELECCIONADO NINGUN NIVEL"));
            exit;
        }

        if (strlen($clave) < 8) {
            echo json_encode(array("status" => "invalid", "message" => "La nueva clave debe tener al menos 8 caracteres."));
            exit;
        }
    
        if (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])^[a-zA-Z0-9]*$/', $clave)) {
            echo json_encode(array("status" => "invalid", "message" => "La clave debe contener al menos un Numero y una Letra Minúscula y una Mayuscula."));
            exit;
        }

        switch (true) {
    
            //en caso que sean 2 vacias 
              case $nivel = "A":

                
                $Signup1 =
                    $signup->Registro(
                        $cedula,
                        $usuario,
                        $cedula,
                        $clave,
                        $confirm_clave,
                        $nivel,
                        "si"
                    );

                $Signup2 =
                    $signup->preguntas(
                        $cedula,
                        $pregunta1,
                        $pregunta2,
                        $pregunta3,
                    );

                $Signup3 =
                    $signup->admin(
                        $cedula,
                        $nombre1,
                        $nombre2,
                        $apellido1,
                        $apellido2,
                    );

                    if ($Signup1 == true && $Signup2 == true && $Signup3 == true) {

                        echo json_encode(array("status" => "success", "message" => "USUARIO INGRESADO AL SISTEMA CON EXITO"));
                        return true;
            
                    } else if ($Signup1 == false) {
            
                        echo json_encode(array("status" => "invalid", "message" => "SU CONTRASEÑA ES INCORRECTA"));
                        return false;
                        
                    } else {
            
                        echo json_encode(array("status" => "not-fount", "message" => "DATOS NO REGISTRADOS"));
                        return false;
                    
                    }

            break;

            default:

                $Signup1 =
                    $signup->Registro(
                        $cedula,
                        $usuario,
                        $cedula,
                        $clave,
                        $confirm_clave,
                        $nivel,
                        "si"
                    );

                    if ($Signup1 == true) {

                        echo json_encode(array("status" => "success", "message" => "USUARIO INGRESADO AL SISTEMA CON EXITO"));
            
                    } else if ($Signup1 == false) {
            
                        echo json_encode(array("status" => "invalid", "message" => "SU CONTRASEÑA ES INCORRECTA"));
                        
                    } else {
            
                        return json_encode(array("status" => "not-fount", "message" => "DATOS NO REGISTRADOS"));
                        
                    }

            break;}
                

    }
?>