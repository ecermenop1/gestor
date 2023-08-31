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


 function eliminarDepartameto(idDepartamento) {
	alert(idDepartamento)
	swal({
	  title: "Estas seguro de eliminar este Registro?",
	  text: "Una vez eliminado, no podra recuperarse!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	
	    	$.ajax({
		
	    		type:"POST",
				data: { "idDepartamento": idDepartamento },
	    		url:"../procesos/categorias/eliminarDepartamento.php",
	    		success:function(respuesta){
					//alert(respuesta);
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {


						$('#tablaDepartamentos').load("categorias/tablaDepartamento.php");
	    				swal("Eliminado con exito!", {
	      					icon: "success",
	    				});
	    			} else {
	    				swal("Error al eliminar!", {
	      					icon: "error",
	    				});
	    			}

	    			
	    		}
	    	});
	  } 
	});
}
