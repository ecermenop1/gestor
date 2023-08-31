<?php 

	
	require_once "../../clases/Municipios.php";
	$Municipios =  new Municipios();
	


	if ($_POST['idMunicipio']!="") {
		echo $Municipios->eliminarMunicipio($_POST['idMunicipio']);
	} else {
		echo 0;
	}

	
 ?>