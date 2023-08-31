<?php 

	
	require_once "../../clases/Medidores.php";
	$medidores =  new medidores();
	


	if ($_POST['idMedidor']!="") {
		echo $medidores->eliminarMedidor($_POST['idMedidor']);
	} else {
		echo 0;
	}

	
 ?>