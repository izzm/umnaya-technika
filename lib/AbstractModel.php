<?php 
  abstract class AbstractModel {
    protected $fields = array();
    protected $data;
  
    public function __construct($data = null) {
      $this->data = $data;
    }
    
    public function getData() {
      return $this->data;
    }
    
    protected function validate($params) {
      $bad_fields = $this->getBadFields($params);
      
      return (count($bad_fields) == 0);
    }
    
    protected function getBadFields($params) {
      $bad_fields = array();
    
      foreach($params as $key => $value) {
        if(!in_array($key, $this->fields)) {
          $bad_fields[] = $key;
        }
      }
      
      return $bad_fields;
    }
    
    protected static function st_api_request($action, $params) {
      return Application::getInstance()->getApiConnector()->request($action, $params);
    }
    
    protected function api_request($action, $params) {
      return self::st_api_request($action, $params);
    }
  }
?>
