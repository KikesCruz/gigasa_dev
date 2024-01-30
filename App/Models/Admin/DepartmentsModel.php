<?php

namespace App\Models\Admin;

use Lib\Database;

class DepartmentsModel
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDepartments()
    {

        $query = "SELECT * FROM departments";

        $this->db->query($query);
        $response = $this->db->resultSet();

        return $response;
    }

    public function searchDepartment($param)
    {
        $query = "SELECT depto_name FROM departments WHERE depto_name = :depto_name";

        $this->db->query($query);
        $this->db->bind(":depto_name", $param);

        $response = $this->db->resultOne();

        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response = $response['depto_name'];
        }
        return $response;
    }

    public function searchUrl($param)
    {
        $query = "SELECT depto_name,path_img FROM departments WHERE id_depto = :id_depto";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);

        $response = $this->db->resultOne();

        if (empty($response)) {
            $response = 'no_matches';
        } 
        return $response;
    }

    public function new_department($param)
    {

        $query = "INSERT INTO departments VALUES(null,:depto_name,:path_img,default,default,default)";

        $this->db->query($query);
        $this->db->bind(":depto_name", $param['name_department']);
        $this->db->bind(":path_img", $param['picture']);


        if ($this->db->execute()) {
            return "success";
        } else {
            return "error";
        }
    }

    public function enableDepto($param)
    {

        $query = "UPDATE departments SET status_depto = 'on' WHERE id_depto = :id_depto ";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function disableDepto($param)
    {

        $query = "UPDATE departments SET status_depto = 'off' WHERE id_depto = :id_depto ";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateDepto($param)
    {
        $query = "UPDATE departments SET depto_name = :depto_name, path_img = :path_img  WHERE id_depto = :id_depto ";

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

    public function off_web($param){
        $query = "UPDATE departments SET view_web = 'off'  WHERE id_depto = :id_depto ";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);
   

        if ($this->db->execute()) {
            return 'success';
        } else {
            return 'error';
        }
    }

    
    public function on_web($param){
        $query = "UPDATE departments SET view_web = 'on'  WHERE id_depto = :id_depto ";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);
   

        if ($this->db->execute()) {
            return 'success';
        } else {
            return 'error';
        }
    }
}
