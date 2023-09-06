function AddMedidores() {
	var NumeroMedidor = $('#NumeroMedidor').val();
	var NumeroCaso = $('#NumeroCaso').val();
	var EmpresaElectrica = $('#EmpresaElectrica').val();

	if (NumeroMedidor == "" || NumeroCaso == "" || EmpresaElectrica == "") {
		swal("Todos los campos son obligatorios");
		return false;
	} else {
		$.ajax({
			type: "POST",
			data: $('#frmMedidor').serialize(),

			url: "../procesos/categorias/agregarMedidor.php",

			success: function (respuesta) {
				respuesta = respuesta.trim();
				//alert(respuesta);
				if (respuesta == 1) {
					$("#frmMedidor")[0].reset();
					$('#tablaMedidores').load("categorias/tablaMedidores.php");

					swal(":D", "Agregado con exito!", "success");

				} else {
					swal(":(", "Fallo al agregarr", "error");

				}
			}
		});
	}
}

function obtenerDatosMedidor($id) {

	$.ajax({
		type: "POST",
		data: { "idMedidor": $id },
		url: "../procesos/categorias/obtenerMedidor.php",
		success: function (respuesta) {
			//alert(respuesta)
			respuesta = jQuery.parseJSON(respuesta);
			$('#IdMedidor').val(respuesta['MEDIDOR_ID']);
			$('#NumeroCaso').val(respuesta['NUMERO_CASO']);
			$('#NumeroMedidor').val(respuesta['MEDIDOR_NUMERO']);
			$('#EmpresaElectrica').val(respuesta['EMPRESAELECTRICA']);

			//$('#categoriaU').val(respuesta['nombreCategoria']);
		}
	})
}

function eliminarMedidor(idMedidor) {
	alert(idMedidor)
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
				data: { "idMedidor": idMedidor },
	    		url:"../procesos/categorias/eliminarMedidor.php",
	    		success:function(respuesta){
					//alert(respuesta);
	    			respuesta = respuesta.trim();
					
	    			if (respuesta == 1) {


						$('#tablaMedidores').load("categorias/tablaMedidores.php");
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