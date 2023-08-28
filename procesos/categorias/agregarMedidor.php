<?php 


	session_start();

	require_once "../../clases/Medidores.php";
	$Medidores = new Medidores();

	$datos = array (
			"IdMedidor" => $_POST['IdMedidor'],
			"NumeroMedidor" => $_POST['NumeroMedidor'],
			"EmpresaElectrica" => $_POST['EmpresaElectrica'],
					);

				
			if( $_POST['IdMedidor']==""){
				echo $Medidores->agregarMedidores($datos);
			}else{
				echo $Medidores->ActualizarMedidor($datos);
			}
				
