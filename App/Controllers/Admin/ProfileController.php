<?php 
namespace App\Controllers\Admin;
use App\Models\Admin\ProfileModel;

class ProfileController extends Controller{

    private $model;

    public function __construct(){
        $this -> model = new ProfileModel();
    }
    public function viewProfile(){

        $json_response = $this -> model -> getInfoProfile(); 

        
        return $this -> views('profile',$json_response);
    }
}