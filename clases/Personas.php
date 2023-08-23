<?php

require_once "Conexion.php";
class Personas extends Conectar
{
    public function agregarPersonas($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_PROPIETARIO (NUMERO_CASO,
                                            NOMBRE1, 
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
							VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sssssssssssssssssss",
            $datos['NumeroCaso'],
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


    public function ActualizarPersona($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_PROPIETARIO
                SET    
                                            NUMERO_CASO=?,
                                            NOMBRE1=?, 
                                            NOMBRE2=?,
                                            NOMBRE3=?,
                                            APELLIDO1=?,
                                            APELLIDO2=?,
                                            APELLIDO3=?,
                                            FECHA_NACIMIENTO=?,
                                            LUGAR_NACIMIENTO=?,
                                            TIPO_DOCUMENTO=?,
                                            NUMERO_DOCUMENTO=?,
                                            GENERO= ?,
                                            NACIONALIDAD=?,
                                            DIRECCION=?,
                                            NOMBRE_PADRE=?,
                                            NOMBRE_MADRE=?,
                                            NUMERO_CELULAR=?,
                                            ALIAS=?,
                                            RUTA_FOTO=?
                                            WHERE PROPIETARIO_ID =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("sssssssssssssssssssi", 
                                            $datos['NumeroCaso'],
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
                                            $datos['RutaImagen'],
                                            $datos['IdPropietario']);
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }

    public function obtenerPropietario($IDPROPIETARIO) {
        $conexion = Conectar::conexion();

        $sql = "SELECT *
                FROM TB_PROPIETARIO
                WHERE PROPIETARIO_ID ='$IDPROPIETARIO'";
        $result = mysqli_query($conexion, $sql);

        $PROPIETARIO = mysqli_fetch_array($result);

        return $PROPIETARIO;
    }
}
