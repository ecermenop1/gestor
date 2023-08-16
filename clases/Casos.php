
<?php
require_once "Conexion.php";
class Casos extends Conectar
{
    public function agregarCasos($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_CASO (NUMERO_CASO, 
                                            PROPIETARIO_ID,
                                            ORGANIZACION,
                                            FECHA_INICIO_CASO,
                                            FECHA_CIERRE_CASO,
                                            ESTADO  
                                          ) 
							VALUES (?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sissss",
            $datos['NumeroCaso'],
            $datos['IdPropietario'],
            $datos['Organizacion'],
            $datos['FechaInicio'],
            $datos['FechaFin'],
            $datos['Estado']  
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }
}
