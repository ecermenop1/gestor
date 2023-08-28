<?php 


	session_start();

	require_once "../../clases/Paises.php";
	$Paises = new Paises();

	$datos = array (
		    "IdPais" => $_POST['IdPais'],
			"CodigoPais" => $_POST['CodigoPais'],
			"NombrePais" => $_POST['NombrePais']
					);

				if( $_POST['IdPais']==""){
					echo $Paises->agregarPais($datos);
				}else{
					echo $Paises->ActualizarPais($datos);
				}
				
	

 ?>