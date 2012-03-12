<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Умная техника</title>
  <link rel="stylesheet" href="/css/globals.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/forms.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/dd.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/scrollable.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/jquery-ui-1.8.17.custom.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/easyslider.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/css/jquery.jscrollpane.css" type="text/css" media="screen">
  
  <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.tmpl.min.js"></script>
  <script type="text/javascript" src="http://cdn.jquerytools.org/1.2.6/tiny/jquery.tools.min.js"></script>
  <script type="text/javascript" src="/js/jquery.tools.navigator.min.js"></script>

  <script type="text/javascript" src="/js/jquery-ui-1.8.17.custom.min.js"></script>
  <script type="text/javascript" src="/js/jquery.ui.datepicker-ru.js"></script>
  <script type="text/javascript" src="/js/custom-form-elements.js"></script>
  <script type="text/javascript" src="/js/jquery.dd.js"></script>
  <script type="text/javascript" src="/js/jquery.form.js"></script>
  <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
  <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
  <script type="text/javascript" src="/js/jQuery.fileinput.js"></script>

  <script type="text/javascript" src="/js/forms.js"></script>
  <script type="text/javascript" src="/js/scrollable.js"></script>
  <script type="text/javascript" src="/js/easySlider1.7.js"></script>
  <script type="text/javascript" src="/js/script.js"></script>
</head>

<body>
<div id="overlay"></div>
<div id="modal_box"> <img id="closeButton" src="/images/close_btn.png" width="42" height="42" style="position:absolute; left:700px; top:-29px" />
  <div id="modal_content" ></div>
</div>

<div class="container">
  <div class="header">
  	<img src="/images/logo.gif" width="165" height="70" />
    <a href="#" class="formlink" rel="register">
      <img class="rollover" src="/images/salesreg_button.png" width="221" height="44" style="position:absolute; left:594px; top:26px" />
    </a>
    <div id="userinfo">
      <?php $user_data = User::current()->getData(); ?>
      <strong><?php echo $user_data['name'] . " " . $user_data['surname'] ?></strong>
      <a href="<?php echo $this->router->getUrl('logout'); ?>">
        <img src="/images/switch.gif" id="switch"/>
      </a><br />
      НАЧИСЛЕНО БАЛЛОВ: <strong><?php echo $user_data['points'] ?></strong><br />
      АКТИВНО БАЛЛОВ:<strong><?php echo $user_data['active_points'] ?></strong>
    </div>
  </div>
  <div class="content"> 
    <?php echo $this->renderAction(); ?>
<!--      <div id="fader" ></div>
-->      
  </div>
   
  <div class="footer">
    <div id="bottom_menu">
      <a href="<?php echo $this->router->getUrl('main'); ?>">
        <img class="rollover" src="/images/menu/b_1.gif" width="68" height="33" />
      </a>
      <a href="#" class="formlink" rel="cabinet">
        <img class="rollover" src="/images/menu/b_2.gif" width="120" height="33" />
      </a>
      <a href="">
        <img class="rollover" src="/images/menu/b_3.gif" width="115" height="33" />
      </a>
      <a href="">
        <img class="rollover" src="/images/menu/b_4.gif" width="118" height="33" />
      </a>
      <a href="#" class="formlink" rel="rules" data-show-before="true">
        <img class="rollover" src="/images/menu/b_5.gif" width="71" height="33" />
      </a>
    </div>
  </div>
  
  <img class="headerImage" src="images/interiors/h_1.png" width="329" height="170" style="top:0px"/>
  <img class="headerImage" src="images/interiors/h_2.png" width="329" height="149" />
  <img class="headerImage" src="images/interiors/h_3.png" width="329" height="204" />
  <img class="headerImage" src="images/interiors/h_4.png" width="329" height="185" />

</div>
  
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29467029-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter12819286 = new Ya.Metrika({id:12819286, enableAll: true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/12819286" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->  
  
</body>
</html>
