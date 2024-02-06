<?php
namespace App\Models\Admin;

use Lib\Database;

class CategoriesModel{

    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function list_sub_categories(){
        $query = 'select 
        sc.id_sub_category,
        sc.name_sub_category,
        sc.status,
        cat.id_category,
        cat.name_category
        
        from sub_categories sc
        inner join categories cat on (cat.id_category = sc.id_category)';

        $this -> db -> query($query);

        $response = $this -> db -> set_result();

        return $response;
    }

    public function list_categories(){
        $query = "SELECT id_category, name_category, status FROM categories WHERE status = 'activado'";

        $this -> db -> query($query);

        $response = $this -> db -> set_result();

        return $response;
    }


    /*
    public function searchCategory($param){
       
        $query = "select category_name from categories where category_name like :category_name and id_depto = :id_depto";

        $this -> db ->query($query);
        $this -> db -> bind(":category_name",'%'.$param['category'].'%');
        $this -> db -> bind(":id_depto",$param['id_department']);

        $response = $this -> db -> only_result();

       
        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response = $response['category_name'];
        }
        return $response;

    }


    public function new_category($param){
        $query = "INSERT INTO categories VALUES (null,:category_name,:img_path,default,default,default,:id_depto)";

        $this -> db -> query($query);
        $this -> db -> bind(":category_name",$param['category']);
        $this -> db -> bind(":id_depto",$param['id_department']);
        $this -> db -> bind(":img_path",$param['picture']);


        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }

    public function disable($param){
        $query = "UPDATE categories SET status_category ='off' WHERE id_category = :id_category";

        $this -> db -> query($query);
        $this -> db -> bind(":id_category",$param);

        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }

    public function enable($param){
        $query = "UPDATE categories SET status_category ='on' WHERE id_category = :id_category";

        $this -> db -> query($query);
        $this -> db -> bind(":id_category",$param);

        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($param){

        $set = $param['id_depto'] == 0 ? "SET category_name = :category_name" : "SET id_depto = :id_depto";

        $query = "UPDATE categories {$set} WHERE id_category = :id_category";

        $this -> db -> query($query);

        if($param['id_depto'] == 0){
            $this -> db -> bind(":id_category",$param['id_category']);
            $this -> db -> bind(":category_name",$param['category_name']);
        }else{
            $this -> db -> bind(":id_category",$param['id_category']);
            $this -> db -> bind(":id_depto",$param['id_depto']);
        }

        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }

    }*/
}