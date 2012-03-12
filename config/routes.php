<?php
  //Create a new instance of Router (you'd likely use a factory or container to
  // manage the instance)
  //$this->router - application router
  
  //reg
  $registration_route = new Route('/registration');
  $registration_route->setMapClass('registration')->setMapMethod('index');
  $this->router->addRoute( 'registration', $registration_route );
  
  $registration_create_route = new Route('/registration/create');
  $registration_create_route->setMapClass('registration')->setMapMethod('create');
  $this->router->addRoute( 'registration_create', $registration_create_route );
  
  $email_activate_route = new Route('/mailactivation/activate.php');
  $email_activate_route->setMapClass('registration')->setMapMethod('activate');
  $this->router->addRoute( 'email_activate', $email_activate_route );
  
  
  //feedback
  $signed_feedback_route = new Route('/feedback/signed');
  $signed_feedback_route->setMapClass('feedback')->setMapMethod('signed');
  $this->router->addRoute( 'signed_feedback', $signed_feedback_route );
  
  $unsigned_feedback_route = new Route('/feedback/unsigned');
  $unsigned_feedback_route->setMapClass('feedback')->setMapMethod('unsigned');
  $this->router->addRoute( 'unsigned_feedback', $unsigned_feedback_route );
  
  
  //sales
  $sales_route = new Route('/sales/:method');
  $sales_route->setMapClass('sales')->addDynamicElement(':method', ':method');
  $this->router->addRoute( 'sales', $sales_route );
  
  
  //news
  $news_route = new Route('/news/:method');
  $news_route->setMapClass('news')->addDynamicElement(':method', ':method');
  $this->router->addRoute( 'news', $news_route );
  
  
  //login
  $login_route = new Route('/login');
  $login_route->setMapClass('default')->setMapMethod('login');
  $this->router->addRoute( 'login', $login_route );
  
  $logout_route = new Route('/logout');
  $logout_route->setMapClass('default')->setMapMethod('logout');
  $this->router->addRoute( 'logout', $logout_route );
  
  
  //index
  $main_route = new Route('/main');
  $main_route->setMapClass('site')->setMapMethod('index');
  $this->router->addRoute( 'main', $main_route );

  //Set up a 'catch all' default route and add it to the Router.
  //You may want to set up an external file, define your routes there, and
  // and include that file in place of this code block.
  //$std_route = new Route('/:class/:method/:id');
  //$std_route->addDynamicElement(':class', ':class')
  //          ->addDynamicElement(':method', ':method')
  //          ->addDynamicElement(':id', ':id');
  //$this->router->addRoute( 'std', $std_route );

  //Set up your default route:
  $default_route = new Route('/');
  $default_route->setMapClass('default')->setMapMethod('index');
  $this->router->addRoute( 'default', $default_route );
?>
