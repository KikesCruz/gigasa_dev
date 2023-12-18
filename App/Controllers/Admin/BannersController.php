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

        $db_response = $this->model->getBanners();
        $banners = json_decode($db_response['banner'], true);

        return $this->views('banners', $banners);
    }

    public function banners_upload()
    {

        $img_dir = PATH_ROOT . "Public/Img/Ecommers/banner/";

        if ($_FILES['img-file']['type'] == 'image/jpeg') {
            if (move_uploaded_file($_FILES['img-file']['tmp_name'], $img_dir. 'banner-image-1.jpg')) {
                echo "imagen subida";
            }
        }
        $this->debug($_FILES);
    }
}
