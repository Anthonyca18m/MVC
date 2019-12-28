<?php
if ($peticionAjax) {
    require_once("../modelos/userModelo.php");
} else {
    require_once("./modelos/userModelo.php");
}

class userControlador extends userModelo
{
    public function agregarUsuarioControlador()
    {
        $reg_nombres = mainModel::cleanString($_POST["reg_nombres"]);
        $reg_paterno = mainModel::cleanString($_POST["reg_paterno"]);
        $reg_materno = mainModel::cleanString($_POST["reg_materno"]);
        $reg_genero = mainModel::cleanString($_POST["reg_genero"]);
        $reg_tipodoc = mainModel::cleanString($_POST["reg_tipodoc"]);
        $reg_doc = mainModel::cleanString($_POST["reg_doc"]);
        $reg_foto = mainModel::cleanString($_POST["reg_foto"]);
        $reg_user = mainModel::cleanString($_POST["reg_user"]);
        $reg_pass = mainModel::cleanString($_POST["reg_pass"]);
        $reg_pass2 = mainModel::cleanString($_POST["reg_pass2"]);
        $reg_email = mainModel::cleanString($_POST["reg_email"]);
        $reg_celular = mainModel::cleanString($_POST["reg_celular"]);
        $reg_telefono = mainModel::cleanString($_POST["reg_telefono"]);
        $reg_direccion = mainModel::cleanString($_POST["reg_direccion"]);
        $reg_referencia = mainModel::cleanString($_POST["reg_referencia"]);
        $reg_pais = mainModel::cleanString($_POST["reg_pais"]);
        $reg_departamento = mainModel::cleanString($_POST["reg_departamento"]);
        $reg_provincia = mainModel::cleanString($_POST["reg_provincia"]);
        $reg_distrito = mainModel::cleanString($_POST["reg_distrito"]);

        if ($reg_genero == 1 && $reg_foto == "") {
            $reg_foto == SERVERURL . "vistas/avatars/Male1Avatar.png";
        }elseif ($reg_genero == 2 && $reg_foto == "") {
            $reg_foto == SERVERURL . "vistas/avatars/Female1Avatar.png";
        }

        if($reg_pass != $reg_pass2){
            $alerta=[
                "Alert" => "AlertSimple",
                "Titulo"=> "Oh! Ocurrió algo inesperado",
                "Texto" => "Las contraseñas que acabas de ingresar no coinciden, por favor intentelo nuevamente!. nuevamente!.",
                "Tipo"  => "error"
            ];
        }else{
            $sql = mainModel::Execute_sql_simple("SELECT * FROM user WHERE Udocumento='$reg_doc'");
            if($sql->rowCount()>=1){
                $alerta=[
                    "Alert" => "AlertSimple",
                    "Titulo"=> "Oh! Ocurrió algo inesperado",
                    "Texto" => "El DNI ya se encuentra registrado, por favor intentelo nuevamente!.",
                    "Tipo"  => "error"
                ];
            }elseif($reg_email != ""){
                $sql = mainModel::Execute_sql_simple("SELECT * FROM user WHERE Ucorreo='$reg_email'");
                if($sql->rowCount()>=1){
                    $alerta=[
                        "Alert" => "AlertSimple",
                        "Titulo"=> "Oh! Ocurrió algo inesperado",
                        "Texto" => "El EMAIL ya se encuentra registrado, por favor intentelo nuevamente!.",
                        "Tipo"  => "error"
                    ];
                }
            }elseif($reg_user != ""){
                $sql = mainModel::Execute_sql_simple("SELECT * FROM user WHERE Uuser='$reg_user'");
                if($sql->rowCount()>=1){
                    $alerta=[
                        "Alert" => "AlertSimple",
                        "Titulo"=> "Oh! Ocurrió algo inesperado",
                        "Texto" => "El Usuario ya se encuentra registrado, por favor intentelo nuevamente!.",
                        "Tipo"  => "error"
                    ];
                }
            }else{
                $sql = mainModel::Execute_sql_simple("SELECT idUser FROM user");
                $numero = ($sql->rowCount())+1;
                $CodigoRR = mainmodel::generarCodigoRR("",5,$numero);
                $contrasena = mainModel::encryption($reg_pass);

                $dataCuenta= [
                    "Ucodigo"=> $CodigoRR,
                    "Utipousuario"=> 1,
                    "Uname"=> $reg_nombres,
                    "Upaterno"=> $reg_paterno,
                    "Umaterno"=> $reg_materno,
                    "Ucorreo"=> $reg_email,
                    "Upass"=> $contrasena,
                    "Uuser"=> $reg_user,
                    "Utipodocumento"=> $reg_tipodoc,
                    "Udocumento"=> $reg_doc,
                    "Ugenero"=> $reg_genero,
                    "Ufoto"=> $reg_foto,
                    "Ucelular"=> $reg_celular,
                    "Utelefono"=> $reg_telefono,
                    "Udireccion"=> $reg_direccion,
                    "Udistrito"=> $reg_distrito,
                    "Uaccesos"=> "0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.0.",
                    "Uestado"=> 1
                ];
                $cuenta = userControlador::agregarUsuarioModelo($dataCuenta);

                if($cuenta->rowCount()>=1){
                    $alerta=[
                        "Alert" => "AlertLimpiar",
                        "Titulo"=> "Excelente!",
                        "Texto" => "Has agregado un nuevo usuario!.",
                        "Tipo"  => "success"
                    ];
                }else{
                    $alerta=[
                        "Alert" => "Simple",
                        "Titulo"=> "Oh! Ocurrió algo inesperado",
                        "Texto" => "Tenemos problemas con el servidor, intentelo más tarde.",
                        "Tipo"  => "error"
                    ];
                }
            }
        }

        return mainModel::sweetAlert($alerta);
        
    }
}
