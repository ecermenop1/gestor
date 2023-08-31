<?php 

	
	require_once "../../clases/Vehiculos.php";
	$Vehiculos =  new Vehiculos();
	


	if ($_POST['idVehiculo']!="") {
		echo $Vehiculos->eliminarVehiculo($_POST['idVehiculo']);
	} else {
		echo 0;
	}

	
 ?>