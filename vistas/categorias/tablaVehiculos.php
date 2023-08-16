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
              <td>ID </td>
				<td>Placa </td>
				<td>Tipo Vehiculo</td>
				<td>Marca Vehiculo</td>
				<td>Linea Vehiculo </td>
				<td>Modelo</td>
				<td>Color</td>
				<td>Propietario</td>
				<th>Descargar</th>
				<th>Visualizar</th>
				
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT V.*, P.NOMBRE1,P.NOMBRE2,P.APELLIDO1,P.APELLIDO2 FROM TB_VEHICULO V INNER JOIN TB_PROPIETARIO P ON V.PROPIETARIO_ID=P.PROPIETARIO_ID";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['ID_VEHICULO']; ?></td>
                    <td><?php echo $mostrar['PLACA']; ?></td>
					<td><?php echo $mostrar['TIPO_VEHICULO']; ?></td>
					<td><?php echo $mostrar['MARCA_VEHICULO']; ?></td>
					<td><?php echo $mostrar['LINEA_VEHICULO']; ?></td>
					<td><?php echo $mostrar['MODELO_VEHICULO']; ?></td>
					<td><?php echo $mostrar['COLOR_VEHICULO']; ?></td>
					<td><?php echo $mostrar['NOMBRE1'] . " " . $mostrar['NOMBRE2'] . " " . $mostrar['APELLIDO1'] . "" . $mostrar['APELLIDO2']; ?></td>
					<td>
						<a href="<?php echo $mostrar['FOTO_VEHICULO'] ?>" download="<?php echo "IPHONE.png" ?>" class="btn btn-success btn-sm">
							<span class="fas fa-download"></span>
						</a>
					</td>
					<td>
						<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerImagen('<?php echo  $mostrar['FOTO_VEHICULO'] ?>')">
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