<?php
  class Application {
    private static $instance;
    
    private $logger;
    private $router;
    private $dipatcher;
    private $api_connector;
    
    private function __construct() {
    }
    
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $className = __CLASS__;
        self::$instance = new $className;
      }
      return self::$instance;
    }
    
    public function initialize() {
      $this->initializeLogger();
    
      $this->initializeRouter();
      $this->initializeDispathcer();
      $this->initializeApiConnector();
      $this->initializeFlash();
      
      return $this;
    }
    
    private function initializeLogger() {
      $this->logger = new KLogger($this->rootPath() . '/log/', KLogger::DEBUG);
    }
    
    private function initializeRouter() {
      $this->router = new Router;
      
      include($this->configPath() . 'routes.php');
    }
    
    private function initializeApiConnector() {
      $this->api_connector = new ApiConnector;
      
      include($this->configPath() . 'api.php');
    }
    
    private function initializeDispathcer() {
      //Get an instance of Dispatcher
      $this->dispatcher = new Dispatcher;
      $this->dispatcher->setSuffix('Controller');
      $this->dispatcher->setClassPath($this->rootPath() . '/controller/');
      $this->dispatcher->setViewPath($this->rootPath() . '/view/');
    }
    
    private function initializeFlash() {
      if(!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = array();
      }
      
      foreach($_SESSION['flash'] as $key => $data) {
        if($data['ttl'] > 0) {
          unset($_SESSION['flash'][$key]);
        } else {
          $_SESSION['flash'][$key]['ttl'] += 1;
        }
      }
    }
    
    public function getLogger() {
      return $this->logger;
    }
    
    public function getRouter() {
      return $this->router;
    }
    
    public function getDispatcher() {
      return $this->dispatcher;
    }
    
    public function getApiConnector() {
      return $this->api_connector;
    }
    
    public function setFlash($key, $value) {
      $_SESSION['flash'][$key] = array(
        'ttl' => 0,
        'value' => $value
      );
      
      return true;
    }
    
    public function hasFlash($key) {
      return isset($_SESSION['flash'][$key]);
    }
    
    public function getFlash($key) {
      if($this->hasFlash($key)) {
        return $_SESSION['flash'][$key]['value'];
      } else {
        return false;
      }
    }
    
    public function rootPath() {
      return dirname(__FILE__) . '/../';
    }
    
    public function configPath() {
      return $this->rootPath() . '/config/';
    }
    
    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }
  }
?>
