<?php 
	require_once "Conexion.php";

	class Gestor extends Conectar{
		public function agregaRegistroArchivo($datos) {
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO t_archivos (id_usuario,
											nombre,
											tipo,
											ruta,
											NUMERO_CASO,
											NUMERO_OFICIO,
											ASUNTO,
											FECHA_OFICIO

											)
							VALUES (?,?,?,?,?,?,?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('isssssss', $datos['idUsuario'],
										$datos['nombreArchivo'],
										$datos['tipo'],
										$datos['ruta'],
										$datos['numerocaso'],
										$datos['NumeroOficio'],
										$datos['Asunto'],
										$datos['FechaOficio'],
										
										);
										

			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenNombreArchivo($idArchivo){
			$conexion = Conectar::conexion();
			$sql = "SELECT nombre
					FROM t_archivos 
					WHERE id_archivo = '$idArchivo'";
			$result = mysqli_query($conexion, $sql);
			return mysqli_fetch_array($result)['nombre'];
		}

		public function eliminarRegistroArchivo($idArchivo) {
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM t_archivos WHERE id_archivo = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idArchivo);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerRutaArchivo($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT nombre, tipo 
					FROM t_archivos 
					WHERE id_archivo = '$idArchivo'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);
			$nombreArchivo = $datos['nombre'];
			$extension = $datos['tipo'];
			return self::tipoArchivo($nombreArchivo, $extension);
		}

		public function tipoArchivo($nombre, $extension){
			$idUsuario = $_SESSION['idUsuario'];

			$ruta = "../archivos/".$idUsuario."/".$nombre;

			switch ($extension) {
				case 'png':
					return '<img src="'.$ruta.'" width="80%">';
					break;
					
				case 'jpg':
					return '<img src="'.$ruta.'" width="80%">';
					break;
					case 'jpeg':
						return '<img src="'.$ruta.'" width="80%">';
						break;

				case 'pdf':
					return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
					break;

				case 'mp3':
					return '<audio controls src="' . $ruta .'"></audio>';
					break;

				case 'mp4':
					return '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
					break;
				
				default:
					# code...
					break;
			}

		}
	}

 ?>