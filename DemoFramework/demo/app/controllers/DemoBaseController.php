<?php

class DemoBaseController{
  
  /**
   * Current template
   * 
   * @var string 
   */
  protected $template;

  /**
   * MyPDO instance
   * 
   * @var MyPDO instance
   */
  protected $db;

  /**
   * @var ErrorLib
   */
  public $error;

  public function __construct() {
    $this->init();
  }

  private function init() {
      echo 'asdasdasdasdasdas123333333333d';
  }

  public function navigator($method) {
    
    if (!method_exists($this, $method)) {
      exit('Action not exists');
    }
    if (!is_callable(array($this, $method))) {
      exit('Action not exists');
    }
    
    $this->{$method}();
  }

  
  
  /**
   * Load initial data in smarty and fetch TPL`s
   */
  protected function displayView() {
    $this->loadAdditionalFiles();
    $this->assigns();
    $this->smarty->assign('messages', $this->GetMessage());
    $this->smarty->assign('template', $this->template);
  }

  public function setTemplate($template) {
    $this->template = $template;
  }

  

}
