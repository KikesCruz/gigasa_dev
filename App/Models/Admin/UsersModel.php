<?php

namespace App\Models\Admin;

use Lib\Database;

class UsersModel
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUser()
    {
        $query = "select * from users";
        $this->db->query($query);
        $response = $this->db->resultSet();
        return $response;
    }

    public function add_user($params){
        $query = "insert into users  values (SYS_GUID(),:user_name,:user_pass,default ,now())";
    
        $this -> db -> query($query);
    

        $this -> db -> bind(':user_name',$params['user_name']);
        $this->db->bind(':user_pass', $params['user_pass']);
        
        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }
}
