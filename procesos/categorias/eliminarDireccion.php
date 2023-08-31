<?php 

	
	require_once "../../clases/Direcciones.php";
	$Direcciones =  new Direcciones();
	


	if ($_POST['idDireccion']!="") {
		echo $Direcciones->eliminarDireccion($_POST['idDireccion']);
	} else {
		echo 0;
	}

	
 ?>