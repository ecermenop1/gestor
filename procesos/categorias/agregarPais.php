<?php 


	session_start();

	require_once "../../clases/Paises.php";
	$Paises = new Paises();

	$datos = array (
			"CodigoPais" => $_POST['CodigoPais'],
			"NombrePais" => $_POST['NombrePais']
					);

				
				echo $Paises->agregarPais($datos);
	

 ?>