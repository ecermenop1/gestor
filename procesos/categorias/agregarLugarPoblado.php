<?php 


	session_start();

	require_once "../../clases/LugaresPoblados.php";
	$LugaresPoblados = new LugaresPoblados();

	$datos = array (
		    "IdLugPob" => $_POST['IdLugPob'],
			"NombreLugarPoblado" => $_POST['NombreLugarPoblado'],
			"TipoLugarPoblado" => $_POST['TipoLugarPoblado'],
            "Ruralidades" => $_POST['Ruralidades'],
            "ZonaCalle" => $_POST['ZonaCalle'],
            "MunicipioLugarPoglado" => $_POST['MunicipioLugarPoglado']
					);

				
					if($_POST['IdLugPob']==""){
						echo $LugaresPoblados->agregarLugaresPoblados($datos);

					}else{
						echo $LugaresPoblados->actualizaLugaresPoblados($datos);
					}
			