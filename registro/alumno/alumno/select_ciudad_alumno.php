<?php

    require "conexion.php";
    require "../../../src/basedata2.php";

    $ciudades = new direccion;
    $id_estado = $_POST['estado_alumno'];

    $ciudad = $ciudades->ciudad($id_estado);

    $cadena="<label>ciudades:</label> 
                <select id='id_ciudad_a' name='id_ciudad_a' class='form-control'>";
                $cadena.='<option value='.'>Selecciona una ciudad</option>';

    foreach($ciudad as $cw){
        $cadena.= '<option value='.$cw['id_ciudad'].'>'.$cw['ciudad'].'</option>';

    }
        echo  $cadena."</select>";

?>