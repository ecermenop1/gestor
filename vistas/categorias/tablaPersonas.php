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
				<td>NOMBRE1 </td>
				<td>NOMBRE2</td>
				<td>NOMBRE3</td>
				<td>ID </td>
				<td>APELLIDO1</td>
				<td>APELLIDO2</td>
				<td>APELLIDO3</td>
				<td>FECHA_NACIMIENTO</td>
				<td>LUGAR_NACIMIENTO</td>
				<td>TIPO_DOCUMENTO </td>
				<td>NUMERO_DOCUMENTO</td>
				<td>GENERO</td>
				<td>DIRECCION </td>
				<td>NOMBRE_PADRE</td>
				<td>NOMBRE_MADRE</td>
				<td>INUMERO_CELULAR </td>
				<td>ALIAS</td>
				<th>Descargar</th>
				<th>Visualizar</th>
				
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT * FROM TB_PROPIETARIO";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
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
					<td>
						<a href="<?php echo $mostrar['RUTA_FOTO'] ?>" download="<?php echo "IPHONE.png" ?>" class="btn btn-success btn-sm">
							<span class="fas fa-download"></span>
						</a>
					</td>
					<td>
						<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerImagen('<?php echo  $mostrar['RUTA_FOTO'] ?>')">
							<span class="fas fa-eye"></span>
					</td>

				</tr>
			<?php
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