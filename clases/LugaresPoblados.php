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
}
