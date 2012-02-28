<form action="<?php echo $this->router->getUrl('login'); ?>" method="post" id="loginForm">
  <div class="content" style="height:150px; padding:0">
    <div style="position:relative; width:255px; margin:0px; left:0; top:0px; padding:0; line-height:0">
      <input id="msisdn" name="msisdn" type="text" style="width:210px; margin:0" value="<?php echo (($_SESSION['msisdn'] != '') ? $_SESSION['msisdn'] : 'Номер телефона'); ?>">
      <input id="password-clear" type="text" value="Пароль" autocomplete="off" style="margin:24px 0 0 0; background:none; width:210px" />
      <input id="password-password" type="password" name="password" value="" autocomplete="off" style="margin:24px 0 0 0; background:none; width:210px" />
      
      <div style="margin-top:34px; font-size:9px">
        <a href="">Забыли пароль?</a>&nbsp;|&nbsp;
        <a class="formlink" rel="registration" href="#">Регистрация</a>&nbsp;|&nbsp;
        <a href="">Обратная связь</a>
      </div>
      
      <a href="#" id="loginButton">
        <img src="/images/home.png" width="132" height="134" style="position:absolute; left:236px; top:-40px" />
      </a>
  </div>
</div>
</form>

<!-- <?php echo $this->router->getUrl('registration') ?> -->

<script id="registrationTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'registration', 'action' => 'form')); ?>
</script>
