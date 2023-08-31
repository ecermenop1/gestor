<?php 

	
	require_once "../../clases/Casos.php";
	$Casos =  new Casos();
	


	if ($_POST['idCaso']!="") {
		echo $Casos->eliminarCaso($_POST['idCaso']);
	} else {
		echo 0;
	}

	
 ?>