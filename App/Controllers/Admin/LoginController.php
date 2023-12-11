<?php 
namespace App\Controllers\Admin;

class LoginController extends Controller{
    public static function login(){
        return Controller::views("login");
    }

    public static function auth()
    {
        if ($_POST['email'] == 'admin') {

           
            
            
            header('Location: /admin/home');
        }else{

            header('Location:http: /admin');
        }

    }
}