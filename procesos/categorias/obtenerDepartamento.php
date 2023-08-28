<?php 
	
	require_once "../../clases/Departamentos.php";
	$Departamentos =  new Departamentos();

echo json_encode($Departamentos->obtenerDepartamento($_POST['idDepartamento']));

 ?>