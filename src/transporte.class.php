<?php 

class Transporte{

  private $basedata;
  private $idt; 

  public function __construct(){

    require_once 'basedata2.php';
    $this->basedata = new baseData;

    $this->basedata->conexion();
  }
    
    public function guardarTransporte($id, $tiene_t, $nombreTransporte, $telefonoTransporte, $cedulaTransporte, $numeroDePlacaTransporte, $numeroTelefonicoOpcionalTransporte){
    
       $sql = "INSERT INTO transporte (id_t, tiene_t, nombre_t, telefono_t, cedula_t, numero_de_placa_t, numero_telefonico_opcional_t) 
       VALUE (:id_t, :tiene_t, :nombre_t, :telefono_t, :cedula_t, :numero_de_placa_t, :numero_telefonico_opcional_t)";
         $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_t', $id);
        $stmt->bindParam(':tiene_t', $tiene_t);
        $stmt->bindParam(':nombre_t', $nombreTransporte);
        $stmt->bindParam(':telefono_t', $telefonoTransporte);
        $stmt->bindParam(':cedula_t', $cedulaTransporte);
        $stmt->bindParam(':numero_de_placa_t', $numeroDePlacaTransporte);
        $stmt->bindParam(':numero_telefonico_opcional_t', $numeroTelefonicoOpcionalTransporte);
        
        if ($stmt->execute()) {

            return true;

          } else {

            return false;

          }   
      }

      public function actualizarTransporte($id, $tiene_t, $nombreTransporte, $telefonoTransporte, $cedulaTransporte, $numeroDePlacaTransporte, $numeroTelefonicoOpcionalTransporte){
        $sql = "UPDATE transporte SET tiene_t=:tiene_t, nombre_t=:nombre_t, telefono_t=:telefono_t, cedula_t=:cedula_t, numero_de_placa_t=:numero_de_placa_t, numero_telefonico_opcional_t=:numero_telefonico_opcional_t WHERE id_t=:id_t";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindParam(':id_t', $id);
        $stmt->bindParam(':tiene_t', $tiene_t);
        $stmt->bindParam(':nombre_t', $nombreTransporte);
        $stmt->bindParam(':telefono_t', $telefonoTransporte);
        $stmt->bindParam(':cedula_t', $cedulaTransporte);
        $stmt->bindParam(':numero_de_placa_t', $numeroDePlacaTransporte);
        $stmt->bindParam(':numero_telefonico_opcional_t', $numeroTelefonicoOpcionalTransporte);

        if ($stmt->execute()) {

          return true;

        } else {

          return false;

        }
      }
    
}
?>