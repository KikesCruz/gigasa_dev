<?php
require  '../vendor/autoload.php';
$dotenv =  Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

/**
 * App Config
 */
define('PATH_APP',$_ENV['APP_URL_DEV']);
define('NAME_APP',$_ENV['APP_NAME']);

/**
 * Config Database
 */
define('DB_HOST',$_ENV['DB_HOST']);
define('DB_DATABASE',$_ENV['DB_DATABASE']);
define('DB_USERNAME',$_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);