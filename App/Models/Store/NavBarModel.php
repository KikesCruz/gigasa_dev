<?php

namespace App\Models\Store;

use Lib\Database;

class NavBarModel

{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategories(){
        $query = "SELECT id_category,name_category FROM categories WHERE view_web = 'on' and status ='activado' ";

        $this->db->query($query);
        $response = $this->db -> set_result();

        return $response;
    }
}
