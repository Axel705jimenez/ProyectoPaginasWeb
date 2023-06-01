<?php
require('fpdf/fpdf.php');

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Tabla de equipos de laboratorio', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'nombreEquipo', 1, 0, 'C');
$pdf->Cell(30, 10, 'fabricante', 1, 0, 'C');
$pdf->Cell(40, 10, 'modelo', 1, 0, 'C');
$pdf->Cell(40, 10, 'categoria', 1, 1, 'C');


$pdf->SetFont('Arial', '', 12);

require_once('conexion.php');


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombreEquipo, fabricante, modelo, categoria FROM equipoLab WHERE estatus = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['nombreEquipo'], 1, 0, 'L');
        $pdf->Cell(30, 10, $row['fabricante'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['modelo'], 1, 0, 'L');
        $pdf->Cell(40, 10, $row['categoria'], 1, 1, 'L');

    }
} else {
    $pdf->Cell(0, 10, 'No hay datos disponibles', 1, 1, 'C');
}

$conn->close();

$pdf->Output('equipoLab.pdf', 'D');
exit;
?>