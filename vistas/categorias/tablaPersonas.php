<?php
session_start();
require_once "../../clases/Conexion.php";
$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();

?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaCategoriasDataTable">
		<thead>
			<tr style="text-align: center;">
				<th>CASO </th>
				<th>OFICIO </th>
				<th>NOMBRE1 </th>
				<th>NOMBRE2</th>
				<th>NOMBRE3</th>
				<th>ID </th>
				<th>APELLIDO1</th>
				<th>APELLIDO2</th>
				<th>APELLIDO3</th>
				<th>FECHA_NACIMIENTO</th>
				<th>LUGAR_NACIMIENTO</th>
				<th>TIPO_DOCUMENTO </th>
				<th>NUMERO_DOCUMENTO</th>
				<th>GENERO</th>
				<th>DIRECCION </th>
				<th>NOMBRE_PADRE</th>
				<th>NOMBRE_MADRE</th>
				<th>INUMERO_CELULAR </th>
				<th>ALIAS</th>
				<th>EDAD</th>
				
					<th>DESCARGAR</th>
					<th>VISUALIZAR</th>
					<th>EDITAR</th>
					<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
					<td>ELIMINAR</td>
				<?php } ?>


			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT P.*,TIMESTAMPDIFF(YEAR, P.fecha_nacimiento, CURDATE()) AS 'EDAD' FROM TB_PROPIETARIO P, TB_CASO C
			WHERE P.NUMERO_CASO=C.NUMERO_CASO AND C.ESTADO='ACTIVO'";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['NUMERO_CASO']; ?></td>
					<td><?php echo $mostrar['NUMERO_OFICIO']; ?></td>
					<td><?php echo $mostrar['NOMBRE1']; ?></td>
					<td><?php echo $mostrar['NOMBRE2']; ?></td>
					<td><?php echo $mostrar['NOMBRE3']; ?></td>
					<td><?php echo $mostrar['APELLIDO1']; ?></td>
					<td><?php echo $mostrar['APELLIDO2']; ?></td>
					<td><?php echo $mostrar['APELLIDO3']; ?></td>
					<td><?php echo $mostrar['FECHA_NACIMIENTO']; ?></td>
					<td><?php echo $mostrar['LUGAR_NACIMIENTO']; ?></td>
					<td><?php echo $mostrar['TIPO_DOCUMENTO']; ?></td>
					<td><?php echo $mostrar['NUMERO_DOCUMENTO']; ?></td>
					<td><?php echo $mostrar['GENERO']; ?></td>
					<td><?php echo $mostrar['NACIONALIDAD']; ?></td>
					<td><?php echo $mostrar['DIRECCION']; ?></td>
					<td><?php echo $mostrar['NOMBRE_PADRE']; ?></td>
					<td><?php echo $mostrar['NOMBRE_MADRE']; ?></td>
					<td><?php echo $mostrar['NUMERO_CELULAR']; ?></td>
					<td><?php echo $mostrar['ALIAS']; ?></td>
					<td><?php echo $mostrar['EDAD']; ?></td>
				
						<td>
							<a href="<?php echo $mostrar['RUTA_FOTO'] ?>" download="<?php echo "IPHONE.png" ?>" class="btn btn-success btn-sm">
								<span class="fas fa-download"></span>
							</a>
						</td>
					
						<td>
							<span class="btn btn-primary btn-sm"  onclick="visualizarpersona('<?php echo $mostrar['PROPIETARIO_ID'] ?>')" data-toggle="modal" data-target="#modalAgregaPersona">
								<span class="fas fa-eye"></span>
								
							</span>
						</td>
						<td>
							<span class="btn btn-warning btn-sm" onclick="obtenerDatosPersona('<?php echo $mostrar['PROPIETARIO_ID'] ?>')" data-toggle="modal" data-target="#modalAgregaPersona">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
						<td>
							<span class="btn btn-danger btn-sm" onclick="eliminarPersona('<?php echo $mostrar['PROPIETARIO_ID'] ?>')">
								<span class="fas fa-trash-alt"></span>
							</span>
						</td>

				</tr>
		<?php
					}
				}
		?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	function obtenerImagen(rutaimagen) {
		var imagenHTML = "<img  src='" + rutaimagen + "' width='80%'>";

		$("#imagenobtenida").html(imagenHTML);


		

	};









	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable();
	});

</script>