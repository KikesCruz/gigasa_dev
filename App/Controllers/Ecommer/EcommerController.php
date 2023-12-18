<?php

namespace App\Controllers\Ecommer;
use App\Models\Ecommer\EcommerModel;

class EcommerController extends Controller
{

    private $model;
    public function __construct(){
        $this -> model = new EcommerModel();
    }
    public function index()
    {

        $bind_category = $this -> model ->getCategory();

        $menu = array();

        foreach ($bind_category as $key_cat => $cat) {
            $menu[$key_cat] = array( 
                'id_categoria' => $cat['ID'],
                'categoria' =>$cat['Name'],
                'sub' => ''
                
            );
 
            foreach($cat['SubCategories'] as $subCat){
                $menu[$key_cat]['sub'] = array(
                'id_sub' => $subCat['ID'],
                'name_sub' => $subCat['Name']
               );
                
            }
            
        }
    
        return $this -> views("home",$menu);
    }
}
