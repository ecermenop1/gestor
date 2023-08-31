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
				<td>ID DEPARTAMENTO</td>
				<td>CODIGO_DEPARTAMENTO</td>
				<td>NOMBRE_DEPARTAMENTO</td>
				<td>PAIS</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT D.DEPARTAMENTO_ID, D.CODIGO_DEPARTAMENTO, D.DEPARTAMENTO_NOMBRE,
			P.NOMBRE_PAIS
			FROM TB_DEPARTAMENTO AS D, TB_PAIS AS P
			WHERE D.PAIS_ID=P.PAIS_ID";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['DEPARTAMENTO_ID']; ?></td>
					<td><?php echo $mostrar['CODIGO_DEPARTAMENTO']; ?></td>
					<td><?php echo $mostrar['DEPARTAMENTO_NOMBRE']; ?></td>
					<td><?php echo $mostrar['NOMBRE_PAIS']; ?></td>
					<td>
						<span class="btn btn-warning btn-sm" onclick="obtenerDatosDepartamento('<?php echo $mostrar['DEPARTAMENTO_ID'] ?>')" data-toggle="modal" data-target="#modalAgregaDepartamento">
							<span class="fas fa-edit"></span>
						</span>
					</td>

					<td>
						<span class="btn btn-danger btn-sm" onclick="eliminarDepartameto('<?php echo $mostrar['DEPARTAMENTO_ID'] ?>')">
							<span class="fas fa-trash-alt"></span>
						</span>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable({
			scrollY: 'auto',
			paging: true
		});
	});
</script>