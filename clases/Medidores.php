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
}
