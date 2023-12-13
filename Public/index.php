<?php

use Lib\Session;

try{

    require '../Config/config.php';
    require PATH_ROOT . 'autoload.php';
    require PATH_ROOT . 'Routes/web.php';

    Session::init();
    
}catch(Exception $e){
    echo $e->getMessage();
}


