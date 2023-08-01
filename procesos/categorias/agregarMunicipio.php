<?php 


	session_start();

	require_once "../../clases/Municipios.php";
	$Municipios = new Municipios();

	$datos = array (
			"CodigoMunicipio" => $_POST['CodigoMunicipio'],
			"NombreMunicipio" => $_POST['NombreMunicipio'],
            "Departamento" => $_POST['Departamento']
					);

				
				echo $Municipios->agregarMunicipios($datos);
