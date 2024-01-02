<?php

namespace App\Controllers\Ecommer;

use App\Models\Ecommer\EcommerModel;

class EcommerController extends Controller
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
