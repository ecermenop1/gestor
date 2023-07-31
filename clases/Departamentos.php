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
                                     $datos['Departamento']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}
      

	}

 ?>