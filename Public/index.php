<?php

try{

    require '../Config/config.php';
    require PATH_ROOT . 'autoload.php';
    require PATH_ROOT . 'Routes/web.php';

    
}catch(Exception $e){
    echo $e->getMessage();
}


