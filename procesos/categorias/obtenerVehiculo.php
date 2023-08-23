<?php 
	
	require_once "../../clases/Vehiculos.php";
	$Vehiculos =  new Vehiculos();

echo json_encode($Vehiculos->obtenerVehiculo($_POST['idVehiculo']));

 ?>