
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
				<td>ID_PAIS</td>
				<td>CODIGO_PAIS</td>
				<td>NOMBRE_PAIS</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT PAIS_ID, CODIGO_PAIS, NOMBRE_PAIS FROM tb_pais";  
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$paisid = $mostrar['PAIS_ID'];
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['PAIS_ID']; ?></td>
				<td><?php echo $mostrar['CODIGO_PAIS']; ?></td>
				<td><?php echo $mostrar['NOMBRE_PAIS']; ?></td>
				
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