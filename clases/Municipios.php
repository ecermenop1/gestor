<?php

require_once "Conexion.php";
class Municipios extends Conectar
{
    public function agregarMunicipios($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_MUNICIPIO (CODIGOMUNICIPIO, MUNICIPIO_NOMBRE, DEPARTAMENTO_ID) 
							VALUES (?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "isi",
            $datos['CodigoMunicipio'],
            $datos['NombreMunicipio'],
            $datos['Departamento']
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function ActualizarMunicipio($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_MUNICIPIO
                SET    
                                            CODIGOMUNICIPIO=?,
                                            MUNICIPIO_NOMBRE =?, 
                                            DEPARTAMENTO_ID =?
                                            WHERE MUNICIPIO_ID =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("ssii", 
                                            $datos['CodigoMunicipio'],
                                            $datos['NombreMunicipio'],
                                            $datos['Departamento'],
                                            $datos['IdMunicipio']
                                        
                                            );
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }

    public function obtenerMunicipio($idMunicipio) {
        $conexion = Conectar::conexion();

        $sql = "SELECT *
                FROM TB_MUNICIPIO
                WHERE MUNICIPIO_ID ='$idMunicipio'";
        $result = mysqli_query($conexion, $sql);

        $DIRECCION = mysqli_fetch_array($result);

        return $DIRECCION;
    }


    public function eliminarMunicipio($idPais) {
        $conexion = Conectar::conexion();

        $sql = "DELETE FROM TB_MUNICIPIO 
                WHERE MUNICIPIO_ID = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idPais);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

}
