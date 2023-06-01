<?php
require('fpdf/fpdf.php');

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Tabla de proveedor', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'nombreEmpresa', 1, 0, 'C');
$pdf->Cell(30, 10, 'calle', 1, 0, 'C');
$pdf->Cell(40, 10, 'colonia', 1, 0, 'C');
$pdf->Cell(40, 10, 'numExt', 1, 0, 'C');
$pdf->Cell(40, 10, 'ciudad', 1, 0, 'C');
$pdf->Cell(40, 10, 'estado', 1, 0, 'C');
$pdf->Cell(40, 10, 'correoElectronico', 1, 0, 'C');
$pdf->Cell(40, 10, 'personaContacto', 1, 1, 'C');



$pdf->SetFont('Arial', '', 12);

require_once('conexion.php');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombreEmpresa, calle, colonia, numExt, ciudad, estado, correoElectronico, personaContacto FROM proveedor WHERE estatus = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['nombreEmpresa'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['calle'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['colonia'], 1, 0, 'L');;
        $pdf->Cell(40, 10, $row['numExt'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['ciudad'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['estado'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['correoElectronico'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['personaContacto'], 1, 1, 'L');

    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 1, 1, 'C');
}

$conn->close();

$pdf->Output('proveedor.pdf', 'D');
exit;
?>