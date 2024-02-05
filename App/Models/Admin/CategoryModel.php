<?php

/**
 * Author: Enrique Cruz
 * DB_functions: 
 *  set_result() => conjunto de datos,
 *  only_result() => un solo dato
 *  validate_Data() => verifica array
 */

namespace App\Models\Admin;

use Lib\Database;
use PDOException;



class CategoryModel
{

    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }


    public function getCategories()
    {

        $query = "SELECT id_category,name_category, img_path, view_web, status FROM categories";

        $this->db->query($query);
        $response = $this->db->set_result();

        return $response;
    }

    public function search_category($param)
    {
        $query = "SELECT name_category FROM categories WHERE name_category = :name_category";

        $this->db->query($query);
        $this->db->bind(":name_category", $param);

        $response = $this->db->only_result();

        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response = $response['name_category'];
        }
        return $response;
    }

    public function search_img($param)
    {
        $query = "SELECT name_category, img_path FROM categories WHERE id_category = :id_category";

        $this->db->query($query);
        $this->db->bind(":id_category", $param);

        $response = $this->db->only_result();

        if (empty($response)) {
            $response = 'no_matches';
        }
        return $response;
    }

    public function new_category($param)
    {

        $query = "INSERT INTO categories VALUES(null,:name_category,:img_path,default,default,default)";

        $this->db->query($query);
        $this->db->bind(":name_category", $param['name_category']);
        $this->db->bind(":img_path", $param['picture']);


        if ($this->db->execute()) {
            return "success";
        } else {
            return "error";
        }
    }

    public function status_category($param)
    {
        $validate = '';
        $keys = ['id_category', 'status'];

        $validate =  $this->db->validate_data($keys, $param);

        if (!is_array($validate)) {
            return $validate;
        }

        $query = "UPDATE categories SET status = :status WHERE id_category = :id_category ";

        $this->db->query($query);
        $this->db->bind(":id_category", $validate['id_category']);
        $this->db->bind(":status", $validate['status']);


        $message = $this->db->execute();
        $this->db->closed();



        return $message;
    }


    public function update_category($param)
    {
        $query = "UPDATE categories SET name_category = :name_category, img_path = :img_path  WHERE id_category = :id_category";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param['id_department']);
        $this->db->bind(":depto_name", $param['department_name']);
        $this->db->bind(":path_img", $param['new_url']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function web_status($param)
    {
        $query = "UPDATE categories SET view_web = :status_web  WHERE id_category = :id_category";

        $this->db->query($query);
        $this->db->bind(":id_category", $param['id_category']);
        $this->db->bind(":status_web", $param['web_status']);


        if ($this->db->execute()) {
            return 'success';
        } else {
            return 'error';
        }
    }
}
