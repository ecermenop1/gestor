<?php 

	session_start();

	require_once "../../clases/Casos.php";
	$Casos = new Casos();
	$datos = array (
			"NumeroCaso" => $_POST['NumeroCaso'],
            "Organizacion" => $_POST['Organizacion'],
            "FechaInicio" => $_POST['FechaInicio'],
            "FechaFin" => $_POST['FechaFin'],
            "Estado" => $_POST['Estado'],
			"IdDireccion" => $_POST['IdDireccion'],
			"IdCaso" => $_POST['idcaso']
					);

				if($_POST['idcaso']==""){
				echo $Casos->agregarCasos($datos);
			   }else{
				echo $Casos->ActualizarCasos($datos);
			   }
