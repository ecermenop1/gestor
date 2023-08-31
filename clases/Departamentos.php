<?php 
		
	require_once "Conexion.php";
	class Departamentos extends Conectar {
		public function agregarDepartamentos($datos) {
			
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO tb_departamento (CODIGO_DEPARTAMENTO, DEPARTAMENTO_NOMBRE, PAIS_ID) 
							VALUES (?,?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("isi", $datos['CodigoDepartamento'], 
									 $datos['NombreDepartamento'],
                                     $datos['Pais']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}
		
		public function ActualizarDepartamento($datos) {
			$conexion = Conectar::conexion();
	
			$sql = "UPDATE TB_DEPARTAMENTO
					SET    
												CODIGO_DEPARTAMENTO=?,
												DEPARTAMENTO_NOMBRE =?, 
												PAIS_ID =?
												WHERE DEPARTAMENTO_ID =?";
											   $query = $conexion->prepare($sql);
												$query->bind_param("ssii", 
												$datos['CodigoDepartamento'],
												$datos['NombreDepartamento'],
												$datos['Pais'],
												$datos['IdDepartamento'],

											
												);
			$respuesta = $query->execute();
			$query->close();
			
			return $respuesta;
		}
		public function obtenerDepartamento($idDepartamento) {
			$conexion = Conectar::conexion();
	
			$sql = "SELECT *
					FROM TB_DEPARTAMENTO
					WHERE DEPARTAMENTO_ID ='$idDepartamento'";
			$result = mysqli_query($conexion, $sql);
	
			$DIRECCION = mysqli_fetch_array($result);
	
			return $DIRECCION;
		}

		public function eliminarDepartamento($idDepartamento) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM TB_DEPARTAMENTO 
					WHERE DEPARTAMENTO_ID = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idDepartamento);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
	

	}

	



 ?>