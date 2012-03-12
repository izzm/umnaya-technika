<?php
  class ApiConnector {
    private $hostname;
    private $username;
    private $password;
    
    private $version;
    private $encoding;
    private $requestRootName;
    private $responseRootName;
    
    private $writer; //XML writer
    private $logger;
    
    public function __construct() {
      $this->writer = new XMLWriter();
      $this->logger = Application::getInstance()->getLogger();
    }
    
    public function configure($p) {
      foreach($p as $name => $value) {
        $this->$name = $this->checkParam($p, $name);
      }
    }
    
    public function request($action, $params) {
      $data = array('action' => $action, 'params' => $params);

      $xmlRequest = $this->toXml($data);
      $xmlResponse = $this->post($xmlRequest);
      
      $this->logger->logDebug("Request: " . $xmlRequest);
      $this->logger->logDebug("Response: " . $xmlResponse);
      //var_dump($xmlRequest);
      //var_dump($xmlResponse);
      //exit();
      
      return $this->fromXml($xmlResponse);
    }
    
    private function toXml($data) {
      $this->writer->openMemory();
      $this->writer->startDocument($this->version, $this->encoding);
      
      $this->writer->startElement($this->requestRootName);
      if (is_array($data)) {
        $this->processArrayToXml($data);
      }
      $this->writer->endElement();
      
      return $this->writer->outputMemory();
    }
    
    private function processArrayToXml($data) {
      foreach ($data as $key => $val) {
        if (is_numeric($key)) {
          $key = 'key'.$key;
        }
        
        if (is_array($val)) {
          if(isset($val['__NAME__']) && isset($val['__VALUE__'])) {
            $this->writer->writeElement($val['__NAME__'], $val['__VALUE__']);
          } else {          
            $this->writer->startElement($key);
            $this->processArrayToXml($val);
            $this->writer->endElement();
          }
        } else {
          $this->writer->writeElement($key, $val);
        }
      }
    }
    
    private function fromXml($xml) {
      $sxml = simplexml_load_string($xml);
      
      return $sxml;
    }
    
    private function post($postdata) {
      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $this->hostname);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	    curl_setopt($ch,CURLOPT_USERPWD, $this->username . ':' . $this->password);

      $output = curl_exec($ch);
      curl_close($ch);

      return  $output;
    }
    
    private function checkParam($p, $name) {
      return isset($p[$name]) ? $p[$name] : $this->$name;
    }
  }
?>
