<?php
namespace App\Models\Admin;

use Lib\Database;

class SubCategoriesModel{

    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    /**DATATABLES  */
    public function getAllSubCategories(){
        $query = 'SELECT 
        subcat.id_subcategory, 
        subcat.subcategory_name, 
        subcat.status_subcategory,
        cat.id_category,
        cat.category_name,
        cat.status_category 
        FROM category cat
        INNER JOIN sub_category subcat ON (subcat.id_category = cat.id_category);';

        $this -> db -> query($query);

        $response = $this -> db -> resultSet();

        return $response;
    }

    /** ALL CAT */
    public function getAllCategories(){
        $query = "SELECT * FROM category WHERE status_category = 'on'";

        $this -> db -> query($query);
        $response = $this -> db -> resultSet();
        return $response;
    }

    /**ALL SUBCAT  */
    public function getAllDepartments(){
        $query = "SELECT * FROM department WHERE status_depto = 'on'";

        $this -> db -> query($query);

        $response = $this -> db -> resultSet();

        return $response;
    }

    /***SEARCH SUBCAT BY  */
    public function searchSubCategory($param){
       
        $query = "SELECT * FROM subcategory  WHERE subcategory_name LIKE :subcategory_name AND id_category = :id_category";

        $this -> db ->query($query);
        $this -> db -> bind(":subcategory_name",'%' .$param['name_subcategory'].'%');
        $this -> db -> bind(":id_category", $param['id_category']);

        $response = $this -> db -> resultOne();

        return $response;

    }

    public function new_subcategory($param){
        $query = "INSERT INTO subcategory VALUES (NULL,:subcategory_name,default,default,:id_category)";

        $this -> db -> query($query);
        $this -> db -> bind(":category_name",$param['name_subcategory']);
        $this -> db -> bind(":id_depto",$param['id_category']);

        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }

}