<?php

namespace App\Controllers\Ecommer;

class EcommerController extends Controller
{
    public static function index()
    {
        return Controller::views("home");
    }
}
