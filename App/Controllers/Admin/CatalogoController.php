<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CatalogoModel;

class CatalogoController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new CatalogoModel();
    }

    public function view()
    {


        $products = $this->model->getCatalogo();
        $inactivos = $this->model->getCatalogoInactivo();




        $departments = $this->model->getDepartments();
        $brands = $this->model->getBrands();

        $catalogo = [
            "departments" => $departments,
            "brands" => $brands,
            "products" => $products,
            "total_products" => count($products),
            "total_inactivos" => count($inactivos)
        ];





        if (isset($_GET['id_category'])) {
            $sub_categories = $this->model->getSubCategories($_GET['id_category']);
            return json_encode($sub_categories);
        }
        if (isset($_GET['id_depto'])) {

            $categories = $this->model->getCategories($_GET['id_depto']);
            return json_encode($categories);
        }

        if (isset($_GET['sku'])) {
            $sku_search = $this->model->searchSku($_GET['sku']);
            return $sku_search;
        }

        if (isset($_GET['list']) && $_GET['list'] == 'all') {
            return json_encode($inactivos);
        }

        return $this->views('catalogo', $catalogo);
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $key_valid = [];

            $pictures = [];

            $product = [
                "sku" => $_POST['sku'],
                "name" => $_POST['name_product'],
                "department" => $_POST['department'],
                "category" => $_POST['category'],
                "sub_category" => $_POST['sub_category'],
                "brand" => $_POST['brand'],
                "precio" => $_POST['precio'],
                "peso" => $_POST['peso'],
                "details" => $_POST['details'],
                "pictures" => []
            ];

            foreach ($_FILES as $key_img => $img) {

                $pictures[$key_img]['type'] = $img['type'];
                $pictures[$key_img]['tmp_name'] = $img['tmp_name'];
            }

            $product['pictures'] = $pictures;

            foreach ($product as $key => $value) {

                if ($value == '' || $value == '0') {
                    array_push($key_valid, $key);
                }
            }

            if (!empty($key_valid)) {
                return json_encode($key_valid);
            }

            $total = 0;
            foreach ($product['pictures'] as $key => $value) {
                if ($value['type'] != '' || $value['tmp_name'] != '') {
                    $total++;
                }
            }

            // Validaciones
            if ($total < 3) {
                return json_encode("img_empty");
            }

            $folder = $this->new_folder($product['sku'], FILES_IMG . 'Products/');
            $name_img = 1;
            $names_array = [];
            foreach ($product['pictures'] as $key => $value) {
                if ($value['type'] != '' || $value['tmp_name'] != '') {
                    $img = $this->img_save($folder . '/', $product['sku'] . "_" . $name_img++, $value['type'], $value['tmp_name']);
                    $route_img = explode("Store/", $img);
                    array_push($names_array, IMG_URL . $route_img[1]);
                }
            }

            $product['pictures'] = $names_array;

            $this->model->new_product($product);
            echo json_encode("success");
        }
    }
}
