<?php
namespace App\Controllers\Admin;

use Lib\Session;
use App\Models\Admin\LoginModel;


class LoginController extends Controller{
    
    private $model;

    public function __construct(){
        $this -> model = new LoginModel();

    }
    
    public  function login(){
        return $this ->views("login");
    }

  /*  public  function auth()
    {
        $json_response = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $request = [
                "user_name" => $this -> sanitizerString($_POST['user_name']),
                "user_pass" => $this -> sanitizerString($_POST['user_pass'])
            ];


          $response = $this -> model -> searchUser($request);
          
            if($response == '' || is_null($response)){
                
                $json_response = "empty_search";
            
            }else{
                if(password_verify($request['user_pass'],$response['user_pass'])){
                    Session::init();
                    Session::add('user', $request['user_name']);
                    Session::add('auth', true);
                    $json_response = "Logged_Successfully";
                }else{
                    $json_response = "empty_search";
                }
                
            }
            
        }
      
    
        echo json_encode($json_response);
    }*/
}