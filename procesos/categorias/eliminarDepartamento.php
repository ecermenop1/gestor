<?php 

	
	require_once "../../clases/Departamentos.php";
	$Departamentos =  new Departamentos();
	


	if ($_POST['idDepartamento']!="") {
		echo $Departamentos->eliminarDepartamento($_POST['idDepartamento']);
	} else {
		echo 0;
	}

	
 ?>