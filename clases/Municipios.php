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
}
