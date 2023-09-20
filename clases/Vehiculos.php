<?php

require_once "Conexion.php";
class Vehiculos extends Conectar
{
    public function agregarVehiculos($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_VEHICULO (NUMERO_CASO,
                                            NUMERO_OFICIO,
                                            PLACA, 
                                            TIPO_VEHICULO,
                                            MARCA_VEHICULO,
                                            LINEA_VEHICULO,
                                            MODELO_VEHICULO,
                                            COLOR_VEHICULO,
                                            NUMERO_CHASIS,
                                            NUMERO_MOTOR,
                                            PROPIETARIO_ID,
                                            FOTO_VEHICULO
                                          ) 
							VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "ssssssssssis",
            $datos['NumeroCaso'],
            $datos['NumeroOficio'],
            $datos['Placa'],
            $datos['TipoVehiculo'],
            $datos['MarcaVehiculo'],
            $datos['LineaVehiculo'],
            $datos['Modelo'],
            $datos['ColorVehiculo'],
            $datos['NumeroChasis'],
            $datos['NumeroMotor'],
            $datos['IdPropietario'],
            $datos['RutaImagen'],
                
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }
    public function ActualizarVehiculo($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_VEHICULO
                SET    
                                            NUMERO_CASO=?,
                                            NUMERO_OFICIO=?,
                                            PLACA=?, 
                                            TIPO_VEHICULO=?,
                                            MARCA_VEHICULO=?,
                                            LINEA_VEHICULO=?,
                                            MODELO_VEHICULO=?,
                                            COLOR_VEHICULO=?,
                                            NUMERO_CHASIS=?,
                                            NUMERO_MOTOR=?,
                                            PROPIETARIO_ID=?,
                                            FOTO_VEHICULO=?
                                            WHERE ID_VEHICULO =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("ssssssssssisi", 
                                            $datos['NumeroCaso'],
                                            $datos['NumeroOficio'],
                                            $datos['Placa'],
                                            $datos['TipoVehiculo'],
                                            $datos['MarcaVehiculo'],
                                            $datos['LineaVehiculo'],
                                            $datos['Modelo'],
                                            $datos['ColorVehiculo'],
                                            $datos['NumeroChasis'],
                                            $datos['NumeroMotor'],
                                            $datos['IdPropietario'],
                                            $datos['RutaImagen'],
                                            $datos['IdVehiculo'],);
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }

    public function obtenerVehiculo($IDVEHICULO) {
        $conexion = Conectar::conexion();

        $sql = "SELECT *
                FROM TB_VEHICULO
                WHERE ID_VEHICULO ='$IDVEHICULO'";
        $result = mysqli_query($conexion, $sql);

        $VEHICULO = mysqli_fetch_array($result);

        return $VEHICULO;
    }


    
    public function eliminarVehiculo($idVehiculo) {
        $conexion = Conectar::conexion();

        $sql = "DELETE FROM TB_VEHICULO 
                WHERE ID_VEHICULO = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idVehiculo);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
}


