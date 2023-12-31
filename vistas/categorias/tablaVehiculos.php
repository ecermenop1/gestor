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
				<th>CASO</th>
				<th> OFICIO</th>
				<th>PLACA </th>
				<th>TIPO VEHICULO</th>
				<th>MARCA VEHICULO</th>
				<th>LINEA VEHICULO </th>
				<th>MODELO</th>
				<th>COLOR</th>
				
					<th>DESCARGAR</th>
					<th>VISUALIZAR</th>
					<th>EDITAR</th>
					<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
					<th>ELIMINAR</th>
				<?php } ?>

			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT V.* FROM TB_VEHICULO AS V,TB_CASO AS C WHERE V.NUMERO_CASO=C.NUMERO_CASO 
			AND C.ESTADO='ACTIVO'";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['NUMERO_CASO']; ?></td>
					<td><?php echo $mostrar['NUMERO_OFICIO']; ?></td>
					<td><?php echo $mostrar['PLACA']; ?></td>
					<td><?php echo $mostrar['TIPO_VEHICULO']; ?></td>
					<td><?php echo $mostrar['MARCA_VEHICULO']; ?></td>
					<td><?php echo $mostrar['LINEA_VEHICULO']; ?></td>
					<td><?php echo $mostrar['MODELO_VEHICULO']; ?></td>
					<td><?php echo $mostrar['COLOR_VEHICULO']; ?></td>
					
						<td>
							<a href="<?php echo $mostrar['FOTO_VEHICULO'] ?>" download="<?php echo date('d-m-y h:i:s') ?>" class="btn btn-success btn-sm">
								<span class="fas fa-download"></span>
							</a>
						</td>
						<td>
							<span class="btn btn-primary btn-sm"onclick="visualizarDatosVehiculos('<?php echo $mostrar['ID_VEHICULO'] ?>')" data-toggle="modal" data-target="#modalAgregaVehiculo">
								<span class="fas fa-eye"></span>
						</td>
						<td>
							<span class="btn btn-warning btn-sm" onclick="obtenerDatosVehiculos('<?php echo $mostrar['ID_VEHICULO'] ?>')" data-toggle="modal" data-target="#modalAgregaVehiculo">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
						<td>
							<span class="btn btn-danger btn-sm" onclick="eliminarVehiculo('<?php echo $mostrar['ID_VEHICULO'] ?>')">
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
	



	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>