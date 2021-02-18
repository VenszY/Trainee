<?php

#Конфигуриране на конекцията на MySql-ската база от данни
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'gamechanger');

#Дефиниране на дирекрорията на приложението

define('PROJECT_FOLDER', substr(dirname($_SERVER['PHP_SELF']), 1) . '/');

#Определяне на сървърния протокол
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  define('SERVER_PROTOCOL', 'https://');
} else {
  define('SERVER_PROTOCOL', 'http://');
}

#Дефиниране на базови константи 
define('DOMAIN', SERVER_PROTOCOL . $_SERVER['HTTP_HOST'] . '' . PROJECT_FOLDER);
define('DOMAIN_ADM', DOMAIN . 'admin/');
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_FOLDER);
define('WEB_PATH', DOMAIN . 'web/');

#Дефиниране на константи с пътища до директории
define('LIBRARY_PATH', 'libs/');
define('APPLICATION_PATH', 'app/');

define('CONTROLLERS_PATH', APPLICATION_PATH . 'controllers/');
define('MODEL_PATH',   APPLICATION_PATH . 'model/');
define('VIEW_PATH',   APPLICATION_PATH . 'view/');

define('PDO_DUMP_DIE', false);

?>
