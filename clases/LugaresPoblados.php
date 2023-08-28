<?php

require_once "Conexion.php";
class LugaresPoblados extends Conectar
{
    public function agregarLugaresPoblados($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_LUGARESPOBLADOS (LUGARPOBLADO_NOMBRE, 
                                          TIPO_LUGARPOBLADO, 
                                          RURALIDADES_LUGARPOBLADO,
                                          LUGARPOBLADO_ZONAYCALLE,
                                          MUNICIPIO_ID) 
							VALUES (?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "ssssi",
            $datos['NombreLugarPoblado'],
            $datos['TipoLugarPoblado'],
            $datos['Ruralidades'],
            $datos['ZonaCalle'],
            $datos['MunicipioLugarPoglado']
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function actualizaLugaresPoblados($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_LUGARESPOBLADOS
                SET    
                LUGARPOBLADO_NOMBRE=?,
                TIPO_LUGARPOBLADO =?, 
                RURALIDADES_LUGARPOBLADO =?,
                LUGARPOBLADO_ZONAYCALLE =?,
                MUNICIPIO_ID =?
                                            
                                            WHERE LUGARPOBLADO_ID =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("ssssii", 
                                            $datos['NombreLugarPoblado'],
                                            $datos['TipoLugarPoblado'],
                                            $datos['Ruralidades'],
                                            $datos['ZonaCalle'],
                                            $datos['MunicipioLugarPoglado'],
                                            $datos['MunicipioLugarPoglado'],
                                            );
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }


    public function obtenerLugarPoblado($idlugarpob) {
        $conexion = Conectar::conexion();
    
        $sql = "SELECT *
                FROM TB_LUGARESPOBLADOS
                WHERE LUGARPOBLADO_ID ='$idlugarpob'";
        $result = mysqli_query($conexion, $sql);
    
        $LugarPoblado = mysqli_fetch_array($result);
    
        return $LugarPoblado;
    }
    
}

