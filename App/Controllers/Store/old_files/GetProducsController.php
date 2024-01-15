<?php

namespace App\Controllers\Store;

use App\Models\Store\StoreModel;

class GetProducsController extends Controller{

    private $model;
    public function __construct()
    {
        $this->model = new StoreModel();
    }
    public function getAllProducts(){


        $bind_category = $this->model->getCategory();

        $menu = array();

        foreach ($bind_category as $key_cat => $cat) {
            $menu[$key_cat] = array(
                'id_categoria' => $cat['ID'],
                'categoria' => $cat['Name'],
                'sub' => ''

            );

            foreach ($cat['SubCategories'] as $subCat) {
                $menu[$key_cat]['sub'] = array(
                    'id_sub' => $subCat['ID'],
                    'name_sub' => $subCat['Name']
                );
            }
        }

        /** inventarios */

        $inventori = $this->model->getInventoryByWarehouses();
        $inventoriWarehouse = array();

        foreach ($inventori['value'] as $key => $value) {
            if ($value['Visible'] == true) {
                $inventoriWarehouse[$key] = array(
                    'id_product' => $value['ProductID'],
                    'title_product' => $value['Title'],
                    'sku' => $value['SKU'],
                    'details' => '',
                    'img_url' => '',
                );
            }
        }

        /** lista de precios */
        $inventoriPrice = $this->model->ProductsPriceAndInventory();

        foreach ($inventoriWarehouse as $key_invent => $inventoriH) {
            foreach ($inventoriPrice as $key => $priceListInvent) {
                if ($inventoriH['id_product'] == $priceListInvent['ID']) {
                    $inventoriWarehouse[$key_invent]['details'] = array(
                        'id' => $priceListInvent['ID'],
                        'name' => $priceListInvent['Title'],
                        'precio' => $priceListInvent['Price'],
                        'departamento' => $priceListInvent['Cat1ID'],
                        'subdepartamento' => $priceListInvent['Cat2ID'],
                        'categoria' => $priceListInvent['Cat3ID'],
                        'description' => $priceListInvent['Descripcion'],
                        'cantInventory' => $priceListInvent['Inventory']
                    );
                }
            }
        }

        $img_url_product = $this->model->getUrlImg();

        foreach ($inventoriWarehouse as $key_for_inventory => $inventoriH) {
            foreach ($img_url_product['value'] as $key_for_img => $url_img) {
                if ($inventoriH['id_product'] == $url_img['ID']) {
                    $inventoriWarehouse[$key_for_inventory]['img_url'] = array(
                        'url_picture' => $url_img['ImageUrl']
                    );
                }
            }
        }

        $bind_fetch =  [
            "menu_navbar" => $menu,
            "inventario" => $inventoriWarehouse
        ];

     
        return $this -> views('products', $bind_fetch);
    }
}