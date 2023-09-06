<?php 

	session_start();

	require_once "../../clases/Direcciones.php";
	$Direcciones = new Direcciones();
    $idUsuario = $_SESSION['idUsuario'];
	$datos = array (
            "IdDireccion" => $_POST['IdDireccion'],
            "NumeroOficio" => $_POST['NumeroOficio'],
            "NumeroCaso" => $_POST['NumeroCaso'],
			"Calle" => $_POST['Calle'],
            "Avenida" => $_POST['Avenida'],
            "NumeroCasa" => $_POST['NumeroCasa'],
            "IdMunicipio" => $_POST['IdMunicipio'],
            "IdLugarPoblado" => $_POST['IdLugarPoblado'],
            "Zona" => $_POST['Zona'],
            "IdDepartamento" => $_POST['IdDepartamento'],
            "IdPais" => $_POST['IdPais'],
            "Latitud" => $_POST['Latitud'],
            "Longitud" => $_POST['Longitud'],
            "IdMedidor" => $_POST['IdMedidor'],
            "Observaciones" => $_POST['Observaciones'],
            "idUsuario" =>  $idUsuario
            


					);

				if( $_POST['IdDireccion']==""){
                   echo $Direcciones->agregarDirecciones($datos);

                }else{
                    //print_r($datos);
                    echo $Direcciones->ActualizarDireccion($datos);
 
                }
			