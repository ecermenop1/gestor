<?php 
	
	require_once "../../clases/Direcciones.php";
	$Direcciones =  new Direcciones();

echo json_encode($Direcciones->obtenerDireccion($_POST['idDireccion']));

 ?>