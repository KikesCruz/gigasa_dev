<?php

namespace App\Controllers\Ecommer;

use App\Models\Ecommer\EcommerModel;
class ContactController  extends Controller{
    
    private $model;
    public function __construct()
    {
        $this->model = new EcommerModel();
    }

public function view(){


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

        $menu_nav = [
            'menu_navbar' => $menu
        ];


    return $this -> views('contacto', $menu_nav);
}


}