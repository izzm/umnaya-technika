$(document).ready(function(){
	$("img.rollover").rollover(true);
	$("#slider").easySlider({
		continuous: true,
		nextText: '',
		prevText: ''
	});
	
	$('#modal_content').html('');
  $('#dummyTemplate').tmpl().appendTo('#modal_content');
	$('#modal_box').css('background-image', 'url(images/dummy_bg.png)');
	
	showModal(); 
	
	$("#closeButton").hide().click(function(event){
		//closeModal();
	});
   $("a.formlink").click(function(event){
	   $('#modal_box').css('background-image', 'url(images/popup_bg.png)');   
	   $.ajax({
		  url: "forms/"+event.target.id+".html", 
		  cache: false, 
		  success: function(html){ 
			$("#modal_content").html(html); 
			handleForm();
		  } 
		});
	   
		showModal(); 
   });
 });

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
