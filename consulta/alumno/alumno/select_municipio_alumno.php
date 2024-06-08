<?php

    require "conexion.php";
    require "../../../src/basedata2.php";

    $municipios = new direccion;
    $id_estado = $_POST['estado_alumno'];

    $municipio = $municipios->municipio($id_estado);

    while($cw = $municipio->fetch()){
        echo '<option value='.$cw['id_municipio'].'>'.$cw['municipio'].'</option>';
    }
?>