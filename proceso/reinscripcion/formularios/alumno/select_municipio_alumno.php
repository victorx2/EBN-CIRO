<?php

    require "conexion.php";
    require "../../../basedata/basedata2.php";

    $municipios = new direccion;
    $id_estado = $_POST['estado_alumno'];

    $municipio = $municipios->municipio($id_estado);

    foreach($municipio as $cw){
        $cadena ='<option value='.$cw['id_municipio'].'>'.$cw['municipio'].'</option>';
    }
	    echo  $cadena;
?>