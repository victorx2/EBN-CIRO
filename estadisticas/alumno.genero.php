<?php
// Conecta a la base de datos
$pdo = new PDO("mysql:host=localhost;dbname=100", "root", "ciro29092023");

// Verifica que la conexión se haya realizado correctamente
if ($pdo->getAttribute(PDO::ATTR_ERRMODE) === PDO::ERRMODE_EXCEPTION) {
  try {
    // Ejecuta la consulta SQL
    $consulta = $pdo->query("SELECT genero_a FROM alumno");

    // Obtiene los datos de la tabla
    $datos = $consulta->fetchAll(PDO::FETCH_NUM);

    echo json_encode($datos);
    
  } catch (PDOException $e) {
    // Maneja el error de conexión a la base de datos
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    exit;
  }
} else {
  // Maneja el error de conexión a la base de datos
  echo "Error al conectar a la base de datos";
  exit;
}

// Cierra la conexión a la base de datos
$pdo = null;
?>