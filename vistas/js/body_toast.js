$(document).ready(function(){ 

   /* $("#btn1").click(function(){
        //tipos de mensajes succes, info, warning, error
        //titulo y mensaje de texto
        toastr["warning"]("Mensaje de prueba", "Demo");   
    });*/
    
    toastr.options = { 
        //primeras opciones
        "closeButton": false, //boton cerrar
        "debug": false,
        "newestOnTop": false, //notificaciones mas nuevas van en la parte superior
        "progressBar": true, //barra de progreso hasta que se oculta la notificacion
        "preventDuplicates": false, //para prevenir mensajes duplicados
        
        "onclick": null,
        
        //Posición de la notificación
        //toast-bottom-left, toast-bottom-right, toast-bottom-left, toast-top-full-width, toast-top-center
        "positionClass": "toast-top-right",
                
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2500",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
    /*
    toastr.options = {
          "closeButton": close,
          "depurar": true,
          "newestOnTop": false,
          "progressBar": false,
          "rtl": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": 300,
          "hideDuration": 1000,
          "timeOut": 2500,
          "extendedTimeOut": 1000,
          "showEasing": "swing",
          "hideEasing": "lineal",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }*/
    
    
    
});	    