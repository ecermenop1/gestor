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
            <h1 class="display-4">Direcciones</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" onclick=" RESETFORM()" data-target="#modalAgregarDirecciones">
                        <span class="fas fa-plus-circle"></span> Dirección
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaDirecciones"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregarDirecciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Dirección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmDirecciones" enctype="multipart/form-data">
                        <div class="form-row">
                            <input type="hidden" class="form-control"  id="IdDireccion" name="IdDireccion" placeholder="Obligatorio  " required>
                            <div class="col-md-12">



                                <div class="form-group" id="files" style="width: 200px;
                                    height: 400px,400px;
                                    margin:auto;
                                    background-color: #f0f0f0; 
                                    border-radius: 20px 20px 20px 20px; 
                                    overflow: hidden;">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">Número de Caso:</label>
                                    <input type="number" class="form-control" id="NumeroCaso" name="NumeroCaso" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">Número de Oficio:</label>
                                    <input type="number" class="form-control" id="NumeroOficio" name="NumeroOficio" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">CALLE:</label>
                                    <input type="text" class="form-control" id="Calle" name="Calle" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre2">Avenida:</label>
                                    <input type="text" class="form-control" id="Avenida" name="Avenida" placeholder="Obligatorio">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre2">Zona:</label>
                                    <input type="text" class="form-control" id="Zona" name="Zona" placeholder="Obligatorio">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Numero Casa:</label>
                                    <input type="text" class="form-control" id="NumeroCasa" name="NumeroCasa" placeholder="Obligatorio">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Municipio:</label>
                                    <select id="IdMunicipio" name="IdMunicipio" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Municipio</option>
                                        <?php
                                        $sql = "SELECT * FROM TB_MUNICIPIO";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['MUNICIPIO_ID']; ?>><?php echo $mostrar['MUNICIPIO_NOMBRE']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Lugar Poblado:</label>
                                    <select id="IdLugarPoblado" name="IdLugarPoblado" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Lugar Poblado</option>
                                        <?php
                                        $sql = "SELECT * FROM TB_LUGARESPOBLADOS";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['LUGARPOBLADO_ID']; ?>><?php echo $mostrar['LUGARPOBLADO_NOMBRE']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Departamento:</label>
                                    <select id="IdDepartamento" name="IdDepartamento" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Departamento</option>
                                        <?php
                                        $sql = "SELECT * FROM TB_DEPARTAMENTO";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['DEPARTAMENTO_ID']; ?>><?php echo $mostrar['DEPARTAMENTO_NOMBRE']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Pais:</label>
                                    <select id="IdPais" name="IdPais" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Pais</option>
                                        <?php
                                        $sql = "SELECT * FROM TB_PAIS";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['PAIS_ID']; ?>><?php echo $mostrar['NOMBRE_PAIS']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Latitud:</label>
                                    <input type="text" class="form-control" id="Latitud" name="Latitud" placeholder="Opcional">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Longitud:</label>
                                    <input type="text" class="form-control" id="Longitud" name="Longitud" placeholder="Opcional">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Medidor:</label>
                                    <select id="IdMedidor" name="IdMedidor" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Pais</option>
                                        <?php
                                        $sql = "SELECT * FROM TB_MEDIDORELECTRONICO";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['MEDIDOR_ID']; ?>><?php echo $mostrar['MEDIDOR_NUMERO']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Observaciones:</label>
                                    <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Fotografia:</label>
                                    <input type="file" name="imagen" multiple="multiple" class="form-control" id="imagen" placeholder="Opcional">
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="botones">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarDirecciones">Guardar</button>


                </div>
                <div class="modal-footer" id="botones1">

                    <div id="pdfinyect"></div>

                </div>
            </div>
        </div>
    </div>






    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/direccion.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaDirecciones').load("categorias/tablaDirecciones.php");

            $('#btnGuardarDirecciones').click(function() {

                AddDirecciones();
            });

            /*$('#btnActualizaCategoria').click(function(){
            	actualizaCategoria();
            });*/
        });



        function RESETFORM() {
            $('#botones1').hide();
            $('#botones').show()
            $("#frmDirecciones")[0].reset();

            var imagenHTML = "<img  src='../fotosDirecciones/defaultdireciones.png' width='80%'>";
            $('#files').html(imagenHTML);
        }


        function pdf() {
            var v = $('#IdDireccion').val();
            var pdf = ' <a href="../clases/generarpdfDireccion.php?valor=' + v + '" target="_blank" class="btn btn-success"><span class="fa fa-file-pdf"></span>  PDF</a>'
            $('#pdfinyect').html(pdf);

        }
    </script>
<?php
} else {
    header("location:../index.php");
}
?>