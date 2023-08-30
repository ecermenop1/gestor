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
              <td>Número Caso </td>
				<td>Placa </td>
				<td>Tipo Vehiculo</td>
				<td>Marca Vehiculo</td>
				<td>Linea Vehiculo </td>
				<td>Modelo</td>
				<td>Color</td>
				<th>Descargar</th>
				<th>Visualizar</th>
				<th>Editar</th>
				
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
                    <td><?php echo $mostrar['PLACA']; ?></td>
					<td><?php echo $mostrar['TIPO_VEHICULO']; ?></td>
					<td><?php echo $mostrar['MARCA_VEHICULO']; ?></td>
					<td><?php echo $mostrar['LINEA_VEHICULO']; ?></td>
					<td><?php echo $mostrar['MODELO_VEHICULO']; ?></td>
					<td><?php echo $mostrar['COLOR_VEHICULO']; ?></td>
					<td>
						<a href="<?php echo $mostrar['FOTO_VEHICULO'] ?>" download="<?php echo date ('d-m-y h:i:s') ?>" class="btn btn-success btn-sm">
							<span class="fas fa-download"></span>
						</a>
					</td>
					<td>
						<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerImagen('<?php echo  $mostrar['FOTO_VEHICULO'] ?>')">
							<span class="fas fa-eye"></span>
					</td>
					<td>
						<span class="btn btn-warning btn-sm" onclick="obtenerDatosVehiculos('<?php echo $mostrar['ID_VEHICULO'] ?>')" data-toggle="modal" data-target="#modalAgregaVehiculo">
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
	function obtenerImagen(rutaimagen) {
		var imagenHTML = "<img  src='" + rutaimagen + "' width='80%'>";

		$("#imagenobtenida").html(imagenHTML);

	};



	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>