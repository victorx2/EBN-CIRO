<?php

    require "conexion.php";
    require "../../../src/basedata2.php";

    $parroquias = new direccion;
    $id_municipio = $_POST['municipio_alumno'];

    $parroquia = $parroquias->parroquia($id_municipio);

    $cadena="<label>parroquia</label> 
    			<select id='id_parroquia_a' name='id_parroquia_a' class='form-control'>";
                $cadena.='<option value='.'>Selecciona una parroquia</option>';

    foreach($parroquia as $cw){
        $cadena.='<option value='.$cw['id_parroquia'].'>'.$cw['parroquia'].'</option>';

    }
    	echo  $cadena."</select>";     
?>