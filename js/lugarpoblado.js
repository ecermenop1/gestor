function AddLugarPoblado() {
	var NombreLugarPoblado = $('#NombreLugarPoblado').val();
    var TipoLugarPoblado = $('#TipoLugarPoblado').val();
    var Ruralidades = $('#Ruralidades').val();
    var MunicipioLugarPoglado = $('#MunicipioLugarPoglado').val();
	
	if (NombreLugarPoblado == ""||TipoLugarPoblado==""||Ruralidades==""||MunicipioLugarPoglado=="") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmLugarPoblado').serialize(),
			
			url:"../procesos/categorias/agregarLugarPoblado.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
                alert(respuesta);
				if (respuesta == 1) {
                    $("#frmLugarPoblado")[0].reset();
					$('#tablaLugaresPoblados').load("categorias/tablaLugaresPoblados.php");
					
					swal(":D", "Agregado con exito!", "success");
                  
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}