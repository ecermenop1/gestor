<?php 


	session_start();

	require_once "../../clases/Departamentos.php";
	$Departamentos = new Departamentos();

	$datos = array (
			"CodigoDepartamento" => $_POST['CodigoDepartamento'],
			"NombreDepartamento" => $_POST['NombreDepartamento'],
            "Departamento" => $_POST['Departamento']
					);

				
				echo $Departamentos->agregarDepartamentos($datos);
	
 ?>