
<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	$c = new Conectar();
	$conexion = $c->conexion();
	$idUsuario = $_SESSION['idUsuario'];
	$sql = "SELECT 
					id_archivo as idArchivo,
				nombre as nombreArchivo,
				tipo as tipoArchivo,
					ruta as rutaArchivo,
					fecha as fecha,
					NUMERO_CASO,
					NUMERO_OFICIO,
					ASUNTO,
					FECHA_OFICIO
					
				FROM
					t_archivos ";
	$result = mysqli_query($conexion, $sql);

 ?>




<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-dark" id="tablaGestorDataTable">
				<thead>
					<tr>
						<th>Numero Caso</th>
						<th>Numero Oficio</th>
						<th>Numero Asunto</th>
						<th>Fecha Oficio</th>
						
						<th>Archivo</th>
						<th>Descargar</th>
						<th>Visualizar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				<?php 

					/*
						Arreglo de extensiones validas
					*/

					$extensionesValidas = array('png', 'jpg','jpeg', 'pdf', 'mp3', 'mp4');

					while($mostrar = mysqli_fetch_array($result)) { 

						$rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
						$nombreArchivo = $mostrar['nombreArchivo'];
						$idArchivo = $mostrar['idArchivo'];
						$NUMEROCASO = $mostrar['NUMERO_CASO'];
						
				 ?>
					<tr>
					
					
					<td><?php echo $NUMEROCASO;?></td>
					<td><?php echo $mostrar['NUMERO_OFICIO'];?></td>
					<td><?php echo $mostrar['ASUNTO'];?></td>
					<td><?php echo $mostrar['FECHA_OFICIO'];?></td>
					
						<td><?php echo $mostrar['nombreArchivo']; ?></td>
					
						<td>
							
						
							<a href="<?php echo $rutaDescarga; ?>" 
								download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
								<span class="fas fa-download"></span>
							</a>
						</td>
						<td>
							<?php 
								for ($i=0; $i < count($extensionesValidas); $i++) { 
									if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
							?>
									<span class="btn btn-primary btn-sm" 
										  data-toggle="modal" 
										  data-target="#visualizarArchivo" 
										  onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
									<span class="fas fa-eye"></span>
							</span>
							<?php
									}
								}
							 ?>
						</td>
						<td>
							<span class="btn btn-danger btn-sm" 
									onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
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
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorDataTable').DataTable();
	});
</script>