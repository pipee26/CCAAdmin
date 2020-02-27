<?php
include 'formato.php';
require 'conexion.php';

$curso=$_POST['cursoselect'];

$sql="SELECT nombre, apellido, empresa, curso FROM personas WHERE curso='$curso'";
$res=mysqli_query($conexion,$sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(47, 6, 'Nombre',1,0,'C',1);
$pdf->Cell(47, 6, 'Apellido',1,0,'C',1);
$pdf->Cell(47, 6, 'Empresa',1,0,'C',1);
$pdf->Cell(47, 6, 'Curso',1,1,'C',1);

$pdf->SetFont('Arial','',10);

while($row=mysqli_fetch_array($res)){
$pdf->Cell(47, 6, $row['nombre'],1,0,'C',1);
$pdf->Cell(47, 6, $row['apellido'],1,0,'C',1);
$pdf->Cell(47, 6, $row['empresa'],1,0,'C',1);
$pdf->Cell(47, 6, $row['curso'],1,1,'C',1);
}

$pdf->Output();

?>