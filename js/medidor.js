function AddMedidores() {
	var NumeroMedidor = $('#NumeroMedidor').val();
   
	
	if (NumeroMedidor == "") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmMedidor').serialize(),
			
			url:"../procesos/categorias/agregarMedidor.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
                alert(respuesta);
				if (respuesta == 1) {
                    $("#frmMedidor")[0].reset();
					$('#tablaMedidores').load("categorias/tablaMedidores.php");
					
					swal(":D", "Agregado con exito!", "success");
                  
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}