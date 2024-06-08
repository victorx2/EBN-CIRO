<?php 


class GradoSeccion {

    private $basedata;
  
    public function __construct(){
    
        require '../../src/basedata2.php';
        $this->basedata = new baseData;
        
        $this->basedata->conexion();
    }
       
    public function getDias() {
        $sql = "SELECT * FROM dias";
        $stmt = $this->basedata->conexion()->query($sql);
  
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id'] . ' ">' . $row['dia'] . '</option>';
        }
  
      }

    public function getGrado(){

        $sql = "SELECT * FROM grado WHERE numero != 'Nuevo Ingreso'";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id_grado'] . ' ">' . $row['numero'] . '</option>';
        }
    }

    public function getnivel(){

        $sql = "SELECT * FROM grado";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id_grado'] . ' ">' . $row['grado'] . '</option>';
        }
    }

    public function getSeccion(){

        $sql = "SELECT * FROM seccion WHERE literal != 'Nuevo Ingreso'";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id_seccion'] . ' ">' . $row['literal'] . '</option>';
        }
    }
}
