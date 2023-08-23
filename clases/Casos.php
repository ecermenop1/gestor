
<?php
require_once "Conexion.php";
class Casos extends Conectar
{
    public function agregarCasos($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_CASO (NUMERO_CASO, 
                                            ORGANIZACION,
                                            FECHA_INICIO_CASO,
                                            FECHA_CIERRE_CASO,
                                            ESTADO, 
                                            DIRECCION_ID
                                          ) 
							VALUES (?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sssssi",
            $datos['NumeroCaso'],
            $datos['Organizacion'],
            $datos['FechaInicio'],
            $datos['FechaFin'],
            $datos['Estado'],
            $datos['IdDireccion']  
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function obtenerCaso($idCaso) {
        $conexion = Conectar::conexion();

        $sql = "SELECT *
                FROM TB_CASO 
                WHERE CASO_ID ='$idCaso'";
        $result = mysqli_query($conexion, $sql);

        $caso = mysqli_fetch_array($result);

        return $caso;
    }

    public function ActualizarCasos($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_CASO
                SET NUMERO_CASO = ?,ORGANIZACION = ?,FECHA_INICIO_CASO  = ?,
                FECHA_CIERRE_CASO  = ?, ESTADO  = ?,DIRECCION_ID = ? 
                WHERE CASO_ID = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("sssssii", $datos['NumeroCaso'],
                                      $datos['Organizacion'],
                                      $datos['FechaInicio'],
                                      $datos['FechaFin'],
                                      $datos['Estado'],
                                      $datos['IdDireccion'],
                                      $datos['IdCaso']);
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }
}
