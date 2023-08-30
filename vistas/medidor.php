<?php

session_start();

if (isset($_SESSION['usuario'])) {
    include "header.php";

    require_once "../clases/Conexion.php";
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Medidor</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaMedidor">
                        <span class="fas fa-plus-circle"></span> Nuevo Medidor
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaMedidores"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregaMedidor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Medidor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmMedidor">
                        <input type="hidden" name="IdMedidor" id="IdMedidor" class="form-control">
                        <label>NUMERO CASO</label>
                        <input type="text" name="NumeroCaso" id="NumeroCaso" class="form-control">
                        <label>NUMERO MEDIDOR</label>
                        <input type="text" name="NumeroMedidor" id="NumeroMedidor" class="form-control">
                        <label>EMPRESA ELECTRICA</label>
                        <input type="text" name="EmpresaElectrica" id="EmpresaElectrica" class="form-control">
                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarMedidor">Guardar</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/medidor.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaMedidores').load("categorias/tablaMedidores.php");
            
            $('#btnGuardarMedidor').click(function() {
                
                AddMedidores();
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