function AddVehiculo() {

	
	if ($('#NumeroCaso').val()== ""  ||$('#Placa').val() == "" || $('#TipoVehiculo').val() == "" ||
		$('#MarcaVehiculo').val() == "" || $('#LineaVehiculo').val() == "" ||
		$('#Modelo').val() == "" || $('#ColorVehiculo').val() == ""|| $('#NumeroOficio').val() == ""|| $('#IdPropietario').val() == "" ) {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		var formData = new FormData(document.getElementById('frmVehiculo'));
		$.ajax({
			type: "POST",
			data: $('#frmVehiculo').serialize(),

			url: "../procesos/categorias/agregarVehiculo.php",
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
					$("#frmVehiculo")[0].reset();
					$('#tablaVehiculos').load("categorias/tablaVehiculos.php");

					swal(":D", "Agregado con exito!", "success");

				} else {
					swal(":(", "Fallo al agregar", "error");

				}
			}
		});
	}

	

		var imagenHTML = "<img  src='../fotosPersonas/defaultpersona.png' width='80%'>";
		$('#files').html(imagenHTML);
	
}


function obtenerDatosVehiculos($id) {
	$('#botones1').hide();
	$('#botones').show()
	$.ajax({
		type: "POST",
		data: { "idVehiculo": $id },
		url: "../procesos/categorias/obtenerVehiculo.php",
		success: function (respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			var imagenHTML = "<img  src='"+respuesta['FOTO_VEHICULO']+"' width='80%'>";
			$('#files').html(imagenHTML);
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);
			$('#NumeroOficio').val(respuesta['NUMERO_OFICIO']);
			$('#IdVehiculo').val(respuesta['ID_VEHICULO']);
			$('#Placa').val(respuesta['PLACA']);
			$('#TipoVehiculo').val(respuesta['TIPO_VEHICULO']);
			$('#MarcaVehiculo').val(respuesta['MARCA_VEHICULO']);
			$('#LineaVehiculo').val(respuesta['LINEA_VEHICULO']);
			$('#Modelo').val(respuesta['MODELO_VEHICULO']);
			$('#ColorVehiculo').val(respuesta['COLOR_VEHICULO']);
			$('#NumeroChasis').val(respuesta['NUMERO_CHASIS']);
			$('#NumeroMotor').val(respuesta['NUMERO_MOTOR']);
			$('#IdPropietario').val(respuesta['PROPIETARIO_ID']);
			$('#imagen').val(respuesta['FOTO_VEHICULO']);
			
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
}


function visualizarDatosVehiculos($id) {
	$('#botones').hide();
	$('#botones1').show();

	$.ajax({
		type: "POST",
		data: { "idVehiculo": $id },
		url: "../procesos/categorias/obtenerVehiculo.php",
		success: function (respuesta) {
			respuesta = jQuery.parseJSON(respuesta);
			var imagenHTML = "<img  src='"+respuesta['FOTO_VEHICULO']+"' width='80%'>";
			$('#files').html(imagenHTML);
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);
			$('#NumeroOficio').val(respuesta['NUMERO_OFICIO']);
			$('#IdVehiculo').val(respuesta['ID_VEHICULO']);
			pdf();
			$('#Placa').val(respuesta['PLACA']);
			$('#TipoVehiculo').val(respuesta['TIPO_VEHICULO']);
			$('#MarcaVehiculo').val(respuesta['MARCA_VEHICULO']);
			$('#LineaVehiculo').val(respuesta['LINEA_VEHICULO']);
			$('#Modelo').val(respuesta['MODELO_VEHICULO']);
			$('#ColorVehiculo').val(respuesta['COLOR_VEHICULO']);
			$('#NumeroChasis').val(respuesta['NUMERO_CHASIS']);
			$('#NumeroMotor').val(respuesta['NUMERO_MOTOR']);
			$('#IdPropietario').val(respuesta['PROPIETARIO_ID']);
			$('#imagen').val(respuesta['FOTO_VEHICULO']);
			
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
}


function eliminarVehiculo(idVehiculo) {
	
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
				data: { "idVehiculo": idVehiculo },
	    		url:"../procesos/categorias/eliminarVehiculo.php",
	    		success:function(respuesta){
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {
		
						$('#tablaVehiculos').load("categorias/tablaVehiculos.php");
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