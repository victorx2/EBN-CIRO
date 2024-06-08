<?php 


class GradoSeccion {

    private $basedata;
  
    public function __construct(){
    
        require 'basedata2.php';
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

    public function setGrado(){

        $sql = "SELECT * FROM grado WHERE numero = 'Nuevo Ingreso'";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<input type="text" name="id_grado_a" id="id_grado_a" class="form-control" value="'. $row['numero'] .'" readonly>';
        }
    }

    public function getGrado($datos){

        $sql = "SELECT * FROM grado WHERE id_grado != $datos AND id_grado != 7";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id_grado'] . ' ">' . $row['grado'] . '</option>';
        }
    }

    public function getnivel(){

        $sql = "SELECT * FROM grado WHERE numero != 'Nuevo Ingreso'";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id_grado'] . ' ">' . $row['grado'] . '</option>';
        }
    }

    public function getSeccion(){

        $sql = "SELECT DISTINCT * FROM seccion WHERE literal != 'Nuevo Ingreso'";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value=" ' . $row['id_seccion'] . ' ">' . $row['literal'] . '</option>';
        }
    }

    public function setSeccion(){

        $sql = "SELECT DISTINCT * FROM seccion WHERE literal = 'Nuevo Ingreso'";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<input type="text" name="id_seccion_a" id="id_seccion_a" class="form-control" value="'. $row['literal'] .'" readonly>';
        }
    }
}

?>