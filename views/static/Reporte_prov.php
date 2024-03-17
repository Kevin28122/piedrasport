<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de proveedor',0,0,'C');
    // Salto de línea
    $this->Ln(40);

    $this->cell(50, 15, 'nombre', 1, 0, 'c', 0);
    $this->cell(70, 15, 'Email', 1, 0, 'c', 0);
    $this->cell(50, 15, 'Movil', 1, 1, 'c', 0);


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Page ').$this->PageNo().'/{nb}',0,0,'C');
}
}

include '../../php/conexion.php';
$consulta = "SELECT * FROM proveedores";
$resultado = mysqli_query($conexion,$consulta);


$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',14);

while($row = $resultado->fetch_assoc()){
    $pdf->cell(50, 15, $row['NOMBRE'], 1, 0, 'c', 0);
    $pdf->cell(70, 15, $row['EMAIL'], 1, 0, 'c', 0);
    $pdf->cell(50, 15, $row['MOVIL'], 1, 1, 'c', 0);
}

$pdf->Output();
?>