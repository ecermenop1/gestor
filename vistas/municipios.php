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
            <h1 class="display-4">Municipios</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaMuncipio">
                        <span class="fas fa-plus-circle"></span> Agregar Nuevo Municipio
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaMunicipios"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregaMuncipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Munciipio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmMunicipios">
                        <label>Código Municipio </label>
                        <input type="text" name="CodigoMunicipio" id="CodigoMunicipio" class="form-control">
                        <label>Municipio</label>
                        <input type="text" name="NombreMunicipio" id="NombreMunicipio" class="form-control">
                        <label> Departamento</label>
                        <select id="Departamento" name="Departamento" class="form-control" id="specificSizeSelect">
                            <option selected value="">Seleccionar Departamento</option>
                            <?php
                            $sql = "SELECT DEPARTAMENTO_ID,DEPARTAMENTO_NOMBRE FROM TB_DEPARTAMENTO";
                            $result = mysqli_query($conexion, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                <option value=<?php echo $mostrar['DEPARTAMENTO_ID']; ?>><?php echo $mostrar['DEPARTAMENTO_NOMBRE']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarMunicipio">Guardar</button>
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
    <script src="../js/municipio.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaMunicipios').load("categorias/tablaMunicipioS.php");
            debugger
            $('#btnGuardarMunicipio').click(function() {
                AddMunicipio();
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