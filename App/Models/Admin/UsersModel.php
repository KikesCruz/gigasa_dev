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
        $this->db->bind(':user_pass', password_hash($params['user_pass'], PASSWORD_DEFAULT));
        
        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_user($params){
        $query = "UPDATE users SET user_pass = :user_pass WHERE id_user = :id_user";

        $this -> db -> query($query);
        $this->db->bind(":id_user", $params['id_user']);
        $this -> db -> bind(":user_pass",password_hash($params['user_password'], PASSWORD_DEFAULT));
        
        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }

    public function down_user($params)
    {
        $query = "UPDATE users SET user_status = 'inactive' WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind(":id_user", $params);
     

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function active_user($params){
        $query = "UPDATE users SET user_status = 'active' WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind(":id_user", $params);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
