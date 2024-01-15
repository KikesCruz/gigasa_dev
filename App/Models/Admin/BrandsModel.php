<?php

namespace App\Models\Admin;

use Lib\Database;

class BrandsModel
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBrands()
    {

        $query = "SELECT * FROM brands";

        $this->db->query($query);
        $response = $this->db->resultSet();

        return $response;
    }

    public function findBybrand($param)
    {
        $query = "SELECT * FROM      WHERE brand_name = :brand_name";

        $this->db->query($query);
        $this->db->bind(":brand_name", $param);

        $response = $this->db->resultOne();

        return $response;
    }

    public function addbrand($param)
    {
        $query = "INSERT INTO brands VALUES(null,:brand_name,default,default)";

        $this->db->query($query);
        $this->db->bind(":brand_name", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function enablebrand($param)
    {

        $query = "UPDATE brands SET status_brand = 'on' WHERE id_brand = :id_brand ";

        $this->db->query($query);
        $this->db->bind(":id_brand", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function disablebrand($param)
    {

        $query = "UPDATE brands SET status_brand = 'off' WHERE id_brand = :id_brand ";

        $this->db->query($query);
        $this->db->bind(":id_brand", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatebrand($param){
        $query = "UPDATE brands SET brand_name = :brand_name WHERE id_brand = :id_brand";

        $this->db->query($query);
        $this->db->bind(":id_brand", $param['id_brand']);
        $this->db->bind(":brand_name", $param['name_brand']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
