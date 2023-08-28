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

		public function obtenerPais($idPais) {
			$conexion = Conectar::conexion();

			$sql = "SELECT *
					FROM TB_PAIS
					WHERE PAIS_id = '$idPais'";
			$result = mysqli_query($conexion, $sql);

			$PAIS = mysqli_fetch_array($result);

			
			return $PAIS;
		}

		public function ActualizarPais($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE TB_PAIS
					SET CODIGO_PAIS = ?,
					NOMBRE_PAIS=?
					WHERE PAIS_ID = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("ssi", $datos['CodigoPais'],
									  $datos['NombrePais'],
									  $datos['IdPais']);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
	}

 ?>