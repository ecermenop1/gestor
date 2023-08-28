function AddDepartamentos() {
	var CodigoDepartamento = $('#CodigoDepartamento').val();
    var NombreDepartamento = $('#NombreDepartamento').val();
    var Departamento = $('#Departamento').val();
	
	if (CodigoDepartamento == ""||NombreDepartamento==""||Departamento=="") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmDepartamentos').serialize(),
			
			url:"../procesos/categorias/agregarDepartamento.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
				alert(respuesta);
				if (respuesta == 1) {
					$("#frmDepartamentos")[0].reset();
					$('#tablaDepartamentos').load("categorias/tablaDepartamento.php");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}

function obtenerDatosDepartamento($id) {

	$.ajax({
		type: "POST",
		data: { "idDepartamento": $id },
		url: "../procesos/categorias/obtenerDepartamento.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			$('#IdDepartamento').val(respuesta['DEPARTAMENTO_ID']);
			$('#CodigoDepartamento').val(respuesta['CODIGO_DEPARTAMENTO']);
			$('#NombreDepartamento').val(respuesta['DEPARTAMENTO_NOMBRE']);
			$('#Pais').val(respuesta['PAIS_ID']);
			
		}
	})
 }