<?php

namespace App\Models\Admin;

use Lib\Database;
class ProfileModel{

    private $db; 
    public function __construct(){
        $this->db = new Database();
    }

    public function getInfoProfile(){
        $query= "select * from users";
        $this -> db -> query($query);
        $response = $this -> db -> resultOne();
        return $response;
    }


}