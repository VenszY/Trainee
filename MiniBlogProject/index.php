<?php
    require_once 'config/config.php';
    require_once 'libs/autoloader.php';
    require_once 'libs/Router.php';

    spl_autoload_register('Autoload');
//
//    $routerView = new Router();
//    $routerView->routeView();

    $routerController = new Router();
    $routerController->routeController();