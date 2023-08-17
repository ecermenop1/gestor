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
                    <span class="btn btn-warning" data-toggle="modal" onclick="RESETFORM()" data-target="#modalAgregaCaso">
                        <span class="fas fa-plus-circle" ></span> Nuevo caso
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
    <div class="modal fade" id="modalAgregaCaso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document" style="max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Dirección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCasos">
                        <div class="form-row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">IDCASO:</label>
                                    <input type="text" class="form-control" id="idcaso" name="idcaso" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre1">MUMERO CASO:</label>
                                    <input type="text" class="form-control" id="NumeroCaso" name="NumeroCaso" placeholder="Obligatorio  " required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input1">Propietario:</label>
                                    <select id="IdPropietario" name="IdPropietario" class="form-control" id="specificSizeSelect">
                                        <option selected value="">Seleccionar Propietario</option>
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="input1">Direcciones:</label>
                                    <select id="IdDireccion" name="IdDireccion" class="form-control" >
                                        <option selected value="">Seleccionar Dirección</option>
                                        <?php
                                        $sql = "SELECT D.DIRECCION_ID,D.CALLE,AVENIDA,D.NUMERO_CASA,D.ZONA ,LP.LUGARPOBLADO_NOMBRE,
                                        M.MUNICIPIO_NOMBRE, PAIS.NOMBRE_PAIS, DP.DEPARTAMENTO_NOMBRE,
                                        D.LATITUD, D.LONGITUD,D.OBSERVACIONES
                                         FROM TB_DIRECCIONES AS D INNER JOIN  TB_LUGARESPOBLADOS AS LP 
                                        ON D.LUGARPOBLADO_ID=LP.LUGARPOBLADO_ID
                                        INNER JOIN TB_MUNICIPIO AS M
                                        ON  LP.MUNICIPIO_ID=M.MUNICIPIO_ID
                                        INNER JOIN  TB_PAIS AS PAIS
                                        ON D.PAIS_ID=PAIS.PAIS_ID
                                        LEFT JOIN TB_DEPARTAMENTO AS DP
                                        ON D.DEPARTAMENTO_ID=DP.DEPARTAMENTO_ID";
                                        $result = mysqli_query($conexion, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value=<?php echo $mostrar['DIRECCION_ID']; ?>><?php echo $mostrar['CALLE']." ".$mostrar['AVENIDA']
                                                                                                        ." ".$mostrar['NUMERO_CASA']." ".$mostrar['MUNICIPIO_NOMBRE']
                                                                                                        ." ".$mostrar['NOMBRE_PAIS']." ".$mostrar['DEPARTAMENTO_NOMBRE']
                                                                                                        ." ".$mostrar['LATITUD']." ".$mostrar['LONGITUD']
                                                                                                        
                                                                                                        ; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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


    <!-- Modal -->
<div class="modal fade" id="modalActualizarCaso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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