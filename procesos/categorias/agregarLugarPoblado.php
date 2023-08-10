<?php 


	session_start();

	require_once "../../clases/LugaresPoblados.php";
	$LugaresPoblados = new LugaresPoblados();

	$datos = array (
			"NombreLugarPoblado" => $_POST['NombreLugarPoblado'],
			"TipoLugarPoblado" => $_POST['TipoLugarPoblado'],
            "Ruralidades" => $_POST['Ruralidades'],
            "ZonaCalle" => $_POST['ZonaCalle'],
            "MunicipioLugarPoglado" => $_POST['MunicipioLugarPoglado']
					);

				
				echo $LugaresPoblados->agregarLugaresPoblados($datos);
