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
				<th>ID MUNICIPIO</th>
				<th>CODIGO_MUNICIPIO</th>
				<th>MUNICIPIO</th>
				<th>DEPARTAMENTO</th>
					<th>EDITAR</th>
					<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
					<th>ELIMINAR</th>
				<?php } ?>

			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT M.MUNICIPIO_ID, M.CODIGOMUNICIPIO, M.MUNICIPIO_NOMBRE, M.DEPARTAMENTO_ID,
			DP.DEPARTAMENTO_NOMBRE
			FROM TB_MUNICIPIO AS M, TB_DEPARTAMENTO AS DP
			WHERE M.DEPARTAMENTO_ID=DP.DEPARTAMENTO_ID";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['MUNICIPIO_ID']; ?></td>
					<td><?php echo $mostrar['CODIGOMUNICIPIO']; ?></td>
					<td><?php echo $mostrar['MUNICIPIO_NOMBRE']; ?></td>
					<td><?php echo $mostrar['DEPARTAMENTO_NOMBRE']; ?></td>

					
						<td>
							<span class="btn btn-warning btn-sm" onclick="obtenerDatosMunicipio('<?php echo $mostrar['MUNICIPIO_ID'] ?>')" data-toggle="modal" data-target="#modalAgregaMuncipio">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<td>
						<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
							<span class="btn btn-danger btn-sm" onclick="eliminarMunicipio('<?php echo $mostrar['MUNICIPIO_ID'] ?>')">
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