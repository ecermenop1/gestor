<?php 
	
	require_once "../../clases/LugaresPoblados.php";
	$LugaresPoblados =  new LugaresPoblados();

echo json_encode($LugaresPoblados->obtenerLugarPoblado($_POST['idLugarPoblado']));

 ?>