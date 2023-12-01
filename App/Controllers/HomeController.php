<?php 

namespace App\Controllers;
class HomeController extends Controller{

    public static function index(){

       
        $array =[
            "title" => 'esto es una prueba de twig',
            "product" => array('test','test')
        ];

        return  Controller::views('home',$array);
    }
} 