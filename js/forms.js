function handleForm() {

	
	var input = $("[type=text]");
	$("[type=text]").data($("[type=text]").val())
	inputs = $("[type=text]");
	for (var i = 0; i < inputs.length; i++) {
		jQuery.data(inputs[i], 'prompt', inputs[i].value);
	}


	$('[type=text]').focus(function(event) {
		if (event.target.value == jQuery.data(event.target, 'prompt')) event.target.value = "";
		if (!$(event.target).hasClass('datepicker')) $(event.target).css("color", "#2e82ff");

	});
	$('[type=text]').blur(function(event) {
		if (event.target.value == jQuery.data(event.target, 'prompt') || event.target.value == "") {
			event.target.value = jQuery.data(event.target, 'prompt');
			if (!$(event.target).hasClass('datepicker')) $(event.target).css("color", "#9d9d9d");
		}
	});
}

function hanlePassword(){
	$('#password-clear').show(); 
 $('#password-password').hide();  

 $('#password-clear').focus(function() {  

     $('#password-clear').hide();  

     $('#password-password').show();  

     $('#password-password').focus();  

 });  

 $('#password-password').blur(function() {  

     if($('#password-password').val() == '') {  

         $('#password-clear').show();  

         $('#password-password').hide();  

    }  

}); 

}


function handleDropbox(dds){
	for (var key in dds){
    try {
		  var oHandler = $("#"+dds[key].id).msDropDown({
			  mainCSS: dds[key].style, onInit:'callinitmethod'
		  }).data("dd");
//		$("#"+dds[key].id).change(function(){
//			if (oHandler.item([0]).value != "")
//			 oHandler.remove(0)
//		});
//		oHandler.add({text:$("body select").attr('title'), value:'', selected:'delected'}, 0);

//		$("body select").val('xxx')
		//alert ($("body select").attr('title'));
		//oHandler.open();
	//oHandler.multiple(true);

		} catch (e) {
		//	alert(e.message);
		}
	}
}

function callinitmethod(e){
	//e.remove(0);
	//alert (e.data());
}
