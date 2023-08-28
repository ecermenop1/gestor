<?php 
	
	require_once "../../clases/Municipios.php";
	$Municipios =  new Municipios();

echo json_encode($Municipios->obtenerMunicipio($_POST['idMunicipio']));

 ?>