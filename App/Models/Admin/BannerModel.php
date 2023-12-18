<?php 
namespace App\Models\Admin;

use Lib\Database;
class BannerModel{
    
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }

    public function getBanners(){
        $query = "select banner from banners";

        $this -> db -> query($query);
        $result = $this -> db -> resultOne();

        return $result;
    }

    public function updateBanner(){
        
    }
}