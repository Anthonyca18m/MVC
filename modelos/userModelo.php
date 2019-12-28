<?php

if ($peticionAjax) {
    require_once("../core/mainModel.php");
} else {
    require_once("./core/mainModel.php");
}

class userModelo extends mainModel
{
    protected function agregarUsuarioModelo($datos)
    {
        $sql = mainmodel::Conexion()->prepare("INSERT INTO user( Ucodigo,
                                                                idTipoUsuario, 
                                                                Uname,
                                                                Upaterno, 
                                                                Umaterno, 
                                                                Ucorreo, 
                                                                Upass, 
                                                                Uuser, 
                                                                idDocumento, 
                                                                Udocumento, 
                                                                Ugenero, 
                                                                UfotoPerfil, 
                                                                Ucelular, 
                                                                Utelefono, 
                                                                UfechaRegistro, 
                                                                UDireccion, 
                                                                idDistrito, 
                                                                accesos, 
                                                                idEstado) VALUES (  :Ucodigo,
                                                                                    :Utipousuario,
                                                                                    :Uname,
                                                                                    :Upaterno,
                                                                                    :Umaterno,
                                                                                    :Ucorreo,
                                                                                    :Upass,
                                                                                    :Uuser,
                                                                                    :Utipodocumento,
                                                                                    :Udocumento,
                                                                                    :Ugenero,
                                                                                    :Ufoto,
                                                                                    :Ucelular,
                                                                                    :Utelefono,
                                                                                    NOW(),
                                                                                    :Udireccion,
                                                                                    :Udistrito,
                                                                                    :Uaccesos,
                                                                                    :Uestado) ");
        $sql->bindParam(":Ucodigo", intval($datos['Ucodigo']));
        $sql->bindParam(":Utipousuario", intval($datos['Utipousuario']));
        $sql->bindParam(":Uname",       $datos['Uname']);
        $sql->bindParam(":Upaterno",    $datos['Upaterno']);
        $sql->bindParam(":Umaterno",    $datos['Umaterno']);
        $sql->bindParam(":Ucorreo",     $datos['Ucorreo']);
        $sql->bindParam(":Upass",       $datos['Upass']);
        $sql->bindParam(":Uuser",       $datos['Uuser']);
        $sql->bindParam(":Utipodocumento", intval($datos['Utipodocumento']));
        $sql->bindParam(":Udocumento",  $datos['Udocumento']);
        $sql->bindParam(":Ugenero",     intval($datos['Ugenero']));
        $sql->bindParam(":Ufoto",       $datos['Ufoto']);
        $sql->bindParam(":Ucelular",    $datos['Ucelular']);
        $sql->bindParam(":Utelefono",   $datos['Utelefono']);
        $sql->bindParam(":Udireccion",  $datos['Udireccion']);
        $sql->bindParam(":Udistrito",   $datos['Udistrito']);
        $sql->bindParam(":Uaccesos",    $datos['Uaccesos']);
        $sql->bindParam(":Uestado",     intval($datos['Uestado']));

        $sql->execute();
        return $sql;
    }

    protected function eliminarUsuario($id)
    {
        $sql = mainmodel::Conexion()->prepare("DELETE FROM user WHERE idUser = :Codigo");

        $sql->bindParam(":Codigo", intval($id));
        $sql->execute();
        return $sql;
    }
}
