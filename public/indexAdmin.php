<?php

if (!isset($_SERVER['PHP_AUTH_USER']) || isset($_REQUEST['logout']))//protection par htaccess
{
    header('WWW-Authenticate: Basic realm="Veuillez renseigner votre login et mot de passe"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}


require '../config/dev.php';
require '../config/Autoloader.php';
\App\config\Autoloader::register();//lancement de notre autoloader

$router = new \App\config\Router();
$router->run();