<?php

namespace App\Controllers\Admin;

class Controller
{

    public function views($view, $data = [])
    {
        extract($data);

        $view = str_replace(".", "/", $view);


        if (!file_exists(PATH_ROOT . "Resources/Views/Admin/{$view}.php")) {
            return "No existe";
        }


        ob_start();

        include(PATH_ROOT . "Resources/Views/Admin/{$view}.php");

        $page = ob_get_clean();

        return $page;
    }

    public function redirect($route = false){
        if($route){
            header("Location:".PATH_ROOT.$route);
        }else{
            header("Location:".PATH_ROOT . "Resources/Views/Admin");
        }
    }
}
