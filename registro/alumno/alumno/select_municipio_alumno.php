<?php

    require "conexion.php";
    require "../../../src/basedata2.php";

    $municipios = new direccion;
    $id_estado = $_POST['estado_alumno'];

    $municipio = $municipios->municipio($id_estado);

    $cadena="<label>municipios:</label> 
			    <select id='id_municipio_a' name='id_municipio_a' class='form-control'>";
                $cadena.='<option value='.'>Selecciona una municipio</option>';

    foreach($municipio as $cw){
        $cadena.='<option value='.$cw['id_municipio'].'>'.$cw['municipio'].'</option>';
    }
	    echo  $cadena."</select>";
?>