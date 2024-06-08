<?php

$pdo = new PDO("mysql:host=localhost;dbname=100", "root", "");
if ($pdo->getAttribute(PDO::ATTR_ERRMODE) === PDO::ERRMODE_EXCEPTION) {
try {
    $consulta = $pdo->query("SELECT asis_ficha FROM prosecucion");
    $datos = $consulta->fetchAll(PDO::FETCH_NUM);
    echo json_encode($datos);
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    exit;
}
} else {
echo "Error al conectar a la base de datos";
exit;
}
$pdo = null;
?>