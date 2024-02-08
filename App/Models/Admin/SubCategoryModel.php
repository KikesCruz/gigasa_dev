<?php
namespace App\Models\Admin;

use Lib\Database;

class SubCategoryModel{

    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function list_sub_categories(){
        $query = "select 
        sc.id_sub_category,
        sc.name_sub_category,
        sc.status_subcategory,
        cat.id_category,
        cat.name_category
        from sub_categories sc
        inner join categories cat on (cat.id_category = sc.id_category) where cat.status = 'activado'";

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

  

    
    public function search_category($param){

        $keys = ['id_category','subcategory_name'];
        $validate =  $this->db->validate_data($keys, $param);

        if (!is_array($validate)) {
            return $validate;
        }
       
        $query = "select name_sub_category from sub_categories where id_category = :id_category and name_sub_category = :name_sub_category";

        $this -> db ->query($query);
        $this -> db -> bind(":name_sub_category", $validate['subcategory_name']);
        $this -> db -> bind(":id_category",$validate['id_category']);

        $response = $this -> db -> only_result();

       
        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response = $response['name_sub_category'];
        }
        return $response;

    }

    public function search_category_by_id($param){

        $query = "SELECT c.id_category, c.name_category 
        FROM sub_categories sc
        inner join categories c on(c.id_category = sc.id_category)
        where sc.id_sub_category  = :id_sub_category;";

        $this -> db ->query($query);
        $this -> db -> bind(":id_sub_category", $param);
    

        $response = $this -> db -> only_result();

       
        if (empty($response)) {
            $response = 'no_matches';
        } else {
            $response;
        }
        return $response;

    }


    public function add_sub_category($param){

        $keys = ['id_category','subcategory_name'];
        $validate =  $this->db->validate_data($keys, $param);

        if (!is_array($validate)) {
            return $validate;
        }
       

        $query = "INSERT INTO sub_categories values (null, :id_category,:name_sub_category, default,default)";

        $this -> db -> query($query);
        $this -> db -> bind(":name_sub_category",$validate['subcategory_name']);
        $this -> db -> bind(":id_category",$validate['id_category']);

        if($this -> db -> execute()){
            return 'success';
        }else{
            return 'error';
        }
    }


    public function update_status_subcategory($param){

        $query = "UPDATE sub_categories SET status_subcategory = :status_subcategory WHERE id_sub_category = :id_sub_category";

        $this -> db -> query($query);

        $this -> db -> bind(":status_subcategory", $param['status_subcategory']);
        $this -> db -> bind(":id_sub_category", $param['id_subcategory']);

        $message = $this->db->execute();
        
        return $message;

    }


    public function edit_subcategory($param){

        $set = $param['id_category'] == 0 ? "SET name_sub_category = :name_sub_category" : "SET id_category = :id_category, name_sub_category = :name_sub_category";

        $query = "UPDATE sub_categories {$set} WHERE id_sub_category = :id_sub_category";

        $this -> db -> query($query);

        


    
            $this -> db -> bind(":name_sub_category",$param['subcategory_name']);
            $this -> db -> bind(":id_sub_category",$param['id_subcategory']);
            $this -> db -> bind(":id_category", $param["id_category"]);
        

        if($this -> db -> execute()){
            return true;
        }else{
            return false;
        }

    }
}