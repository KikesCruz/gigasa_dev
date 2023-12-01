<?php 
spl_autoload_register(function ($class) {
   

    $route = PATH_ROOT .str_replace('\\','/', $class) .'.php';
    
    if(file_exists($route)) {
        require $route;
    }else{  
        die('No se pudo cargar la ruta');
    }

    
});