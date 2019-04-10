
<?php

require '../config/dev.php';
require '../config/Autoloader.php';
\App\config\Autoloader::register();//lancement de notre autoloader

$router = new \App\config\Router();
$router->run();