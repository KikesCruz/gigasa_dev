<?php

namespace App\Models\Admin;

use Lib\Database;

class CatalogoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCatalogo()
    {
        $query = "
        select 
        products.id_catalog,
        products.sku,
        products.name_product,
        d.depto_name,
        c.category_name,
        sc.subcategory_name,
        b.brand_name,
        sum(
        if(products.image_path_one = 'vacio',1,0) +
        if(products.image_path_two = 'vacio',1,0) +
        if(products.image_path_three = 'vacio',1,0) +
        if(products.image_path_four = 'vacio',1,0) +
        if(products.image_path_five = 'vacio',1,0)
        )as imgs 

        from product_catalog products
        inner join sub_category sc on (sc.id_subcategory = products.id_subcategory)
        inner join categories c on (c.id_category = sc.id_category)
        inner join departments d on (d.id_depto = c.id_depto)
        inner join brands b on (b.id_brand = products.id_brand)
        where sc.status_subcategory = 'on' and c.status_category = 'on' and d.status_depto ='on'
        and products.status = 'on'
        group by sku";


        $this -> db -> query($query);

        $reponse = $this -> db -> resultSet();

        return $reponse;

    }

    public function getCatalogoInactivo(){
        $query = "SELECT id_catalog,name_product,status FROM product_catalog WHERE status ='off'";

        $this -> db -> query($query);

        $response = $this -> db -> resultSet();
        return $response;
    }

    public function getDepartments()
    {
        $query = "SELECT id_depto,depto_name FROM departments where status_depto = 'on'";

        $this->db->query($query);

        $response = $this->db->resultSet();

        return $response;
    }

    public function getCategories($param)
    {
        $query = "select cat.id_category, cat.category_name,depto.id_depto  from categories cat
        inner join departments depto on (depto.id_depto = cat.id_depto)
        where cat.status_category = 'on' and depto.status_depto ='on' and depto.id_depto = :id_depto";

        $this->db->query($query);
        $this->db->bind(":id_depto", $param);

        $response = $this->db->resultSet();

        return $response;
    }

    public function getSubCategories($param)
    {
        $query = "select sub_cat.id_subcategory, sub_cat.subcategory_name from sub_category sub_cat
        inner join categories cat on(cat.id_category = sub_cat.id_category)
        where cat.status_category  = 'on' and sub_cat.status_subcategory ='on' and sub_cat.id_category = :id_category";

        $this->db->query($query);
        $this->db->bind(":id_category", $param);

        $response = $this->db->resultSet();

        return $response;
    }

    public function getBrands()
    {
        $query = "SELECT id_brand,brand_name FROM brands WHERE status_brand = 'on'";

        $this->db->query($query);
        $response = $this->db->resultSet();
        return $response;
    }


    public function searchSku($param)
    {
        $query = "SELECT sku FROM product_catalog WHERE sku = :sku";

        $this->db->query($query);

        $this->db->bind(":sku", $param);

        $response = $this->db->resultOne();

        return $response;
    }

    public function new_product($param){
        $query = "INSERT INTO product_catalog
        VALUES (null,:sku,:name_product,
            :image_path_one,:image_path_two,:image_path_three,
            :image_path_four,:image_path_five,
            :product_description,
            :regular_price,:wieght,default,default,:id_brand,:id_subcategory)";
        
        $this -> db -> query($query);

        $this -> db -> bind(":name_product",$param['name']);
        $this -> db -> bind(":product_description", $param['details']);
        $this -> db -> bind(":sku", $param['sku']);
        $this -> db -> bind(":regular_price", $param['precio']);
        $this -> db -> bind(":wieght", $param['peso']);
        $this -> db -> bind(":id_brand", $param['brand']);
        $this -> db -> bind(":id_subcategory", $param['sub_category']);

        //imagenes
        $this -> db -> bind(":image_path_one", $param['pictures'][0] == '' ? 'vacio':  $param['pictures'][0]);
        $this -> db -> bind(":image_path_two", $param['pictures'][1] == '' ? 'vacio':  $param['pictures'][1]);
        $this -> db -> bind(":image_path_three", $param['pictures'][2] == '' ? 'vacio':  $param['pictures'][2]);
        $this -> db -> bind(":image_path_four", isset($param['pictures'][3]) == '' ? 'vacio':  $param['pictures'][3]);
        $this -> db -> bind(":image_path_five", isset($param['pictures'][4]) == '' ? 'vacio':  $param['pictures'][4]);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
}
