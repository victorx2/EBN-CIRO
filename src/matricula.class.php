<?php
require "../../src/basedata2.php";

class Matricula
{

    public $basedata;

    public function __construct()
    {

        $this->basedata = new baseData;
        $this->basedata->conexion();
    }

    public function getPeriodo(){

        $sql = "SELECT * FROM periodo ";
        $stmt = $this->basedata->conexion()->query($sql);
        while($row = $stmt->fetch()){
            echo '<option value="' . $row['part1'] . ' / '.$row['part2']. '">' . $row['part1'] . ' / '.$row['part2'] . '</option>';
        }
    }

    public function getfull(){

        $sql = "SELECT * FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a 
        INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
        WHERE activo_a = 'si'";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();

            if ( $stmt == false )

        {
            
            echo 'No hay estudiantes que cumplan con los criterios de filtrado.';

        }
            else
        {

            $i = 0;
        
        // Devuelve todos los registros de estudiantes
        while ($row = $stmt->fetch()) {

            $i ++;
            $nac = $row['fecha_nac_a'];

            $insc = date("d/m/Y", strtotime($row['fecha_insc_a']));
 
            // para la edad
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            // para el genero
            if ($row['genero_a'] == 'M') {

                $genero = 'Masculino';
                $idgenero = 'M';
            } else if ($row['genero_a'] == 'F') {

                $genero = 'Femenino';
                $idgenero = 'F';
            }

            if ($row['activo_a'] == 'si'){

                $activo_a = "Cursando";

                
            }else{
                  
                  $activo_a = "No esta cursando";
              
              }
              

            $datos =
            array(
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "cedula_escolar_a" => $row['cedula_escolar_a'],
                "genero_a" => $genero,
                "idgenero_a" => $idgenero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "periodo" => $row['periodo'],
                "fecha_insc_a" => $insc,
                "tiene_cedula" => $row['tiene_a'],
                "activo_a" => $activo_a
            );

        echo '<tr class="articulosFull" ><td> ' . $i .'</td>';
        echo '<td> ' . $row['nombre_a'] .' '. 
         $row['apellido_a'] . '</td>';
        echo '<td> '. $row['tiene_a'] . '</td>';
        echo '<td> '. $row['cedula_a'] . '</td>';
        echo '<td> '. $row['cedula_escolar_a'] . '</td>';
        echo '<td> '. $nac . '</td>';
        echo '<td> '. $edad . '</td>';
        echo '<td> '. $genero . '</td>';
        echo '<td> '. $row['periodo'] . '</td>';
        echo '<td> '. $insc . '</td>';
        echo '<td> '. $activo_a . '</td></tr>';
        }
        }
    }

    public function get1()
    {

        $sql = "SELECT * FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a 
        INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
        WHERE activo_a = 'si' AND id_grado_a = 1";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        if ( $stmt == false )
        {

            
          echo 'No hay estudiantes que cumplan con los criterios de filtrado.';

         }
         else
        {

            $i = 0;
        
        // Devuelve todos los registros de estudiantes
        while ($row = $stmt->fetch()) {

            $i ++;
            $nac = $row['fecha_nac_a'];

            // para la edad
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            // para el genero
            if ($row['genero_a'] == 'M') {

                $genero = 'Masculino';
                $idgenero = 'M';
            } else if ($row['genero_a'] == 'F') {

                $genero = 'Femenino';
                $idgenero = 'F';
            }

            if ($row['activo_a'] == 'si'){

                $activo_a = "Cursando";

                
            }else{
                  
                  $activo_a = "No esta cursando";
              
              }

            $datos =
            array(
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "cedula_escolar_a" => $row['cedula_escolar_a'],
                "genero_a" => $genero,
                "idgenero_a" => $idgenero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "periodo" => $row['periodo'],
                "fecha_insc_a" => $row['fecha_insc_a'],
                "tiene_cedula" => $row['tiene_a'],
                "activo_a" => $activo_a
            );

        echo '<tr class="articulos1" ><td> ' . $i .'</td>';
        echo '<td> ' . $row['nombre_a'] .' '. 
         $row['apellido_a'] . '</td>';
        echo '<td> '. $row['tiene_a'] . '</td>';
        echo '<td> '. $row['cedula_a'] . '</td>';
        echo '<td> '. $row['cedula_escolar_a'] . '</td>';
        echo '<td> '. $nac . '</td>';
        echo '<td> '. $edad . '</td>';
        echo '<td> '. $genero . '</td>';
        echo '<td> '. $row['periodo'] . '</td>';
        echo '<td> '. $row['fecha_insc_a'] . '</td>';
        echo '<td> '. $activo_a . '</td></tr>';
        }
        }
    }

    

        public function get2()
    {

        $sql = "SELECT * FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a 
        INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
        WHERE activo_a = 'si' AND id_grado_a = 2";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        if ( $stmt == false )
        {

            
          echo 'No hay estudiantes que cumplan con los criterios de filtrado.';

         }
         else
        {

            $i = 0;
        
        // Devuelve todos los registros de estudiantes
        while ($row = $stmt->fetch()) {

            $i ++;
            $nac = $row['fecha_nac_a'];

            // para la edad
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            // para el genero
            if ($row['genero_a'] == 'M') {

                $genero = 'Masculino';
                $idgenero = 'M';
            } else if ($row['genero_a'] == 'F') {

                $genero = 'Femenino';
                $idgenero = 'F';
            }

            if ($row['activo_a'] == 'si'){

                $activo_a = "Cursando";

                
            }else{
                  
                  $activo_a = "No esta cursando";
              
              }

            $datos =
            array(
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "cedula_escolar_a" => $row['cedula_escolar_a'],
                "genero_a" => $genero,
                "idgenero_a" => $idgenero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "periodo" => $row['periodo'],
                "fecha_insc_a" => $row['fecha_insc_a'],
                "tiene_cedula" => $row['tiene_a'],
                "activo_a" => $activo_a
            );

        echo '<tr class="articulos1" ><td> ' . $i .'</td>';
        echo '<td> ' . $row['nombre_a'] .' '. 
         $row['apellido_a'] . '</td>';
        echo '<td> '. $row['tiene_a'] . '</td>';
        echo '<td> '. $row['cedula_a'] . '</td>';
        echo '<td> '. $row['cedula_escolar_a'] . '</td>';
        echo '<td> '. $nac . '</td>';
        echo '<td> '. $edad . '</td>';
        echo '<td> '. $genero . '</td>';
        echo '<td> '. $row['periodo'] . '</td>';
        echo '<td> '. $row['fecha_insc_a'] . '</td>';
        echo '<td> '. $activo_a . '</td></tr>';
        }
        }
    }

    public function get3()
    { 
       
        $sql = "SELECT * FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
        INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno 
        WHERE activo_a = 'si' AND id_grado_a = 3";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        if ( $stmt == false )
        {

            
          echo 'No hay estudiantes que cumplan con los criterios de filtrado.';

         }
         else
        {

            $i = 0;
        
        // Devuelve todos los registros de estudiantes
        while ($row = $stmt->fetch()) {

            $i ++;
            $nac = $row['fecha_nac_a'];

            // para la edad
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            // para el genero
            if ($row['genero_a'] == 'M') {

                $genero = 'Masculino';
                $idgenero = 'M';
            } else if ($row['genero_a'] == 'F') {

                $genero = 'Femenino';
                $idgenero = 'F';
            }

            if ($row['activo_a'] == 'si'){

                $activo_a = "Cursando";

                
            }else{
                  
                  $activo_a = "No esta cursando";
              
              }

            $datos =
            array(
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "cedula_escolar_a" => $row['cedula_escolar_a'],
                "genero_a" => $genero,
                "idgenero_a" => $idgenero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "periodo" => $row['periodo'],
                "fecha_insc_a" => $row['fecha_insc_a'],
                "tiene_cedula" => $row['tiene_a'],
                "activo_a" => $activo_a
            );

        echo '<tr class="articulos1" ><td> ' . $i .'</td>';
        echo '<td> ' . $row['nombre_a'] .' '. 
         $row['apellido_a'] . '</td>';
        echo '<td> '. $row['tiene_a'] . '</td>';
        echo '<td> '. $row['cedula_a'] . '</td>';
        echo '<td> '. $row['cedula_escolar_a'] . '</td>';
        echo '<td> '. $nac . '</td>';
        echo '<td> '. $edad . '</td>';
        echo '<td> '. $genero . '</td>';
        echo '<td> '. $row['periodo'] . '</td>';
        echo '<td> '. $row['fecha_insc_a'] . '</td>';
        echo '<td> '. $activo_a . '</td></tr>';
        }
        }
    }

   


    public function get4()



    { 
       
        $sql = "SELECT * FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a
        INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno 
        WHERE activo_a = 'si' AND id_grado_a = 4";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        if ( $stmt == false )
        {

            
          echo 'No hay estudiantes que cumplan con los criterios de filtrado.';

         }
         else
        {

            $i = 0;
        
        // Devuelve todos los registros de estudiantes
        while ($row = $stmt->fetch()) {

            $i ++;
            $nac = $row['fecha_nac_a'];

            // para la edad
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            // para el genero
            if ($row['genero_a'] == 'M') {

                $genero = 'Masculino';
                $idgenero = 'M';
            } else if ($row['genero_a'] == 'F') {

                $genero = 'Femenino';
                $idgenero = 'F';
            }

            if ($row['activo_a'] == 'si'){

                $activo_a = "Cursando";

                
            }else{
                  
                  $activo_a = "No esta cursando";
              
              }

            $datos =
            array(
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "cedula_escolar_a" => $row['cedula_escolar_a'],
                "genero_a" => $genero,
                "idgenero_a" => $idgenero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "periodo" => $row['periodo'],
                "fecha_insc_a" => $row['fecha_insc_a'],
                "tiene_cedula" => $row['tiene_a'],
                "activo_a" => $activo_a
            );

        echo '<tr class="articulos1" ><td> ' . $i .'</td>';
        echo '<td> ' . $row['nombre_a'] .' '. 
         $row['apellido_a'] . '</td>';
        echo '<td> '. $row['tiene_a'] . '</td>';
        echo '<td> '. $row['cedula_a'] . '</td>';
        echo '<td> '. $row['cedula_escolar_a'] . '</td>';
        echo '<td> '. $nac . '</td>';
        echo '<td> '. $edad . '</td>';
        echo '<td> '. $genero . '</td>';
        echo '<td> '. $row['periodo'] . '</td>';
        echo '<td> '. $row['fecha_insc_a'] . '</td>';
        echo '<td> '. $activo_a . '</td></tr>';
        }
        }
    }

    

         public function get5()
        {

            $sql = "SELECT * FROM alumno
            INNER JOIN grado ON grado.id_grado = alumno.id_grado_a 
            INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
            WHERE activo_a = 'si' AND id_grado_a = 5 ";
    
            $stmt = $this->basedata->conexion()->prepare($sql);
            $stmt->execute();
            if ( $stmt == false )
            {
    
                
              echo 'No hay estudiantes que cumplan con los criterios de filtrado.';
    
             }
             else
            {
    
                $i = 0;
            
            // Devuelve todos los registros de estudiantes
            while ($row = $stmt->fetch()) {
    
                $i ++;
                $nac = $row['fecha_nac_a'];
    
                // para la edad
                $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
                $edad = date('Y') - date('Y', $row['fecha_nac_a']);
                if (date('md') < date('md', $row['fecha_nac_a'])) {
                    $edad--;
                }
    
                // para el genero
                if ($row['genero_a'] == 'M') {
    
                    $genero = 'Masculino';
                    $idgenero = 'M';
                } else if ($row['genero_a'] == 'F') {
    
                    $genero = 'Femenino';
                    $idgenero = 'F';
                }
    
                if ($row['activo_a'] == 'si'){
    
                    $activo_a = "Cursando";
    
                    
                }else{
                      
                      $activo_a = "No esta cursando";
                  
                  }
    
                $datos =
                array(
                    //datos del alumno
                    "id_a" => $row['id_a'],
                    "nombre_a" => $row['nombre_a'],
                    "apellido_a" => $row['apellido_a'],
                    "cedula_a" => $row['cedula_a'],
                    "cedula_escolar_a" => $row['cedula_escolar_a'],
                    "genero_a" => $genero,
                    "idgenero_a" => $idgenero,
                    "edad" => $edad,
                    "nac" => $nac,
                    "lugar_nac_a" => $row['lugar_nac_a'],
                    "direccion_a" => $row['direccion_a'],
                    "numero" => $row['numero'],
                    "grado" => $row['grado'],
                    "id_numero" => $row['id_grado'],
                    "periodo" => $row['periodo'],
                    "fecha_insc_a" => $row['fecha_insc_a'],
                    "tiene_cedula" => $row['tiene_a'],
                    "activo_a" => $activo_a
                );
    
            echo '<tr class="articulos1" ><td> ' . $i .'</td>';
            echo '<td> ' . $row['nombre_a'] .' '. 
             $row['apellido_a'] . '</td>';
            echo '<td> '. $row['tiene_a'] . '</td>';
            echo '<td> '. $row['cedula_a'] . '</td>';
            echo '<td> '. $row['cedula_escolar_a'] . '</td>';
            echo '<td> '. $nac . '</td>';
            echo '<td> '. $edad . '</td>';
            echo '<td> '. $genero . '</td>';
            echo '<td> '. $row['periodo'] . '</td>';
            echo '<td> '. $row['fecha_insc_a'] . '</td>';
            echo '<td> '. $activo_a . '</td></tr>';
            }
            }
        }

    public function get6()
    {

        $sql = "SELECT * FROM alumno
        INNER JOIN grado ON grado.id_grado = alumno.id_grado_a 
        INNER JOIN periodo_alumno ON alumno.id_a = periodo_alumno.alumno
        WHERE activo_a = 'si' AND id_grado_a = 6 ";

        $stmt = $this->basedata->conexion()->prepare($sql);
        $stmt->execute();
        if ( $stmt == false )
        {

            
          echo 'No hay estudiantes que cumplan con los criterios de filtrado.';

         }
         else
        {

            $i = 0;
        
        // Devuelve todos los registros de estudiantes
        while ($row = $stmt->fetch()) {

            $i ++;
            $nac = $row['fecha_nac_a'];

            // para la edad
            $row['fecha_nac_a'] = strtotime($row['fecha_nac_a']);
            $edad = date('Y') - date('Y', $row['fecha_nac_a']);
            if (date('md') < date('md', $row['fecha_nac_a'])) {
                $edad--;
            }

            // para el genero
            if ($row['genero_a'] == 'M') {

                $genero = 'Masculino';
                $idgenero = 'M';
            } else if ($row['genero_a'] == 'F') {

                $genero = 'Femenino';
                $idgenero = 'F';
            }

            if ($row['activo_a'] == 'si'){

                $activo_a = "Cursando";

                
            }else{
                  
                  $activo_a = "No esta cursando";
              
              }

            $datos =
            array(
                //datos del alumno
                "id_a" => $row['id_a'],
                "nombre_a" => $row['nombre_a'],
                "apellido_a" => $row['apellido_a'],
                "cedula_a" => $row['cedula_a'],
                "cedula_escolar_a" => $row['cedula_escolar_a'],
                "genero_a" => $genero,
                "idgenero_a" => $idgenero,
                "edad" => $edad,
                "nac" => $nac,
                "lugar_nac_a" => $row['lugar_nac_a'],
                "direccion_a" => $row['direccion_a'],
                "numero" => $row['numero'],
                "grado" => $row['grado'],
                "id_numero" => $row['id_grado'],
                "periodo" => $row['periodo'],
                "fecha_insc_a" => $row['fecha_insc_a'],
                "tiene_cedula" => $row['tiene_a'],
                "activo_a" => $activo_a
            );

        echo '<tr class="articulos1" ><td> ' . $i .'</td>';
        echo '<td> ' . $row['nombre_a'] .' '. 
         $row['apellido_a'] . '</td>';
        echo '<td> '. $row['tiene_a'] . '</td>';
        echo '<td> '. $row['cedula_a'] . '</td>';
        echo '<td> '. $row['cedula_escolar_a'] . '</td>';
        echo '<td> '. $nac . '</td>';
        echo '<td> '. $edad . '</td>';
        echo '<td> '. $genero . '</td>';
        echo '<td> '. $row['periodo'] . '</td>';
        echo '<td> '. $row['fecha_insc_a'] . '</td>';
        echo '<td> '. $activo_a . '</td></tr>';
        }
        }
    }
}
