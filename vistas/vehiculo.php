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
            <h1 class="display-4">Vehiculos</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaVehiculo">
                        <span class="fas fa-plus-circle"></span> Nuevo Vehiculo
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaVehiculos"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vehiculos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<div id="imagenobtenida" > </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="modalAgregaVehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Vehiculo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmVehiculo" enctype="multipart/form-data">
                        <div class="form-row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">Placa:</label>
                                    <input type="text" class="form-control" id="Placa" name="Placa" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre2">Tipo Vehiculo</label>
                                    <input type="text" class="form-control" id="TipoVehiculo" name="TipoVehiculo" placeholder="Opcional">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Marca Vehiculo:</label>
                                    <input type="text" class="form-control" id="MarcaVehiculo" name="MarcaVehiculo" placeholder="Opcional">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Linea Vehiculo:</label>
                                    <input type="text" class="form-control" id="LineaVehiculo" name="LineaVehiculo" placeholder="Obligatorio " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Modelo Vehiculo:</label>
                                    <input type="text" class="form-control" id="Modelo" name="Modelo" placeholder="Obligatorio" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Color Vehiculo:</label>
                                    <input type="text" class="form-control" id="ColorVehiculo" name="ColorVehiculo" placeholder="Opcional">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="input1">Propietario:</label>
                                    <select id="Propietario" name="Propietario" class="form-control" id="specificSizeSelect">
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
                                    <label for="input1"> Foto Vehiculo:</label>
                                    <input type="file" name="imagen"  multiple="multiple" class="form-control" id="Alias" placeholder="Opcional">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarVehiculo">Guardar</button>
                </div>
            </div>
        </div>
    </div>






    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/vehiculo.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaVehiculos').load("categorias/tablaVehiculos.php");

            $('#btnGuardarVehiculo').click(function() {

                AddVehiculo();
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