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

    public function get_brands()
    {
        try {
            $query = "
            SELECT
            id_brand,
            name_brand,
            img_path,
            view_web,
            status_brand
            from brands";

            $this->db->query($query);
            $response = $this->db->set_result();

            return $response;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function search_brand($param)
    {
        $query = "SELECT name_brand FROM  brands WHERE name_brand = :name_brand";

        $this->db->query($query);
        $this->db->bind(":name_brand", $param);

        $response = $this->db->only_result();

        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response = $response['name_brand'];
        }
        return $response;
    }


    public function searchUrl($param)
    {
        $query = "SELECT name_brand,img_path FROM  brands WHERE id_brand = :id_brand";

        $this->db->query($query);
        $this->db->bind(":id_brand", $param);

        $response = $this->db->only_result();

        if (empty($response)) {
            $response = 'no_matches';
        }

        return $response;
    }


    public function new_brand($param)
    {
        $query = "INSERT INTO brands VALUES(null,:name_brand,:img_path,default,default,default)";

        $this->db->query($query);

        $this->db->bind(":name_brand", $param['brand']);

        $this->db->bind(":img_path", $param['picture']);


        if ($this->db->execute()) {
            return "success";
        } else {
            return "error";
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

    public function update_brand($param)
    {
        $query = "UPDATE brands SET name_brand = :name_brand, img_path = :img_path WHERE id_brand = :id_brand";

        $this->db->query($query);
        $this->db->bind(":id_brand", $param['id_brand']);
        $this->db->bind(":name_brand", $param['name_brand']);
        $this->db->bind(":img_path", $param['new_url']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
