<?php
  class defaultController extends AbstractController {
    function index($params) {
      if(User::loggedIn()) {
        return $this->redirect('main');
      } else {
        return $this->render();
      }
    }
    
    function login($params) {
      if(User::loggedIn() || User::login($params)) {
        return $this->redirect('main');
      } else {
        return $this->render(array('action' => 'index'));
      }
    }
    
    function logout($params) {
      if(User::loggedIn() && User::logout()) {
        return $this->redirect('main');
      } else {
        return $this->redirect('default');
      }
    }

    protected function getLayout() {
      return 'login';
    }
  }
?>
