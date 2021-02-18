<?php

    class Router {

//        public function routeView(){
//            $viewName = ((!empty($_GET['view'])) ? ucfirst($_GET['view']) : 'HomePage') . 'View';
//            $filePath = realpath(VIEW_PATH . $viewName . '.php');
//
//            if(!empty($filePath)) {
//                try {
//
//                    $chosenView = new BaseController();
//                    $chosenView->chosenView($viewName);
//
//                } catch (ErrorException $err) {
//                    echo $err->getMessage();
//                    exit();
//                }
//            } else {
//                $defaultView = new BaseController();
//                $defaultView->defaultView();
//            }
//        }

        public function routeController(){
            echo"<pre>";
//            $defaultController = CONTROLLERS_PATH . 'DefaultController';
            $controllerName = ((!empty($_GET['controller'])) ? ucfirst($_GET['controller']) : 'Default') . 'Controller';
//            print_r($_GET);

            $filePath = realpath(CONTROLLERS_PATH . $controllerName . '.php');
            var_dump($filePath);
            echo "</pre>";

            if($filePath != false) {
                try {

                    $chosenController = new $controllerName();
//                    var_dump($chosenController);
                    if (!empty($_GET['action'])) {

                        $chosenController->chosenView($_GET['action']);
                    } else {
                        $defaultController = new DefaultController();
                        $defaultController->loadDefaultView();
                    }
                } catch (ErrorException $err) {
                    echo $err->getMessage();
                    exit();

                }
            } else {
                $defaultController = new DefaultController();
                $defaultController->loadDefaultView();
            }
        }
    }
