<?php 
	session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
?>


	<div class="container">
		<h1 style="text-align: center;">Registro de usuario</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" 
				autocomplete="off">
					<label>Nombre personal</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" >
					<label>Email o correo</label>
					<input type="email" name="correo" id="correo" class="form-control" required="">
					<label>Nombre de usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">
					<label>Rol</label>
					<select id="RolUsuario" name="RolUsuario" class="form-control" id="specificSizeSelect">
                            <option selected value="">Seleccionar Pais</option>
                             <option value="USUARIOESTANDAR">USUARIO ESTANDAR</option>
							 <option value="ADMINISTRADOR">SUPERUSUARIO</option>
                        </select>
					<label>Password o contraseña</label>
					<input type="password" name="password" id="password" class="form-control" required="">
					<br>
					<div class="row">
						<div class="col-sm-6 text-left" >
							<button class="btn btn-primary">Registrar</button>
						</div>
						
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script src="../librerias/jquery-3.4.1.min.js"></script>
	<script src="../librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="../librerias/sweetalert.min.js"></script>

	<script type="text/javascript">


		$(function() {
		    var fechaA = new Date();
		    var yyyy = fechaA.getFullYear();

		    $("#fechaNacimiento").datepicker({
		        changeMonth: true,
		        changeYear: true,
		        yearRange: '1900:' + yyyy,
		        dateFormat: "dd-mm-yy"
		    });
		});


		function agregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "../procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){

					respuesta = respuesta.trim();
alert(respuesta)
					if (respuesta == 1) {
						$("#frmRegistro")[0].reset();
						swal(":D", "Agregado con exito!", "success");
					} else if(respuesta == 2){
						swal("Este usuario ya existe, por favor escribe otro !!!");
					} else {
						swal(":(", "Fallo al agregar!", "Error");
					}
				}
			});

			return false;
		}
	</script>

<?php
    include "footer.php";
    ?>
<?php
		include "footer.php"; 
		
	} else {
		header("location:../index.php");
	}
?>