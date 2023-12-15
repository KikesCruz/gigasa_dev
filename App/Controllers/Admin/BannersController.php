<?php

namespace App\Controllers\Admin;

use App\Models\Admin\BannerModel;

class BannersController extends Controller{

    private $model;
    public function __construct(){
        $this -> model = new BannerModel();
    }

    public function banners_page(){

        $db_response = $this -> model ->getBanners();
        $banners = json_decode($db_response['banner'],true);

        return $this -> views('banners',$banners);
    }
}