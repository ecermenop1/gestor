
<?php
require_once "Conexion.php";
class Direcciones extends Conectar
{
    public function agregarDirecciones($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_DIRECCIONES (CALLE, 
                                            AVENIDA,
                                            NUMERO_CASA,
                                            LUGARPOBLADO_ID,
                                            ZONA,
                                            MUNICIPIO_ID,
                                            DEPARTAMENTO_ID,
                                            PAIS_ID,
                                            LATITUD,
                                            LONGITUD,
                                            OBSERVACIONES,
                                            MEDIDOR_ID,
                                            USUARIO

                                          ) 
							VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sssisiiisssis",
            $datos['Calle'],
            $datos['Avenida'],
            $datos['NumeroCasa'],
            $datos['IdLugarPoblado'],
            $datos['Zona'],
            $datos['IdMunicipio'],
            $datos['IdDepartamento'],
            $datos['IdPais'],
            $datos['Latitud'],
            $datos['Longitud'],
            $datos['Observaciones'],
            $datos['IdMedidor'],
            $datos['idUsuario'],
            
            
           
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }
}
