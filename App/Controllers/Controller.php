<?php
namespace App\Controllers;

class Controller{

    public static function views($view, $data = []){
        extract($data);

        $view = str_replace(".", "/", $view);


        if (!file_exists(PATH_ROOT . "Resources/Views/Components/{$view}.php")) {
            return "No existe";
        }


        ob_start();

        include(PATH_ROOT . "Resources/Views/Components/{$view}.php");

        $page = ob_get_clean();

        return $page;;
                      
    }
    
}