<?php 
	class vistasModelo{
		protected function obtener_vistas_modelo($vistas){
			$listaBlanca=["404",
							"backup",
							"consultPrice",
							"datosGenerales",
							"historySesion",
							"home",
							"listAlmacen",
							"listCategory",
							"listProduct",
							"listUsers",
							"login",
							"registerAlmacen",
							"registerCategory",
							"registerProduct",
							"registerUsers",
							"reportAlmacen",
							"reportCategory",
							"reportProduct",
							"reportUsers",
							"users",
							"editProfile",
							"profile"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="login";
				}
			}elseif($vistas=="login"){
				$contenido="login";
			}elseif($vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}