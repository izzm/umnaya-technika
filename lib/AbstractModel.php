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
    
    protected static function fileBase64($name) {
      $filename = $_FILES[$name]['tmp_name'];
      if(file_exists($filename)) {
        $filedata = fread(fopen($filename, "r"), filesize($filename));
        $encdata = base64_encode($filedata);
      } else {
        $encdata = "";
      }
      
      return array(
        'name' => $_FILES[$name]['name'],
        'data' => $encdata
      );
    }
    
    protected static function getPhoneNumber($phone, $city = false) {
	    $fphone = preg_replace('/[^\\d]/', '', $phone);
	    if (strlen($fphone) == 11) {
		    if ($fphone[0] == '8') {
			    $fphone[0] = '7';
		    } elseif ($fphone[0] != '7') {
			    return null;
		    }
		    return $fphone;
	    } elseif (strlen($fphone) == 10) {
		    return '7'.$fphone;	
	    } elseif(strlen($fphone) == 12) {
		    return $fphone;	
	    } elseif(strlen($fphone) == 7 && $city) {
		    //var_dump($fphone);
		    return '7495'.$fphone;
	    }
	    return null;
    }
  }
?>
