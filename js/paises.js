function AddPaises() {
	var CodigoPais = $('#CodigoPais').val();
    var NombrePais = $('#NombrePais').val();
	
	if (CodigoPais == ""||NombrePais=="") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmPaises').serialize(),
			
			url:"../procesos/categorias/agregarPais.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
				
				if (respuesta == 1) {
					$("#frmPaises")[0].reset();
					$('#tablaPaises').load("categorias/tablaPais.php");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar", "error");
				
				}
			}
		});
	}
}

function obtenerDatosPais($id) {

	$.ajax({
		type: "POST",
		data: { "idPais": $id },
		url: "../procesos/categorias/obtenerPais.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			$('#IdPais').val(respuesta['PAIS_ID']);
			$('#CodigoPais').val(respuesta['CODIGO_PAIS']);
			$('#NombrePais').val(respuesta['NOMBRE_PAIS']);
			
			
		}
	})
 }