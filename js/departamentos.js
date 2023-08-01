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
					$('#tablaDepartamentos').load("categorias/tablaDepartamento.php");
					swal(":D", "Agregado con exito!", "success");
				} else {
					swal(":(", "Fallo al agregarr", "error");
				
				}
			}
		});
	}
}