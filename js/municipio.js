function AddMunicipio() {
	var CodigoMunicipio = $('#CodigoMunicipio').val();
    var NombreMunicipio = $('#NombreMunicipio').val();
    var Departamento = $('#Departamento').val();
	
	if (CodigoMunicipio == ""||NombreMunicipio==""||Departamento=="") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmMunicipios').serialize(),
			
			url:"../procesos/categorias/agregarMunicipio.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
                alert(respuesta);
				if (respuesta == 1) {
					$('#tablaMunicipios').load("categorias/tablaMunicipios.php");
					
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}