<?php

session_start();

if (isset($_SESSION['usuario'])) {
	include "header.php";
?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Paises</h1>

        <div class="row">
            <div class="col-sm-4">
                <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaCategoria">
                    <span class="fas fa-plus-circle"></span> Agregar Nuevo Pais
                </span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div id="tablaPaises"></div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo País</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmPaises">
                    <label>Código País</label>
                    <input type="text" name="CodigoPais" id="CodigoPais" class="form-control">
                    <label>Nombre País</label>
                    <input type="text" name="NombrePais" id="NombrePais" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarPais">Guardar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmActualizaCategoria">
                    <input type="text" id="idCategoria" name="idCategoria" hidden="">
                    <label>Categoria</label>
                    <input type="text" id="categoriaU" name="categoriaU" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="btnCerrarUpdateCategoria">Cerrar</button>
                <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
            </div>
        </div>
    </div>
</div>


<?php
	include "footer.php";
	?>
<!--Dependencia de categorias, todas las funciones js de categorias-->
<script src="../js/paises.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#tablaPaises').load("categorias/tablaPais.php");
debugger
    $('#btnGuardarPais').click(function() {
        AddPaises();
    });

    /*$('#btnActualizaCategoria').click(function(){
    	actualizaCategoria();
    });*/
});
</script>
<?php
} else {
	header("location:../index.php");
}
?>