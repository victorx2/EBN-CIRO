<?php 

class Procedencia{

  private $basedata;
  private $idp;

  public function __construct(){

    require_once 'basedata2.php';
    $this->basedata = new baseData;

    $this->basedata->conexion();
  }
    
  public function guardarProcedencia($id, $deDondeProvieneProcedencia, $motivoProcedencia, $direccionProcedencia){
  
    $sql = "INSERT INTO procedencia (id_p, de_donde_proviene_p, motivo_p, direccion_p) 
    VALUE (:id_p, :de_donde_proviene_p, :motivo_p, :direccion_p)";
       $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id_p', $id);
      $stmt->bindParam(':de_donde_proviene_p', $deDondeProvieneProcedencia);
      $stmt->bindParam(':motivo_p', $motivoProcedencia);
      $stmt->bindParam(':direccion_p', $direccionProcedencia);

      if ($stmt->execute()) {

        return true;

      } else {

        return false;

      }   
  }

  public function actualizarProcedencia($id, $deDondeProvieneProcedencia, $motivoProcedencia, $direccionProcedencia){
    $sql = "UPDATE procedencia SET de_donde_proviene_p=:de_donde_proviene_p, motivo_p=:motivo_p, direccion_p=:direccion_p WHERE id_p=:id_p";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(':id_p', $id);
    $stmt->bindParam(':de_donde_proviene_p', $deDondeProvieneProcedencia);
    $stmt->bindParam(':motivo_p', $motivoProcedencia);
    $stmt->bindParam(':direccion_p', $direccionProcedencia);

    if ($stmt->execute()) {

      return true;

    } else {

      return false;

    }

  }

}
?>