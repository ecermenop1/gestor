<?php 
session_start();
if(isset($_SESSION['usuario'])){

	
	include "header.php"; 
	?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">OFICIOS</h1>
			<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
				<span class="fas fa-plus-circle"></span> OFICIO
			</span>
			<hr>
			<div id="tablaGestorArchivos"></div>
		</div>
	</div>

	<!--Modal para agregar archivos-->



	<!-- Modal -->
	<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">SUBIR ARCHIVOS</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmArchivos" enctype="multipart/form-data">
						<label>NÚMERO DE CASO</label>
						<input type="NUMBRE" name="numerocaso" id="numerocaso" class="form-control" multiple="multiple">
						<label>NÚMERO DE OFICIO</label>
						<input type="NUMBRE" name="NumeroOficio" id="NumeroOficio" class="form-control" multiple="multiple">
						<label>ASUNTO</label>
						<input type="input" name="Asunto" id="Asunto" class="form-control" multiple="multiple">
						<label>FECHA OFICIO</label>
						<input type="date" name="FechaOficio" id="FechaOficio" class="form-control" multiple="multiple">
						<label>Selecciona archivos</label>
						<input type="file" name="archivos[]" id="archivos" class="form-control" multiple="multiple">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
				</div>
			</div>
		</div>
	</div>



<!-- Modal -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


	<?php include "footer.php"; ?>

	<script src="../js/gestor.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
			//$('#categoriasLoad').load("categorias/selectCategorias.php");

			$('#btnGuardarArchivos').click(function(){
				agregarArchivosGestor();
			});

		});
	</script>

	<?php 
} else {
	header("location:../index.php");
}
?>