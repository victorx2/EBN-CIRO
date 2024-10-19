<?php
 class Login {
    private $basedata;

    public function __construct() {
require_once ("basedata2.php");
        $this->basedata = new baseData();
        $this->basedata->conexion();
    }

    public function iniciarsesion($usuario, $clave) {
        $sql = "SELECT * FROM users WHERE usuario = :usuario";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    /*     
      return var_dump($result);*/

        if ($result) {
            if (password_verify($clave, $result['passwd'])) {

                $_SESSION['usuario'] = $result["usuario"];
                $_SESSION['nivel'] = $result["nivel"];
                return json_encode(array("status" => "success", "userId" => $result["id"],"user" => $result["usuario"],"nivel" => $result["nivel"]));
              
            } else {
                // Devolver una respuesta JSON indicando que la contraseña es incorrecta
                return json_encode(array("status" => "invalid"));
            }

        } else {
            // Devolver una respuesta JSON indicando que el usuario no se encontró
            return json_encode(array("status" => "not-fount"));
        }
    }
} 


 

