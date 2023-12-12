<?php 
namespace App\Controllers\Admin;

use App\Models\Admin\LoginModel;

use Lib\Session;

class LoginController extends Controller{
    
    private $model;
    public function __construct(){
        $this -> model = new LoginModel();
    }
    
    public  function login(){
        return $this ->views("login");
    }

    public  function auth()
    {
        $json_response = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $request = [
                "user_name" => $_POST['user_name'],
                "user_pass" => $_POST['user_pass']
            ];

            $response = $this -> model -> searchUser($request);
            
            if($response == '' || is_null($response)){
                $json_response = "sin registros";
            
            }else{

                $json_response = "usr_valido";
            }
            
        }

        echo json_encode($json_response);
    }
}