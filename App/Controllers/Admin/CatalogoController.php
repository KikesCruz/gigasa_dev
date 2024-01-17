<?php 
namespace App\Controllers\Admin;

class CatalogoController extends Controller{

    public function view(){
       return $this -> views('catalogo');
    }
}