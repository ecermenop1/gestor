<?php 
	
	require_once "Conexion.php";

	class Usuario extends Conectar{

		public function agregarUsuario($datos) {
			$conexion = Conectar::conexion();

			if (self::buscarUsuarioRepetido($datos['email'])) {
				return 2;
			} else {
				$sql = "INSERT INTO t_usuarios (nombre,
											fechaNacimiento,
											email,
											usuario,
											ROL,
											password) 
							VALUES (?, ?, ?, ?, ?,?)";
				$query = $conexion->prepare($sql);
				$query->bind_param('ssssss', $datos['nombre'],
											$datos['fechaNacimiento'],
											$datos['email'],
											$datos['usuario'],
											$datos['RolUsuario'],
											$datos['password']);
				$exito = $query->execute();
				$query->close();
				return $exito;
			}
		}

		public function buscarUsuarioRepetido($Email) {
			$conexion = Conectar::conexion();

		    	$sql = "SELECT email 
				         FROM t_usuarios 
				         WHERE email = '$Email'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos != NULL) {
				if ($datos['usuario'] != "" || $datos['usuario'] == $Email) {
					return 1;
				} else {
					return 0;
				}
			} else {
				return 0;
			}
		}

		public function login($Email, $password) {
			$conexion = Conectar::conexion();

			$sql = "SELECT count(*) as existeUsuario 
					FROM t_usuarios 
					WHERE email= '$Email' 
						AND password = '$password'";
			$result = mysqli_query($conexion, $sql);

			$respuesta = mysqli_fetch_array($result)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $Email;

				$sql = "SELECT id_usuario, ROL
						FROM t_usuarios 
						WHERE email = '$Email' 
						AND password = '$password'";
				$result = mysqli_query($conexion ,$sql);
				$datosusuario = mysqli_fetch_array($result);
		

				$_SESSION['idUsuario'] = $datosusuario['id_usuario'];
				$_SESSION['RolUsuario'] = $datosusuario['ROL'];

				return 1;
			} else {
				return 0;
			}
		}
	}
	
 ?>
