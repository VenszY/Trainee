<?php

class Router{
  public function __construct() {
  }


  public function route() {
    $this->site();
  }

  private function site() {
    $defaultController = CONTROLLERS_PATH . 'DemoDefaultControllerDemo';
    echo "<pre>";
    var_dump($defaultController);
    $class = ( (!empty($_GET['controller'])) ? ucfirst($_GET['controller']) : 'DemoDefault' ) . 'Controller';
    $file = realpath(CONTROLLERS_PATH . $class . '.php');
    var_dump($file);
    print_r($_GET);
    if ($file != false) {
      try {
          var_dump($class);
        $controller = new $class;
        if (!empty($_GET['action'])) {
          $controller->navigator($_GET['action']);
        }
      } catch (ErrorException $ex) {
        CommonClass::phpExceptionHandler($ex);
        exit();
        // echo $ex->getMessage();
      }
    } else {
      try {
        $defaultController = new $$defaultController();
        if (!empty($_GET['action'])) {
          $defaultController->navigator($_GET['action']);
        }
      } catch (ErrorException $ex) {
        pre("Wrong controller");
        exit();
      }
    }
  }


}
