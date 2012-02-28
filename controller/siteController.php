<?php
  class siteController extends AbstractController {
    function index($params) {
      if(User::loggedIn()) {
        return $this->render();
      } else {
        return $this->redirect('default');
      }
    }
  }
?>
