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

    public function getCategories(){
        $query = "SELECT id_category,name_category, img_path, view_web, status FROM categories WHERE view_web = 'on' and status ='activado' ";

        $this->db->query($query);
        $response = $this->db->resultSet();

        return $response;
    }
}
