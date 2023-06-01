<?php
require('fpdf/fpdf.php');

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Tabla de laboratorista', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'nombre', 1, 0, 'C');
$pdf->Cell(30, 10, 'aPaterno', 1, 0, 'C');
$pdf->Cell(40, 10, 'aMaterno', 1, 0, 'C');
$pdf->Cell(40, 10, 'sexo', 1, 0, 'C');
$pdf->Cell(40, 10, 'numTelefono', 1, 0, 'C');
$pdf->Cell(30, 10, 'correoElectronico', 1, 0, 'C');
$pdf->Cell(40, 10, 'especialidad', 1, 0, 'C');
$pdf->Cell(40, 10, 'numLicencia', 1, 0, 'C');
$pdf->Cell(40, 10, 'expLaboral', 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);

require_once('conexion.php');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombre, aPaterno, aMaterno, sexo, numTelefono, correoElectronico, especialidad, numLicencia, expLaboral FROM laboratorista WHERE estatus = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['nombre'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['aPaterno'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['aMaterno'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['sexo'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['numTelefono'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['correoElectronico'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['especialidad'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['numLicencia'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['expLaboral'], 1, 1, 'L');

    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 1, 1, 'C');
}

$conn->close();

$pdf->Output('equipoLab.pdf', 'D');
exit;
?>