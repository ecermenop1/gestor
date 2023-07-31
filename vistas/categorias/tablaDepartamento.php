
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
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT DEPARTAMENTO_ID, CODIGO_DEPARTAMENTO, DEPARTAMENTO_NOMBRE FROM TB_DEPARTAMENTO";  
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				//$paisid = $mostrar['PAIS_ID'];
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['DEPARTAMENTO_ID']; ?></td>
				<td><?php echo $mostrar['CODIGO_DEPARTAMENTO']; ?></td>
				<td><?php echo $mostrar['DEPARTAMENTO_NOMBRE']; ?></td>
				
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