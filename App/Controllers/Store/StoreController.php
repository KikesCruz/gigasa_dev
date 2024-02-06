<?php

namespace App\Controllers\Store;

use App\Models\Store\StoreModel;

class StoreController extends Controller
{

    private $model;
    public function __construct()
    {
        $this->model = new StoreModel();
    }
    public function home()
    { 

        $categories = $this -> model ->getCategories();
        
        $home_page = [
            "categories" => $categories
        ];


        return $this->views("home",$home_page);
    }
    
}
