<div class="formHeader">
  <img src="/images/forms/h_registration.png" width="714" height="48" />
</div>
<div class="formContainer">
  <form action="<?php echo $this->router->getUrl('registration_create') ?>" method="POST" id="registration_form">
    <div class="ti_bg2" style="position:absolute; top:-5px; width:640px;">
      <input name="surname" type="text" style="width:200px" title="Фамилия" value="Фамилия">
      <input name="name" type="text" style="width:216px" title="Имя" value="Имя">
      <input name="patronymic" type="text" style="width:200px" title="Отчество" value="Отчество">
    </div>
    
    <div class="datapicker_bg" id="datepicker_container" style="width:151px; top:20px; margin:27px 0 0 0">
  		<input name="birthday" id="datepicker" class="datepicker" type="text" style="width:110px; color:#FFFFFF" value="Дата рождения">
    </div>
    
    <div style="position:absolute; left:157px; width:60px; top:43px; line-height:5px">
      <div style="position:absolute; top:-2px">
        <label style="line-height:23px">
          <input type="radio" name="sex" class="styled" checked="checked" value="m"/>муж.
        </label>
      </div>
      <div style="position:absolute; top:15px">
        <label style="line-height:23px">
          <input type="radio" name="sex" class="styled" value="f" />жен.
        </label>
      </div>
    </div>
    
    <div class="ti_bg" style="width:190px; left:217px; top:14px; margin:27px 0 0 0">
      <input name="msisdn" type="text" style="width:193px" title="+7 000 000 00 00" value="+7 000 000 00 00">
    </div>
    
    <div class="ti_bg" style="width:190px; left:434px; top:14px; margin:27px 0 0 0">
      <input name="email" type="text" style="width:185px" title="E-mail" value="E-mail">
    </div>
    
    
    <div style="position:absolute; top:86px">
      <select id="cityInput" style="width:205px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected" style="display:none">ВАШ ГОРОД</option>
      </select>
    </div>
    
    <div style="position:absolute; top:125px;">
      <select id="regionInput" style="width:205px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected">ВАШ РЕГИОН</option>
      </select>
    </div>
    
    <div style="position:absolute; left:217px; top:86px;">
      <select name="id_outlet" id="outletNameInput" style="width:205px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected">НАЗВАНИЕ МАГАЗИНА</option>
      </select>
    </div>
    
    <div style="position:absolute; left:217px; top:125px;">
      <select id="addressInput" style="width:205px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected" style="display:none">АДРЕС МАГАЗИНА</option>
      </select>
    </div>
<!--    
    <div class="ti_bg" style="position:absolute; width:190px; left:217px; top:58px; margin:27px 0 0 0">
      <input name="email_input" type="text" style="width:193px" title="Название торговой точки" value="Название торговой точки">
    </div>
    
    <div class="ti_bg" style="position:absolute; width:190px; left:217px; top:97px; margin:27px 0 0 0">
      <input name="email_input" type="text" style="width:185px" title="Название торговой точки" value="Название торговой точки">
    </div>
-->    
    <div style="position:absolute; left:434px; top:86px">
      <select id="categoryInput" style="width:190px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected">КАТЕГОРИЯ ТЕХНИКИ</option>
        <option value="1" title="">Холодильники</option>
        <option value="2" title="">Стиральные Машины</option>
        <option value="3" title="">Кондиционеры</option>
        <option value="4" title="">Встраиваемая техника</option>
        <option value="5" title="">Пылесосы</option>
        <option value="6" title="">Микроволновки</option>
      </select>
    </div> 

    <input id="add_button" type="image" src="/images/forms/plus_btn.png" alt="Добавить категорию" style="position:absolute; left:610px; top:86px"/>
    
    <img src="/images/forms/separator_h.png" width="642" height="15" style="position:absolute; top:182px"/>
    
    <div style="position:absolute; left:434px; top:122px">
      <strong>ВЫБРАННЫЕ КАТЕГОРИИ:</strong><br />
    	<span id="selected_categories"></span>
    </div>
    
    <img src="/images/forms/antibot.png" id="captcha_image" width="124" height="65" style="position:absolute; top:196px"/>
    <div class="ti_bg" style="position:absolute; width:213px; left:130px; top:168px; margin:27px 0 0 0">
      <input name="captcha" type="text" style="width:210px" title="Введите текст с картинки" value="Введите текст с картинки" id="captcha_input">
    </div>
    
    <div style="position:absolute; left:130px; top:237px">
    	<input name="rules_accept" type="checkbox" class="styled" />
    	<div style="padding:4px 0 0 0; color:#9d9d9d; width:200px">
    	  Я согласен(а) с <a href="">правилами</a>
    	</div>
  	</div>
    <input name="" type="image" src="/images/forms/register_btn.png" style="position:absolute; left:467px; top:232px"/>
  </form>
</div>

<!-- Предупреждение -->
<div id="useralert" style="display: none;"></div>
