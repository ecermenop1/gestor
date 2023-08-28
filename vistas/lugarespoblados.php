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
            <h1 class="display-4">Lugares Poblados</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaLugarPoblado">
                        <span class="fas fa-plus-circle"></span> Nuevo Lugar Poblado
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaLugaresPoblados"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregaLugarPoblado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Lugar Poblado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmLugarPoblado">
                    <input type="hidden" name="IdLugPob" id="IdLugPob" class="form-control">
                        <label>Nombre </label>
                        <input type="text" name="NombreLugarPoblado" id="NombreLugarPoblado" class="form-control">
                        <label>Tipo Lugar Poblado</label>
                        <input type="text" name="TipoLugarPoblado" id="TipoLugarPoblado" class="form-control">
                        <label> Ruralidades </label>
                        <input type="text" name="Ruralidades" id="Ruralidades" class="form-control">
                        <label> Zona y Calle </label>
                        <input type="text" name="ZonaCalle" id="ZonaCalle" class="form-control">
                      
                        <label> Municipio </label>
                        <select id="MunicipioLugarPoglado" name="MunicipioLugarPoglado" class="form-control" id="specificSizeSelect">
                            <option selected value="">Seleccionar Municipio</option>
                            <?php
                            $sql = "SELECT MUNICIPIO_ID,MUNICIPIO_NOMBRE FROM TB_MUNICIPIO";
                            $result = mysqli_query($conexion, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                <option value=<?php echo $mostrar['MUNICIPIO_ID']; ?>><?php echo $mostrar['MUNICIPIO_NOMBRE']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarLugarPoblado">Guardar</button>
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
    <script src="../js/lugarpoblado.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaLugaresPoblados').load("categorias/tablaLugaresPoblados.php");
            
            $('#btnGuardarLugarPoblado').click(function() {
                AddLugarPoblado();
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