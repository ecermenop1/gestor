<?php
session_start();
require_once "../../clases/Conexion.php";
$conexion = new Conectar();
$conexion = $conexion->conexion();

?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaCategoriasDataTable">
		<thead>
			<tr style="text-align: center;">
				<th>NUMERO CASO</th>
				<th>NUMERO OFICIO</th>
				<th>CALLE</th>
				<th>AVENIDA</th>
				<th>NUMERO CASA</th>
				<th>LUGAR POBLADO</th>
				<th>ZONA</th>
				<th>MUNICIPIO</th>
				<th>DEPARTAMENTO</th>
				<th>PAIS</th>
				<th>LATITUD</th>
				<th>LONGITUD</th>
				<th>OBSERVACIONES</th>
				<th>VISUALIZAR</th>
					<th>EDITAR</th>
					<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
					<th>ELIMINAR</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT D.DIRECCION_ID, D.NUMERO_CASO,D.NUMERO_OFICIO,D.CALLE,AVENIDA,D.NUMERO_CASA,D.ZONA ,LP.LUGARPOBLADO_NOMBRE,
            M.MUNICIPIO_NOMBRE, PAIS.NOMBRE_PAIS, DP.DEPARTAMENTO_NOMBRE,
            D.LATITUD, D.LONGITUD,D.OBSERVACIONES
             FROM TB_DIRECCIONES AS D INNER JOIN  TB_LUGARESPOBLADOS AS LP 
            ON D.LUGARPOBLADO_ID=LP.LUGARPOBLADO_ID
            INNER JOIN TB_MUNICIPIO AS M
            ON  LP.MUNICIPIO_ID=M.MUNICIPIO_ID
            INNER JOIN  TB_PAIS AS PAIS
            ON D.PAIS_ID=PAIS.PAIS_ID
            INNER JOIN TB_DEPARTAMENTO AS DP
            ON D.DEPARTAMENTO_ID=DP.DEPARTAMENTO_ID 
			INNER JOIN TB_CASO C
			ON D.NUMERO_CASO=C.NUMERO_CASO 
			AND C.ESTADO='ACTIVO'";
			$result = mysqli_query($conexion, $sql);


			while ($mostrar = mysqli_fetch_array($result)) {

			?>
				<tr style="text-align: center;">
					<td><?php echo $mostrar['NUMERO_CASO']; ?></td>
					<td><?php echo $mostrar['NUMERO_OFICIO']; ?></td>
					<td><?php echo $mostrar['CALLE']; ?></td>
					<td><?php echo $mostrar['AVENIDA']; ?></td>
					<td><?php echo $mostrar['NUMERO_CASA']; ?></td>
					<td><?php echo $mostrar['LUGARPOBLADO_NOMBRE']; ?></td>
					<td><?php echo $mostrar['ZONA']; ?></td>
					<td><?php echo $mostrar['MUNICIPIO_NOMBRE']; ?></td>
					<td><?php echo $mostrar['DEPARTAMENTO_NOMBRE']; ?></td>
					<td><?php echo $mostrar['NOMBRE_PAIS']; ?></td>
					<td><?php echo $mostrar['LATITUD']; ?></td>
					<td><?php echo $mostrar['LONGITUD']; ?></td>
					<td><?php echo $mostrar['OBSERVACIONES']; ?></td>
					
					<td>
							<span class="btn btn-primary btn-sm"onclick="VisualizarDatosDireccion('<?php echo $mostrar['DIRECCION_ID'] ?>')" data-toggle="modal" data-target="#modalAgregarDirecciones">
								<span class="fas fa-eye"></span>
						</td>
						<td>
							<span class="btn btn-warning btn-sm" onclick="obtenerDatosDireccion('<?php echo $mostrar['DIRECCION_ID'] ?>')" data-toggle="modal" data-target="#modalAgregarDirecciones">
								<span class="fas fa-edit"></span>
							</span>
						</td>
						<?php if ($_SESSION['RolUsuario'] == "ADMINISTRADOR") { ?>
						<td>
							<span class="btn btn-danger btn-sm" onclick="eliminarDireccion('<?php echo $mostrar['DIRECCION_ID'] ?>')">
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