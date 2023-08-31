<?php 

	
	require_once "../../clases/Personas.php";
	$Personas =  new Personas();
	


	if ($_POST['idPersona']!="") {
		echo $Personas->eliminarPersona($_POST['idPersona']);
	} else {
		echo 0;
	}

	
 ?>