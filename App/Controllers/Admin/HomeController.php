<?php

namespace App\Controllers\Admin;
use Lib\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        /**Session::init();
        if (!Session::get('auth')) {
            $this->redirect();
        }*/

    }

    public  function home()
    {
        
        return $this -> views("home");
    }
}
