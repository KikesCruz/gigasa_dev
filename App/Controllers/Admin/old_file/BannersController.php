<?php

namespace App\Controllers\Admin;

use App\Models\Admin\BannerModel;

class BannersController extends Controller
{

    private $model;
    public function __construct()
    {
        $this->model = new BannerModel();
    }

    public function banners_page()
    {
        return $this->views('banners');
    }

    public function banners_upload()
    {

       $files_access = array("image/jpeg", "image/jpg","image/png");     
       
       
       if($_SERVER['REQUEST_METHOD'] && isset($_FILES['banners'])){
            $imagen = $_FILES['banners'];
            if(in_array($imagen["type"],$files_access)){
                $path = PATH_ROOT.'Public/Img/Ecommers/Banner/';
                
                $name = explode(".",$_FILES['banners']['name']);
                $name_img = $name[0].'.webp';
                
                $path_finally = $path.$name_img;



                if(move_uploaded_file($imagen['tmp_name'], $path_finally)){
                    $imagen_webp = imagecreatefromstring(file_get_contents($path_finally));
                    imagewebp($imagen_webp,$path_finally,65);
                    imagedestroy($imagen_webp);
                }


            }
        }

       /* $img_dir = PATH_ROOT . "Public/Img/Ecommers/banner/";

        if ($_FILES['img-file']['type'] == 'image/jpeg') {
            imagewebp();
        }*/
        $this->debug($_FILES);
    }
}
