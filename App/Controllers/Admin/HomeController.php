<?php

namespace App\Controllers\Admin;

class HomeController extends Controller
{

    public  function home()
    {
        return $this -> views("home");
    }
}
