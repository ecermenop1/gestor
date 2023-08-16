function AddVehiculo() {

	
	if ($('#Placa').val() == "" || $('#TipoVehiculo').val() == "" ||
		$('#MarcaVehiculo').val() == "" || $('#LineaVehiculo').val() == "" ||
		$('#Modelo').val() == "" || $('#ColorVehiculo').val() == "" ) {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		var formData = new FormData(document.getElementById('frmVehiculo'));
		$.ajax({
			type: "POST",
			data: $('#frmVehiculo').serialize(),

			url: "../procesos/categorias/agregarVehiculo.php",
			type: "POST",
			datatype: "html",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (respuesta) {
				respuesta = respuesta.trim();
				alert(respuesta);
				if (respuesta == 1) {
					$("#frmVehiculo")[0].reset();
					$('#tablaVehiculos').load("categorias/tablaVehiculos.php");

					swal(":D", "Agregado con exito!", "success");

				} else {
					swal(":(", "Fallo al agregarr", "error");

				}
			}
		});
	}
}
