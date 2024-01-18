<?php
namespace App\Models\Admin;

use Lib\Database;

class CategoriesModel{

    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function getAllCategories(){
        $query = 'select 
        depto.id_depto, 
        depto.depto_name, 
        depto.status_depto,
        cat.id_category,
        cat.category_name,
        cat.status_category,
        concat(cat.img_path,cat.img_name) as path_img,
        cat.view_web
        from categories cat
        inner join departments depto on (depto.id_depto = cat.id_depto)';

        $this -> db -> query($query);

        $response = $this -> db -> resultSet();

        return $response;
    }

    public function getAllDepartments(){
        $query = "SELECT id_depto, depto_name, status_depto FROM departments WHERE status_depto = 'on'";

        $this -> db -> query($query);

        $response = $this -> db -> resultSet();

        return $response;
    }

    public function searchCategory($param){
       
        $query = "select category_name from categories where category_name like :category_name and id_depto = :id_depto";

        $this -> db ->query($query);
        $this -> db -> bind(":category_name",'%'.$param['name_category'].'%');
        $this -> db -> bind(":id_depto",$param['id_depto']);

        $response = $this -> db -> resultOne();

        return $response;

    }


    public function new_category($param){
        $query = "INSERT INTO categories VALUES (null,:category_name,:img_path,:img_name,default,default,default,:id_depto)";

        $this -> db -> query($query);
        $this -> db -> bind(":category_name",$param['name_category']);
        $this -> db -> bind(":id_depto",$param['id_depto']);

        $this -> db -> bind(":img_path",$param['file'] == 'empty' ? '' : FILES_IMG.'Categories/');
        $this -> db -> bind(":img_name",$param['file'] == 'empty' ? '' : str_replace(' ','_',$param['name_category'].'.svg') );


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

    }
}