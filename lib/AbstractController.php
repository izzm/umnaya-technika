<?php 
  abstract class AbstractController {
    public $controller;
    public $action;
    public $layout;
    
    private $viewPath;
    private $conext;
    private $params;

    public function __construct($context, $p) {
      $this->content = $context;
      $this->layout = $this->getLayout();
      
      foreach($p as $name => $value) {
        $this->$name = $value;
      }
    }
    
    public function renderAction($p = array()) {
      return $this->render(array_merge($p, array('layout' => false)));
    }
    
    public function setFlash($key, $value) {
      return Application::getInstance()->setFlash($key, $value);
    }
    
    public function hasFlash($key) {
      return Application::getInstance()->hasFlash($key);
    }
    
    public function getFlash($key) {
      return Application::getInstance()->getFlash($key);
    }

    protected function getLayout() {
      return 'default';
    }

    protected function getViewExtention() {
      return '.php';
    }
    
    protected function redirect($route, $params = array()) {
      $url = Application::getInstance()->getRouter()->getUrl($route, $params);
      
      if($url == "") {
        $url = $route;
      }
      
      header("Location: " . $url);
    }
    
    protected function renderJSON($data) {
      header('Cache-Control: no-cache, must-revalidate');
      header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
      header('Content-type: application/json');
      
      echo json_encode($data);
      
      return null;
    }
    
    protected function render($p = array()) {
      $sc = $this->controller;
      $sa = $this->action;
      $sl = $this->layout;
    
      $this->controller = $this->checkParam($p, 'controller');
      $this->action = $this->checkParam($p, 'action');
      $this->layout = $this->checkParam($p, 'layout');

      //for URL generation
      $this->router = Application::getInstance()->getRouter();
      
      if($this->layout != false) {
        include($this->viewPath . 'layout/' . $this->layout . $this->getViewExtention());
      } else {
        include($this->viewPath . $this->controller . '/' . $this->action . $this->getViewExtention());
      }
      
      $this->controller = $sc;
      $this->action = $sa;
      $this->layout = $sl;
    }
    
    private function checkParam($p, $name) {
      return isset($p[$name]) ? $p[$name] : $this->$name;
    }

  }
?>
