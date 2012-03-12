<?php
  class feedbackController extends AbstractController {
    function signed($params) {
      if(!User::loggedIn()) {
        return $this->redirect('default');
      } else {
        $res = Feedback::send_from_signed($params);
      
        return $this->renderJSON($res);
      }
    }
    
    function unsigned($params) {
      $res = Feedback::send_from_unsigned($params);
      
      return $this->renderJSON($res);
    }
    
    protected function getLayout() {
      return false;
    }
  }
?>
