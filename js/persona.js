function AddPersonas() {
	if ($('#NumeroCaso').val() == "" || $('#Nombre1').val() == "" || $('#Apellido1').val() == "" ||
		$('#Apellido2').val() == "" || $('#FechaNacimiento').val() == "" ||
		$('#LugarNacimiento').val() == "" || $('#TipoDocumento').val() == "" ||
		$('#NumeroDocumento').val() == "" || $('#Genero').val() == "" ||
		$('#Nacionalidad').val() == "" || $('#Direccion').val() == "" ||
		$('#NombrePadre').val() == "" || $('#NombreMadre').val() == ""|| $('#NumeroOficio').val() == "") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		var formData = new FormData(document.getElementById('frmPersona'));
		$.ajax({
			type: "POST",
			data: $('#frmPersona').serialize(),

			url: "../procesos/categorias/agregarPersona.php",
			type: "POST",
			datatype: "html",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (respuesta) {
				respuesta = respuesta.trim();
				//alert(respuesta);
				if (respuesta == 1) {
					$("#frmPersona")[0].reset();
					$('#tablaPersonas').load("categorias/tablaPersonas.php");

					swal(":D", "Agregado con exito!", "success");

				} else {
					swal(":(", "Fallo al agregarr", "error");

				}
			}
		});
		var imagenHTML = "<img  src='../fotosPersonas/defaultpersona.png' width='80%'>";
		$('#files').html(imagenHTML);
	}
 }


function obtenerDatosPersona($id) {

	$('#botones1').hide();
	$('#botones').show()
	
	$.ajax({
		type: "POST",
		data: { "idpersona": $id },
		url: "../procesos/categorias/obtenerPersona.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			var imagenHTML = "<img  src='"+respuesta['RUTA_FOTO']+"' width='80%'>";
			$('#files').html(imagenHTML);

			var EDADHTML = 
			"<div class='form-group'>"+
			"<label for='input1'> EDAD:</label>"+
				"<input type='input' value='"+respuesta['EDAD']+"' class='form-control' readonly>"+
				"</div>";
			$('#edadcalculada').html(EDADHTML);
			
			$('#IdPropietario').val(respuesta['PROPIETARIO_ID']);
			
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);
			$('#NumeroOficio').val(respuesta['NUMERO_OFICIO']);
			$('#Nombre1').val(respuesta['NOMBRE1']);
			$('#Nombre2').val(respuesta['NOMBRE2']);
			$('#Nombre3').val(respuesta['NOMBRE3']);
			$('#Apellido1').val(respuesta['APELLIDO1']);
			$('#Apellido2').val(respuesta['APELLIDO2']);
			$('#Apellido3').val(respuesta['APELLIDO3']);
			$('#FechaNacimiento').val(respuesta['FECHA_NACIMIENTO']);
			$('#LugarNacimiento').val(respuesta['LUGAR_NACIMIENTO']);
			$('#TipoDocumento').val(respuesta['TIPO_DOCUMENTO']);

			$('#NumeroDocumento').val(respuesta['NUMERO_DOCUMENTO']);
			//$('#Nacionalidad').val(respuesta['GENERO']);
			$('#Nacionalidad').val(respuesta['NACIONALIDAD']);
			$('#Direccion').val(respuesta['DIRECCION']);
			$('#NombrePadre').val(respuesta['NOMBRE_PADRE']);
			$('#NombreMadre').val(respuesta['NOMBRE_MADRE']);
			$('#Telefono').val(respuesta['NUMERO_CELULAR']);
			$('#Alias').val(respuesta['ALIAS']);
			$('#imagen').val(respuesta['RUTA_FOTO']);
			
			
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
	
}


function visualizarpersona($id) {
	
	$('#botones').hide();
	$('#botones1').show();
	$.ajax({
		type: "POST",
		data: { "idpersona": $id },
		url: "../procesos/categorias/obtenerPersona.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			var imagenHTML = "<img  src='"+respuesta['RUTA_FOTO']+"' width='80%'>";
			$('#files').html(imagenHTML);

			var EDADHTML = 
			"<div class='form-group'>"+
			"<label for='input1'> EDAD:</label>"+
				"<input type='input' value='"+respuesta['EDAD']+"' class='form-control' readonly>"+
				"</div>";
			$('#edadcalculada').html(EDADHTML);
			
			$('#IdPropietario').val(respuesta['PROPIETARIO_ID']);
			pdf();
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);
			$('#NumeroOficio').val(respuesta['NUMERO_OFICIO']);
			$('#Nombre1').val(respuesta['NOMBRE1']);
			$('#Nombre2').val(respuesta['NOMBRE2']);
			$('#Nombre3').val(respuesta['NOMBRE3']);
			$('#Apellido1').val(respuesta['APELLIDO1']);
			$('#Apellido2').val(respuesta['APELLIDO2']);
			$('#Apellido3').val(respuesta['APELLIDO3']);
			$('#FechaNacimiento').val(respuesta['FECHA_NACIMIENTO']);
			$('#LugarNacimiento').val(respuesta['LUGAR_NACIMIENTO']);
			$('#TipoDocumento').val(respuesta['TIPO_DOCUMENTO']);

			$('#NumeroDocumento').val(respuesta['NUMERO_DOCUMENTO']);
			//$('#Nacionalidad').val(respuesta['GENERO']);
			$('#Nacionalidad').val(respuesta['NACIONALIDAD']);
			$('#Direccion').val(respuesta['DIRECCION']);
			$('#NombrePadre').val(respuesta['NOMBRE_PADRE']);
			$('#NombreMadre').val(respuesta['NOMBRE_MADRE']);
			$('#Telefono').val(respuesta['NUMERO_CELULAR']);
			$('#Alias').val(respuesta['ALIAS']);
			$('#imagen').val(respuesta['RUTA_FOTO']);

			
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
	
}

function eliminarPersona(idPersona) {
	//alert(idPersona)
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
				data: { "idPersona": idPersona },
	    		url:"../procesos/categorias/eliminarPersona.php",
	    		success:function(respuesta){
					//alert(respuesta);
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {
		
						$('#tablaPersonas').load("categorias/tablaPersonas.php");
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