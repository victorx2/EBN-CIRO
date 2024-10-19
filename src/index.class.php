<?php
require "basedata2.php";

class Index {

    public $basedata;

    public function __construct() {

        $this->basedata = new baseData;
        $this->basedata->conexion();

    }


    public function inicioFull() {

        $sql = "SELECT * FROM periodo";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();

        $cantidad = $stmt->rowCount();
        
        echo $cantidad;

    }

    public function getFull(){

        $sql = "SELECT * FROM alumno";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();

        $cantidad = $stmt->rowCount();

        echo $cantidad;
    }

     public function getNinas(){

        $sql = "SELECT * FROM alumno WHERE genero_a = 'F'";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();

        $cantidad = $stmt->rowCount();

        echo $cantidad;
    }       

    public function getNinos(){

        $sql = "SELECT * FROM alumno WHERE genero_a = 'M'";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();

        $cantidad = $stmt->rowCount();

        echo $cantidad;
    }

    public function get1(){

        $sql = "SELECT * FROM alumno WHERE id_grado_a = 1";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        // Devuelve la cantidad de filas
        $cantidad = $stmt->rowCount();

        // Devuelve la cantidad de filas
        echo $cantidad;
    }

    public function get2(){

        $sql = "SELECT * FROM alumno WHERE id_grado_a = 2";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        // Devuelve la cantidad de filas
        $cantidad = $stmt->rowCount();

        // Devuelve la cantidad de filas
        echo $cantidad;
    }

    public function get3(){

        $sql = "SELECT * FROM alumno WHERE id_grado_a = 3";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        // Devuelve la cantidad de filas
        $cantidad = $stmt->rowCount();

        // Devuelve la cantidad de filas
        echo $cantidad;
    }

    public function get4(){

        $sql = "SELECT * FROM alumno WHERE id_grado_a = 4";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        // Devuelve la cantidad de filas
        $cantidad = $stmt->rowCount();

        // Devuelve la cantidad de filas
        echo $cantidad;
    }

    public function get5(){

        $sql = "SELECT * FROM alumno WHERE id_grado_a = 5";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        // Devuelve la cantidad de filas
        $cantidad = $stmt->rowCount();

        // Devuelve la cantidad de filas
        echo $cantidad;
    }

    public function get6(){

        $sql = "SELECT * FROM alumno WHERE id_grado_a = 6";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();

         // Devuelve la cantidad de filas
         $cantidad = $stmt->rowCount();

         // Devuelve la cantidad de filas
         echo $cantidad;
    }

}
?>