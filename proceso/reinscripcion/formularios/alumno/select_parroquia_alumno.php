<?php

    require "conexion.php";
    require "../../../basedata/basedata2.php";

    $parroquias = new direccion;
    $id_municipio = $_POST['municipio_alumno'];

    $parroquia = $parroquias->parroquia($id_municipio);

    foreach($parroquia as $cw){
        $cadena='<option value='.$cw['id_parroquia'].'>'.$cw['parroquia'].'</option>';

    }
    	echo  $cadena;     
?>