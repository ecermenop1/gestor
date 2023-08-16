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
            <h1 class="display-4">Casos</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarDirecciones">
                        <span class="fas fa-plus-circle"></span> Nuevo caso
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCasos"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregarDirecciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Dirección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCasos" >
                        <div class="form-row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">MUMERO CASO:</label>
                                    <input type="number" class="form-control" id="NumeroCaso" name="NumeroCaso" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="input1">Propietario:</label>
                                    <select id="IdPropietario" name="IdPropietario" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Vehiculo</option>
                                        <?php
                                        $sql = "SELECT PROPIETARIO_ID,NOMBRE1,NOMBRE2,APELLIDO1,APELLIDO2 FROM TB_PROPIETARIO";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['PROPIETARIO_ID']; ?>><?php echo $mostrar['NOMBRE1'] . " " . $mostrar['NOMBRE2'] . " " . $mostrar['APELLIDO1'] . "" . $mostrar['APELLIDO2']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre2">Organización:</label>
                                    <input type="text" class="form-control" id="Organizacion" name="Organizacion" placeholder="Obligatorio">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Fecha Inicio:</label>
                                    <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="Obligatorio">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Fecha Fin:</label>
                                    <input type="date" class="form-control" id="FechaFin" name="FechaFin" placeholder="Obligatorio">
                                </div>
                            </div>


                            
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="input1">Estado:</label>
                                    <select id="Estado" name="Estado" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Estado</option>
                                       
                                            <option value="INICIADO">INICIADO</option>
                                            <option value="SEGUIMIENTO">SEGUIMIENTO</option>
                                            <option value="FINALIZADO">FINALIZADO</option>
                                        
                                    </select>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnAgregarCasos">Guardar</button>
                </div>
            </div>
        </div>
    </div>






    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/caso.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaCasos').load("categorias/tablaCaso.php");

            $('#btnAgregarCasos').click(function() {

                AddCasos();
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