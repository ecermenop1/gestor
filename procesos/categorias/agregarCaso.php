<?php 

	session_start();

	require_once "../../clases/Casos.php";
	$Casos = new Casos();
	$datos = array (
			"NumeroCaso" => $_POST['NumeroCaso'],
            "IdPropietario" => $_POST['IdPropietario'],
            "Organizacion" => $_POST['Organizacion'],
            "FechaInicio" => $_POST['FechaInicio'],
            "FechaFin" => $_POST['FechaFin'],
            "Estado" => $_POST['Estado']
					);

				
				echo $Casos->agregarCasos($datos);
