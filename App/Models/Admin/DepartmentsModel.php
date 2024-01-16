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

    public function findByDepto($param)
    {
        $query = "SELECT depto_name FROM departments WHERE depto_name = :depto_name";

        $this->db->query($query);
        $this->db->bind(":depto_name", $param);

        $response = $this->db->resultOne();

        return $response;
    }

    public function addDepto($param)
    {
        $query = "INSERT INTO departments VALUES(null,:depto_name,:img_name,default,default,default)";

        $this->db->query($query);
        $this->db->bind(":depto_name", $param);
        $this->db->bind(":img_name", str_replace(' ','_',$param.'.webp'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
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

    public function updateDepto($param){
        $query = "UPDATE departments SET depto_name = :depto_name WHERE id_depto = :id_depto ";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param['id_depto']);
        $this->db->bind(":depto_name", $param['name_depto']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
