<?php

require_once "Conexion.php";
class Vehiculos extends Conectar
{
    public function agregarVehiculos($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_VEHICULO (PLACA, 
                                            TIPO_VEHICULO,
                                            MARCA_VEHICULO,
                                            LINEA_VEHICULO,
                                            MODELO_VEHICULO,
                                            COLOR_VEHICULO,
                                            PROPIETARIO_ID,
                                            FOTO_VEHICULO
                                          ) 
							VALUES (?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "ssssssss",
            $datos['Placa'],
            $datos['TipoVehiculo'],
            $datos['MarcaVehiculo'],
            $datos['LineaVehiculo'],
            $datos['Modelo'],
            $datos['ColorVehiculo'],
            $datos['Propietario'],
            $datos['RutaImagen'],
                
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }
}
