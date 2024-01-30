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
            header("Location:".URL_BASE.$route);
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

    public function debug($param){
        
        echo'<pre>';
        print_r($param);
        echo '</pre>';
    }


    public function img_save($route, $img_name, $type,$tmp){
        
        $files_type = array("image/jpeg", "image/jpg","image/png");   
 
     
        if(in_array($type, $files_type)){
 
             $save_img = str_replace(' ','_',$route.$img_name.'.webp');
 
             if(move_uploaded_file($tmp,$save_img)){
                 $imagen_webp = imagecreatefromstring(file_get_contents($save_img));
                 imagewebp($imagen_webp,$save_img,65);
                 imagedestroy($imagen_webp);
                 return $save_img;
             }
         }else if($type == "image/svg+xml"){
             
             $save_img = str_replace(' ','_',$route.$img_name.'.svg');
             move_uploaded_file($tmp,$save_img);
             return $save_img;
         }else if($type == "image/webp"){
            $save_img = str_replace(' ','_',$route.$img_name.'.webp');
            move_uploaded_file($tmp,$save_img);
            return $save_img;
         }
 
     }

    public function message_type($message){
        $messages = ['success','empty','error','duplicate','update'];

        
        foreach ($messages as $key => $value) {
            if($key == $message){
                return $value;
            }
        }
    }

    public function new_folder($name_folder, $route){

        $folder_product = $route.$name_folder; 

        if(!file_exists($folder_product)){
            mkdir($folder_product,0700);
            return $folder_product;
        }else{
            return $folder_product;
        }
        
    }
}
