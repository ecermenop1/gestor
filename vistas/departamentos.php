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
            <h1 class="display-4">Departamentos</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaDepartamento">
                        <span class="fas fa-plus-circle"></span> Agregar Nuevo Dpartamento
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaDepartamentos"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregaDepartamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmDepartamentos">
                    <input type="hidden" name="IdDepartamento" id="IdDepartamento" class="form-control">
                        <label>Código Departamento </label>
                        <input type="text" name="CodigoDepartamento" id="CodigoDepartamento" class="form-control">
                        <label>Nombre Departamento</label>
                        <input type="text" name="NombreDepartamento" id="NombreDepartamento" class="form-control">
                        <label>Nombre Departamento</label>
                        <select id="Pais" name="Pais" class="form-control" id="specificSizeSelect">
                            <option selected value="">Seleccionar Pais</option>
                            <?php
                            $sql = "SELECT PAIS_ID,NOMBRE_PAIS FROM TB_PAIS";
                            $result = mysqli_query($conexion, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                <option value=<?php echo $mostrar['PAIS_ID']; ?>><?php echo $mostrar['NOMBRE_PAIS']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarDepartamento">Guardar</button>
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
    <script src="../js/departamentos.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaDepartamentos').load("categorias/tablaDepartamento.php");
  
            $('#btnGuardarDepartamento').click(function() {
                AddDepartamentos();
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