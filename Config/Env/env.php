<?php
require  '../vendor/autoload.php';
$dotenv =  Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

/**
 * App Config
 */
define('PATH_APP',$_ENV['APP_URL_DEV']);
define('NAME_APP',$_ENV['APP_NAME']);

