
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
				<td>ID</td>
				<td>Codigo</td>
                <td>Codigo</td>
				<td>Nombre</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT PAIS_ID,
						   CODIGO_PAIS, 
						   NOMBRE_PAIS,
					FROM tb_pais"; 
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$paisid = $mostrar['PAIS_ID'];
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['PAIS_ID']; ?></td>
				<td><?php echo $mostrar['CODIGO_PAIS']; ?></td>
				<td><?php echo $mostrar['NOMBRE_PAIS']; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')"
						data-toggle="modal" data-target="#modalActualizarCategoria">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
							onclick="eliminarCategorias('<?php echo $idCategoria ?>')" >
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
	$(document).ready(function(){
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>