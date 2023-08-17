
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
				<td>NUMERO CASO</td>
				<td>PROPIETARIO</td>
				<td>ORGANIZACION</td>
                <td>FECHA INICIO</td>
                <td>FECHA CIERRE</td>
                <td> ESTADO</td>
				<td> EDITAR</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT C.CASO_ID,C.NUMERO_CASO,P.NOMBRE1,P.NOMBRE2,P.APELLIDO1,P.APELLIDO2,
            C.ORGANIZACION,C.FECHA_INICIO_CASO,C.FECHA_CIERRE_CASO,C.ESTADO
             FROM TB_CASO C, TB_PROPIETARIO P
            WHERE C.PROPIETARIO_ID=P.PROPIETARIO_ID ";  
			$result = mysqli_query($conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
		?>
			<tr style="text-align: center;">
            <td><?php echo $mostrar['NUMERO_CASO']; ?></td>
				<td><?php echo $mostrar['NOMBRE1'] . " " . $mostrar['NOMBRE2'] . " " . $mostrar['APELLIDO1'] . "" . $mostrar['APELLIDO2']; ?></td>
                <td><?php echo $mostrar['ORGANIZACION']; ?></td>
				<td><?php echo $mostrar['FECHA_INICIO_CASO']; ?></td>
                <td><?php echo $mostrar['FECHA_CIERRE_CASO']; ?></td>
                <td><?php echo $mostrar['ESTADO']; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" 
						onclick="obtenerDatosCaso('<?php echo $mostrar['CASO_ID'] ?>')"
						data-toggle="modal" data-target="#modalAgregaCaso">
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