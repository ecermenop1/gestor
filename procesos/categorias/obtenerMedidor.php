<?php 
	
	require_once "../../clases/Medidores.php";
	$Medidores =  new Medidores();

echo json_encode($Medidores->obtenerMedidor($_POST['idMedidor']));

 ?>