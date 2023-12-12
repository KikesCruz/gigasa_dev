<?php

namespace App\Controllers\Ecommer;

class EcommerController extends Controller
{
    public function index()
    {
        return $this -> views("home");
    }
}
