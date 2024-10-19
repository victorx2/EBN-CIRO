<?php                          
$horario->mostrarHorasOcupadas(1,2,4,5,6,7,8,9,10);
$horas_ocupadas = $horario->getHorasOcupadas(1,2,4,5,6,7,8,9,10);
echo "<p>HORAS OCUPADAS:</p>";
/* print_r($horas_ocupadas); */
/* for($i = 0; $i < count($horas_ocupadas) - 1; $i++){
  $hora = $horas_ocupadas[$i];
  echo "<td><p>Hora $hora ocupada </p></td>";
} */
foreach ($horas_ocupadas as $hora)
{
 /* echo "<td><p>Hora $hora ocupada </p></td>"; */

}
?>



 <?php 
  

$horario->mostrarHorasOcupadas(1,2,4,5,6,7,8,9,10);
$horas_ocupadas = $horario->getHorasOcupadas(1,2,4,5,6,7,8,9,10);
echo "<p>HORAS OCUPADAS:</p>";

$tabla = "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
$tabla .= "<thead>";
$tabla .= "<tr>";
$tabla .= "<th>HORA</th>";
$tabla .= "<th>MATERIA</th>";
$tabla .= "</tr>";
$tabla .= "</thead>";
$tabla .= "<tbody>";

foreach ($horas_ocupadas as $hora)
{

$tabla .= "<tr>";
$tabla .= "<td>$hora[0]</td>";
$tabla .= "<td>$hora[1]</td>";
$tabla .= "<td>$hora[2]</td>";
$tabla .= "</tr>";
}

$tabla .= "</tbody>";
$tabla .= "</table>";

echo $tabla;

  
  
  ?>
    
    <!-- /* $result = [];
foreach ($horas_ocupadas as $hora) {
  // Imprime la fila
   $result[]= [
    "id" => 1,
    "id_p" => 628183916,
    "id_dias" => 1,
    "hora1" => "Deporte",
    "hora2" => "Ciencias Naturales",
    "hora3" => "Ciencias Sociales",
    "hora4" => "Manos a la Siembra",
    "hora5" => "Matematicas",
    "hora6" => "Cultura",
    "hora7" => "Matematicas",
   ]:
 
  echo "<table></table>"
  echo "<"
  echo "<tr>";
  echo "<td>$hora</td>";
  // Imprime las columnas
  foreach ($horas_ocupadas as $columna) {
    echo "<td>$columna</td>";
  }
  echo "</tr>";
} */ -->


<?php
/* $tabla = array(
  array(
    "id" => 1,
    "id_p" => 628183916,
    "id_dias" => 1,
    "hora1" => "Deporte",
    "hora2" => "Ciencias Naturales",
    "hora3" => "Ciencias Sociales",
    "hora4" => "Manos a la Siembra",
    "hora5" => "Matematicas",
    "hora6" => "Cultura",
    "hora7" => "Matematicas",
  ),
  array(
    "id" => 2,
    "id_p" => 628183917,
    "id_dias" => 2,
    "hora1" => "Ingles",
    "hora2" => "Español",
    "hora3" => "Matemáticas",
    "hora4" => "Ciencias Naturales",
    "hora5" => "Ciencias Sociales",
    "hora6" => "Educación Física",
    "hora7" => "Arte",
  ),
);

foreach ($tabla as $fila) {
  echo "<tr>";
  foreach ($fila as $valor) {
    echo "<td>$valor</td>";
  }
  echo "</tr>";
} */

?>
 
<?php /* $horario->mostrarHorasOcupadas(1);
$horas_ocupadas = $horario->getHorasOcupadas(1);
echo "<p>HORAS OCUPADAS:</p>";

foreach ($horas_ocupadas as $hora) {
  echo "<p>Hora $hora ocupada</p>";
} */?> 


<?php /* $horario->mostrarHorasOcupadas(1);
$horas_ocupadas = $horario->getHorasOcupadas(1);
echo "<p>HORAS OCUPADAS:</p>";
foreach ($horas_ocupadas as $hora) {
  echo "<p>Hora $hora ocupada</p>";
} */?> 
<!-- $id_dias, $id_p, $hora1, $hora2, $hora3, $hora4, $hora5, $hora6, $hora7 -->
<?php
/* $horario->mostrarHorasOcupadas(1,2,4,5,6,7,8,9,10);
$horas_ocupadas = $horario->getHorasOcupadas(1,2,4,5,6,7,8,9,10);
echo "<p>HORAS OCUPADAS:</p>";
print_r($horas_ocupadas);
foreach ($horas_ocupadas as $hora)
{
foreach ($hora as $data){
  echo $data[1];
$dataForm = ($data[1] == 1);
echo $dataForm;
print_r($data);
  $data[1];
                    }  
                          } */ ?>
                          
                    
<!-- Hora Deporte ocupada
Hora Ciencias Naturales ocupada
Hora Ciencias Sociales ocupada
Hora Manos a la Siembra ocupada
Hora Matematicas ocupada
Hora Cultura ocupada
Hora Matematicas ocupada -->





<!--  /* public function getHorario($datos) {
    $sql = "SELECT * FROM horarios WHERE id_p = ". $datos . " LIMIT 5";
    $stmt = $this->conexion()->query($sql);

    $this->plus= 0;

      while($row = $stmt->fetch()){

        echo '<td> <center>';
        echo $row['hora1'] . '<hr>';
        echo $row['hora2'] . '<hr>';
        echo $row['hora3'] . '<hr>';
        echo $row['hora4'] . '<hr>';
        echo $row['hora5'] . '<hr>';
        echo $row['hora6'] . '<hr>';
        echo $row['hora7'] . '<br>';
        echo '</center> </td>';

        $this->plus++;

       }

      return $this->plus;

    } */ -->
    
    
<!--     /* $horario->mostrarHorasOcupadas(1);
$horas_ocupadas = $horario->getHorasOcupadas(1);
echo "<p>HORAS OCUPADAS:</p>";
echo "<table>";
foreach ($horas_ocupadas as $hora) {
  echo "<tr><td>Hora $hora ocupada</td></tr>";
}
echo "</table>"; */ -->