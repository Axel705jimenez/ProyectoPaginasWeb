<?php
require('fpdf/fpdf.php');

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Tabla de Pruebas', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'nombrePrueba', 1, 0, 'C');
$pdf->Cell(30, 10, 'descripcion', 1, 0, 'C');
$pdf->Cell(40, 10, 'resultado', 1, 0, 'C');

$pdf->SetFont('Arial', '', 12);

require_once('conexion.php');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombrePrueba, descripcion, resultado FROM prueba WHERE estatus = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['nombrePrueba'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['descripcion'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['resultado'], 1, 0, 'L');
    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 1, 1, 'C');
}

$conn->close();

$pdf->Output('prueba.pdf', 'D');
exit;
?>