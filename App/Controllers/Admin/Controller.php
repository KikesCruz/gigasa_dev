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
            header("Location:".BASE_URL.$route);
            exit;
        }else{
            header('Location:/admin');
            exit;
        }
    }


    public function sanitizerString($paramsString)
    {
        $paramsString = strtolower($paramsString);
        $paramsString = preg_replace('/\s{2,}/', ' ', $paramsString);
        $paramsString = preg_replace('/[^A-Za-záéíóúñÑ ]/', '', $paramsString);
        $paramsString = str_replace('&nbsp;', '', $paramsString);
        $paramsString = strip_tags($paramsString);
        $paramsString = html_entity_decode($paramsString);
        $paramsString = trim($paramsString);
        return $paramsString;
    }

    public function sanitizerInt($paramsInt)
    {

        $paramsInt = str_replace('&nbsp;', '', $paramsInt);
        $paramsInt = strip_tags($paramsInt);
        $paramsInt = html_entity_decode($paramsInt);
        $paramsInt = trim($paramsInt);

        return $paramsInt;
    }
}
