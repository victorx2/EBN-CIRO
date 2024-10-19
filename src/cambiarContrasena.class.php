<?php
class Seguridad
{
    private $basedata;
    public function __construct()
    {
        require_once("basedata2.php");
        $this->basedata = new baseData();
        $this->basedata->conexion();
    }

    public function verificarPasswd($id, $passwdActual, $passwdNueva){

        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($passwdActual, $result['passwd'])) {

                $sql = "UPDATE users SET passwd=:passwd WHERE id = :id";
                $stmt = $this->basedata->conexion()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $password = password_hash($passwdNueva, PASSWORD_DEFAULT);
                $stmt->bindParam(':passwd',$password);

                $stmt->execute();
                
            return true;
                
                
            } else {
                // Devolver una respuesta JSON indicando que la contraseña es incorrecta
                return false;
            }
    }

    
    public function olvidoContrasena($id, $passwd){

        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {

                $sql = "UPDATE users SET passwd=:passwd WHERE id = :id";
                $stmt = $this->basedata->conexion()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $password = password_hash($passwd, PASSWORD_DEFAULT);
                $stmt->bindParam(':passwd',$password);

                $stmt->execute();
                
            return true;
                
                
            } else {
                // Devolver una respuesta JSON indicando que la contraseña es incorrecta
                return false;
            }
        }

    public function cambiarContrasena($passwd){
    $sql = "SELECT passwd FROM users WHERE passwd=:passwd";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(":passwd", $passwd);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($passwd, $result['passwd'])) {

        return json_encode(array("status" => "success"));

    } else {
        if (!isset($result)) {
            return json_encode(array("status" => "invalid"));
        } else {
            return json_encode(array("status" => "not-fount"));
        }
    }
    }

    public function verificarusuario($txtusuarioactual){
        $sql = "SELECT * FROM users WHERE usuario=:usuario";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(":usuario", $txtusuarioactual);
        $row = $stmt->execute();

        $row = $stmt->fetch();

        if ($row['nivel'] == 'A'){

            $nivel = "Director(a)"; 
        }else{
              $nivel = "Secretario(a)";
        }

        if ($row['activo'] == 'si'){

            $activo1 = "ACTIVO"; 
            $activo2 = "<span class='btn btn-secondary p-1'>ACTIVO</span>"; 

        }else{
            $activo1 = "BLOQUEADO";
            $activo2 = "<span class='btn btn-danger p-1'>BLOQUEADO <i class='fa fa-lock'></i></span>"; 
        }

        $datos= 
            array(
                //datos del alumno
                "id" => $row['id'],
                "usuario" => $row['usuario'],
                "activo2" => $activo1,
                "activo" => $activo2,
                "nivel" => $nivel );

        session_start();

        $_SESSION['datos'] = serialize($datos);

        if ($row) {
            if($txtusuarioactual === $txtusuarioactual)  {
                return true;
        }
                }else{
                return false;
            }
    }

    public function verificarpreguntas($id, $pregunta1, $pregunta2, $pregunta3){
        $sql = "SELECT * FROM pregunta_seguridad WHERE id_users = :id_users";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(":id_users", $id);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result['color_favorito'] == $pregunta1 && $result['mascota_fovorita'] == $pregunta2 && $result['hijo_favorito'] == $pregunta3){

                return true;

        }else{

            return false;
            
        }
    }
}