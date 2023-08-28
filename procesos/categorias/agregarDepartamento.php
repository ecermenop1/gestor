<?php 


	session_start();

	require_once "../../clases/Departamentos.php";
	$Departamentos = new Departamentos();

	$datos = array (
		    "IdDepartamento" => $_POST['IdDepartamento'],
			"CodigoDepartamento" => $_POST['CodigoDepartamento'],
			"NombreDepartamento" => $_POST['NombreDepartamento'],
            "Pais" => $_POST['Pais']
					);

			
					if($_POST['IdDepartamento']==""){
						echo $Departamentos->agregarDepartamentos($datos);

					}else{
						echo $Departamentos->ActualizarDepartamento($datos);
					}
				
	
 ?>