function AddDirecciones() {

   
	
	if ($('#NumeroCaso').val()==""||$('#Calle').val()==""||$('#Avenida').val()==""||$('#NumeroCasa').val()==""
    ||$('#IdMunicipio').val()==""||$('#IdLugarPoblado').val()==""
    ||$('#IdDepartamento').val()==""||$('#NumeroOficio').val()==""
    ||$('#IdPais').val()=="") {
		swal("Llenar Todos los campos que son obligatorios");
		return false;
	} else {
		$.ajax({
			type:"POST",
            data:$('#frmDirecciones').serialize(),
			
			url:"../procesos/categorias/agregarDirecciones.php",
			
			success:function(respuesta){
				respuesta = respuesta.trim();
               // alert(respuesta);
				if (respuesta == 1) {
                    $("#frmDirecciones")[0].reset();
				
					$('#tablaDirecciones').load("categorias/tablaDirecciones.php");
					swal(":D", "Agregado con exito!", "success");
                  
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}


function obtenerDatosDireccion($id) {

	$.ajax({
		type: "POST",
		data: { "idDireccion": $id },
		url: "../procesos/categorias/obtenerDireccion.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			$('#IdDireccion').val(respuesta['DIRECCION_ID']);
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);
			$('#NumeroOficio').val(respuesta['NUMERO_OFICIO']);
			$('#Calle').val(respuesta['CALLE']);
			$('#Avenida').val(respuesta['AVENIDA']);
			$('#NumeroCasa').val(respuesta['NUMERO_CASA']);
			$('#Zona').val(respuesta['ZONA']);
			$('#IdMunicipio').val(respuesta['MUNICIPIO_ID']);
			$('#IdDepartamento').val(respuesta['DEPARTAMENTO_ID']);
			$('#IdPais').val(respuesta['PAIS_ID']);
			$('#IdLugarPoblado').val(respuesta['LUGARPOBLADO_ID']);
			$('#Latitud').val(respuesta['LATITUD']);
			$('#Longitud').val(respuesta['LONGITUD']);
			$('#IdMedidor').val(respuesta['MEDIDOR_ID']);
			$('#Observaciones').val(respuesta['OBSERVACIONES']);
			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
 }


 function eliminarDireccion(idDireccion) {
	//alert(idDireccion)
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
				data: { "idDireccion": idDireccion },
	    		url:"../procesos/categorias/eliminarDireccion.php",
	    		success:function(respuesta){
					//alert(respuesta);
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {
		
					$('#tablaDirecciones').load("categorias/tablaDirecciones.php");
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