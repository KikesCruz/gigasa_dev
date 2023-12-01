<?php
namespace App\Controllers;

require  '../vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
class Controller{

    public static function views($view, $param = []){
        extract($param);
        
        $view = str_replace(".","/",$view);

        $loader = new FilesystemLoader(PATH_ROOT.'Resources/Views/Components');

        $twig = new Environment($loader);

        return $twig->render($view.'.twig', $param);
                      
    }
    
}