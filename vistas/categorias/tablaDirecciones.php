
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
				<td>CALLE</td>
				<td>AVENIDA</td>
				<td>NUMERO CASA</td>
                <td>LUGAR POBLADO</td>
                <td>ZONA</td>
                <td>MUNICIPIO</td>
                <td>DEPARTAMENTO</td>
                <td>PAIS</td>
                <td>LATITUD</td>
                <td>LONGITUD</td>
                <td>OBSERVACIONES</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT D.CALLE,AVENIDA,D.NUMERO_CASA,D.ZONA ,LP.LUGARPOBLADO_NOMBRE,
            M.MUNICIPIO_NOMBRE, PAIS.NOMBRE_PAIS, DP.DEPARTAMENTO_NOMBRE,
            D.LATITUD, D.LONGITUD,D.OBSERVACIONES
             FROM TB_DIRECCIONES AS D INNER JOIN  TB_LUGARESPOBLADOS AS LP 
            ON D.LUGARPOBLADO_ID=LP.LUGARPOBLADO_ID
            INNER JOIN TB_MUNICIPIO AS M
            ON  LP.MUNICIPIO_ID=M.MUNICIPIO_ID
            INNER JOIN  TB_PAIS AS PAIS
            ON D.PAIS_ID=PAIS.PAIS_ID
            LEFT JOIN TB_DEPARTAMENTO AS DP
            ON D.DEPARTAMENTO_ID=DP.DEPARTAMENTO_ID   " ;  
			$result = mysqli_query($conexion, $sql);
          

			while($mostrar = mysqli_fetch_array($result)){ 
			
		?>
			<tr style="text-align: center;">
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