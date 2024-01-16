<?php 
require 'Env/env.php';

$universal_path = str_replace('\\','/',dirname(dirname(__FILE__)));

define('URL_BASE', PATH_APP);
define('NAME_PAGE' ,NAME_APP);
define('PATH_ROOT',$universal_path.'/');
define('FILES_IMG',PATH_ROOT.IMG_URL_FILE);


/**
 * config database
 */
define('HOST_DB',DB_HOST);
define('DATABASE',DB_DATABASE);
define('DB_USR',DB_USERNAME);
define('DB_PASS',DB_PASSWORD);

/** Bind ERP */
define('TOKE_ACCESS',TOKEN);



