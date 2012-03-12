<div class="formHeader" style="padding-left:1px">
  <table cellpadding="0" cellspacing="0">
    <tr>
      <td><img src="/images/forms/h_salesregistration.png" width="712" height="48"/></td>
    </tr>
  </table>
</div>
<div class="formContainer" style="margin-left:104px;">
  <form action="<?php echo $this->router->getUrl('sales', array(':method' => 'register')) ?>" method="POST" id="sale_register_form" enctype="multipart/form-data">
    <div style="position:absolute; top:44px;">
      <select name="id_category" id="categoryInput" style="width:204px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected">ВЫБОР КАТЕГОРИИ</option>
      </select>
    </div>
    <div style="position:absolute; left:225px; top:44px;">
      <select name="id_model" id="cityInput" style="width:204px; height:33px">
        <option value="" title="" disabled="disabled" selected="selected">ВЫБОР МОДЕЛИ</option>
      </select>
    </div>
    
    <div style="position:absolute; width:400px; top:110px">
      <label>
      Дата продажи
      <div class="ti_bg" style="width:111px; margin:-8px 0 0 3px; background:url(/images/forms/ti_bg3.png) no-repeat; display:inline">
        <input name="dt_sale_d" type="text" style="width:25px" value="ДД">
        <input name="dt_sale_m" type="text" style="width:29px" value="ММ">
        <input name="dt_sale_y" type="text" style="width:34px" value="ГГГГ">
      </div>
      </label>
    </div>
    <div style="position:absolute; width:400px; top:110px; left:234px">
      <label>Стоимость </label>
      <div class="ti_bg" style="width:58px; margin:-8px 0 0 0px; background:url(/images/forms/ti_bg1.png) no-repeat; display:inline">
        <input name="price" type="text" style="width:55px; background:#FFF" value="">
      </div>
      <label style="margin:0 0 0 77px">руб.</label>
    </div>
    
    <div id="upload" style="position:absolute; left:35px; top:160px; width:380px; height:44px; display:block; overflow:hidden;"> <img src="/images/forms/uploadBtn_1.png" alt="загрузить фотографии чека или накладной" width="44" height="44" style="float:left; cursor:pointer"/>
			<div style="margin:15px 0 0 55px; font-weight:bold; text-decoration:underline; cursor:pointer">ЗАГРУЗИТЬ ФОТОГРАФИИ ЧЕКА ИЛИ НАКЛАДНОЙ</div>
			<input type="file" name="file" id="file" size="1" style="margin-top: -50px; margin-left:-410px; -moz-opacity: 0; filter: alpha(opacity=0); opacity: 0; font-size: 150px; height: 100px;; cursor:pointer">
		</div>
    
    <input name="save_btn" type="image" src="/images/forms/save_btn.png" style="position:absolute; left:146px; top:215px"/>    
  </form>
</div>

<div id="useralert" style="display: none;"></div>
