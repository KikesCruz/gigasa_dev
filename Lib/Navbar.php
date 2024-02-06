<?php 

use App\Models\Store\NavBarModel;
class Navbar {


    static function menu(){

        $categorias = new NavbarModel();
        $items = $categorias->getCategories();

      
        return $items;

    }
}   