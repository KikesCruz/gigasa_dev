<?php

use Lib\Route;

try{

    require '../Config/config.php';
    require PATH_ROOT . 'autoload.php';

    
   // require PATH_ROOT . 'Routes/web.php';
   require PATH_ROOT . 'Routes/admin.php';
   require PATH_ROOT . 'Routes/store.php';

    Route::dispatch();
    
}catch(Exception $e){
    echo $e->getMessage();
}


