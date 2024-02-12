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
        $query = "select name_category, sc.name_sub_category from categories cat
        inner join sub_categories sc on(sc.id_category = cat.id_category)";

        $this->db->query($query);
        $response = $this->db -> set_result();

        return $response;
    }
}
