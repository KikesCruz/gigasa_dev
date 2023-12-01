<?php 
require 'Env/env.php';

$universal_path = str_replace('\\','/',dirname(dirname(__FILE__)));

define('URL_BASE', PATH_APP);
define('NAME_PAGE' ,NAME_APP);
define('PATH_ROOT',$universal_path.'/');







