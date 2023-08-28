<?php

require_once "Conexion.php";
class Medidores extends Conectar
{
    public function agregarMedidores($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_MEDIDORELECTRONICO (MEDIDOR_NUMERO, 
                                          EMPRESAELECTRICA
                                          ) 
							VALUES (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "ss",
            $datos['NumeroMedidor'],
            $datos['EmpresaElectrica'],
           
        );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }


    public function ActualizarMedidor($datos) {
        $conexion = Conectar::conexion();

        $sql = "UPDATE TB_MEDIDORELECTRONICO
                SET    
                                            MEDIDOR_NUMERO=?,
                                            EMPRESAELECTRICA =?
                                            WHERE MEDIDOR_ID =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("ssi", 
                                            $datos['NumeroMedidor'],
                                            $datos['EmpresaElectrica'],
                                            $datos['IdMedidor'],
                                            );
        $respuesta = $query->execute();
        $query->close();
        
        return $respuesta;
    }


    public function obtenerMedidor($idMedidor) {
        $conexion = Conectar::conexion();

        $sql = "SELECT *
                FROM TB_MEDIDORELECTRONICO
                WHERE MEDIDOR_ID ='$idMedidor'";
        $result = mysqli_query($conexion, $sql);

        $MEDIDOR = mysqli_fetch_array($result);

        return $MEDIDOR;
    }
}
