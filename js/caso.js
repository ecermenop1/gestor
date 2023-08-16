function AddCasos() {

   
	
	if ($('#NumeroCaso').val()==""||$('#IdPropietario').val()==""||$('#Organizacion').val()==""
    ||$('#FechaInicio').val()==""||$('#FechaFin').val()=="") {
		swal(" Todos los campos  son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmCasos').serialize(),
			
			url:"../procesos/categorias/agregarCaso.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
                alert(respuesta);
				if (respuesta == 1) {
                    $("#frmCasos")[0].reset();
					$('#tablaCasos').load("categorias/tablaCaso.php");
					
					swal(":D", "Agregado con exito!", "success");
                  
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}