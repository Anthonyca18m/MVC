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
            }elseif ($datos["Alert"] == "AlertLoader") {
                $alerta="
                <script>
                    let timerInterval
                    Swal.fire({
                    title: '".$datos["Titulo"]."',
                    html: '".$datos["Texto"]."',
                    timer: 2000,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('b')
                            .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.timer
                    ) {
                        console.log('Estaba cerrado por el temporizador') // eslint-disable-line
                    }
                    })
                </script>
                ";
            }elseif ($datos["Alert"] == "AlertIP") {
                $alerta = "
                    <script>
                        const ipAPI = '//api.ipify.org?format=json'

                        Swal.queue([{
                        title: 'Tu IP es',
                        confirmButtonText: 'Ver mi IP',
                        text:
                            'Tu IP pública es ' +
                            '',
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            return fetch(ipAPI)
                            .then(response => response.json())
                            .then(data => Swal.insertQueueStep(data.ip))
                            .catch(() => {
                                Swal.insertQueueStep({
                                icon: 'error',
                                title: 'No se puede obtener su IP pública'
                                })
                            })
                        }
                        }])
                    </script>
                ";
            }elseif ($datos["Alert"] == "AlertQuestion") {
                $alerta = "
                    <script>
                    Swal.fire({
                        title: '".$datos["Titulo"]."',
                        text: '".$datos["Texto"]."',
                        icon: '".$datos["Tipo"]."',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '".$datos["TextoButtonConfirm"]."'
                      }).then((result) => {
                        if (result.value) {
                          Swal.fire(
                            '".$datos["TituloConfirm"]."',
                            '".$datos["TextoConfirm"]."',
                            '".$datos["TipoConfirm"]."'
                          )
                        }
                      })
                    </script>
                ";
            }elseif ($datos["Alert"] == "AlertQuestionResponse") {
                $alerta ="
                    <script>
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-success',
                          cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                      })
                      
                      swalWithBootstrapButtons.fire({
                        title: '".$datos["Titulo"]."',
                        text: '".$datos["Texto"]."',
                        icon: '".$datos["Tipo"]."',
                        showCancelButton: true,
                        confirmButtonText: '".$datos["TextoButtonConfirm"]."',
                        cancelButtonText: '".$datos["TextoButtonCancel"]."',
                        reverseButtons: true
                      }).then((result) => {
                        if (result.value) {
                          swalWithBootstrapButtons.fire(
                            '".$datos["TituloResponseConfirm"]."',
                            '".$datos["TextoResponseConfirm"]."',
                            '".$datos["TipoResponseConfirm"]."'
                          )
                        } else if (
                          /* Read more about handling dismissals below */
                          result.dismiss === Swal.DismissReason.cancel
                        ) {
                          swalWithBootstrapButtons.fire(
                            '".$datos["TituloResponseCancel"]."',
                            '".$datos["TextoResponseCancel"]."',
                            '".$datos["TipoResponseCancel"]."'
                          )
                        }
                      })
                    </script>
                ";
            }elseif ($datos["Alert"] == "AlertImage") {
                $alerta = "
                    <script>
                    Swal.fire({
                        title: '".$datos["Titulo"]."',
                        text: '".$datos["Texto"]."',
                        imageUrl: '".$datos["Image"]."',
                        imageWidth: ".$datos["ImageWidth"].",
                        imageHeight: ".$datos["ImageHeight"].",
                        imageAlt: '".$datos["ImagenAlt"]."',
                      })
                    </script>
                ";
            }
            return $alerta;
        }
        
    }
    