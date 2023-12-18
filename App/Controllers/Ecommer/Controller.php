<?php

namespace App\Controllers\Ecommer;

class Controller
{

    public function views($view, $data = [])
    {
        extract($data);

        $view = str_replace(".", "/", $view);


        if (!file_exists(PATH_ROOT . "Resources/Views/Ecommer/{$view}.php")) {
            return "No existe";
        }


        ob_start();

        include(PATH_ROOT . "Resources/Views/Ecommer/{$view}.php");

        $page = ob_get_clean();

        return $page;
    }

    public function debug($param)
    {

        echo '<pre>';
        print_r($param);
        echo '</pre>';
    }
}
