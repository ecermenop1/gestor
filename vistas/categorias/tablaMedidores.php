
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
				<td>NUMERO_CASO </td>
				<td>NÚMERO MEDIDOR</td>
				<td>EMPRESA ELÉCTRICA</td>
				<td>EDITAR<td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT ME.NUMERO_CASO, ME.MEDIDOR_ID, 
                           ME.MEDIDOR_NUMERO , 
                           ME.EMPRESAELECTRICA FROM TB_MEDIDORELECTRONICO AS ME, TB_CASO AS C
						   WHERE ME.NUMERO_CASO=C.NUMERO_CASO AND C.ESTADO='ACTIVO'";  
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				//$paisid = $mostrar['PAIS_ID'];
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['NUMERO_CASO']; ?></td>
				<td><?php echo $mostrar['MEDIDOR_NUMERO']; ?></td>
				<td><?php echo $mostrar['EMPRESAELECTRICA']; ?></td> 
				<td>
						<span class="btn btn-warning btn-sm" onclick="obtenerDatosMedidor('<?php echo $mostrar['MEDIDOR_ID'] ?>')" data-toggle="modal" data-target="#modalAgregaMedidor">
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
	$(document).ready(function(){
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>