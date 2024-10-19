<?php 

class Salud{

  private $basedata;
  private $ids;  

  public function __construct(){

    require_once 'basedata2.php';
    $this->basedata = new baseData;

    $this->basedata->conexion();
  }
    
    public function guardarSalud($id, $tiene_s, $alergiaSalud, $dietaSalud, $tratamientoMsalud, $condicionFisicaSalud, $atencionEspecialSalud){
    
       $sql = "INSERT INTO salud (id_s, tiene_s, alergia_s, dieta_s, tratamiento_M_s, condicion_fisica_s, atencion_especial_s) 
            VALUES(:id_s, :tiene_s, :alergia_s, :dieta_s, :tratamiento_M_s, :condicion_fisica_s, :atencion_especial_s)";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_s', $id);
        $stmt->bindParam(':tiene_s', $tiene_s);
        $stmt->bindParam(':alergia_s', $alergiaSalud);
        $stmt->bindParam(':dieta_s', $dietaSalud);
        $stmt->bindParam(':tratamiento_M_s', $tratamientoMsalud);
        $stmt->bindParam(':condicion_fisica_s', $condicionFisicaSalud);
        $stmt->bindParam(':atencion_especial_s', $atencionEspecialSalud);

        
        if ($stmt->execute()) {

          return true;

        } else {

          return false;

        }   
      }

      public function actualizarSalud($id, $tiene_s, $alergiaSalud, $dietaSalud, $tratamientoMsalud, $condicionFisicaSalud, $atencionEspecialSalud) {
        $sql = "UPDATE salud SET tiene_s=:tiene_s, alergia_s=:alergia_s, dieta_s=:dieta_s, tratamiento_M_s=:tratamiento_M_s, condicion_fisica_s=:condicion_fisica_s,
        atencion_especial_s=:atencion_especial_s WHERE id_s=:id_s";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_s', $id);
        $stmt->bindParam(':tiene_s', $tiene_s);
        $stmt->bindParam(':alergia_s', $alergiaSalud);
        $stmt->bindParam(':dieta_s', $dietaSalud);
        $stmt->bindParam(':tratamiento_M_s', $tratamientoMsalud);
        $stmt->bindParam(':condicion_fisica_s', $condicionFisicaSalud);
        $stmt->bindParam(':atencion_especial_s', $atencionEspecialSalud);
        
        if ($stmt->execute()) {

          return true;

        } else {

          return false;

        }
      }
}
?>