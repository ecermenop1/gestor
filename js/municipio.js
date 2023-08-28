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
					$("#frmMunicipios")[0].reset();
					$('#tablaMunicipios').load("categorias/tablaMunicipios.php");
					
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}


function obtenerDatosMunicipio($id) {

	$.ajax({
		type: "POST",
		data: { "idMunicipio": $id },
		url: "../procesos/categorias/obtenerMunicipio.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			$('#IdMunicipio').val(respuesta['MUNICIPIO_ID']);
			$('#CodigoMunicipio').val(respuesta['CODIGOMUNICIPIO']);
			$('#NombreMunicipio').val(respuesta['MUNICIPIO_NOMBRE']);
			$('#Departamento').val(respuesta['DEPARTAMENTO_ID']);
			
		}
	})
 }