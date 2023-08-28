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
				<td>NOMBRE</td>
				<td>TIPO lUGAR POBLADO</td>
				<td>RURALIDADES</td>
				<td>LUGARPOBLADO_ZONAYCALLE</td>

			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT LUGARPOBLADO_ID, 
                           LUGARPOBLADO_NOMBRE, 
                           TIPO_LUGARPOBLADO,
                           RURALIDADES_LUGARPOBLADO, 
                           LUGARPOBLADO_ZONAYCALLE 
                           FROM TB_LUGARESPOBLADOS";
			$result = mysqli_query($conexion, $sql);

			while ($mostrar = mysqli_fetch_array($result)) {
				//$paisid = $mostrar['PAIS_ID'];
			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['LUGARPOBLADO_ID']; ?></td>
					<td><?php echo $mostrar['LUGARPOBLADO_NOMBRE']; ?></td>
					<td><?php echo $mostrar['TIPO_LUGARPOBLADO']; ?></td>
					<td><?php echo $mostrar['RURALIDADES_LUGARPOBLADO']; ?></td>
					<td><?php echo $mostrar['LUGARPOBLADO_ZONAYCALLE']; ?></td>
					<td>
						<span class="btn btn-warning btn-sm" onclick="obtenerDatosLugarPoblado('<?php echo $mostrar['LUGARPOBLADO_ID'] ?>')" data-toggle="modal" data-target="#modalAgregaLugarPoblado">
							<span class="fas fa-edit"></span>
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
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>