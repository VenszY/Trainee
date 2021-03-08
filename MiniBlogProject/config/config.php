<?php

    #Database connection
    define('DB_HOST', 'localhost');
    define('DB_DATABASE', 'Blog_Site');
    define('DB_USERNAME', 'venci');
    define('DB_PASS', '411');

    #Define project directory
//    define('PROJECT_FOLDER', substr(dirname($_SERVER['PHP_SELF']), 1) . '/');

    #Server protocol
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
        define('SERVER_PROTOCOL', 'https://');
    } else {
        define('SERVER_PROTOCOL', 'http://');
    }

    #Define domain
//    define('DOMAIN', SERVER_PROTOCOL . $_SERVER['HTTP_HOST'] . '' . PROJECT_FOLDER);

    #Define constant project paths
    define('LIBRARY_PATH', 'libs/');
    define('APP_PATH', 'application/');

    define('CONTROLLERS_PATH', APP_PATH . 'Controller/');
    define('MODEL_PATH', APP_PATH . 'Model/');
    define('VIEW_PATH', APP_PATH . 'View/');

?>