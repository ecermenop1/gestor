
<?php
require_once "Conexion.php";
class Direcciones extends Conectar
{
    public function agregarDirecciones($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_DIRECCIONES (NUMERO_CASO,
                                            CALLE, 
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
							VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "ssssisiiisssis",
            $datos['NumeroCaso'],
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

    
    public function ActualizarDireccion($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_DIRECCIONES
                SET    
                                          NUMERO_CASO=?,
                                            CALLE =?, 
                                            AVENIDA =?,
                                            NUMERO_CASA =?,
                                            LUGARPOBLADO_ID =?,
                                            ZONA =?,
                                            MUNICIPIO_ID =?,
                                            DEPARTAMENTO_ID =?,
                                            PAIS_ID =?,
                                            LATITUD =?,
                                            LONGITUD =?,
                                            OBSERVACIONES =?,
                                            MEDIDOR_ID =?,
                                            USUARIO =?
                                            WHERE DIRECCION_ID =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("ssssisiiisssisi", 
                                            $datos['NumeroCaso'],
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
                                            $datos['IdDireccion']
                                            );
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }


    public function obtenerDireccion($IDDIRECCION) {
        $conexion = Conectar::conexion();

        $sql = "SELECT *
                FROM TB_DIRECCIONES
                WHERE DIRECCION_ID ='$IDDIRECCION'";
        $result = mysqli_query($conexion, $sql);

        $DIRECCION = mysqli_fetch_array($result);

        return $DIRECCION;
    }


    public function eliminarDireccion($idDireccion) {
        $conexion = Conectar::conexion();

        $sql = "DELETE FROM TB_DIRECCIONES 
                WHERE DIRECCION_ID = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idDireccion);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

}

