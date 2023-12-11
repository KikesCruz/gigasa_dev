<?php 
namespace App\Controllers\Admin;

class LoginController extends Controller{
    public static function login(){
        return Controller::views("login");
    }

    public static function auth()
    {
        if ($_POST['email'] == 'admin') {

            return Controller::views('home', [
                'dato' => $_POST['email']
            ]);
        }
        header('Location: /admin');
    }
}