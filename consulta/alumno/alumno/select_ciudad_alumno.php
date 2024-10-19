<?php

    require "conexion.php";
    require "../../../src/basedata2.php";

    $ciudades = new direccion;
    $id_estado = $_POST['estado_alumno'];

    $ciudad = $ciudades->ciudad($id_estado);

    while($cw = $ciudad->fetch()){
        echo '<option value='.$cw['id_ciudad'].'>'.$cw['ciudad'].'</option>';
    }

?>