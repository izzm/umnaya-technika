<?php
  class registrationController extends AbstractController {
    function create($params) {
      if(!isset($_SESSION['captcha']) || $_SESSION['captcha'] != $params['captcha']) {
        $result = array('result' => 101, 'result_message' => User::$messages['results'][101]);
      } else if(!isset($params['rules_accept'])) {
        $result = array('result' => 102, 'result_message' => User::$messages['results'][102]);
      } else {  
        unset($params['captcha']);
        unset($params['rules_accept']);
        unset($params['x']);
        unset($params['y']);
      
        $user = new User;
        $result = $user->register($params);  
      }
      
      return $this->renderJSON($result);
    }
    
    function activate($params) {
      User::emailActivate($params['ukey']);
      
      return $this->redirect('default');
    }

    protected function getLayout() {
      return false;
    }
  }
?>
