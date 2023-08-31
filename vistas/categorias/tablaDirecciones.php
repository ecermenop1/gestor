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
				<td>NUMERO CASO</td>
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
				<td>EDITAR</td>
				<td>ELIMINAR</td>
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT D.DIRECCION_ID, D.NUMERO_CASO,D.CALLE,AVENIDA,D.NUMERO_CASA,D.ZONA ,LP.LUGARPOBLADO_NOMBRE,
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
						<span class="btn btn-warning btn-sm" onclick="obtenerDatosDireccion('<?php echo $mostrar['DIRECCION_ID'] ?>')" data-toggle="modal" data-target="#modalAgregarDirecciones">
							<span class="fas fa-edit"></span>
						</span>
					</td>
					<td>
						<span class="btn btn-danger btn-sm" onclick="eliminarDireccion('<?php echo $mostrar['DIRECCION_ID'] ?>')">
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
	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable({
			scrollY: '100',
			paging: true
		});
	});


	var table = $('#tblinventario').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },

    });
</script>