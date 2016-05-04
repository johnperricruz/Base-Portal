$(function(){        
	navMinimize();
	compareResetPassword();
});
function navMinimize(){
    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
}
function changeSwitchValue(_this){
	$("#"+_this).change(function(){
		if($(this).is(":checked")){
			$(this).val("1");
		}else{
			$(this).val("0");
		}
	});
}
function compareResetPassword(){
	var form = $('#reset-password-form');
	var password = $('#txtPassword');
	var confirm  = $('#txtConfirm');
	var trigger  = $('#btnResetPasswordSubmit');
	var flash_container = $(".flash-message");
	var msg = '<div class="alert alert-danger" role="alert">';
				 msg += '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
				 msg += '<strong>Oh snap!</strong> The Password did not match!'
				 msg += '</div>';
	
	trigger.click(function(){
		if(password.val() != confirm.val()){
			flash_container.html(msg);
			console.log('Script : Password did not match!');
			
		}else{
			form.submit();
		}
	});

}
function debug(){
	alert("Connected");
}