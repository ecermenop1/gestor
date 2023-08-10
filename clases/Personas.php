<?php

require_once "Conexion.php";
class Personas extends Conectar
{
    public function agregarPersonas($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_PROPIETARIO (NOMBRE1, 
                                            NOMBRE2,
                                            NOMBRE3,
                                            APELLIDO1,
                                            APELLIDO2,
                                            APELLIDO3,
                                            FECHA_NACIMIENTO,
                                            LUGAR_NACIMIENTO,
                                            TIPO_DOCUMENTO,
                                            NUMERO_DOCUMENTO,
                                            GENERO,
                                            NACIONALIDAD,
                                            DIRECCION,
                                            NOMBRE_PADRE,
                                            NOMBRE_MADRE,
                                            NUMERO_CELULAR,
                                            ALIAS,
                                            RUTA_FOTO
                                          ) 
							VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "ssssssssssssssssss",
            $datos['Nombre1'],
            $datos['Nombre2'],
            $datos['Nombre3'],
            $datos['Apellido1'],
            $datos['Apellido2'],
            $datos['Apellido3'],
            $datos['FechaNacimiento'],
            $datos['LugarNacimiento'],
            $datos['TipoDocumento'],
            $datos['NumeroDocumento'],
            $datos['Genero'],
            $datos['Nacionalidad'],
            $datos['Direccion'],
            $datos['NombrePadre'],
            $datos['NombreMadre'],
            $datos['Telefono'],
            $datos['Alias'],
            $datos['RutaImagen']      
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }
}
