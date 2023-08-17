<?php 
	
	require_once "../../clases/Casos.php";
	$Casos =  new Casos();

echo json_encode($Casos->obtenerCaso($_POST['idCaso']));

 ?>