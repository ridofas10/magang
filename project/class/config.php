<?php 
require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__,1));
$dotenv->safeLoad();

