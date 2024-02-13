<?php

namespace App\Models\Admin;

use Lib\Database;

class ProductTypeModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_productsType()
    {

        try {

            $query = "
            select 
            tp.id_type_product,
            tp.name_type,
            tp.status,
            sc.id_sub_category,
            sc.name_sub_category,
            c.id_category,
            c.name_category
            from type_products tp
            inner join sub_categories sc on(sc.id_sub_category = tp.id_sub_category)
            inner join categories c ON (c.id_category = sc.id_category)";

            $this->db->query($query);
            $response = $this->db->set_result();
            return $response;
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function get_categories()
    {
        try {

            $query = "SELECT id_category, name_category FROM categories WHERE status = 'activado'";

            $this->db->query($query);
            $response = $this->db->set_result();
            return $response;
        } catch (\PDOException $e) {
            return [];
        }
    }


    public function get_sub_categories($param)
    {

        try {

            $query = "
            select 
            id_sub_category, 
            name_sub_category  
            from sub_categories where id_category  = :id_category and status_subcategory = 'activado' ";

            $this->db->query($query);

            $this->db->bind(":id_category", $param);

            $response = $this->db->set_result();

            return $response;
        } catch (\PDOException $e) {
            return [];
        }
    }

    /** search */

    public function search_name_type($param)
    {
        $query = "
            select 
            trim(tp.name_type) as type_name
            from type_products tp
            inner join sub_categories sc on(sc.id_sub_category = tp.id_sub_category)
            inner join categories c ON (c.id_category = sc.id_category)
            where sc.id_sub_category = :id_subcategory  and c.id_category = :id_category";

        $this -> db -> query($query);

        $this -> db -> bind(":id_subcategory",$param['id_subcategory']);
        $this -> db -> bind(":id_category", $param['id_category']);

        $response = $this->db->set_result();


        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response;
        }
        return $response;
    }

    public function new_type_product($param)
    {
        $query = "INSERT INTO type_products VALUES (NULL,:id_sub_category,:name_type,default,default)";

        $this->db->query($query);
        $this->db->bind(":id_sub_category", $param['id_subcategory']);
        $this->db->bind(":name_type", $param['name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function update_status_type($param){

        $query = "UPDATE type_products SET status = :status WHERE id_type_product = :id_type_product";

        $this -> db -> query($query);
        
        $this -> db -> bind(":id_type_product", $param['id_type_product']);
        $this -> db -> bind(":status", $param['status_type_product']);

        $message = $this -> db -> execute();

        return $message;


    } 
}
