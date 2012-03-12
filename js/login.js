$(function() {
  handleForm();
  hanlePassword();
  
  $('#password-password').val('');
  
  $('#password-password, #msisdn').keypress(function(event) {
    if(event.keyCode == 13) {
      $('#loginForm').submit();
    }
  });
    
  $("#closeButton").click(function(event){
		closeModal();
	});
	
	$("#loginButton").click(function(event) {
	  $('#loginForm').submit();
	  
	  return false;
	});
	
	if(window.location.hash == "#rules") {
	  $('#modal_box').css('background-image', 'url(/images/popup_bg.png)');
    $('#modal_content').html('');
    $('#rulesTemplate').tmpl().appendTo('#modal_content');
    
    $("#closeButton").hide();
    
    showModal();
    rulesFormInit();
	}
	
  $("a.formlink").click(function(event){
    $('#modal_box').css('background-image', 'url(images/popup_bg.png)');
    $('#modal_content').html('');
    $('#' + $(this).attr('rel') + 'Template').tmpl().appendTo('#modal_content');
    
    eval($(this).attr('rel') + 'FormInit();');

    showModal(); 
    
    return false;
  });  
});

function feedbackFormInit() {
  handleForm();
  handleDropbox([{id:"themeInput", style:"dd3"}]);
  
  //init form
  $('#feedback_form').ajaxForm({
    dataType:  'json',
    success: function(data) {
      $('#useralert').html(data.result_message).show();
    }
  });
}

function rulesFormInit() {
  var pane = $('.scroll-pane').jScrollPane({animateScroll: true});
  var api = pane.data('jsp');

  $('#upBtn').bind(
		'click',
		function()
		{
			api.scrollBy(0, parseInt(-100));
			return false;
		}
	);
  $('#downBtn').bind(
		'click',
		function()
		{
			api.scrollBy(0, parseInt(100));
			return false;
		}
	);

}

function registrationFormInit() {
  //init pretty form
  handleForm();
	handleDropbox([{id:"cityInput", style:"dd2"}, 
	               {id:"regionInput", style:"dd2"}, 
	               {id:"addressInput", style:"dd2"},
	               {id:"outletNameInput", style:"dd2"},
	               {id:"categoryInput", style:"dd3"}]);
  Custom.init();
  
  //init datepicker
  $("#datepicker").datepicker({
    changeYear: true,
    changeMonth: true,
    yearRange: '1932:c'
  });
  $('#datepicker_container').click(function(){
    $( "#datepicker" ).datepicker('show');
  });
  
  //init captcha
  $('#captcha_image').attr('src', '/captcha/captcha.php');
  $('#refreshCaptcha').click(function() {
    $('#captcha_image').attr('src', '/captcha/captcha.php?' + Math.random());
    return false;
  });
  
  //init outlets
  outletsInput();
  
  //init form
  $('#registration_form').ajaxForm({
    dataType:  'json',
    success: function(data) {
      $('#captcha_image').attr('src', '/captcha/captcha.php')
      $('#captcha_input').clearFields();
      $('#useralert').html(data.result_message).show();
    }
  });
  
  //init add button
  $('#add_button').click(function() {
    var category_id = $('#categoryInput').val();
    var $category_option = $('#categoryInput').find('option[value="'+category_id+'"]');
    var category = $category_option.html();
    var input = '<input type="hidden" name="id_category[]" value="' + category_id + '">';
    
    if(category_id != '') {
      $('#selected_categories').append(category + ' ' + input);
    
      $category_option.remove();
      handleDropbox([{id:"categoryInput", style:"dd3"}]);
    }
    return false;
  });
}

function outletsInput() {
  var $city = $('#cityInput');
  var $region = $('#regionInput');
  var $address = $('#addressInput');
  var $outlet_name = $('#outletNameInput');

  var city_options = $city.html();
  var region_options = $region.html();
  var address_options = $address.html();
  var outlet_name_options = $outlet_name.html();
  
  var default_region_options = region_options;
  var default_address_options = address_options;
  var default_outlet_name_options = outlet_name_options;
  
  $.each(window.outlets, function(n, a) {
    city_options += '<option value="'+ n +'" title="">' + n + '</option>';
  });
  $city.html(city_options);
  handleDropbox([{id:"cityInput", style:"dd2"}]);
  
  $city.change(function() {
    region_options = default_region_options;
    address_options = default_address_options;
    outlet_name_options = default_outlet_name_options;
    
    $.each(window.outlets[$city.val()], function(n, a) {
      region_options += '<option value="'+ n +'" title="">' + n + '</option>';
    });
    $region.html(region_options);
    $address.html(address_options);
    $outlet_name.html(outlet_name_options);
    
    handleDropbox([{id:"regionInput", style:"dd2"}, 
  	               {id:"addressInput", style:"dd2"},
  	               {id:"outletNameInput", style:"dd2"}]);
  });
  
  $region.change(function() {
    address_options = default_address_options;
    outlet_name_options = default_outlet_name_options;
    
    $.each(window.outlets[$city.val()][$region.val()], function(n, a) {
      outlet_name_options += '<option value="'+ n +'" title="">' + n + '</option>';
    });
    $address.html(address_options);
    $outlet_name.html(outlet_name_options);
    
    handleDropbox([{id:"addressInput", style:"dd2"},
  	               {id:"outletNameInput", style:"dd2"}]);
  });
  
  $outlet_name.change(function() {
    address_options = default_address_options;
    //alert($outlet_name.val());
    
    $.each(window.outlets[$city.val()][$region.val()][$outlet_name.val()], function(n, a) {
      address_options += '<option value="'+ a +'" title="">' + n + '</option>';
    });
    
    $address.html(address_options);
    
    handleDropbox([{id:"addressInput", style:"dd2"}]);
  });
}

function showModal(){
	$("#overlay").css("visibility", "visible");
	$("#modal_box").css("left", ($(window).width()-713)/2+"px");
	$("#modal_box").css("top", ($(window).height()-365)/2+"px");
	$("#modal_box").css("display", "block");	
}

function closeModal(){
	$("#modal_box").css("display", "none");
	$("#overlay").css("visibility", "hidden");
}
