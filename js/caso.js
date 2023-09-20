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
				if (respuesta == 1) {
                   $("#frmCasos")[0].reset();
					$('#tablaCasos').load("categorias/tablaCaso.php");
					
					swal(":D", "Agregado con exito!", "success");
                  
				} else {
					swal(":(", "Fallo al agregar", "error");
				
				}
			}
		});
	}
}

function RESETFORM(){
	
	$("#frmCasos")[0].reset();
}
function obtenerDatosCaso(idCaso) {
	
	$.ajax({
		type:"POST",
		data:{"idCaso":  idCaso},
		url:"../procesos/categorias/obtenerCaso.php",
		success:function(respuesta) {
			//alert(respuesta);
			respuesta = jQuery.parseJSON(respuesta);
			
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);

			$('#Organizacion').val(respuesta['ORGANIZACION']);
			$('#FechaInicio').val(respuesta['FECHA_INICIO_CASO']);
			$('#FechaFin').val(respuesta['FECHA_CIERRE_CASO']);
			$('#Estado').val(respuesta['ESTADO']);
			$('#IdDireccion').val(respuesta['DIRECCION_ID']);
			$('#idcaso').val(respuesta['CASO_ID']);
			
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
}


function eliminarCaso(idCaso) {
	//alert(idCaso)
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
				data: { "idCaso": idCaso },
	    		url:"../procesos/categorias/eliminarCaso.php",
	    		success:function(respuesta){
					//alert(respuesta);
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {
		
						$('#tablaCasos').load("categorias/tablaCaso.php");
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