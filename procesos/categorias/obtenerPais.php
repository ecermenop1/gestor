<?php 
	
	require_once "../../clases/Paises.php";
	$Paises =  new Paises();

echo json_encode($Paises->obtenerPais($_POST['idPais']));

 ?>