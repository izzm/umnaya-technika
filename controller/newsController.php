<?php
  class newsController extends AbstractController {
    function last($params) {
      if(User::loggedIn()) {
        $res = News::last();
      
        return $this->renderJSON($res);
      } else {
        return $this->redirect('default');
      }
    }
    
    function archive($params) {
      if(User::loggedIn()) {
        $res = News::archive();
      
        return $this->renderJSON($res);
      } else {
        return $this->redirect('default');
      }
    }
    
    function show($params) {
      if(User::loggedIn()) {
        $res = News::show($params['id_news']);
      
        return $this->renderJSON($res);
      } else {
        return $this->redirect('default');
      }
    }
  }
?>
