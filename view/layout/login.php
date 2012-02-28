<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Умная техника</title>
<link rel="stylesheet" href="/css/intro.css" type="text/css" media="screen">
<link rel="stylesheet" href="/css/forms.css" type="text/css" media="screen">
<link rel="stylesheet" href="/css/dd.css" type="text/css" media="screen">
<link rel="stylesheet" href="/css/jquery-ui-1.8.17.custom.css" type="text/css" media="screen">

<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.tmpl.min.js"></script>

<script type="text/javascript" src="/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.datepicker-ru.js"></script>
<script type="text/javascript" src="/js/custom-form-elements.js"></script>
<script type="text/javascript" src="/js/jquery.dd.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>

<script type="text/javascript" src="/js/forms.js"></script>
<script type="text/javascript" src="/js/login.js"></script>
<script type="text/javascript" src="/outlets/tree.php"></script>
</head>

<body>
<div id="overlay"></div>
<div id="modal_box"> <img id="closeButton" src="/images/close_btn.png" width="42" height="42" style="position:absolute; left:700px; top:-29px" />
  <div id="modal_content" ></div>
</div>
<div id="bodyBackround">
  <table border="0" cellpadding="0" cellspacing="0" style="height:712px; width:100%">
    <tr>
      <td style="width:50%; background:url(images/intro_bg_l.gif) repeat-x"></td>
      <td style="width:50%; background:url(images/intro_bg_r.gif) repeat-x"></td>
    </tr>
  </table>
</div>
<div class="container">
  <?php echo $this->renderAction(); ?>
<!-- end .container -->
</div>
<?php if($this->hasFlash('error')): ?>
  <div  class="alert" style="display:block"><?php echo $this->getFlash('error') ?></div>
  <div  class="alert" style="background:url(images/alert_4bg.png) no-repeat; width:340px; height:102px; display:none">Логин и пароль введены неверно</div>
<?php endif; ?>

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
