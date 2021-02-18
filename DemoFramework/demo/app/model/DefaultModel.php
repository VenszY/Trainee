<?php

class DefaultModel extends BaseModel {


//    protected $crm;

  function __construct() {
    parent::__construct();

    $this->init();
  }

  private function init() {
    
  }
  
  public function getData() {
    $result = $this->db->select("SELECT MAX(status_id) as max_status, keywords_id FROM keyword;", array(), PDO::FETCH_ASSOC);
    return $result;
    
  }


  

}
