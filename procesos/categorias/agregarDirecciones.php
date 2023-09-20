<?php 

	session_start();

	require_once "../../clases/Direcciones.php";
	$Direcciones = new Direcciones();
    $idUsuario = $_SESSION['idUsuario'];


    $CarpetaImagenesDirecciones = '../../fotosDirecciones';

    if (!file_exists($CarpetaImagenesDirecciones)) {
        mkdir($CarpetaImagenesDirecciones, 0777, true);
    }

    
$imagenNombre = $_FILES["imagen"]["name"]; 
$imagenTipo = $_FILES["imagen"]["type"];
$imagenTmp = $_FILES["imagen"]["tmp_name"];  
$imagenError = $_FILES["imagen"]["error"];

if($imagenNombre==""){
    $imagenNombre='defaultdireciones.png';
}
// Directorio donde se guardarán las imágenes en el servidor
$rutaFinal = $CarpetaImagenesDirecciones . "/" . $imagenNombre;
$rutaFinalimagen = "../fotosDirecciones" . "/" . $imagenNombre;


move_uploaded_file($imagenTmp, $rutaFinal);


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
            "RutaImagen" => $rutaFinalimagen,
            "idUsuario" =>  $idUsuario
            
					);
				if( $_POST['IdDireccion']==""){
                   echo $Direcciones->agregarDirecciones($datos);

                }else{
                    //print_r($datos);
                    echo $Direcciones->ActualizarDireccion($datos);
 
                }
			