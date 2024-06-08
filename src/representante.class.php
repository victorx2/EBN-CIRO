<?php 

class Representante{

  private $basedata;
  private $idr; 

  public function __construct(){

    require_once 'basedata2.php';
    $this->basedata = new baseData;
    
  }
    
  public function guardarRepresentante($id, $nombre, $apellido, $cedula, $profesion, $parentesco, $direccion, $direccionTrabajo, $telefono, $telefonoTrabajo, $telefonoOpcional, $tieneOpc, $correoElectronico, $vive){
  
    $sql = "INSERT INTO representante (id_r, nombre_r, apellido_r, cedula_r, profesion_r,  parentesco_r, direccion_r, direccion_trabajo_r, telefono_r, telefono_trabajo_r, vive_r, telefono_opcional_r, tiene_opc, correo_electronico_r)
    VALUES (:id_r, :nombre_r, :apellido_r, :cedula_r, :profesion_r, :parentesco_r, :direccion_r, :direccion_trabajo_r, :telefono_r, :telefono_trabajo_r, :vive_r, :telefono_opcional_r, :tiene_opc, :correo_electronico_r)";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(':id_r', $id);
    $stmt->bindParam(':nombre_r', $nombre);
    $stmt->bindParam(':apellido_r', $apellido);
    $stmt->bindParam(':cedula_r', $cedula);
    $stmt->bindParam(':profesion_r', $profesion);
    $stmt->bindParam(':parentesco_r',$parentesco);
    $stmt->bindParam(':direccion_r', $direccion);
    $stmt->bindParam(':direccion_trabajo_r', $direccionTrabajo);
    $stmt->bindParam(':telefono_r', $telefono);
    $stmt->bindParam(':telefono_trabajo_r', $telefonoTrabajo);
    $stmt->bindParam(':telefono_opcional_r', $telefonoOpcional);
    $stmt->bindParam(':tiene_opc', $tieneOpc);
    $stmt->bindParam(':correo_electronico_r', $correoElectronico);
    $stmt->bindParam(':vive_r', $vive);
    
    if ($stmt->execute()) {

      return true;

    } else {

      return false;

    }   
  }

  public function actualizarRepresentante($id, $nombre, $apellido, $cedula, $profesion, $parentesco, $direccion, $direcciontrabajo, $telefono, $telefonoTrabajo, $telefonoOpcional, $tieneOpc, $correoElectronico, $vive) {
    $sql = "UPDATE representante SET nombre_r=:nombre_r, apellido_r=:apellido_r, cedula_r=:cedula_r, profesion_r=:profesion_r, parentesco_r=:parentesco_r, direccion_r=:direccion_r, direccion_trabajo_r=:direccion_trabajo_r, telefono_r=:telefono_r, telefono_trabajo_r=:telefono_trabajo_r, 
      vive_r=:vive_r, telefono_opcional_r=:telefono_opcional_r, tiene_opc=:tiene_opc, correo_electronico_r=:correo_electronico_r WHERE id_r=:id_r";
    $stmt = $this->basedata->conexion()->prepare($sql);
    $stmt->bindParam(':id_r', $id);
    $stmt->bindParam(':nombre_r', $nombre);
    $stmt->bindParam(':apellido_r', $apellido);
    $stmt->bindParam(':cedula_r', $cedula);
    $stmt->bindParam(':profesion_r', $profesion);
    $stmt->bindParam(':parentesco_r',$parentesco);
    $stmt->bindParam(':direccion_r', $direccion);
    $stmt->bindParam(':direccion_trabajo_r', $direccionTrabajo);
    $stmt->bindParam(':vive_r', $vive);
    $stmt->bindParam(':telefono_r', $telefono);
    $stmt->bindParam(':telefono_trabajo_r', $telefonoTrabajo);
    $stmt->bindParam(':telefono_opcional_r', $telefonoOpcional);
    $stmt->bindParam(':tiene_opc', $tieneOpc);
    $stmt->bindParam(':correo_electronico_r', $correoElectronico);
    
    if ($stmt->execute()) {

      return true;

    } else {
      
      return false;
      
    }
  }
}
?>