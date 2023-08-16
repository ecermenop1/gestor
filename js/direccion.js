function AddDirecciones() {

   
	
	if ($('#Calle').val()==""||$('#Avenida').val()==""||$('#NumeroCasa').val()==""
    ||$('#IdMunicipio').val()==""||$('#IdLugarPoblado').val()==""
    ||$('#IdMunicipio').val()==""||$('#IdDepartamento').val()==""
    ||$('#IdPais').val()==""||$('#IdDepartamento').val()=="") {
		swal("Llenar Todos los campos que son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmDirecciones').serialize(),
			
			url:"../procesos/categorias/agregarDirecciones.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
                alert(respuesta);
				if (respuesta == 1) {
                    $("#frmDirecciones")[0].reset();
					$('#tablaMedidores').load("categorias/tablaMedidores.php");
					
					swal(":D", "Agregado con exito!", "success");
                  
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}