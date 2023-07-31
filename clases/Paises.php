<?php 
		
	require_once "Conexion.php";
	class Paises extends Conectar {
		public function agregarPais($datos) {
			
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO tb_pais (CODIGO_PAIS, NOMBRE_PAIS) 
							VALUES (?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("is", $datos['CodigoPais'], 
									 $datos['NombrePais']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminarCategoria($idCategoria) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM t_categorias 
					WHERE id_categoria = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idCategoria);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function obtenerCategoria($idCategoria) {
			$conexion = Conectar::conexion();

			$sql = "SELECT id_categoria, 
							nombre 
					FROM t_categorias 
					WHERE id_categoria = '$idCategoria'";
			$result = mysqli_query($conexion, $sql);

			$categoria = mysqli_fetch_array($result);

			$datos = array(
					"idCategoria" => $categoria['id_categoria'],
					"nombreCategoria" => $categoria['nombre']
						);
			return $datos;
		}

		public function actualizarCategoria($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE t_categorias 
					SET nombre = ? 
					WHERE id_categoria = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("si", $datos['categoria'],
									 $datos['idCategoria']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
	}

 ?>