<?php

namespace App\Controllers\Ecommer;

use App\Models\Ecommer\EcommerModel;

class IndexController extends Controller
{

    private $model;
    public function __construct()
    {
        $this->model = new EcommerModel();
    }
    public function index()
    { 
        return $this->views("home");
    }
}
