function AddPersonas() {

	
	if ($('#Nombre1').val() == "" || $('#Apellido1').val() == "" ||
		$('#Apellido2').val() == "" || $('#FechaNacimiento').val() == "" ||
		$('#LugarNacimiento').val() == "" || $('#TipoDocumento').val() == "" ||
		$('#NumeroDocumento').val() == "" || $('#Genero').val() == "" ||
		$('#Nacionalidad').val() == "" || $('#Direccion').val() == "" ||
		$('#NombrePadre').val() == "" || $('#NombreMadre').val() == "") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		var formData = new FormData(document.getElementById('frmPersona'));
		$.ajax({
			type: "POST",
			data: $('#frmPersona').serialize(),

			url: "../procesos/categorias/agregarPersona.php",
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
					$("#frmPersona")[0].reset();
					$('#tablaPersonas').load("categorias/tablaPersonas.php");

					swal(":D", "Agregado con exito!", "success");

				} else {
					swal(":(", "Fallo al agregarr", "error");

				}
			}
		});
	}
}
