
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
				<td>NÚMERO MEDIDOR</td>
				<td>EMPRESA ELÉCTRICA</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT MEDIDOR_ID, 
                           MEDIDOR_NUMERO , 
                           EMPRESAELECTRICA FROM TB_MEDIDORELECTRONICO";  
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				//$paisid = $mostrar['PAIS_ID'];
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['MEDIDOR_ID']; ?></td>
				<td><?php echo $mostrar['MEDIDOR_NUMERO']; ?></td>
				<td><?php echo $mostrar['EMPRESAELECTRICA']; ?></td> 
				
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