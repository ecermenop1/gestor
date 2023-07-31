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
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					$('#nombreCategoria').val("");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregar", "error");
				
				}
			}
		});
	}
}