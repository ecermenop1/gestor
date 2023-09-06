<?php 
		
	require_once "Conexion.php";
    require('../librerias/fpdf/fpdf.php');

    // Crear una instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Configura la fuente y el tamaño del texto
$pdf->SetFont('Arial', 'B', 16);

// Título del PDF
$pdf->Cell(0, 10, 'Resultados de la consulta a la base de datos', 0, 1, 'C');

// Conecta a la base de datos MySQL (ajusta estos valores)
$conexion = new mysqli("localhost", "root", "", "gestor");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Ejecuta una consulta SELECT (ajusta esta consulta según tus necesidades)
$consulta = "SELECT *
FROM TB_MUNICIPIO
WHERE MUNICIPIO_ID =1";;
$resultado = $conexion->query($consulta);

// Procesa y muestra los resultados en el PDF
while ($fila = $resultado->fetch_assoc()) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Campo1: " . $fila['MUNICIPIO_ID'], 0, 1);
    $pdf->Cell(0, 10, "Campo2: " . $fila['MUNICIPIO_NOMBRE'], 0, 1);
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Generar el PDF en el navegador
$pdf->Output();
 ?>