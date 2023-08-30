<?php 

	
	require_once "../../clases/Paises.php";
	$Paises =  new Paises();
	


	if ($_POST['idPais']!="") {
		echo $Paises->eliminarPais($_POST['idPais']);
	} else {
		echo 0;
	}

	
 ?>