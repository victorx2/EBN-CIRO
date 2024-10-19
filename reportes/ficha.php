<?php
    session_start();

    require '../fpdf/fpdf.php';

    $datos = unserialize($_POST['datos']);
    
    class PDF extends FPDF{
        
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',10);
            $this->Cell(0, 90, 'copyright@', 0,0, 'C');
        }
    }
    
    require '../src/ficha.class.php';
    $fils = new Ficha;
    $filas = $fils->verPdf($datos);


        $pdf = new PDF('P','mm','letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);

        $pdf->Image('../img/Retro.png', 10, 2, 35);
        $pdf->Cell(200, 4, utf8_decode("REPUBLICA BOLIVARIA DE VENEZUELA"), 0, 1, 'C');
        $pdf->Cell(200, 4, utf8_decode("MINISTERIO DEL PODER POPULAR PARA LA EDUCACION"), 0, 1, 'C');
        $pdf->Cell(200, 4, utf8_decode('ESCUELA BASICA NACIONAL BOLIVARIANA'), 0, 1, 'C');
        $pdf->Cell(200, 4, utf8_decode('"CIRO MALDONADO  ZERPA"'), 0, 1, 'C');
        $pdf->Cell(200, 4, utf8_decode('MARACY ESTADO ARAGUA'), 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->Cell(200, 4, 'FICHA ACOMULATIVA DEL ALUMNO (A)', 0, 1, 'C');
        $pdf->Cell(200, 4, 'PARA LA EDUCACION PRIMARIA', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->Cell(40, 6, utf8_decode('Nº Escolar: '.$datos['id_a']), 0, 1, 'L');

        $pdf->Cell(140, 6, 'Periodo Actual: '.$datos['periodo_escolar_a'], 0, 1, 'L');

        $pdf->SetFillColor(201, 202, 204);
        $pdf->Cell(190, 6, 'Datos del estudiante', 1, 1, 'C', true);

        $pdf->Cell(95, 6, 'Nombre Completo: '. $datos['nombre_a'], 1, 0, 'L');

        $pdf->Cell(95, 6, 'Apellido Completo: '. $datos['apellido_a'], 1, 1, 'L');

        ///////////////////////////////////////////////////

        $pdf->Cell(45, 6, 'Cedula: V'.$datos['cedula_a'], 1, 0, 'L'); 

        $pdf->Cell(75, 6, 'Cedula Escolar: '.$datos['id_a'], 1, 0, 'L');

        $pdf->Cell(40, 6, 'Sexo: '.$datos['genero_a'], 1, 0, 'L');

        $pdf->Cell(30, 6, utf8_decode( 'Edad: '.$datos['edad']. 'años'), 1, 1, 'L');

        ///////////////////////////////////////////////////
        
        $pdf->Cell(47, 6, 'Fecha de nacimiento: '.$datos['nac'], 1, 0, 'L');

        ///////////////////////////////////////////////////

        $pdf->Cell(143, 6,utf8_decode('Direccion: '.$datos['direccion_a']), 1, 1, 'L');

        $pdf->Cell(95, 6, utf8_decode('Estado: '.$datos['estado_a']), 1, 0, 'L');

        $pdf->Cell(95, 6, utf8_decode('Ciudad: '.$datos['ciudad_a']), 1, 1, 'L');

        $pdf->Cell(95, 6, utf8_decode('Municipio: '.$datos['municipio_a']), 1, 0, 'L');

        $pdf->Cell(95, 6, utf8_decode('Parroquia: '.$datos['parroquia_a']), 1, 1, 'L');

        $pdf->Cell(70, 6, utf8_decode('Actualmente: '.$datos['numero'].' Grado Seccion '.$datos['literal']), 1, 1, 'L');



        $pdf->Ln(5);
        

        while ($fila = $filas->fetch()) {

            switch ($fila['promocion_ficha']) {
                //en caso que sean todas vacias 
                  case 1:
                    $grado = 'Primer';
                    break;
          
                  case 2:
                    $grado = 'Segundo';
                    break;
          
                  case 3:
                    $grado = 'Tercer';
                    break;
          
                  case 4:
                    $grado = 'Cuarto';
                    break;

                  case 5:
                    $grado = 'Quinto';
                    break;
          
                  case 6:
                    $grado = 'Sexto';
                    break;
            }

            switch ($fila['seccion_ficha']) {
                //en caso que sean todas vacias 
                  case 1:
                    $seccion = 'A';
                    break;
          
                  case 2:
                    $seccion = 'B';
                    break;
          
                  case 3:
                    $seccion = 'C';
                    break;
          
                  case 4:
                    $seccion = 'D';
                    break;

            }

            $pdf->Cell(95, 5, utf8_decode( $fila['grado'] . ' Grado'), 0, 0, 'L');
            $pdf->Cell(90, 5, utf8_decode( 'Seccion: '. $fila['literal'] .' / Turno: Mañana'), 0, 1, 'R');
            $pdf->Cell(95, 5, utf8_decode( 'Año Escolar: '.$fila['periodo'] ), 0, 1, 'L');
            $pdf->Cell(190, 5, 'Plantel donde curso el Educacion Inical: ' . $fila['plantel_ficha'], 0, 1, 'L');
            $pdf->Cell(190, 5, 'Documentos para la inscripcion: ' . $fila['doc_insc_ficha'], 0, 1, 'L');
            $pdf->Cell(85, 5, 'fecha de inscripcion: '. $fila['fecha_insc_a'], 0, 1, 'L');
            $pdf->Cell(95, 5, 'Promocion a "'. $grado . '" Grado, Seccion ' . $seccion.'', 0, 1, 'L');
            $pdf->Cell(95, 5, 'Representante "'. $fila['nombre_r'] . $fila['apellido_r'] . '" / Cedula: V-'. $fila['cedula_r'], 0, 1, 'L');
            $pdf->Cell(95, 5, 'Profesor "'. $fila['profesor_ficha'] .'" / Cedula: V-'. $fila['cedula_profesor_ficha'], 0, 1, 'L');
            $pdf->Cell(190, 5, 'Literal: '. $fila['obs_ficha'], 0, 1, 'L');
            $pdf->Ln(5);
        }



        $pdf->Output('Ficha acomulativa de ' . $datos['nombre_a'] . $datos['apellido_a'] . ', Cedula V-' . $datos['cedula_a'], 'D');
        
        $pdf_ficha = "Realizo un PDF de la Ficha acomulativa del niño(a) de la cedula: V-" . $datos['cedula_a']. ",";
        $_SESSION['ficha_acomulativa'] = $_SESSION['ficha_acomulativa'] . $pdf_ficha ;

        if (Output()){
            
            if ($_SESSION['nivel'] == "A"){

                header("location: ../proceso2/admin/registro.php");
                exit();
            
            } else {
    
                header("location: ../proceso2/usuario/registro.php");
                exit();
    
            }

        } else {

            $pdf_ficha = "";
            $_SESSION['ficha_acomulativa'] = $_SESSION['ficha_acomulativa'] . $pdf_ficha ;

        }
?>