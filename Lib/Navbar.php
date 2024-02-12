<?php 

use App\Models\Store\NavBarModel;
class Navbar {

    private static $menu;

    private static function init(){
        if(!isset(self::$menu)){
            self::$menu = new NavBarModel();
        }
    }
    static function menu(){

        self::init();
        $categorias = self::$menu -> getCategories();
        
    
      
        $menu = [];

        foreach ($categorias as $key => $value) {
            $menu[$value['name_category']]['name_category'] = $value['name_sub_category'];
        }

      

       return $categorias;

    }


    
}   