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
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de productos',0,0,'C');
    // Salto de línea
    $this->Ln(40);

    $this->cell(34, 15, 'nombre', 1, 0, 'c', 0);
    $this->cell(40, 15, 'descripcion', 1, 0, 'c', 0);
    $this->cell(22, 15, 'precio', 1, 0, 'c', 0);
    $this->cell(30, 15, 'imagen', 1, 0, 'c', 0);
    $this->cell(33, 15, 'inventario', 1, 0, 'c', 0);
    $this->cell(40, 15, 'color', 1, 1, 'c', 0);
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
$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion,$consulta);


$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->cell(34, 15, $row['nombre'], 1, 0, 'c', 0);
    $pdf->cell(40, 15, $row['descripcion'], 1, 0, 'c', 0);
    $pdf->cell(22, 15, $row['precio'], 1, 0, 'c', 0);
    $pdf->cell(30, 15, $row['imagen'], 1, 0, 'c', 0);
    $pdf->cell(33, 15, $row['inventario'], 1, 0, 'c', 0);
    $pdf->cell(40, 15, $row['color'], 1, 1, 'c', 0);
}

$pdf->Output();
?>