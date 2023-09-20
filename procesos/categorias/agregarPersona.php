<?php 


	

	require_once "../../clases/Personas.php";
$Personas = new Personas();

$CarpetaImagenesPersonas = '../../fotosPersonas';

		if (!file_exists($CarpetaImagenesPersonas)) {
			mkdir($CarpetaImagenesPersonas, 0777, true);
		}

$imagenNombre = $_FILES["imagen"]["name"]; 
$imagenTipo = $_FILES["imagen"]["type"];
$imagenTmp = $_FILES["imagen"]["tmp_name"];  
$imagenError = $_FILES["imagen"]["error"];


if($imagenNombre==""){
    $imagenNombre='defaultpersona.png';
}
    
    // Directorio donde se guardarán las imágenes en el servidor
    $rutaFinal = $CarpetaImagenesPersonas . "/" . $imagenNombre;
    $rutaFinalimagen = "../fotosPersonas" . "/" . $imagenNombre;
    
    
    move_uploaded_file($imagenTmp, $rutaFinal);

	$datos = array (
        
            "IdPropietario" => $_POST['IdPropietario'],
            "NumeroCaso" => $_POST['NumeroCaso'],
            "NumeroOficio" => $_POST['NumeroOficio'],
			"Nombre1" => $_POST['Nombre1'],
			"Nombre2" => $_POST['Nombre2'],
            "Nombre3" => $_POST['Nombre3'],
            "Apellido1" => $_POST['Apellido1'],
            "Apellido2" => $_POST['Apellido2'],
            "Apellido3" => $_POST['Apellido3'],
            "FechaNacimiento" => $_POST['FechaNacimiento'],
            "LugarNacimiento" => $_POST['LugarNacimiento'],
            "TipoDocumento" => $_POST['TipoDocumento'],
            "NumeroDocumento" => $_POST['NumeroDocumento'],
            "Genero" => $_POST['Genero'],
            "Nacionalidad" => $_POST['Nacionalidad'],
            "Direccion" => $_POST['Direccion'],
            "NombrePadre" => $_POST['NombrePadre'],
            "NombreMadre" => $_POST['NombreMadre'],
            "Telefono" => $_POST['Telefono'],
            "Alias" => $_POST['Alias'],
            "RutaImagen" => $rutaFinalimagen

					);

		//print_r($datos);	
                if($_POST['IdPropietario']==""){
				echo $Personas->agregarPersonas($datos);
                }else{
                    echo $Personas->ActualizarPersona($datos);
                }
