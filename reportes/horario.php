<?php

    require '../fpdf/fpdf.php';
    require '../src/horario.class.php';
    
    class PDF extends FPDF{

        function header(){

            $this->SetFont('Arial','B',10);

            $this->Image('../img/Retro.png', 10, 2, 35);
            $this->Cell(290, 4, utf8_decode("REPUBLICA BOLIVARIA DE VENEZUELA"), 0, 1, 'C');
            $this->Cell(290, 4, utf8_decode("MINISTERIO DEL PODER POPULAR PARA LA EDUCACION"), 0, 1, 'C');
            $this->Cell(290, 4, utf8_decode('ESCUELA BASICA NACIONAL BOLIVARIANA'), 0, 1, 'C');
            $this->Cell(290, 4, utf8_decode('"CIRO MALDONADO  ZERPA"'), 0, 1, 'C');
            $this->Cell(290, 4, utf8_decode('MARACY ESTADO ARAGUA'), 0, 1, 'C');
            $this->Ln(3);
        }
        
    }
    
    $pdf = new PDF('L');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);

        $pdf->Cell(290, 5, utf8_decode('HORARIO DE '.$_POST['grado'].' GRADO SECCION '.$_POST['seccion']), 0, 1, 'C');

        $pdf->SetFillColor(65, 105, 225);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(35, 5,  "HORAS" , 1, 0, "C", true);
        $pdf->Cell(45, 5,  "LUNES" , 1, 0, "C", true);
        $pdf->Cell(45, 5,  "MARTES" , 1, 0, "C", true);
        $pdf->Cell(45, 5,  "MIERCOLES" , 1, 0, "C", true);
        $pdf->Cell(45, 5,  "JUEVES" , 1, 0, "C", true);
        $pdf->Cell(45, 5,  "VIERNES" , 1, 1, "C", true);

        $pdf->SetTextColor(0, 0, 0); 
        $pdf->MultiCell(35, 5, 
        "\n07:00am a 07:45am ".
        "________________\n".
        "\n07:50am a 08:35am ".
         "________________\n".
        "\n08:40am a 09:25am ".
         "________________\n".
        "\n09:30am a 10:30am ".
         "________________\n".
        "\n10:35am a 11:20am ".
         "________________\n".
        "\n11:25am a 12:10am ".
         "________________\n".
        "\n12:15am a 01:15am ".
         "________________\n".
        "\n01:20pm a 02:05pm ".
         "________________\n".
        "\n02:10pm a 03:00pm \n"
        , 1, "C");

        $consulta = new Horario;
        $consulta->pdfHorarios($_POST['id_p'], $pdf);

        $pdf->Ln(2);

        $pdf->Cell(65, 6, 'Profesor: '.$_POST['nombre'] ." ". $_POST['apellido'] .' Cedula: V-'.$_POST['cedula'], 0, 0, 'L');

        $pdf->Output('Horario del Profesor '.$_POST['nombre'], 'D');

        $horario_pdf = "Se creo el PDF del horaio ,";
        $_SESSION['horario'] = $_SESSION['horario'] . $horario_pdf;

    if (Output()){

        header("location: profesor.php");
        exit();
  
    } else {

        $_SESSION['horario_pdf'] = "";

    }
?>