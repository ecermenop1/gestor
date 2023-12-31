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
               // alert(respuesta);
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


function obtenerDatosLugarPoblado($id) {

	$.ajax({
		type: "POST",
		data: { "idLugarPoblado": $id },
		url: "../procesos/categorias/obtenerLugarPoblado.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			$('#IdLugPob').val(respuesta['LUGARPOBLADO_ID']);
			$('#NombreLugarPoblado').val(respuesta['LUGARPOBLADO_NOMBRE']);
			$('#TipoLugarPoblado').val(respuesta['TIPO_LUGARPOBLADO']);
			$('#Ruralidades').val(respuesta['RURALIDADES_LUGARPOBLADO']);
			$('#ZonaCalle').val(respuesta['LUGARPOBLADO_ZONAYCALLE']);
			$('#MunicipioLugarPoglado').val(respuesta['MUNICIPIO_ID']);
			
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
 }

 function eliminarLugarPoblado(idLugarPoblado) {
	//alert(idLugarPoblado)
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
				data: { "idLugarPoblado": idLugarPoblado },
	    		url:"../procesos/categorias/eliminarLugarPoblado.php",
	    		success:function(respuesta){
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {


						$('#tablaLugaresPoblados').load("categorias/tablaLugaresPoblados.php");
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