<?php
  class salesController extends AbstractController {
    function goods($params) {
      if(User::loggedIn()) {
        $categories = Sale::$categories;
        $goods = Sale::$goods;
      
        return $this->renderJSON(array(
          'categories' => $categories,
          'goods' => $goods
        ));
      } else {
        return $this->redirect('default');
      }
    }
  
    function register($params) {
      if(User::loggedIn()) {
        $res = Sale::register($params);
      
        return $this->renderJSON($res);
      } else {
        return $this->redirect('default');
      }
    }
    
    function stat($params) {
      if(User::loggedIn()) {
        $res = Sale::stat($params);
      
        return $this->renderJSON($res);
      } else {
        return $this->redirect('default');
      }
    }
  }
?>
