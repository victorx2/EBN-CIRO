    <?php

    session_start();

    require '../fpdf/fpdf.php';

    $datos = unserialize($_POST['datos']);

    class PDF extends FPDF{
        
        function header(){

            $this->SetFont('Arial','B',10);
            $this->Image('../img/Retro.png', 10, 2, 35);
            $this->Cell(200, 4, utf8_decode("REPUBLICA BOLIVARIA DE VENEZUELA"), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode("MINISTERIO DEL PODER POPULAR PARA LA EDUCACION"), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('ESCUELA BASICA NACIONAL BOLIVARIANA'), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('"CIRO MALDONADO  ZERPA"'), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('MARACAY ESTADO ARAGUA'), 0, 1, 'C');
            $this->Ln(4);
            $this->Cell(200, 4, 'PLANILLA INSCRIPCION DEL ALUMNO (A)', 0, 1, 'C');
            $this->Ln(4);
        }

        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',10);
            $this->Cell(200, 4, utf8_decode('"CIRO MALDONADO  ZERPA"'), 0, 1, 'C');
        }
    }

        $pdf = new PDF('P','mm','letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',10);

            $pdf->Cell(40, 6, utf8_decode('Nº de inscripcion: '.$datos['id']), 0, 1, 'L');

            $pdf->Cell(50, 6, 'Fecha de inscripcion: '.$datos['fecha_insc_a'], 0, 0, 'L');

            $pdf->Cell(140, 6, 'Periodo: '.$datos['periodo_escolar_a'], 0, 1, 'R');

            $pdf->Ln(4);

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
            
            $pdf->Cell(60, 6, 'Fecha de nacimiento: '.$datos['nac'], 1, 0, 'L');

            $pdf->Cell(130, 6, 'Lugar de nacimiento: '.$datos['lugar_nac_a'], 1, 1, 'L');

            ///////////////////////////////////////////////////

            $pdf->Cell(130, 6,utf8_decode('Direccion: '.$datos['direccion_a']), 1, 0, 'L');

            $pdf->Cell(30, 6, utf8_decode('Grado: '.$datos['numero']), 1, 0, 'L');

            $pdf->Cell(30, 6, 'Seccion: '.$datos['literal'], 1, 1, 'L');

            $pdf->Cell(95, 6, utf8_decode('Estado: '.$datos['estado_a']), 1, 0, 'L');

            $pdf->Cell(95, 6, utf8_decode('Ciudad: '.$datos['ciudad_a']), 1, 1, 'L');

            $pdf->Cell(95, 6, utf8_decode('Municipio: '.$datos['municipio_a']), 1, 0, 'L');

            $pdf->Cell(95, 6, utf8_decode('Parroquia: '.$datos['parroquia_a']), 1, 1, 'L');

            ///////////////////////////////////////////////////
            $pdf->SetFillColor(201, 202, 204);
            $pdf->Cell(190, 6, 'Datos del Representante', 1, 1, 'C', true);

            $pdf->Cell(95, 6, 'Nombre Completo: '.$datos['nombre_r'], 1, 0, 'L');

            $pdf->Cell(95, 6, 'Apellido Completo: '.$datos['apellido_r'], 1, 1, 'L');

            ///////////////////////////////////////////////////

            $pdf->Cell(63.3, 6, utf8_decode('Vive con el niño: '.$datos['vive_r']), 1, 0, 'L'); 

            $pdf->Cell(63.3, 6, 'Cedula: V'.$datos['cedula_r'], 1, 0, 'L'); 

            $pdf->Cell(63.4, 6, 'Parentesco: '.$datos['parentesco'], 1, 1, 'L');

            $pdf->Cell(80, 6, 'Correo Electronico: '.$datos['correo_electronico_r'], 1, 0, 'L');

            $pdf->Cell(50, 6, 'Telefono: '.$datos['telefono_r'], 1, 0, 'L');

            $pdf->Cell(60, 6, 'Telefono Opcional: '.$datos['telefono_opcional_r'], 1, 1, 'L');

            ///////////////////////////////////////////////////

            $pdf->Cell(190, 6, 'Direccion: '.$datos['direccion_r'], 1, 1, 'L');

            $pdf->Cell(95, 6, 'Profesion: '.$datos['profesion_r'], 1, 0, 'L');

            $pdf->Cell(95, 6, 'Telefono De Trabajo: '.$datos['telefono_trabajo_r'], 1, 1, 'L');

            $pdf->Cell(190, 6, 'Direccion De Trabajo: '.$datos['direccion_trabajo_r'], 1, 1, 'L');

            /////////////////////////////////////////////////
            $pdf->SetFillColor(201, 202, 204);
            $pdf->Cell(190, 6, 'Datos de Procedencia', 1, 1, 'C', true);

            $pdf->Cell(190, 6, 'Motivo: '.$datos['motivo_p'], 1, 1, 'L');

            $pdf->Cell(190, 6, 'de donde provienen: '.$datos['de_donde_proviene_p'], 1, 1, 'L');
            
            $pdf->Cell(190, 6, 'Direccion: '.$datos['direccion_p'], 1, 1, 'L');

            ///////////////////////////////////////////////////

            $pdf->SetFillColor(201, 202, 204);
            $pdf->Cell(190, 6, ' Datos de Salud', 1, 1, 'C', true);

            $pdf->Cell(60, 6, 'Tiene un Problema de Salud ?: '.$datos['tiene_s'], 1, 0, 'L');

            $pdf->Cell(130, 6, 'Alergia: '.$datos['alergia_s'], 1, 1, 'L');  

            $pdf->Cell(95, 6, 'Dieta: '.$datos['dieta_s'], 1, 0, 'L');

            $pdf->Cell(95, 6, 'Tratamiento Medico: '.$datos['tratamiento_M_s'], 1, 1, 'L');

            $pdf->Cell(95, 6, 'Condicion Fisica: '.$datos['condicion_fisica_s'], 1, 0, 'L');

            $pdf->Cell(95, 6, 'Atencion Especial: '.$datos['atencion_especial_s'], 1, 1, 'L');

            ///////////////////////////////////////////////////

            $pdf->SetFillColor(201, 202, 204);
            $pdf->Cell(190, 6, ' Datos de Transporte', 1, 1, 'C', true);

            $pdf->Cell(55, 6, 'Tiene Transporte ?: '.$datos['tiene_t'], 1, 0, 'L');

            $pdf->Cell(135, 6, 'Nombre del transporte: '.$datos['nombre_t'], 1, 1, 'L');

            $pdf->Cell(95, 6, 'Cedula: V'.$datos['cedula_t'], 1, 0, 'L');

            $pdf->Cell(95, 6, 'Telefono: '.$datos['telefono_t'], 1, 1, 'L');

            $pdf->Cell(95, 6, 'Telefono Opcional: '. $datos['numero_telefonico_opcional_t'], 1, 0, 'L');

            $pdf->Cell(95, 6, 'Numero de Placa: '.$datos['numero_de_placa_t'], 1, 1, 'L');

            $pdf->Ln(10);

            $pdf->Cell(95, 6, 'Firma y sello de la Director(a) _________________', 0, 0, 'L');
            $pdf->Cell(95, 6, 'Firma del Representante ____________________', 0, 1, 'R');

            $pdf->Output('Planilla de Inscripcion  '.$datos['nombre_a']. '-' .$datos['cedula_a'], 'D'); 

            $pdf_isncripcion ="Genero el PDF de la inscripcion del niño(a) de la cedula V-" . $datos['cedula_a'] . ",";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $pdf_isncripcion;

        if (Output()){

            echo json_encode(array("status" => "success", "message" => "Envío de Datos exitoso"));
        
        } else {

            $pdf_isncripcion ="";
            $_SESSION['inscripcion'] = $_SESSION['inscripcion'] . $pdf_isncripcion;

            echo json_encode(array("status" => "error", "message" => "Dato o Datos Incorrectos"));

        }
?>