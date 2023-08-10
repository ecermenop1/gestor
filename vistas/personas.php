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
            <h1 class="display-4">Personas</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaPersona">
                        <span class="fas fa-plus-circle"></span> Nueva Personas
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaPersonas"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Propietario</h5>
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
    <div class="modal fade" id="modalAgregaPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document" style="max-width: 70%;">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Persona</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmPersona"  enctype="multipart/form-data">
                        <div class="form-row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre1">Primer Nombre:</label>
                                    <input type="text" class="form-control" id="Nombre1" name="Nombre1" placeholder="Nombre1  " required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre2">Segundo Apellido:</label>
                                    <input type="text" class="form-control" id="Nombre2" name="Nombre2" placeholder="Nombre2">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1">Tercer Apellido:</label>
                                    <input type="text" class="form-control" id="Nombre3" name="Nombre3" placeholder="Nombre3">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1">Primer Apellido:</label>
                                    <input type="text" class="form-control" id="Apellido1" name="Apellido1" placeholder="Apellido1 " required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1">Segundo Nombre:</label>
                                    <input type="text" class="form-control" id="Apellido2" name="Apellido2" placeholder="Apellido2" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1">Tercer Nombre:</label>
                                    <input type="text" class="form-control" id="Apellido3" name="Apellido3" placeholder="Apellido3">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Lugar Nacimiento:</label>
                                    <input type="input" class="form-control" id="LugarNacimiento" name="LugarNacimiento">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1">Tipo Documento:</label>
                                    <select class="form-control" id="TipoDocumento" name="TipoDocumento">
                                        <option value="DPI">DPI</option>
                                        <option value="DPI">NIT</option>
                                        <option value="PASAPORTE">DPI</option>

                                        <select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Numero Documento:</label>
                                    <input type="text" class="form-control" id="NumeroDocumento" name="NumeroDocumento">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1">Género:</label>
                                    <select class="form-control" id="Genero" name="Genero">
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Nacionalidad:</label>
                                    <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Direccion:</label>
                                    <input type="text" class="form-control" id="Direccion" name="Direccion">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Nombre Padre:</label>
                                    <input type="text" class="form-control" id="NombrePadre" name="NombrePadre">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Nombre Madre:</label>
                                    <input type="text" class="form-control" id="NombreMadre" name="NombreMadre">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Telefono:</label>
                                    <input type="text" class="form-control" id="Telefono" name="Telefono">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Alias:</label>
                                    <input type="text" class="form-control" id="Alias" name="Alias">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="input1"> Fotografia:</label>
                                    <input type="file" name="imagen"  multiple="multiple" class="form-control" id="Alias">
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarPersona">Guardar</button>
                </div>
            </div>
        </div>
    </div>






    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/persona.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaPersonas').load("categorias/tablaPersonas.php");

            $('#btnGuardarPersona').click(function() {

                AddPersonas();
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