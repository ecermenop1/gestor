<?php 
	
	require_once "../../clases/Personas.php";
	$Personas =  new Personas();

echo json_encode($Personas->obtenerPropietario($_POST['idpersona']));

 ?>