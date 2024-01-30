<?php

namespace App\Models\Store;

use Lib\Database;

class StoreModel
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDepartments(){
        $query = "SELECT * FROM departments WHERE view_web = 'on' and status_depto = 'on'";

        $this -> db -> query($query);

        $response = $this -> db -> resultSet();

        return $response;
    }
}
