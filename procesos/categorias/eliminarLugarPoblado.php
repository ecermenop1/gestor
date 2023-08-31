<?php 

	
	require_once "../../clases/LugaresPoblados.php";
	$LugaresPoblados =  new LugaresPoblados();
	


	if ($_POST['idLugarPoblado']!="") {
		echo $LugaresPoblados->eliminarLugarPoblado($_POST['idLugarPoblado']);
	} else {
		echo 0;
	}

	
 ?>