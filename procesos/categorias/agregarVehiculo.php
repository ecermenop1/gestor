<?php 


	

	require_once "../../clases/Vehiculos.php";
$Vehiculos = new Vehiculos();

$CarpetaImagenesVehiculos = '../../fotosVehiculos';

		if (!file_exists($CarpetaImagenesVehiculos)) {
			mkdir($CarpetaImagenesVehiculos, 0777, true);
		}

$imagenNombre = $_FILES["imagen"]["name"]; 
$imagenTipo = $_FILES["imagen"]["type"];
$imagenTmp = $_FILES["imagen"]["tmp_name"];  
$imagenError = $_FILES["imagen"]["error"];
    
    // Directorio donde se guardarán las imágenes en el servidor
    $rutaFinal = $CarpetaImagenesVehiculos . "/" . $imagenNombre;
    $rutaFinalimagen = "../fotosVehiculos" . "/" . $imagenNombre;
    
    
    move_uploaded_file($imagenTmp, $rutaFinal);

	$datos = array (
			"Placa" => $_POST['Placa'],
			"TipoVehiculo" => $_POST['TipoVehiculo'],
            "MarcaVehiculo" => $_POST['MarcaVehiculo'],
            "LineaVehiculo" => $_POST['LineaVehiculo'],
            "Modelo" => $_POST['Modelo'],
            "ColorVehiculo" => $_POST['ColorVehiculo'],
            "Propietario" => $_POST['Propietario'],
            "RutaImagen" => $rutaFinalimagen

					);

		//print_r($datos);	
				echo $Vehiculos->agregarVehiculos($datos);