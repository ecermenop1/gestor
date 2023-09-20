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
  

if($imagenNombre==""){
    $imagenNombre='defaultvehiculo.png';
}
    // Directorio donde se guardarán las imágenes en el servidor
    $rutaFinal = $CarpetaImagenesVehiculos . "/" . $imagenNombre;
    $rutaFinalimagen = "../fotosVehiculos" . "/" . $imagenNombre;
    
    
    move_uploaded_file($imagenTmp, $rutaFinal);

	$datos = array (
            "IdVehiculo" => $_POST['IdVehiculo'],
            "NumeroCaso" => $_POST['NumeroCaso'],
            "NumeroOficio" => $_POST['NumeroOficio'],
			"Placa" => $_POST['Placa'],
			"TipoVehiculo" => $_POST['TipoVehiculo'],
            "MarcaVehiculo" => $_POST['MarcaVehiculo'],
            "LineaVehiculo" => $_POST['LineaVehiculo'],
            "Modelo" => $_POST['Modelo'],
            "ColorVehiculo" => $_POST['ColorVehiculo'],
            "IdPropietario" => $_POST['IdPropietario'],
            "NumeroChasis" => $_POST['NumeroChasis'],
            "NumeroMotor" => $_POST['NumeroMotor'],
            "RutaImagen" => $rutaFinalimagen,
            "imagenNombre" => $imagenNombre

					);

		//print_r($datos);	
        if($_POST['IdVehiculo']==""){
            echo $Vehiculos->agregarVehiculos($datos);
        }else{
            echo $Vehiculos->ActualizarVehiculo($datos);
        }
				
