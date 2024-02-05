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

    public function redirect($route = false)
    {
        if ($route) {
            header("Location:" . URL_BASE . $route);
            exit;
        } else {
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
        $paramsString = html_entity_decode($paramsString, ENT_QUOTES, 'UTF-8');
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

    public function debug($param)
    {

        echo '<pre>';
        print_r($param);
        echo '</pre>';
    }


    public function img_save($route, $img_name, $type, $tmp,$name_file)
    {

        $files_type = array("image/jpeg", "image/jpg", "image/png");
        
        $extension = strtolower(pathinfo($name_file, PATHINFO_EXTENSION));
 
        switch ($type) {
            case "image/jpeg":
            case "image/jpg":
            case "image/png":
                $extension = 'webp';
                break;
            case "image/svg+xml":
            case "image/webp":
                // No necesitamos hacer cambios en la extensión
                break;
            default:
                return false; // Tipo de archivo no admitido
        }

        $save_img = str_replace(' ', '_', $route . $img_name . '.' . $extension);

        //exists file
        if (file_exists($save_img)) {
            unlink($save_img);
        }

        if (move_uploaded_file($tmp, $save_img)) {
            if (in_array($type, $files_type)) {
                $imagen_webp = imagecreatefromstring(file_get_contents($save_img));
                imagewebp($imagen_webp, $save_img, 65);
                imagedestroy($imagen_webp);
            }
            return $save_img;
        }else{
            return false;
        }

    }

    public function message_type($message)
    {
        $messages = ['success', 'duplicate', 'empty', 'error'];


        foreach ($messages as $key => $value) {
            if ($key == $message) {
                return $value;
            }
        }
    }

    public function new_folder($name_folder, $route)
    {

        $folder_product = $route . $name_folder;

        if (!file_exists($folder_product)) {
            mkdir($folder_product, 0700);
            return $folder_product;
        } else {
            return $folder_product;
        }
    }
}
