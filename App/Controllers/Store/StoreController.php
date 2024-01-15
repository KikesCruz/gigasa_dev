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
        return $this->views("home");
    }
}
