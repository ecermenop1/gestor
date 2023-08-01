
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
				<td>ID MUNICIPIO</td>
				<td>CODIGO_MUNICIPIO</td>
				<td>MUNICIPIO</td>

			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT MUNICIPIO_ID, CODIGOMUNICIPIO, MUNICIPIO_NOMBRE FROM TB_MUNICIPIO";  
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				//$paisid = $mostrar['PAIS_ID'];
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['MUNICIPIO_ID']; ?></td>
				<td><?php echo $mostrar['CODIGOMUNICIPIO']; ?></td>
				<td><?php echo $mostrar['MUNICIPIO_NOMBRE']; ?></td>
				
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