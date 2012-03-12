<div class="formHeader">
  <img src="/images/forms/h_callback.png" width="714" height="48" />
</div>
<div class="formContainer">
  <form action="<?php echo $this->router->getUrl('unsigned_feedback') ?>" method="POST" id="feedback_form">
    <div class="ti_bg" style="width:412px; top:0px; background:url(/images/forms/ti_bg4.png) no-repeat">
      <input name="name" type="text" style="width:400px" title="Ваше имя" value="Ваше имя">
    </div>    
    <div class="ti_bg" style="width:166px; top:40px">
      <input name="email" type="text" style="width:162px" title="E-mail" value="E-mail">
    </div>
    <div style="position:absolute; left:195px; top:40px; font-size:24px; font-weight:bold; color:#aaccf2">+7</div>
    <div class="ti_bg" style="width:32px; left:242px; top:40px">
      <input name="msisdn_code" type="text" style="width:28px" value="000">
    </div>
    <div class="ti_bg" style="width:100px; left:296px; top:40px">
      <input name="msisdn_number" type="text" style="width:75px" value="000 0000">
    </div>
    <div style="position:absolute; left:433px; top:40px">
      <select name="id_question" id="themeInput" style="width:172px; height:33px">
        <option value="1" title="">Регистрация на сайте</option>
        <option value="2" title="">Восстановление пароля</option>
        <option value="3" title="">Регистрация продаж</option>
        <option value="4" title="">Изменение личных данных</option>
		<option value="5" title="">Начисление баллов</option>
		<option value="6" title="">Получение призов</option>
		<option value="7" title="">Мнение о программе</option>
		<option value="8" title="">Мнение о технике Samsung</option>
		<option value="9" title="">Другое</option>
        <option value="" title="" disabled="disabled" selected="selected">ТЕМА СООБЩЕНИЯ</option>
      </select>
    </div>

    <div id="upload" style="position:absolute; left:605px; top:40px; width:31px; height:31px; display:block; overflow:hidden; background:#FF0000">
    <img src="/images/forms/clipBtn.png" width="31" height="31" />
      <input type="file" name="file" id="file" size="1" style="margin-top: -50px; margin-left:-410px; -moz-opacity: 0; filter: alpha(opacity=0); opacity: 0; font-size: 150px; height: 100px;; cursor:pointer"> 
    </div>

    <div class="tf_bg" style="width:639px; height:110px; top:82px">
    <textarea name="message" cols="" rows="" style="width:620px; height:117px"></textarea>
    </div>
    <input name="" type="image" src="/images/forms/send_btn.png" style="position:absolute; left:537px; top:219px"/>
  </form>
  <div id="feedback_result" style="position:absolute; top:232px; display: none;">Спасибо, ваше сообщение принято!</div>
</div>

<div id="useralert" style="display: none;"></div>
