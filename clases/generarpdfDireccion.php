<?php
require'../clases/Conexion.php';
require('../librerias/fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
class PDF extends FPDF
{

  
function Header()
{
   // $this->Image('../img/Logo PNC.png',-5,-1,20);
   
    $this->Image('../img/Logo PNC.jpeg',165,25,20);
$this->SetY(20);
$this->SetX(14);
$this->SetFont('Arial','B',12);


$this->Cell(50, 1, utf8_decode('SUB DIRECCIÓN GENERAL DE ANÁLISIS DE INFORMACIÓN ANTINARCÓTICA'),0,1);
$this->SetY(30);
$this->SetX(60);
$this->Cell(50, 1, utf8_decode('FICHA DE INFORMACIÓN DE INMUEBLES'),0,1);
$this->SetY(45);
$this->SetX(168);
$this->SetFont('Arial','',8);
$this->Cell(40, 8, 'SGAIA');
$this->SetTextColor(30,10,32);
$this->Ln(30);


$con = new Conectar();
$conexion =  $con->conexion();

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
// Ejecuta una consulta SELECT (ajusta esta consulta según tus necesidades)
$consulta = "SELECT *
FROM TB_DIRECCIONES
WHERE DIRECCION_ID =".$_GET['valor'];
$resultado = $conexion->query($consulta);
$fila = $resultado->fetch_assoc();

$this->Image($fila['RUTA_IMAGEN'],80,50,40);


}
function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Este no es un documento oficial, únicamente proporciona información almacenada en el sistema de información."),0,0,"C");
        
}


}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(500);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$pdf->SetX(15);
$pdf->SetY(100);
$pdf->SetFillColor(210,57,57);
$pdf->SetDrawColor(255, 255, 255);
// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40, 12, utf8_decode('DATOS GENERALES'),1,0,'C',1);
$pdf->Cell(140, 12, utf8_decode('ALIAS'),1,0,'C',1);
$pdf->Ln(4);

$pdf->SetFont('Arial','',10);

$con = new Conectar();
$conexion =  $con->conexion();

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
// Ejecuta una consulta SELECT (ajusta esta consulta según tus necesidades)
$consulta = "SELECT D.LATITUD,D.LONGITUD, D.NUMERO_CASO, D.NUMERO_OFICIO, 
D.OBSERVACIONES, D.DIRECCION_ID,D.CALLE,AVENIDA,D.NUMERO_CASA,D.ZONA ,LP.LUGARPOBLADO_NOMBRE,
M.MUNICIPIO_NOMBRE, PAIS.NOMBRE_PAIS, DP.DEPARTAMENTO_NOMBRE,
D.LATITUD, D.LONGITUD,D.OBSERVACIONES
 FROM TB_DIRECCIONES AS D INNER JOIN  TB_LUGARESPOBLADOS AS LP 
ON D.LUGARPOBLADO_ID=LP.LUGARPOBLADO_ID
INNER JOIN TB_MUNICIPIO AS M
ON  LP.MUNICIPIO_ID=M.MUNICIPIO_ID
INNER JOIN  TB_PAIS AS PAIS
ON D.PAIS_ID=PAIS.PAIS_ID
LEFT JOIN TB_DEPARTAMENTO AS DP
ON D.DEPARTAMENTO_ID=DP.DEPARTAMENTO_ID
WHERE DIRECCION_ID=".$_GET['valor'];
$resultado = $conexion->query($consulta);

// Procesa y muestra los resultados en el PDF
$fila = $resultado->fetch_assoc();
    $pdf->SetX(15);
    
    $pdf->SetFillColor(210,57,57);
$pdf->SetDrawColor(255, 255, 255);

    $pdf->Ln(10);
 
    $pdf->Cell(40, 8, utf8_decode( 'DIRECCION:'),'B',0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(65, 61, 61);
    
    $pdf->MultiCell(140, 8, utf8_decode( $fila['CALLE'] . " " . $fila['AVENIDA']
    . " " . $fila['NUMERO_CASA'] . " " . $fila['MUNICIPIO_NOMBRE']
    . " " . $fila['NOMBRE_PAIS'] . " " . $fila['DEPARTAMENTO_NOMBRE']
    . " " . $fila['LATITUD'] . " " . $fila['LONGITUD']),'B',0,'C',1);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->Ln(2);
    $pdf->Cell(40, 8, utf8_decode('COORDENADA:'),'B',0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(65, 61, 61);
    $pdf->Cell(140, 8, utf8_decode("Latitud: " .$fila['CALLE'] . "         Longitud: " . $fila['AVENIDA']),'B',0,'C',1);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->Ln(10);
    $pdf->Cell(40, 8, utf8_decode('OBSERVACIONES:'),'B',0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(65, 61, 61);
    $pdf->Cell(140, 8, utf8_decode($fila['OBSERVACIONES']),'B',0,'C',1);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->Ln(10);
    $pdf->Cell(40, 8, utf8_decode('NÚMERO DE  CASO:'),'B',0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(65, 61, 61);
    $pdf->Cell(140, 8, utf8_decode($fila['NUMERO_CASO']),'B',0,'C',1);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->Ln(10);
    $pdf->Cell(40, 8, utf8_decode( 'NUMERO DE OFICIO:'),'B',0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(65, 61, 61);
    $pdf->Cell(140, 8, utf8_decode($fila['NUMERO_OFICIO']),'B',0,'C',1);
   
    $pdf->Ln(0.5);





$pdf->Output();
