<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo COMPANY; ?></title>


    <?php include_once("modulos/subheader.php"); ?>
</head>

<body class="light_theme  fixed_header left_nav_fixed">
<?php    
    
    $peticionAjax = false;

		require_once "./controladores/vistasControlador.php";

		$vt = new vistasControlador();
		$vistasR=$vt->obtener_vistas_controlador();

        if($vistasR=="login" || $vistasR=="404"):
            if ($vistasR=="login") {
                require_once "./vistas/contenidos/login-view.php";
            } else {
                require_once "./vistas/contenidos/404-view.php";
            }
        else:
            // session_start();
	?>
    <div class="wrapper">
        <!--\\\\\\\ wrapper Start \\\\\\-->
        <div class="header_bar">
            <!--\\\\\\\ header Start \\\\\\-->
            <div class="brand">
                <!--\\\\\\\ brand Start \\\\\\-->
                <div class="logo" style="display:block"><span class="theme_color">ULTIMO</span> Admin</div>
                <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="47" alt="s-logo" />
                    <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
            </div>
            <!--\\\\\\\ brand end \\\\\\-->
            <?php include_once("modulos/top.php"); ?>
            <!--\\\\\\\ header top bar end \\\\\\-->
        </div>
        <!--\\\\\\\ header end \\\\\\-->
        <div class="inner">

            
            <!--\\\\\\\ MENU LATERAL \\\\\\-->
            <?php include_once("modulos/main.php"); ?>
            <!--\\\\\\\MENU LATERAL\\\\\\-->

            <?php require_once($vistasR); ?>



        </div>
        <!--\\\\\\\ inner end\\\\\\-->
    </div>
    <!--\\\\\\\ wrapper end\\\\\\-->
    <?php endif; ?>
    <!--\\\\\\\ FOOTER \\\\\\-->
    <?php include_once("modulos/footer.php"); ?>
    <!--\\\\\\\FOOTER\\\\\\-->