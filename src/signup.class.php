<?php

class Signup{

    private $basedata;

    public function __construct(){

      require 'basedata2.php';
      $this->basedata = new baseData;

      $this->basedata->conexion();
    }

    public function Registro($id, $usuario, $cedula, $clave, $confirm_clave, $nivel, $estado){
            
            if (preg_match("/[a-zA-Z0-9]/", $usuario)){

                if ($confirm_clave == $clave) {

                    $sql = "INSERT INTO users (id, usuario, cedula, passwd, nivel, activo) VALUES (:id, :usuario, :cedula, :passwd, :nivel, :activo)";
                    $stmt = $this->basedata->conexion()->prepare($sql);
                    $stmt->bindParam(':id',$id);
                    $stmt->bindParam(':usuario',$usuario);
                    $stmt->bindParam(':cedula',$cedula);

                    $password = password_hash($clave, PASSWORD_DEFAULT);
                    $stmt->bindParam(':passwd',$password);
                    $stmt->bindParam(':nivel',$nivel);
                    $stmt->bindParam(':activo',$estado );
                    
                    if ($stmt->execute()) {

                        return true;

                    } else {

                        return false;
                    }  

                } else {

                    return false;

                }       
            } else {

                return false;
                
            }
    }

    public function preguntas($id_users, $color_favorito, $mascota_favorita, $hijo_favorito){

        $sql = "INSERT INTO pregunta_seguridad (id_users, color_favorito, mascota_fovorita, hijo_favorito) VALUES (:id_users, :color_favorito, :mascota_fovorita, :hijo_favorito)";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_users',$id_users);
        $stmt->bindParam(':color_favorito',$color_favorito);
        $stmt->bindParam(':mascota_fovorita',$mascota_favorita);
        $stmt->bindParam(':hijo_favorito',$hijo_favorito );
        if ($stmt->execute()) {

            return true;

        } else {

            return false;
        } 
                
    }

    public function admin($id_users, $nombre1, $nombre2, $apellido1, $apellido2){

        $sql = "INSERT INTO directora (id_users, nombre1, nombre2, apellido1, apellido2) VALUES (:id_users, :nombre1, :nombre2, :apellido1, :apellido2)";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_users',$id_users);
        $stmt->bindParam(':nombre1',$nombre1);
        $stmt->bindParam(':nombre2',$nombre2);
        $stmt->bindParam(':apellido1',$apellido1);
        $stmt->bindParam(':apellido2',$apellido2);
        if ($stmt->execute()) {

            return true;

        } else {

            return false;
        } 
                
    }
}