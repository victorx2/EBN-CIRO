<?php
class auditoria {

    private $basedata;

    public function __construct() {


        $this->basedata = new baseData;

    }

    public function fecha() {

      $sql = "SELECT MIN(fecha) FROM auditoria";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->execute();

      $fecha = $stmt->fetchColumn();
        
      return $fecha;

    }

    public function search1($valor1, $valor2){

      if (isset($valor1) && isset($valor2)){

        $sql = "SELECT * FROM auditoria
        INNER JOIN users ON users.id = auditoria.id_usuario WHERE fecha BETWEEN :valor1 AND :valor2 ORDER BY fecha DESC";
        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->bindValue(':valor1',$valor1);
        $stmt->bindValue(':valor2',$valor2);
        $stmt->execute();

      }else{

      $sql = "SELECT * FROM auditoria
      INNER JOIN users ON users.id = auditoria.id_usuario ORDER BY fecha DESC";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->execute();

      }

      while ($row = $stmt->fetch()) {

          
          if ($row['nivel'] == 'A'){
          
              $nivel = "Director(a)";
          
          }else{
          
              $nivel = "Secretario(a)";
          
          }
          
          echo '<tr class="articulos">';

          echo '<td ><center>';
          echo $nivel;
          echo '</td></center>';
          
          echo '<td><center>';
          echo $row['usuario'];
          echo '</td></center>';

          echo '<td><center>';
          echo $row['fecha']; 
          echo '</td></center>';
    
          echo '<td><center>';
          echo $row['entrada']; 
          echo '</td></center>';
   
          echo '<td>';
          echo $row['acciones'];
          echo '</td>';

          echo '<td><center>';
          echo $row['salida'];
          echo '</td></center>';

          echo '</tr>';

      }

  }

}
?>