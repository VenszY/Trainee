<?php
require_once 'configs/config.php';  
require_once 'libs/functions.php'; 
require_once 'libs/Router.php';
require_once 'libs/MyPDO.php';


// Custom autoload handler
spl_autoload_register('Autoload');

// Router instance
$router = new Router(); 
$router->route();
//http://localhost/demo/index.php?controller=default&action=getData

?>
