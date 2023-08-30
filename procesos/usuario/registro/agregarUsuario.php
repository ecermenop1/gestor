<?php 

	require_once "../../../clases/Usuario.php";

	$password = sha1($_POST['password']);
	//$fechaNacimiento = explode("-", $_POST['fechaNacimiento']);
	//$fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
	$datos = array(
				"nombre" => $_POST['nombre'], 
			    "fechaNacimiento" => $_POST['fechaNacimiento'], 
			    "email" => $_POST['correo'], 
			    "usuario" => $_POST['usuario'], 
				"RolUsuario" => $_POST['RolUsuario'], 
			    "password" => $password
			);

	$usuario = new Usuario();
	echo $usuario->agregarUsuario($datos);
	//rint_r($datos)
 ?>