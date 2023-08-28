<?php 


	session_start();

	require_once "../../clases/Municipios.php";
	$Municipios = new Municipios();

	$datos = array (
		    "IdMunicipio" => $_POST['IdMunicipio'],
			"CodigoMunicipio" => $_POST['CodigoMunicipio'],
			"NombreMunicipio" => $_POST['NombreMunicipio'],
            "Departamento" => $_POST['Departamento']
					);

				
					if($_POST['IdMunicipio']==""){
						echo $Municipios->agregarMunicipios($datos);
					}else{
						echo $Municipios->ActualizarMunicipio($datos);
					}
				
