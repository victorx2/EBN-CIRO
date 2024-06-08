<?php

    session_start();

    date_default_timezone_set("America/Caracas");

    require '../fpdf/fpdf.php';

    $datos = unserialize($_POST['datos']);

    class PDF extends FPDF{
        
        function header(){

            $this->SetFont('Arial','B',10);
            $this->Image('../img/Retro.png', 10, 2, 35);
            $this->Image('../img/MBI.jpg', 165, 10, 45);
            $this->Cell(200, 4, utf8_decode("REPUBLICA BOLIVARIA DE VENEZUELA"), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode("MINISTERIO DEL PODER POPULAR PARA LA EDUCACION"), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('ESCUELA BASICA NACIONAL BOLIVARIANA'), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('"CIRO MALDONADO  ZERPA"'), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('LA COROMOTO'), 0, 1, 'C');
            $this->Cell(200, 4, utf8_decode('MARACY - ESTADO ARAGUA'), 0, 1, 'C');
            $this->Ln(8);
            $this->Cell(200, 4, utf8_decode('Municipio Girardot - Parroquia Los Tacariguas'), 0, 1, 'L');
            $this->Cell(200, 4, utf8_decode('Codigo de Dependencia: 006562710'), 0, 1, 'L');
            $this->Cell(200, 4, utf8_decode('Codigo DEA: OD03310503'), 0, 1, 'L');
            $this->Cell(200, 4, utf8_decode('Codigo Estadistico: 50073'), 0, 1, 'L');
            $this->Ln(4);
            $this->Cell(200, 4, utf8_decode('RIF: J-40922242-0'), 0, 1, 'L');
            $this->Ln(4);
            $this->Cell(200, 4, 'CONSTANCIA DE ESTUDIO', 0, 1, 'C');
            $this->Ln(4);
        }

        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','B',10);
            $this->Cell(200, 4, utf8_decode('"CIRO MALDONADO  ZERPA"'), 0, 0, 'C');
        }
    }

        $pdf = new PDF('P','mm','letter');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',10);

        $pdf->MultiCell(190, 5, utf8_decode('   Quien suscribe Lic. ____________________________ CI: _____________________ Director(a) de la Escuela Basica Nacional Bolivariana "Ciro Maldonado Zerpa" hace constar que el (a) Estudiante '. $datos['nombre_a']. ' ' .$datos['apellido_a'] .' de la Escuela Basica en el '.$datos['grado'].' Grado Seccion "' .$datos['literal']. '", Año Escolar '.$datos['periodo_escolar_a'].'.'), 0, "L");

        $pdf->Ln(5);

        $pdf->MultiCell(190, 5, utf8_decode('   Constancia escolar que se expira a peticion de la parte interesada en Maracay a los '. date("d") .' Dias del Mes '. date("m") .', Año '. date("Y") .'.'), 0, "L");

        $pdf->Ln(10);

        $pdf->Cell(190, 6, 'Firma y sello de la Director(a) _________________', 0, 1, 'C');
        $pdf->Cell(190, 6, 'Lic.'. $_SESSION['user'] .' Director(a)', 0, 0, 'C');

        $pdf->Output('Constancia de Estudio '.$datos['nombre_a']. '-' .$datos['cedula_a'], 'D'); 

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