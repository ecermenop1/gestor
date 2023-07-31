<?php 
session_start();

if (isset($_SESSION['usuario'])) {
	include "header.php";
	?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="text-align: center;">
				<div class="jumbotron">
					<h1 class="display-4">Sistema Control de paradas de vehiculos </h1>
					<p class="lead">Velando siempre por el bienestar de la población</p>
					<hr class="my-4">
					<p><img src="../img/Logo PNC.png" class="img-thumbnail" width="300px" /></p>
					<p class="lead">
						<a class="btn btn-primary btn-lg" href="categorias.php" role="button">Bienvenido</a>
					</p>
				</div>


			</div>
		</div>
	</div>

	<?php
	include "footer.php"; 
} else {
	header("location:../index.php");
}
?>