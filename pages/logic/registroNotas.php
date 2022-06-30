<?php
require('../../libs/fpdf/fpdf.php');
include_once('../../config/db.php');

$conexionDB = BaseDatos::crearInstancia();

$sql = "SELECT * FROM estudiantes";
$consulta = $conexionDB->prepare($sql);
$consulta->execute();
$listaDeEstudiantes = $consulta->fetchAll();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../src/logo.png',160,10,35);
    $this->SetX(20);
    $this->SetY(30);
}

// Pie de página
function Footer()
{
    // // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // // Arial italic 8
    $this->SetFont('Arial','I',8);
    // // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Cell(0,0,"Registro de Notas del curso",0,0,'C',0);
$pdf->Ln(12);
$pdf->SetX(12);
$pdf->SetFillColor(14,139,246);
$pdf->Cell(10,7,"ID",1,0,'C',0);
$pdf->Cell(90,7,"Estudiante",1,0,'C',0);
$pdf->Cell(11,7,"C1",1,0,'C',0);
$pdf->Cell(11,7,"P1",1,0,'C',0);
$pdf->Cell(11,7,"C2",1,0,'C',0);
$pdf->Cell(11,7,"P2",1,0,'C',0);
$pdf->Cell(11,7,"C3",1,0,'C',0);
$pdf->Cell(11,7,"P3",1,0,'C',0);
$pdf->Cell(20,7,"Nota Final",1,1,'C',0);
$pdf->SetFillColor(255,255,255);//color de fondo
$pdf->SetDrawColor(51,51,51);//color de linea
foreach($listaDeEstudiantes as $estudiante){
  $pdf->setX(12);
  $pdf->Cell(10,6,utf8_decode($estudiante['id_alumno']),1,0,'C',0);
  $pdf->Cell(90,6,utf8_decode($estudiante['nombres_apellidos']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode($estudiante['continua_1']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode($estudiante['parcial_1']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode($estudiante['continua_2']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode($estudiante['parcial_2']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode($estudiante['continua_3']),1,0,'C',0);
  $pdf->Cell(11,6,utf8_decode($estudiante['parcial_3']),1,0,'C',0);
  $pdf->Cell(20,6,utf8_decode($estudiante['nota_final']),1,1,'C',0);
}

$pdf->Ln(20);
$pdf->Cell(0,0,"Datos del curso",0,0,'C',0);
$pdf->Ln(12);
$pdf->Cell(0,0,"Primera Fase",0,0,'C',0);
$pdf->Ln(12);
$pdf->Cell(0,0,"Segunda Fase",0,0,'C',0);
$pdf->Ln(12);
$pdf->Cell(0,0,"Tercera Fase",0,0,'C',0);

$pdf->Output();

?>