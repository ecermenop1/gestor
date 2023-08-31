<?php

require_once "Conexion.php";
class Medidores extends Conectar
{
    public function agregarMedidores($datos)
    {

        $conexion = Conectar::conexion();

        $sql = "INSERT INTO TB_MEDIDORELECTRONICO (NUMERO_CASO,MEDIDOR_NUMERO, 
                                          EMPRESAELECTRICA
                                          ) 
							VALUES (?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "sss",
            $datos['NumeroCaso'],
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
                SET                         NUMERO_CASO=?,
                                            MEDIDOR_NUMERO=?,
                                            EMPRESAELECTRICA =?
                                            WHERE MEDIDOR_ID =?";
                                           $query = $conexion->prepare($sql);
                                            $query->bind_param("sssi", 
                                            $datos['NumeroCaso'],
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


    public function eliminarMedidor($idLugarPoblado) {
        $conexion = Conectar::conexion();

        $sql = "DELETE FROM TB_MEDIDORELECTRONICO 
                WHERE MEDIDOR_ID = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $idLugarPoblado);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

}
