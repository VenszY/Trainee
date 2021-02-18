<?php

class BaseModel{

  /**
   * MyPDO instance
   * 
   * @var MyPDO instance
   */
  protected $db;

 

  public function __construct() {
    $this->init();
  }

  private function init() {
    $this->db = new MyPDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
            
  }

  

}
