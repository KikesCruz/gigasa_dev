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

    public function getAllDepartments()
    {

        $query = "SELECT * FROM department";

        $this->db->query($query);
        $response = $this->db->resultSet();

        return $response;
    }

    public function findByDepto($param)
    {
        $query = "SELECT * FROM department WHERE depto_name = :depto_name";

        $this->db->query($query);
        $this->db->bind(":depto_name", $param);

        $response = $this->db->resultOne();

        return $response;
    }

    public function addDepto($param)
    {
        $query = "INSERT INTO department VALUES(null,:depto_name,default,default)";

        $this->db->query($query);
        $this->db->bind(":depto_name", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function enableDepto($param)
    {

        $query = "UPDATE department SET status_depto = 'on' WHERE id_depto = :id_depto ";

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

        $query = "UPDATE department SET status_depto = 'off' WHERE id_depto = :id_depto ";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateDepto($param){
        $query = "UPDATE department SET depto_name = :depto_name WHERE id_depto = :id_depto ";

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
