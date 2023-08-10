<?php 


	session_start();

	require_once "../../clases/Medidores.php";
	$Medidores = new Medidores();

	$datos = array (
			"NumeroMedidor" => $_POST['NumeroMedidor'],
			"EmpresaElectrica" => $_POST['EmpresaElectrica'],
					);

				
				echo $Medidores->agregarMedidores($datos);
