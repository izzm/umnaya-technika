$(document).ready(function(){
  initPoints();

	$("img.rollover").rollover(true);
	$(".point").hover(function(event){
		pointTooltip(event)
	});
	$("#slider").easySlider({
		continuous: true,
		nextText: '',
		prevText: ''
	});
	
	$("#closeButton").click(function(event){
		closeModal();
	});
	
  $("a.formlink").click(formlinkClick);
   
});

function formlinkClick(event){
  var before_show = $(this).attr('data-show-before');
  
  $('#modal_box').css('background-image', 'url(/images/popup_bg.png)');
  $('#modal_content').html('');
  $('#' + $(this).attr('rel') + 'Template').tmpl().appendTo('#modal_content');
  
  if(before_show == 'true') {
    showModal();
  }
  
  eval($(this).attr('rel') + 'FormInit(this);');
  
  if(before_show != 'true') {
    showModal();
  }
  
  return false;
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

function cabinetFormInit() {
  $( "#accordion" ).accordion({ active: 0, autoHeight: false });
	handleDropbox([{id:"cityInput", style:"dd2"}, {id:"regionInput", style:"dd2"}, {id:"categoryInput", style:"dd3"}]);
	Custom.init();
	$( "#datepicker" ).datepicker({changeYear: true,});
  
	$('#datepicker_container').click(function(){
		$( "#datepicker" ).datepicker('show');
	});
	
	$.getJSON('/sales/stat', function(data) {
    var sales = $.isArray(data.sale_history.registration) ? 
      data.sale_history.registration : data.sale_history
  
	  $('#salesTableTemplate').tmpl({
      sales: sales,
      statuses: data.statuses
    }).appendTo('#salesTable');
	});
}

function registerFormInit() {
  var process = function() {
    var category_options = $('#categoryInput').html();
    var default_model_options = $('#cityInput').html();
    
    $.each(window.cateogries, function(id_category, category_name) {
      category_options += '<option value="'+ id_category +'" title="">' + category_name + '</option>';
    });
    $('#categoryInput').html(category_options).change(function() {
      var model_options = default_model_options;
      
      $.each(window.goods[$(this).val()], function(id_model, model_name) {
        model_options += '<option value="'+ id_model +'" title="">' + model_name + '</option>';
      });
      
      $('#cityInput').html(model_options)
      handleDropbox([{id:"cityInput", style:"dd2"}]);
    });
  
    handleForm();
    handleDropbox([{id:"cityInput", style:"dd2"}, {id:"categoryInput", style:"dd2"}]);
    
    //init form
    $('#sale_register_form').ajaxForm({
      dataType:  'json',
      success: function(data) {
        $('#useralert').html(data.result_message).show();
      }
    });
  };
  
  if(window.cateogries == undefined) {
    $.getJSON('/sales/goods', function(data) {
      window.cateogries = data['categories'];
      window.goods = data['goods'];
      
      process();
    });
  } else {
    process();
  }
}

function statFormInit() {
  $.getJSON('/sales/stat', function(data) {
    var sales = $.isArray(data.sale_history.registration) ? 
      data.sale_history.registration : data.sale_history
  
	  $('#salesTableTemplate').tmpl({
      sales: sales,
      statuses: data.statuses
    }).appendTo('#salesTable');
	});
}

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

function lastNewsFormInit() {
  $.getJSON('/news/last', function(data) {
    var news = $.isArray(data.news.item) ? 
      data.news.item : [data.news.item];
    
	  $('#lastNewsTableTemplate').tmpl({
      news: news
    }).appendTo('#lastNewsTable');
    
    $("#lastNewsTable a.formlink").click(formlinkClick);
	});
}

function archiveNewsFormInit() {
  $.getJSON('/news/archive', function(data) {
    var news = $.isArray(data.news.item) ? 
      data.news.item : [data.news.item];
    
    for(i=0, l=news.length ; i<l ; i+=4) {
	    $('#archiveNewsTableTemplate').tmpl({
        news: [news[i], news[i+1], news[i+2], news[i+3]]
      }).appendTo('#archiveNewsContainer');
    }
    
    
    //$("#gallery").scrollable();
    // initialize scrollable together with the navigator plugin
    $("#gallery").scrollable().navigator();
    
    $("#archiveNewsContainer a.formlink").click(formlinkClick);
	});
}

function showNewsFormInit(elem) {
  var id_news = $(elem).attr('data-id-news');
  
  $.getJSON('/news/show', {id_news: id_news}, function(data) {
    $('#showNewsContentTemplate').tmpl({
      news: data.news
    }).appendTo('#newsContainer');
    
    $("#newsContainer a.formlink").click(formlinkClick);
    
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
	});
}

function initPoints(){	
  $('#slider a[href=""]').hide();

	$('.pointContainer').each(function(index, element) {
		$(element).html('<div class="pointToolTipContainer"><div class="pointToolTip" style="background:url(images/menu/p'+index+'.png) no-repeat"></div></div><div class="point"></div>')
    });
}
 
function pointTooltip(e){
	if (e.type == 'mouseenter'){
		$(e.target).parent().children().eq(0).children().eq(0).animate({left:'0px'});
	}else{
		$(e.target).parent().children().eq(0).children().eq(0).animate({left:'-210px'});
	}
}

function showModal(){
	$("#overlay").css("visibility", "visible");
	$("#modal_box").css("left", ($(window).width()-713)/2+"px");
	$("#modal_box").css("top", ($(window).height()-365)/2+"px");
	$("#modal_box").css("display", "block");
	
	$("#modal_content a.formlink").click(formlinkClick);
}

function closeModal(){
	$("#modal_box").css("display", "none");
	$("#overlay").css("visibility", "hidden");
}

jQuery.fn.rollover = function(preload) {
	this.filter(':not([src*="_over."])').each(function() {
		var a = this.src, b = this.src.replace(/\.(\w+(\?[^$]*)?)$/, '_over.$1');
		$(this).hover(function() { this.src = b; }, function() { this.src = a; });
		        if (preload) {
					var i = new Image;
					i.src = b;
				}
		 });
	return this;
}; 
