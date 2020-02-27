<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF{
    function Header(){
        $this->Image('imglogin/canaco.png', 5, 5, 30);
        $this->SetFont('Arial','B',15);
         $this->Ln(5);
        $this->Cell(160,5,'Reporte de usuarios registrados.',0,0,'C');

        $this->Ln(20);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,0,$this->PageNo().'/{nb}', 0, 0,'C');
    }
}

?>