<?php

    if ($peticionAjax) {
        require_once("../core/configAPP.php");
    } else {
        require_once("./core/configAPP.php");
    }
    

    class mainModel{

        protected function Conexion(){
            $link  = new PDO(SGBD, DB_USER, DB_PASS);
            return $link;
        }

        protected function Execute_sql_simple($sql){
            $response = self::Conexion()->prepare($sql);
            $response->execute();
            return $response;
        }

        public function encryption($string){
            $salida = FALSE;
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $salida = openssl_encrypt($string, METHOD, $key, 0, $iv);
            
            return $salida;
        }

        protected function decryption($string){
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $salida = openssl_encrypt(base64_decode($string), METHOD, $key, 0, $iv);

            return $salida;
        }

        protected function generarCodigoRR($letra, $length, $num){
            for ($i=0; $i < $length; $i++) { 
                
                $number = rand(0,9);
                $letra .= $number;
            }
            return $letra."-".$num;
        }

        protected function cleanString($cadena){
            $cadena = trim($cadena);
            $cadena = stripslashes($cadena);
            $cadena = str_ireplace('<script>',"", $cadena);
            $cadena = str_ireplace('</script>',"", $cadena);
            $cadena = str_ireplace('<script src',"", $cadena);
            $cadena = str_ireplace('<script type=',"", $cadena);
            $cadena = str_ireplace('SELECT * FROM ',"", $cadena);
            $cadena = str_ireplace('DROP DATABASE',"", $cadena);
            $cadena = str_ireplace('DELETE DATABASE',"", $cadena);
            $cadena = str_ireplace('DELETE FROM',"", $cadena);
            $cadena = str_ireplace('INSERT INTO',"", $cadena);
            $cadena = str_ireplace('VALUES',"", $cadena);
            $cadena = str_ireplace('--',"", $cadena);
            $cadena = str_ireplace('PREPARE',"", $cadena);
            $cadena = str_ireplace('{}',"", $cadena);
            $cadena = str_ireplace('[]',"", $cadena);
            $cadena = str_ireplace(']',"", $cadena);
            $cadena = str_ireplace('[',"", $cadena);
            $cadena = str_ireplace('==',"", $cadena);
            $cadena = str_ireplace('=',"", $cadena);
            $cadena = str_ireplace('WHERE',"", $cadena);
            $cadena = str_ireplace(';',"", $cadena);

            return $cadena;
        }


        protected function sweetAlert($datos){
            if($datos['Alert']== "AlertaRight"){
                $alerta = "
                     <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        
                        Toast.fire({
                            icon: '".$datos["Tipo"]."',
                            title: '".$datos["Mensaje"]."'
                        })
                     </script>
                ";
            }elseif ($datos["Alert"] == "AlertaSimple") {
                $alerta = "
                    <script>
                        Swal.fire(
                            '".$datos["Titulo"]."',
                            '".$datos["Texto"]."',
                            '".$datos["Tipo"]."'
                          )
                    </script>
                ";
            }elseif ($datos["Alert"] == "AlertRecarga") {
                $alerta = "
                    <script>
                        Swal.fire({
                            title: '".$datos["Titulo"]."',
                            text: '".$datos["Texto"]."',
                            icon: '".$datos["Tipo"]."',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            location.reload();
                        })
                    </script>
                ";
            }elseif ($datos["Alert"] == "AlertLimpiar") {
                $alerta = "
                    <script>
                        Swal.fire({
                            title: '".$datos["Titulo"]."',
                            text: '".$datos["Texto"]."',
                            icon: '".$datos["Tipo"]."',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                          $('.FormulariosAjax')[0].reset;
                        })
                    </script>
                ";
            }
        }
        
    }
    