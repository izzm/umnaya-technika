<div class="formContainer" style="margin-left:-40px; top:0px">
	<div id="accordion">
<?php if(false): ?>
		<h3><a href="#">ИЗМЕНЕНИЕ ЛИЧНЫХ ДАННЫХ</a></h3>
		<div style="padding:10px 0 0 0px; width:700px; overflow:hidden; overflow-y:auto">
			<div style="position:relative; left:40px; padding:0; height:170px">
				<form action="" method="get">
					<div class="ti_bg2" style="position:absolute; top:-5px; width:640px;">
						<input name="lastname_input" type="text" style="width:200px" title="Фамилия" value="Фамилия">
						<input name="firstname_input" type="text" style="width:213px" title="Имя" value="Имя">
						<input name="middle_input" type="text" style="width:200px" title="Отчество" value="Отчество">
					</div>
					<div class="datapicker_bg" id="datepicker_container" style="width:151px; top:20px; margin:27px 0 0 0">
						<input id="datepicker" class="datepicker" type="text" style="width:110px; color:#FFFFFF" value="ДАТА РОЖДЕНИЯ">
					</div>
					<div style="position:absolute; left:157px; width:60px; top:43px; line-height:5px">
						<div style="position:absolute; top:-2px">
							<label style="line-height:23px">
								<input type="radio" name="sex" class="styled" checked="checked" value="m"/>
								муж.</label>
						</div>
						<div style="position:absolute; top:15px">
							<label style="line-height:23px">
								<input type="radio" name="sex" class="styled" value="w" />
								жен.</label>
						</div>
					</div>
					<div class="ti_bg" style="width:190px; left:217px; top:14px; margin:27px 0 0 0">
						<input name="email_input" type="text" style="width:193px" title="+7 000 000 00 00" value="+7 000 000 00 00">
					</div>
					<div class="ti_bg" style="width:190px; left:434px; top:14px; margin:27px 0 0 0">
						<input name="email_input" type="text" style="width:185px" title="E-mail" value="E-mail">
					</div>
					<div style="position:absolute; top:86px">
						<select name="cityInput" id="cityInput" style="width:205px; height:33px">
							<option value="shopping_cart" title="">МОСКВА</option>
							<option value="shopping_cart" title="">САНКТ ПЕТЕРБУРГ</option>
							<option value="shopping_cart" title="">МОСКВА</option>
							<option value="shopping_cart" title="">САНКТ ПЕТЕРБУРГ</option>
							<option value="" title="" disabled="disabled" selected="selected" style="display:none">ВАШ ГОРОД</option>
						</select>
					</div>
					<div style="position:absolute; top:125px;">
						<select name="regionInput" id="regionInput" style="width:205px; height:33px">
							<option value="shopping_cart" title="">Центральный</option>
							<option value="shopping_cart" title="">ЮЖНЫЙ</option>
							<option value="shopping_cart" title="">ВОСТОЧНЫЙ</option>
							<option value="" title="" disabled="disabled" selected="selected">ВАШ РЕГИОН</option>
						</select>
					</div>
					<div class="ti_bg" style="position:absolute; width:190px; left:217px; top:58px; margin:27px 0 0 0">
						<input name="email_input" type="text" style="width:193px" title="Название торговой точки" value="Название торговой точки">
					</div>
					<div class="ti_bg" style="position:absolute; width:190px; left:217px; top:97px; margin:27px 0 0 0">
						<input name="email_input" type="text" style="width:185px" title="Название торговой точки" value="Название торговой точки">
					</div>
					<div style="position:absolute; left:434px; top:86px">
						<select name="categoryInput" id="categoryInput" style="width:190px; height:33px">
							<option value="shopping_cart" title="">VIDEO</option>
							<option value="shopping_cart" title="">AUDIO</option>
							<option value="shopping_cart" title="">VIDEO</option>
							<option value="" title="" disabled="disabled" selected="selected">КАТЕГОРИЯ ТОВАРА</option>
						</select>
					</div>
					<input name="addButton" type="image" src="images/forms/plus_btn.png" alt="Добавить категорию" style="position:absolute; left:610px; top:86px"/>
					<img src="images/forms/separator_h.png" width="642" height="15" style="position:absolute; top:182px"/>
					<div style="position:absolute; left:434px; top:122px; width:230px"><strong>ВЫБРАННЫЕ КАТЕГОРИИ:</strong><br />
						Видео, аудио, Видео, аудио, Видео, аудио, Видео, аудио</div>
					<!--
					<img src="images/forms/antibot.png" width="124" height="65" style="position:absolute; top:196px"/>
					<div class="ti_bg" style="position:absolute; width:213px; left:130px; top:168px; margin:27px 0 0 0">
						<input name="email_input" type="text" style="width:210px" title="Введите текст с картинки" value="Введите текст с картинки">
					</div>
					<div style="position:absolute; left:130px; top:237px">
						<input type="checkbox" name="a" class="styled" />
						<div style="padding:4px 0 0 0; color:#9d9d9d; width:200px">Я согласен(а) с <a href="">правилами</a></div>
					</div>
					-->
					<input name="" type="image" src="images/forms/save_btn.png" style="position:absolute; left:467px; top:190px"/>
				</form>
				<div style="position:absolute; left:0px; top:190px"><a href="">Смена пароля</a></div>
			</div>
		</div>
<?php endif; ?>
		<h3><a href="#">СТАТИСТИКА ПО ЗАРЕГИСТРИРОВАННЫМ ПРОДАЖАМ</a></h3>
		<div>
			<div style="height:240px; overflow:auto" id="salesTable">
				<!--<div style="margin:0 0 0 auto; width:100%; text-align:right"><a href=" ">Подробнее</a></div>-->
			</div>
		</div>
<?php if(false): ?>
		<h3><a href="#">СТАТИСТИКА ПО ПРОЙДЕННЫМ ТЕСТАМ И ОБУЧАЮЩИМ ПРОГРАММАМ </a></h3>
		<div>
			<div style="height:140px; overflow:auto">
				<table class="sales" border="0">
    <tr>
    	<th>ДАТА РЕГИСТРАЦИИ ПРОДАЖИ</th>
        <th>КАТЕГОРИЯ ТЕХНИКИ</th>
        <th>МОДЕЛЬ ТЕХНИКИ</th>
        <th>ДАТА ПРОДАЖИ ТЕХНИКИ</th>
        <th>СТОИМОСТЬ</th>
        <th>БАЛЛЫ</th>
        <th style="width:160px">КОММЕНТАРИЙ</th>
      </tr>
      {{each sales}}
      <tr>
        <td>${$value.dt_reg}</td> 
        <td>${$value.category}</td>
        <td>${$value.model}</td>
        <td>${$value.dt_sale}</td>
        <td>${$value.price}</td>
        <td>${$value.points}</td>
        <td>${statuses[$value.status]}</td>
      </tr>
      {{/each}}

   </table>
				<div style="margin:0 0 0 auto; width:100%; text-align:right"><a href=" ">Подробнее</a></div>
			</div>
		</div>
		<h3><a href="#">СТАТИСТИКА ЗАКАЗА ПОДАРКОВ</a></h3>
		<div>
			<div style="height:140px; overflow:auto">
				<table class="sales" border="0">
          <tr>
          	<th>ДАТА РЕГИСТРАЦИИ ПРОДАЖИ</th>
              <th>КАТЕГОРИЯ ТЕХНИКИ</th>
              <th>МОДЕЛЬ ТЕХНИКИ</th>
              <th>ДАТА ПРОДАЖИ ТЕХНИКИ</th>
              <th>СТОИМОСТЬ</th>
              <th>БАЛЛЫ</th>
              <th style="width:160px">КОММЕНТАРИЙ</th>
            </tr>
            {{each sales}}
            <tr>
              <td>${$value.dt_reg}</td> 
              <td>${$value.category}</td>
              <td>${$value.model}</td>
              <td>${$value.dt_sale}</td>
              <td>${$value.price}</td>
              <td>${$value.points}</td>
              <td>${statuses[$value.status]}</td>
            </tr>
            {{/each}}

         </table>
				<!--<div style="margin:0 0 0 auto; width:100%; text-align:right"><a href=" ">Подробнее</a></div>-->
			</div>
		</div>
<?php endif; ?>
	</div>
</div>
