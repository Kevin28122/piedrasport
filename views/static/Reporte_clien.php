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
    $this->Cell(70,10,'Reporte de Clientes',0,0,'C');
    // Salto de línea
    $this->Ln(40);

    $this->cell(27, 15, 'Nombre', 1, 0, 'c', 0);
    $this->cell(27, 15, 'Apellido', 1, 0, 'c', 0);
    $this->cell(50, 15, 'Direccion', 1, 0, 'c', 0);
    $this->cell(60, 15, 'Email', 1, 0, 'c', 0);
    $this->cell(30, 15, 'Usuario', 1, 1, 'c', 0);

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
$consulta = "SELECT * FROM clientes";
$resultado = mysqli_query($conexion,$consulta);


$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->cell(27, 15, $row['NOMBRE'], 1, 0, 'c', 0);
    $pdf->cell(27, 15, $row['APELLIDO'], 1, 0, 'c', 0);
    $pdf->cell(50, 15, $row['DIRECCION'], 1, 0, 'c', 0);
    $pdf->cell(60, 15, $row['EMAIL'], 1, 0, 'c', 0);
    $pdf->cell(30, 15, $row['USUARIO'], 1, 1, 'c', 0);
}

$pdf->Output();
?>