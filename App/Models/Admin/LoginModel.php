<?php 
namespace App\Models\Admin;

use Lib\Database;

class LoginModel{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function searchUser($param){

        $query = "select user_pass  from users where user_name = :user_name and user_status  = 'active' LIMIT 1";

        $this -> db -> query($query);

        $this -> db -> bind(':user_name',$param['user_name']);
 
    
        $response = $this -> db ->resultOne();

        return $response;
    }   
}