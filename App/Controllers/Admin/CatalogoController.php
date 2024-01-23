<?php 
namespace App\Controllers\Admin;
use App\Models\Admin\CatalogoModel;

class CatalogoController extends Controller{

    private $model;

    public function __construct(){
        $this -> model = new CatalogoModel();
    }

    public function view(){


        $products = $this -> model -> getCatalogo();
        $inactivos = $this -> model -> getCatalogoInactivo();


     

        $departments = $this -> model ->getDepartments();
        $brands = $this -> model -> getBrands();

        $catalogo = [
            "departments" => $departments,
            "brands" => $brands,
            "products" => $products,
            "total_products" => count($products),
            "total_inactivos" => count($inactivos)
        ];

   



        if(isset($_GET['id_category'])){
            $sub_categories = $this -> model -> getSubCategories($_GET['id_category']);
            return json_encode($sub_categories);
        }
        if(isset($_GET['id_depto'])){
           
            $categories = $this -> model -> getCategories($_GET['id_depto']);
            return json_encode($categories);
        }

        if(isset($_GET['sku'])){
            $sku_search = $this -> model -> searchSku($_GET['sku']);
            return $sku_search;
        }

        if(isset($_GET['list']) && $_GET['list'] == 'all'){return json_encode($inactivos);}

       return $this -> views('catalogo',$catalogo);
    }


   
}