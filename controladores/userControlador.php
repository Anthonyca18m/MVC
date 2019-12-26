<?php
    if ($peticionAjax) {
        require_once("../modelos/userModelo.php");
    } else {
        require_once("./modelos/userModelo.php");
    }

    class userControlador extends userModelo
    {
        
    }