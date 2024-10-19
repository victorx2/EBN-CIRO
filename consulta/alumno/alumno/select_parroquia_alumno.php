<?php

    require "conexion.php";
    require "../../../src/basedata2.php";

    $parroquias = new direccion;
    $id_municipio = $_POST['municipio_alumno'];

    $parroquia = $parroquias->parroquia($id_municipio);

    while($cw = $parroquia->fetch()){
        echo '<option value='.$cw['id_parroquia'].'>'.$cw['parroquia'].'</option>';
    }    
?>