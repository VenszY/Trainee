<?php

class DemoDefaultControllerDemo extends DemoBaseController {


//    protected $crm;

  function __construct() {
    parent::__construct();

  }


  public function getData() {
    
    $defaultModel = new DefaultModel();
    $data = $defaultModel->getData();
    
    include VIEW_PATH . 'DefaultView.php';
  }


}
